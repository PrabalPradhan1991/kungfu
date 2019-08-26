<?php

namespace App\Http\Controllers\CoreModules\Videos;

use Illuminate\Database\Eloquent\Model;

class StageModel extends Model
{
    protected $table = 'core_stages';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	'stage_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        'ordering'  =>  ['integer', 'min:0']
    ];

    public function getNextStage($stage_id) {
    	$current_stage = self::where('id', $stage_id)->firstOrFail();

    	$next_stage = self::where('ordering', '>', $current_stage->ordering)->orderBy('ordering', 'ASC')->first();

    	return $next_stage;
    }
}