<?php

namespace App\Http\Middleware;

use Closure;

class CheckExpirationDate
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

        if(in_array($user_group_id, [1,2])) {
            return $next($request);    
        }
        else
        {
            $response = $this->check(\Auth::user()->id);
            if($response['status']) {
                return $next($request);    
            }
            else {
                if(\Request::ajax())
                {
                    return response()->json($response);
                }
                else
                {
                    if($response['route'] == route('confirmation-page-get', \Auth::user()->id)) {
                        \Auth::logout();
                    }
                    return redirect()->to($response['route']);
                }
            }
        }
        
    }

    public function check($user_id) {
        $status = ['status' => false, 'route' => '', 'message' => ''];
        $record = \App\Http\Controllers\CoreModules\Subscription\PaymentDetailsModel::where('user_id', $user_id)->first();
        if($record && $record->expiration_date) {
            if(\Carbon\Carbon::now() > \Carbon\Carbon::createFromFormat('Y-m-d', $record->expiration_date)->hour(23)->second(59)->minute(59)) {

                $status['route'] = route('expiration-page-get');
                $status['message'] = 'Your membership has expired';
            } else {
                $status['status'] = true;
            }
        }
        else {
            //user has no expiration date
            //return redirect()->route('confirmation-page-get', $user_id);
            $status['route'] = route('confirmation-page-get', $user_id);
            $status['message'] = 'Membership under review';
        }

        return $status;
    }
}
