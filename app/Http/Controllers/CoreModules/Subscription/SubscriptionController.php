<?php

namespace App\Http\Controllers\CoreModules\Subscription;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
	private $model = '\App\Http\Controllers\CoreModules\Subscription\SubscriptionModel';
    private $view = 'core-modules.subscription.backend.';
    private $frontend_view = 'core-modules.subscription.frontend.';
    private $page_title = 'Subscription';

    public function getListView() {
    	$user_table = (new \App\User)->getTable();
    	$user_details_table = (new \App\UserDetailsModel)->getTable();
    	$table = (new $this->model)->getTable();

    	$data = \DB::table($table)
    				->join($user_table, $user_table.'.id', '=', $table.'.user_id')
    				->join($user_details_table, $user_details_table.'.user_id', '=', $user_table.'.id')
    				->select($table.'.*', $user_table.'.name', $user_table.'.email', $user_details_table.'.phone')
    				->orderBy('id', 'DESC')
    				->get();

    	return view($this->view.'list')
    			->with('data', $data);
    }

    public function postApproveSubscription($subscription_id) {
    	$record = $this->model::where('id', $subscription_id)
    							->firstOrFail();

    	try {
    		\DB::beginTransaction();
    			(new PaymentDetailsModel)->extendSubscription($record->user_id, $record->type, $record->no_of_days);
    			$user_details = HelperController::getUserDetails($record->user_id);
    			\Mail::to($user_details->email)
    				->send(new \App\Mail\SubscriptionAcceptedMail(\App\Http\Controllers\CoreModules\Subscription\SubscriptionModel::where('id', $subscription_id)->firstOrFail()));
    			$record->delete();
    			session()->flash('success-msg', 'Subscription approved!');
    		\DB::commit();
    	}
    	catch(\Exception $e) {
    		session()->flash('friendly-error-msg', 'Something went wrong. Please try again');
    	}

    	return redirect()->back();
    }

    public function postDisapproveSubscription($subscription_id) {
    	$record = $this->model::where('id', $subscription_id)
    							->firstOrFail();
    	try {
    		\DB::beginTransaction();
    			//(new PaymentDetailsModel)->extendSubscription($record->user_id, $record->type, $record->no_of_days);
    			$user_details = HelperController::getUserDetails($record->user_id);
    			\Mail::to($user_details->email)
    				->send(new \App\Mail\SubscriptionRejectedMail(\App\Http\Controllers\CoreModules\Subscription\SubscriptionModel::where('id', $subscription_id)->firstOrFail()));
    			$record->delete();
    			session()->flash('success-msg', 'Subscription disapproved!');
    		\DB::commit();
    	}
    	catch(\Exception $e) {
    		session()->flash('friendly-error-msg', 'Something went wrong. Please try again');
    	}

    	return redirect()->back();
    }
}