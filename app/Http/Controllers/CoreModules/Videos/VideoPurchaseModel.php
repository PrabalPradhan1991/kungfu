<?php

namespace App\Http\Controllers\CoreModules\Videos;

use Illuminate\Database\Eloquent\Model;

class VideoPurchaseModel extends Model
{
    protected $table = 'core_purchased_videos';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function purchaseVideo($user_id, $stage_id, $status) {
    	$response = [];
        $record = self::firstOrNew([
    		'user_id'	=>	$user_id,
    		'stage_id'	=>	$stage_id
    	]);

    	$record->purchase_status = $status;
        $record->save();



        if($status == 'review') {
            /* TODO
                //send mail
            */
            \Mail::to(env('MAIL_TO'))
                ->send(new \App\Mail\PaymentRequestMail(['user_id' => $user_id, 'stage_id' => $stage_id, 'request_id' => $record->id]));

            $response = ['status' => true, 'message' => 'Your payment is under review. We will get back to you soon!'];
        }
        else {
            $response = ['status' => true, 'message' => 'Your payment has been verified!'];
        }
        
    	
        return $response;
    	
    }
}