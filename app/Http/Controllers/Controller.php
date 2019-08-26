<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public $theme = 'theme-1';
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
    	if(isset($this->page_title)) {
    		view()->share( 'page_title', $this->page_title );
    	}

    	$this->middleware(function ($request, $next) {
	    	$extend_page = 'frontend.'.$this->theme.'.main';
	    	if(HelperController::isSuperadmin())
	            $extend_page = 'backend.main';
	        elseif(HelperController::isAdmin())
	            $extend_page = 'backend.main';
	        elseif(HelperController::isUser())
	            $extend_page = 'backend.main';
	        else
	        	$extend_page = 'frontend.'.$this->theme.'.main';

        	view()->share( 'extend_page', $extend_page );
            view()->share( 'frontend_extend_page', 'frontend.'.$this->theme.'.main');
        	return $next($request);
        });

    }

    public function getIndexPage() {
        //return view('welcome');
        return view('frontend.'.$this->theme.'.index');
    }
}