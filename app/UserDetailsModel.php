<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetailsModel extends Model
{
    protected $table = 'user_details';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $states = ['NSW', 'QLD', 'VIC', 'TAS', 'NT', 'SA','WA'];

    public function setRule($id=0)
    {
        $user_table = (new \App\User)->getTable();
    	$rule = [
            'email' =>  ['required', 'email', 'unique:'.$user_table.',email'],
            'name'  =>  ['required'],
            'details.phone' =>  ['required'],
            'details.dob'   =>  ['required', 'date', 'date_format:Y-m-d'],
            'details.street_address'    =>  ['required'],
            'details.suburb'    =>  ['required'],
            'details.state' =>  ['required', 'in:'.implode(',', self::$states)],
            'details.post_code' =>  ['required'],
            'password'  =>  ['required'],
            'confirm_password'  =>  ['required', 'same:password'],
            'payment_type'  =>  ['required', 'in:pay_by_bank,pay_by_paypal']
            /*'first_name' => ['required'],
            'last_name' => ['required'],
            'password'  =>  ['required'],
            'confirm_password'  =>  ['same:password'],
            'phone' => ['required'],
            'company_or_agency' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'street_address' => ['required'],
            'postal_code' => ['required'],
            'cell_phone' => ['required'],
            'fax' => ['required'],
            //'profile_photo' => ['mimes:png,jpg,jpeg', 'size:2048'],
            'i_agree'   =>  ['required']*/
        ];
        
    	if($id)
    	{
            if($id) {
                unset($rule['payment_type']);
                unset($rule['password']);
                unset($rule['confirm_password']);
            }
    		foreach($rule as $rule_name => $r)
    		{
    			foreach($r as $index => $rule_parameters)
    			{
    				if(strpos($rule_parameters, 'unique') !== false)
    				{
    					$rule[$rule_name][$index] .= ','.$id; 
    				}
    			}
    		}
    	}

    	return $rule;
    }

    public function postChangeUserDetails($input, $user_id) {
        try
        {
            if(isset($input['image']))
            {
                $input['image'] = $input['image'][0];   
                (new \App\Http\Controllers\ImageController)->rotateImageOfSizes($input['image'], 'user', $input['clockwise'][0]);     
            }

            \DB::beginTransaction();
                $user = \App\User::where('id', $user_id)->first();

                if($user->email != $input['email']) {
                    \App\User::where('id', $user_id)->update([
                        'email' =>  $input['email'],
                        'email_verified_at' => NULL
                    ]);
                }

                if($user->name != $input['name']) {
                	\App\User::where('id', $user_id)->update([
                        'name' =>  $input['name']
                    ]);
                }
                
                unset($input['email']);
                unset($input['name']);
                //unset($input['clockwise']);
                $user_details = \App\UserDetailsModel::where('user_id', $user_id)->first();
                $user_details = is_null($user_details) ? new \App\UserDetailsModel : $user_details;


                foreach($input['details'] as $index => $value) {
                    $user_details->$index = $value;
                }
                $user_details->user_id = $user_id;

                if(isset($input['image'])) {
                    $user_details->image = $input['image'];
                }
                
                $user_details->save();

                //\Auth::loginUsingId($user->id);
                

            \DB::commit();
            return ['status' => true, 'message' => 'Details successfully edited'];
        }
        catch(\Exception $e)
        {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
