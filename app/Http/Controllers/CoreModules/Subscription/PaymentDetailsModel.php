<?php

namespace App\Http\Controllers\CoreModules\Subscription;

use Illuminate\Database\Eloquent\Model;

class PaymentDetailsModel extends Model
{
    protected $table = 'core_payment_details';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function extendSubscription($user_id, $type, $no_of_days) {
        $record = self::firstOrNew([
            'user_id'   =>  $user_id
        ]);

        if($record->expiration_date) {
            
            $expiration_date = \Carbon\Carbon::createFromFormat('Y-m-d', $record->expiration_date)->hour(23)->minute(59)->second(59);

            $record->expiration_date = $expiration_date->lte(\Carbon\Carbon::now()) ? \Carbon\Carbon::now()->addDays((new \App\Http\Controllers\PaypalController)->getProperties('membership_period'))->format('Y-m-d') : $expiration_date->addDays((new \App\Http\Controllers\PaypalController)->getProperties('membership_period'))->format('Y-m-d');
        } else {
            $record->expiration_date = \Carbon\Carbon::now()->addDays($no_of_days)->format('Y-m-d');
        }

        $record->save();
    }
}