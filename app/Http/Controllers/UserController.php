<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function getRegistration() {
		return view('user.register');
	}

	public function postRegistration() {
		$input = request()->all();
		
		$validator = \Validator::make($input, (new \App\UserDetailsModel)->setRule());

		if($validator->fails()) {
			session()->flash('friendly-error-msg', 'There are some validation errors');
			return redirect()->back()
							->withInput()
							->withErrors($validator);
		}

		$details = [];

		\DB::beginTransaction();

			$details['user'] = \App\User::create([
				'email'	=>	$input['email'],
				'password'	=>	bcrypt($input['password']),
				'name'	=>	$input['name'],
				'is_active'	=>	'no'
			]);

			$input['details']['user_id'] = $details['user']->id;
			$input['details']['group_id'] = 3;
			$details['details'] = \App\UserDetailsModel::create($input['details']);

		\DB::commit();

		session()->flash('success-msg', 'You have successfully registered');
		if($input['payment_type'] == 'pay_by_bank') {

			\Mail::to($details['user']->email)
			    ->send(new \App\Mail\WelcomeMail($details['user']->id));

			(new \App\Http\Controllers\CoreModules\Subscription\SubscriptionModel)->createSubscription($details['user']->id, (new PaypalController)->getProperties('membership_period'), 'new_subscription', 'New subscription request');

			return redirect()->route('confirmation-page-get', $details['user']->id);
		}
		else {
			
			return redirect()->route('pay-by-paypal', $details['user']->id);
		}
	}

	public function getConfirmationPage($user_id) {
		$details = HelperController::getUserDetails($user_id);

		return view('user.confirmation')
				->with('details', $details);
	}

	public function getExpirationPage() {
		$details = \App\Http\Controllers\HelperController::getUserDetails(\Auth::user()->id);
		return view('user.expiration-page')
				->with('user_id', \Auth::user()->id)
				->with('details', $details);
	}

	public function getViewStages() {
		$stages = \App\Http\Controllers\CoreModules\Videos\StageModel::orderBy('id', 'ASC')->get();

		return view('user.view-stages')
				->with('stages', $stages);
	}

	public function getViewStage($stage_id, $video_id=NULL) {
		$stage = \App\Http\Controllers\CoreModules\Videos\StageModel::where('id', $stage_id)->firstOrFail();

		$videos = \App\Http\Controllers\CoreModules\Videos\VideoModel::where('stage_id', $stage_id)->orderBy('ordering', 'ASC')->get();

		$pdfs = \App\Http\Controllers\CoreModules\Videos\PdfModel::where('stage_id', $stage_id)->orderBy('ordering', 'ASC')->get();

		$selected_video = NULL;
		
		foreach($videos as $index => $v) {
			if($index == 0) {
				$selected_video = $v;
			}
			if($v->id == $video_id) {
				$selected_video = $v;
			}
		}
		
		return view('user.view-stage')
				->with('stage', $stage)
				->with('videos', $videos)
				->with('pdfs', $pdfs)
				->with('selected_video', $selected_video)
				->with('video_id', $video_id)
				->with('stage_id', $stage_id);
	}

	public function getUserListView() {
		$user_table = (new \App\User)->getTable();
		$user_details_table = (new \App\UserDetailsModel)->getTable();
		$payment_details_table = (new \App\Http\Controllers\CoreModules\Subscription\PaymentDetailsModel)->getTable();
		$user_stage = (new \App\Http\Controllers\CoreModules\Videos\UserStageModel)->getTable();
		$stage = (new \App\Http\Controllers\CoreModules\Videos\StageModel)->getTable();

		$_user_stage_data = \DB::table($stage)
						->join($user_stage, $user_stage.'.stage_id', '=', $stage.'.id')
						->select('stage_name', 'user_id', 'ordering')
						->get();

		$user_stage_data = [];
		foreach($_user_stage_data as $u) {
			if(isset($user_stage_data[$u->user_id])) {
				$user_stage_data[$u->user_id] = $user_stage_data[$u->user_id]['ordering'] > $u->ordering ? ['stage' => $u->stage_name, 'ordering' => $u->ordering] : $user_stage_data[$u->user_id];
			} else {
				$user_stage_data[$u->user_id] = ['stage' => $u->stage_name, 'ordering' => $u->ordering];
			}	
		}

		$data = \DB::table($user_table)
					->join($user_details_table, $user_details_table.'.user_id', '=', $user_table.'.id')
					->leftJoin($payment_details_table, $payment_details_table.'.user_id', '=', $user_table.'.id')
					->select($user_table.'.name as username', 'email', $user_details_table.'.*', $payment_details_table.'.expiration_date')
					->where('group_id', 3)
					->orderBy('user_id', 'DESC')
					->get();

//		dd($user)

		return view('user.list')
				->with('data', $data)
				->with('user_stage_data', $user_stage_data);
	}
}