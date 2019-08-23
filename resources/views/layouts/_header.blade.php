<!-- HEADER -->

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<header class="header">
				<div class="header__wrap">
					<div class="header-top clearfix">
						<div class="header-top__inner">
							<span class="header-top__contacts">call :  (007) 123 456 7890</span>
							<span class="header-top__contacts">Email : <a class="header-top__contacts-link" href="mailto:inquiry@domain.com"> inquiry@domain.com</a></span>
							<span class="header-top__contacts">Mon  -  SUN :  12PM  -  12AM</span>
						</div>

						{{-- <ul class="social-links list-inline">
							<li><a target="_blank" href="https://twitter.com/"><i class="icons fa fa-twitter"></i></a></li>
							<li><a target="_blank" href="https://www.facebook.com/"><i class="icons fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/"><i class="icons fa fa-linkedin"></i></a></li>
							<li><a target="_blank" href="https://www.google.com/"><i class="icons fa fa-google-plus"></i></a></li>
						</ul> --}}
						<!-- Authentication Links -->
						<ul class="social-links list-inline">
				            @guest
				                <li class="nav-item">
				                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				                </li>
				                @if (Route::has('register'))
				                    <li class="nav-item">
				                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				                    </li>
				                @endif
				            @else
				                <li class="nav-item">
				                    <a class="nav-link" href="#">Notifications</a>
				                </li>
				                @if(auth()->user()->hasRole('user'))
				                    <li class="nav-item">
				                        <a class="nav-link" href="#">Shipment</a>
				                    </li>
				                @elseif(auth()->user()->hasRole('driver'))
				                    <li class="nav-item">
				                        <a class="nav-link" href="#">Payments</a>
				                    </li>
				                @endif

				                <li class="nav-item dropdown">
				                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				                        {{ Auth::user()->name }} <span class="caret"></span>
				                    </a>

				                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				                        <a class="dropdown-item" href="{{ route('user.profile', ['id'=>Auth::user()->id]) }}">My Profile</a>
				                        <div class="dropdown-divider"></div>
				                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Editor'))
				                            <a class="dropdown-item" href="{{ URL::to('/admin') }}">Back Office</a>
				                            <div class="dropdown-divider"></div>
				                        @endif
				                        <a class="dropdown-item" href="{{ route('logout') }}"
				                           onclick="event.preventDefault();
				                                         document.getElementById('logout-form').submit();">
				                            {{ __('Logout') }}
				                        </a>

				                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                            @csrf
				                        </form>
				                    </div>
				                </li>

				            @endguest
				        </ul>
					</div>

					<div class="col-xs-3">
						<a class="logo" href="/">
							<div class="col-md-2">
								<img class="logo__img" src="{{ Voyager::image( setting('site.logo') ) }}" alt="Logo" height="56px">
							</div>
							<div class="col-md-9">
								<h5>{{ setting('site.title') }}</h5>
							</div>
						</a>
					</div>


					<div class="header__inner clearfix">
						<nav class="navbar yamm">
							<div class="navbar-header hidden-md hidden-lg hidden-sm">
								<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
							</div>
							<div id="navbar-collapse-1" class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li class="active"><a href="home.html">Home</a></li>
									<li><a href="about.html">ABOUT US</a></li>
									<li class="dropdown"><a href="services-1.html">Services</a>
										<ul role="menu" class="dropdown-menu">
											<li> <a href="services-1.html">Services 1</a> </li>
											<li> <a href="services-2.html">Services 2</a> </li>
										</ul>
									</li>
									<li><a href="blog-main.html">news</a></li>
									<li><a href="contact.html">request a quote</a></li>
									<li><a href="contact.html">Contact us</a></li>
								</ul>
							</div>
						</nav>
						<a class="header__btn btn btn-primary btn-sm btn-effect-2" href="home.html">track your item</a>
					</div>
				</div>
			</header><!-- end header-->
		</div><!-- end col-->
	</div><!-- end row-->
</div><!-- end container-->