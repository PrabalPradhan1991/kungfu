<?php

namespace App\Http\Controllers\CoreModules\Videos;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'core_requests';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'stage_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function requestAccess($user_id, $stage_id) {
    	$status = ['status' => false, 'message' => ''];
        $record = self::firstOrNew([
    		'user_id' => $user_id,
    		'stage_id'	=>	$stage_id
    	]);

        if($record->id) {
            $status['status'] = false;
            $status['message'] = 'You have already requested access. Please wait for verification';
        }
        else {
            $status['status'] = true;
            $status['message'] = 'Status successfully requested';
            $record->save();    
            \Mail::to(env('MAIL_TO'))
            ->send(\App\Mail\RequestAccessMail(['user_id' => $user_id, 'stage_id' => $stage_id, 'request_id' => $record->id]));
        }
    	
        return $status;
    }
}