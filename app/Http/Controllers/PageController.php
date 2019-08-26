<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getRegister()
	{
		return view('page.register');
	}

	public function getListing()
	{
		return view('page.listing');
	}

	public function getListingpage()
	{
		return view('page.listing-page');
	}

	public function getLoginpage()
	{
		return view('page.login-page');
	}

	public function getforgotpassword()
	{
		return view('page.forgot-password');
	}

	public function getchangedetailsadmin()
	{
		return view('page.change-details-admin');
	}
	
}