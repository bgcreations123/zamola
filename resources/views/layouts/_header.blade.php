<!-- HEADER -->

<div class="container noprint">
	<div class="row">
		<div class="col-xs-12">
			<header class="header">
				<div class="header__wrap">
					<div class="header-top clearfix">
						<div class="header-top__inner">
							<span class="header-top__contacts">call :  {{ setting('site.phone') }}</span>
							<span class="header-top__contacts">Email : <a class="header-top__contacts-link" href="mailto:{{ setting('site.email') }}"> {{ setting('site.email') }}</a></span>
							<span class="header-top__contacts">{{ setting('site.working-hours') }}</span>
						</div>

						<ul class="social-links list-inline">
							<li><a target="_blank" href="https://twitter.com/"><i class="icons fa fa-twitter"></i></a></li>
							<li><a target="_blank" href="https://www.facebook.com/"><i class="icons fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/"><i class="icons fa fa-linkedin"></i></a></li>
							<li><a target="_blank" href="https://www.google.com/"><i class="icons fa fa-google-plus"></i></a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-12 col-xs-8">
						<a class="logo" href="/">
							<div class="col-xs-2">
								<img class="logo__img" src="{{ Voyager::image( setting('site.logo') ) }}" alt="Logo" height="56px" style="margin: 0 auto;">
							</div>
							<div class="col-lg-10 col-sm-6 col-xs-8">
								<h5 class="text-center">{{ setting('site.title') }}</h5>
							</div>
						</a>
					</div>

					<div class="header__inner clearfix">
						<nav class="navbar yamm">
							<div class="navbar-header hidden-md hidden-lg hidden-sm">
					            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
					            </button>
					        </div>

							<div class="collapse navbar-collapse container-fluid" id="navbar">
								

								<ul class="nav navbar-nav">

									{{ menu('frontend', 'layouts._nav') }}

									{{-- <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li role="separator" class="divider"></li>
											<li class="dropdown-header">Nav header</li>
											<li><a href="#">Separated link</a></li>
											<li><a href="#">One more separated link</a></li>
										</ul>
									</li> --}}
								</ul>
								<span class="pull-right">
									<a class="header__btn btn btn-primary btn-sm btn-effect-2" href="{{ route('trace.index') }}" style="margin-left: 20px;">Trace Package</a>
								</span>
								<ul class="nav navbar-nav navbar-right">
									@guest
						                <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
						                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						                </li>
						                @if (Route::has('register'))
						                    <li class="nav-item {{ (request()->is('register')) ? 'active' : '' }}">
						                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						                    </li>
						                @endif
						            @else
						            	<li class="nav-item {{ (request()->is('notices')) ? 'active' : '' }}">
											<a class="nav-link" href="{{ route('notices') }}">
												Notifications
												@include('notices.notice_count')
											</a>
										</li>
						                <li class="dropdown {{ (request()->is('profile*')) ? 'active' : '' }}">
							                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} 
							                	<span class="caret"></span>
							                </a>
							                <ul class="dropdown-menu">
							                 	<li>
													<a href="{{ route('user.view_profile', ['id'=>Auth::user()->id]) }}">
														My Profile
													</a>
							                 	</li>
							                  	<li role="separator" class="divider"></li>
							                  	<li class="dropdown-header">Actions</li>
							                  	@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Editor'))
						                            <li>
						                            	<a class="dropdown-item" href="{{ URL::to('/admin') }}">
							                            	Back Office
							                            </a>
							                        </li>
						                            <li role="separator" class="divider"></li>
						                        @endif
						                        <li>
						                        	<a class="dropdown-item" href="{{ route('logout') }}"
						                           onclick="event.preventDefault();
						                                         document.getElementById('logout-form').submit();">
						                            {{ __('Logout') }}
							                        </a>
							                    </li>
						                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						                            @csrf
						                        </form>
							                </ul>
							            </li>
						            @endguest
								</ul>
							</div>
						</nav>
						{{-- </nav> --}}
					</div>
				</div>
			</header><!-- end header-->
		</div><!-- end col-->
	</div><!-- end row-->
</div><!-- end container-->