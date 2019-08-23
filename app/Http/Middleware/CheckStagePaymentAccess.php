<?php

namespace App\Http\Middleware;

use Closure;

class CheckStagePayment
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
            $stage_id = $request->route()->parameters['stage_id'];
            $status = $this->check(\Auth::user()->id, $stage_id);
            if($status) {
                return $next($request);    
            }
            else {
                if(\Request::ajax())
                {
                    return response()->json(['status' => false, 'message' => 'You are not allowed to view this video']);
                }
                else
                {
                    return response(view('errors.403')->with('message', 'You are not allowed to view this video'));
                }
            }
        }
        
    }

    public function check($user_id, $stage_id) {
        $record = \App\Http\Controllers\CoreModules\Videos\VideoPurchaseModel::where('user_id', $user_id)->where('stage_id', $stage_id)->where('purchase_status', 'purchased')->first();
        
        if($record) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }
}
