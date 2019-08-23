<?php

namespace App\Http\Controllers\CoreModules\Videos;

use Illuminate\Database\Eloquent\Model;

class PdfModel extends Model
{
    protected $table = 'core_pdfs';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'mime' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
        //'video.title'
    ];
}