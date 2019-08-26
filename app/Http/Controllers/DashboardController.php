<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;

class DashboardController extends Controller {
	public function getChangeMyPassword() {
		$details_table = (new \App\UserDetailsModel)->getTable();
		$users_table = (new \App\User)->getTable();

		$data = \DB::table($details_table)
						->join($users_table, $users_table.'.id', '=', $details_table.'.user_id')
						->where($users_table.'.id', '=', \Auth::user()->id)
						->select($details_table.'.*', $users_table.'.name', $users_table.'.email')
						->first();



		if($data->group_id == 1) {
			return view('backend.dashboard.change-password');
		}
		else {
			return view('user.change-my-password');
		}
	}

	public function postChangeMyPassword() {
		$input = request()->all();

		$current_password = \Auth::user()->password;
		if(!\Hash::check($input['current_password'], $current_password)) {
			\Session::flash('friendly-error-msg', 'Your current password does not match');
			return redirect()->back();
		}

		$validator = \Validator::make($input, [
			'current_password'	=>	['required'],
			'new_password' => ['required'],
			'confirm_password'	=>	['required', 'same:new_password']
		]);

		if($validator->fails()) {
			\Session::flash('friendly-error-msg', 'There are some validation errors');
			return redirect()->back()->withErrors($validator);
		}
		else {
			$new_password = bcrypt($input['new_password']);
			\App\User::where('id', \Auth::user()->id)->update(['password' => $new_password]);
			\Auth::logoutOtherDevices($input['new_password']);
			\Session::flash('success-msg', 'Password successfully changed');
			return redirect()->back();
		}
	}

	public function getChangeMyDetails() {
		$details_table = (new \App\UserDetailsModel)->getTable();
		$users_table = (new \App\User)->getTable();

		$data = \DB::table($details_table)
						->join($users_table, $users_table.'.id', '=', $details_table.'.user_id')
						->where($users_table.'.id', '=', \Auth::user()->id)
						->select($details_table.'.*', $users_table.'.name', $users_table.'.email')
						->first();



		if($data->group_id != 1) {
			return view('user.change-details')
				->with('data', $data);	
		}
		else {
			return view('backend.dashboard.superadmin-change-details')
				->with('data', $data);		
		}
		
	}

	public function postChangeMyDetails() {
		$input = request()->all();

        $validator = \Validator::make($input, (new \App\UserDetailsModel)->setRule(\Auth::user()->id));

        if($validator->fails())
        {
            \Session::flash('friendly-error-msg', 'There are some validation errors');
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        if(isset($input['_token']))
        {
            unset($input['_token']);
        }

        $response = (new \App\UserDetailsModel)->postChangeUserDetails($input, \Auth::user()->id);

        if($response['status']) {
        	session()->flash('success-msg', $response['message']);
        }
        else {
        	session()->flash('error-msg', $response['message']);
        }

        return redirect()->back();
	}

	public function postDeleteProfilePicture() {
		(new \App\UserDetailsModel)->postDeleteProfilePicture(\Auth::user()->id);

		\Session::flash('success-msg', 'Profile picture successfully deleted');
		return redirect()->back();
	}
}