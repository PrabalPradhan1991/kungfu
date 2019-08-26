	<!<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/fontawesome/css/all.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<header class="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-xs-12">
					<div class="site-branding">
					<a href="http://uniwebau.tech/traditionalshaolin/" target="_blank" rel="home">	
									<img src="{{ asset('user/images/logo.png' ) }}" alt="logo">
								</a>
																		</div>
				</div>
																	<div class="col-md-7  col-xs-12 header-right">

																		
					<aside id="text-14" class="widget widget_text">			<div class="textwidget"><div class="row extra-info">

<div class="col-md-4 col-xs-12"><i class="fa fa-phone"></i>CALL US FREE<br>
0418 664 923</div>
<div class="col-md-5 col-xs-12"><i class="fa fa-envelope"></i>EMAIL US<br>
jahungchi@bigpond.com</div>
<div class="col-md-3 col-xs-12">
	@if(\Auth::check())
		<form method="post" action="{{ route('logout') }}">
			<input type="submit" class="btn btn-flat btn-alert" value="Logout">
			{{ csrf_field() }}
		</form>
		<a href="{{ route('home') }}" class="btn btn-info btn-flat">My Account</a>
	@else
	
		<a href="{{ route('login') }}" class="btn btn-login btn-flat">Login</a>
		<a href="{{ route('registration-get') }}" class="btn btn-login1 btn-flat">Register</a>
	@endif
</div>
</div>
</div>
		</aside>				</div>
							</div>
		</div>
	</header>