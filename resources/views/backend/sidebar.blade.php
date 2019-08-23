<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<a href="{{ URL::route('home')}}">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="{{ route('get-asset', ['images', 'no-user.png']) }}" alt="{{ \Auth::user()->name }}" class="avatar-img rounded-circle">
							</div>
							<div class="info" >
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										{{ \Auth::user()->name }}
										<span class="user-level">{{ \App\GroupModel::where('id', \App\UserDetailsModel::where('user_id', \Auth::user()->id)->first()->group_id)->first()->group_alias }}</span>
										<span class="caret"></span>
									</span>
								</a>
								<div class="clearfix"></div>

								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="{{ route('change-my-details-get') }}">
												<span class="link-collapse">Edit Profile</span>
											</a>
										</li>
										<li>
											<a href="{{ route('change-my-password-get') }}">
												<span class="link-collapse">Change Password</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
				</a>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="{{ URL::route('home')}}" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>	
						@if(\App\Http\Controllers\HelperController::isSuperadmin())
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-bars"></i>
								<p>Menu</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-stages-list-get')}}">
											<i class="far fa-file"></i>						
											<p>Stages</p>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-stage-requests-get')}}">
											<i class="far fa-file"></i>						
											<?php $request_count = \App\Http\Controllers\CoreModules\Videos\RequestModel::count() ?>
											<p>Requests @if($request_count) ({{ $request_count }}) @endif</p>
											<?php unset($request_count); ?>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-subscription-list')}}">
											<i class="far fa-file"></i>						
											<?php $request_count = \App\Http\Controllers\CoreModules\Subscription\SubscriptionModel::count() ?>
											<p>Member Request @if($request_count) ({{ $request_count }}) @endif</p>
											<?php unset($request_count); ?>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item active">
						</li>
						@elseif(\App\Http\Controllers\HelperController::isUser())

						@endif
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->