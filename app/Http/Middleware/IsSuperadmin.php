<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperadmin
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
            $response = ['status' => false, 'message' => 'Only superadmins allowed to perform this operation'];
            if(\Request::ajax())
            {
                return response()->json($response);
            }
            else
            {
                return response(view('errors.403')->with('message', 'Only superadmins allowed to perform this operation'));
            }
        }
        
    }
}
