@extends('backend.main')
@section('content')
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Hi Hiziarana</h2>
					<h5 class="text-white op-7 mb-2">Welcome to your dashboard</h5>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<a href="{{ config('app.url')}}" class="btn btn-secondary btn-round">Website</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row card-widget-block">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-pages-list-get')}}">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="far fa-file"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Page</p>								
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-events-list-get')}}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="far fa-calendar-alt"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Events</p>								
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-blog-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-rss"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Blog</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-product-list-get')}}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="fab fa-product-hunt"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Product</p>								
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-brand-list-get')}}">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center  bubble-shadow-small" style="background: #009688; color: #fff;">
									<i class="fas fa-bold"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Brand</p>					
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-coupon-list-get')}}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-warning bubble-shadow-small">
									<i class="fas fa-expand"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Coupon</p>					
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-gift-cards-value-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="fas fa-gift"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Gift</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-gift-cards-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background: #f259ad;">
									<i class="far fa-credit-card"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Gift Card</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-menu-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#6f6863;">
									<i class="fas fa-bars"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Nav Menu</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-contact-us-edit-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#673ab7;">
									<i class="far fa-address-book"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Contact US</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-testimonials-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#ff9800;">
									<i class="far fa-star"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Testimonials</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-footer-block-one-edit-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#1a2035;">
									<i class="fas fa-window-restore"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Footer Block One</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-footer-block-two-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#009688;">
									<i class="fas fa-clipboard-list"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Footer Block Two</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-footer-block-three-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#3f51b5;">
									<i class="fas fa-th-list"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Footer Block Three</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-block-list-get') }}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#607d8b;">
									<i class="fas fa-cube"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Block</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-slider-list-get')}}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#007bff;">
									<i class="far fa-image"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Slider</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<a href="{{ URL::route('admin-gallery-list-get')}}">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small" style="background:#28a745;">
									<i class="fas fa-images"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Gallery</p>
								</div>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div>

	</div>				
@stop
