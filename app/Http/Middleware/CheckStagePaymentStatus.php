<?php

namespace App\Http\Middleware;

use Closure;

class CheckStagePaymentStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $user_group_id = \App\Http\Controllers\HelperController::getUserDetails(\Auth::user()->id)->group_id;

        /*if(in_array($user_group_id, [1,2])) {
            return $next($request);    
        }
        else
        {*/
            $stage_id = request()->get('stage_id');
            $payment_method = request()->get('payment_method');
            $status = $this->check(\Auth::user()->id, $stage_id, $payment_method);
            if($status['status']) {
                return $next($request);    
            }
            else {
                if(\Request::ajax())
                {
                    return response()->json(['status' => false, 'message' => $status['message']]);
                }
                else
                {
                    //session()->
                    return response(view('errors.403')->with('message', $status['message']));
                }
            }
        //}
        
    }

    public function check($user_id, $stage_id, $payment_method) {
        if(!in_array($payment_method, ['By Bank', 'By Paypal'])) {
            return ['status' => false, 'message' => 'Invalid payment method!', 'purchase_status' => NULL];
        }

        $record = \App\Http\Controllers\CoreModules\Videos\VideoPurchaseModel::where('user_id', $user_id)->where('stage_id', $stage_id)->first();

        if(is_null($record)) {
            return ['status' => true, 'message' => '', 'purchase_status' => NULL];
        }

        if($record->purchase_status == 'purchased') {
            return ['status' => false, 'message' => 'You have already puchased this video', 'purchase_status' => $record->purchase_status];    
        }

        if($record->purchase_status == 'review') {
            return ['status' => false, 'message' => 'Your payment is currently under review. We will get back to you soon', 'purchase_status' => $record->purchase_status];    
        }
    }
}
