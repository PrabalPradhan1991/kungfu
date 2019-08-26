<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Exception\PPConnectionException;
use Redirect;
use Session;
use URL;

class PaypalController extends Controller
{
	private $item, $itemList, $amount, $transaction;
	private $currency = 'AUD';
    private $membership_fee = 125;
    private $membership_period = 365;
	public function __construct()
    {
		/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
	}

    public function getProperties($property) {
        return $this->$property;
    }

    public function getPaymentForm($user_id)
    {
        //$gift_cards = \App\GiftCardsValueModel::orderBy('card_value', 'ASC')->get();
    	return view('user.paypal.payment-form')
                ->with('user_id', $user_id)/*
                ->with('gift_cards', $gift_cards)*/;
    }

    public function getPayByPaypalForm($user_id)
    {
        //$gift_cards = \App\GiftCardsValueModel::orderBy('card_value', 'ASC')->get();
        return view('user.paypal.pay-by-paypal-form')
                ->with('user_id', $user_id)/*
                ->with('gift_cards', $gift_cards)*/;
    }

    public function postBuyStage() {
        $input = request()->all();

        $user_id = request()->get('user_id');
        $stage_id = request()->get('stage_id');
        $record = \App\Http\Controllers\CoreModules\Videos\StageModel::where('id', $stage_id)->firstOrFail();
        $return_url = request()->get('return_url');

        if($input['payment_method'] == 'By Bank') {

            $response = (new \App\Http\Controllers\CoreModules\Videos\VideoPurchaseModel)->purchaseVideo($user_id, $stage_id, 'review');
            if($response['status']) {
                session()->flash('success-msg', $response['message']);    
            } else {
                session()->flash('friendly-error-msg', $response['message']);
            }
            
            return redirect()->route('view-stage', $stage_id);
        } else {
            //$response = (new \App\Http\Controllers\CoreModules\Videos\VideoPurchaseModel)->purchaseVideo($user_id, $stage_id, 'review');
        }

        $payer = new Payer();
                $payer->setPaymentMethod('paypal');
        
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('buy-stage-status')) /** Specify return URL **/
                      ->setCancelUrl(URL::route('buy-stage-status'));

