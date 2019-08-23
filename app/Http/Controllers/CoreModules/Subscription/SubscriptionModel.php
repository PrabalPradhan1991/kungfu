<?php

namespace App\Http\Controllers\CoreModules\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = 'core_subscription_request';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public static $types = ['new_subscription', 'renewal'];

    public function createSubscription($user_id, $no_of_days, $type, $details) {
    	$record = self::firstOrNew([
    		'user_id'	=>	$user_id
    	]);

        $record->no_of_days = $no_of_days;
        $record->type = $type;
        $record->details = $details;
        
        $record->save();
        
    	\Mail::to(env('MAIL_TO'))
    		->send(new \App\Mail\SubscriptionMail(['subscription_id' => $record->id, 'user_id' => $user_id, 'no_of_days' => $no_of_days, 'type' => $type, 'description' => $details]));
    }
}