        $input['amount'] = $record->price;
        $input['description'] = isset($input['description']) ? $input['description'] : $record->stage_name;
        \Session::put('paypal-payment-details', $input);
        $this->setTransaction($input);
        
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($this->transaction));


        try {
            $payment->create($this->_api_context);
        } catch (\Exception $ex) {
            //if (\Config::get('app.debug')) {
            echo $ex->getMessage();
            die();
            \Session::flash('friendly-error-msg', 'Connection timeout');
            //\Session::flash('friendly-error-msg', 'Some error occur, sorry for inconvenient');
           return Redirect::to($return_url);
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
                    return Redirect::away($redirect_url);
        }
        
        \Session::flash('friendly-error-msg', 'Unknown error occurred');
                return Redirect::to($return_url);

    }

    public function getBuyStageStatus() {
        $payment_id = Session::get('paypal_payment_id');
        $paypal_payment_details = \Session::get('paypal-payment-details');
        \Session::forget('paypal-payment-details');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token')) || is_null($paypal_payment_details)) {
            \Session::flash('friendly-error-msg', 'Payment failed');
            return redirect()->to($paypal_payment_details['return_url']);
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            //$id = $this->storeInDatabase($paypal_payment_details, $payment_id);
            //\Session::put('gift_card_value_id', $id);
            \Session::flash('success-msg', 'Payment success');

            $response = (new \App\Http\Controllers\CoreModules\Videos\VideoPurchaseModel)->purchaseVideo($paypal_payment_details['user_id'], $paypal_payment_details['stage_id'], 'purchased');
            return redirect()->route('view-stage', $paypal_payment_details['stage_id']);
        }
        \Session::flash('friendly-error-msg', 'Payment failed');
        return redirect()->route('view-stages');
    }

    public function payWithpaypal($user_id)
    {

    	$input = request()->all();

        if($input['payment_method'] == 'By Bank') {
            (new \App\Http\Controllers\CoreModules\Subscription\SubscriptionModel)->createSubscription($user_id, $this->membership_period, 'new_subscription', 'New subscription request');

            return redirect()->route('confirmation-page-get', $user_id);
        }

    	\Session::put('paypal-payment-details', $input);
        $input['amount'] = $this->membership_fee;
        $input['description'] = isset($input['description']) ? $input['description'] : ' Membership Fee';
    	$this->setTransaction($input);


		$payer = new Payer();
		        $payer->setPaymentMethod('paypal');
		
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::route('status', $user_id)) /** Specify return URL **/
		              ->setCancelUrl(URL::route('status', $user_id));
		
		$payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($this->transaction));


		try {
			$payment->create($this->_api_context);
		} catch (\Exception $ex) {
			//if (\Config::get('app.debug')) {
			\Session::flash('friendly-error-msg', 'Connection timeout');
	    	//\Session::flash('friendly-error-msg', 'Some error occur, sorry for inconvenient');
	       return Redirect::route('paywithpaypal', $user_id);
		}

		foreach ($payment->getLinks() as $link) {
			if ($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
		        break;
			}
		}
		
		/** add payment ID to session **/
		Session::put('paypal_payment_id', $payment->getId());
		if (isset($redirect_url)) {
		/** redirect to paypal **/
		            return Redirect::away($redirect_url);
		}
		
		\Session::flash('friendly-error-msg', 'Unknown error occurred');
		        return Redirect::route('paywithpaypal', $user_id);
	}

	public function getPaymentStatus($user_id)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $paypal_payment_details = \Session::get('paypal-payment-details');
        \Session::forget('paypal-payment-details');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token')) || is_null($paypal_payment_details)) {
            \Session::flash('friendly-error-msg', 'Payment failed');
            return redirect()->route('paywithpaypal', $user_id);
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            //$id = $this->storeInDatabase($paypal_payment_details, $payment_id);
            //\Session::put('gift_card_value_id', $id);
            \Session::flash('success-msg', 'Payment success');
            \Auth::loginUsingId($user_id);
            (new \App\Http\Controllers\CoreModules\Subscription\PaymentDetailsModel)->extendSubscription($user_id, 'renewal', $this->membership_period);
            return redirect()->route('home');
        }
        \Session::flash('friendly-error-msg', 'Payment failed');
        return redirect()->route('paywithpaypal');
    }

    public function getSuccessPage()
    {
    	$id = \Session::get('gift_card_value_id');
    	\Session::forget('gift_card_value_id');
    	$record = \App\GiftCardsModel::where('id', $id)->firstOrFail();
    	return view('paypal.success-page')
    			->with('data', $record);
    }

    private function setItem($input)
    {
    	$item = new Item();
		$item->setName($this->currency.' '.$input['amount'].$input['description']) /** item name **/
            ->setCurrency($this->currency)
            ->setQuantity(1)
            ->setPrice($input['amount']); /** unit price **/

		$this->item = $item;
    }

    private function setItemList($input)
    {
		$this->itemList = new ItemList();
		$this->setItem($input);
		$this->itemList->setItems(array($this->item));    	
    }

    private function setAmount($input)
    {
    	$this->amount = new Amount();
    	$this->setItemList($input);
    	$amount = 0;
    	foreach($this->itemList->items as $i)
    	{
    		$amount += $i->price * $i->quantity;

    	}
        $this->amount->setCurrency($this->currency)
           		->setTotal($amount);
    }

    private function setTransaction($input)
    {
    	$this->setAmount($input);
    	$this->transaction = new Transaction();
        $this->transaction->setAmount($this->amount)
            ->setItemList($this->itemList)
            ->setDescription('Purchase of '.$this->currency.' '.$input['amount'].$input['description']);
    }

    private function storeInDatabase($input, $payment_id)
    {
    	$record = \App\GiftCardsModel::create([
    		'card_value'	=>	$input['card_value'],
    		'paypal_id'	=>	$payment_id,
    		'code'	=>	str_random(6),
    		'sender_email'	=>	$input['sender_email'],
    		'sender'	=>	$input['sender'],
    		'receipent_email'	=>	$input['receipent_email'],
    		'receipent'	=>	$input['receipent'],
    		'note'	=>	$input['note']
    	]);

    	$record->code = $record->id.'-'.$record->code;
    	$record->save();
    	return $record->id;
    }

}
