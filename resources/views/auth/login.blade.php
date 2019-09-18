@extends('layouts.master')

@section('title', 'Login')

@section('content')

        <div class="section-title parallax-bg parallax-light">
            <ul class="bg-slideshow">
                <li>
                    <div style="background-image:url({{ asset('storage/home-theme/bg/bg-title.jpg') }})" class="bg-slide"></div>
                </li>
            </ul>
            <div class="section__inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="ui-title-page">Unauthorized?</h1>
                            <div class="ui-subtitle-page">Authentication is required</div>
                            <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section__inner -->
        </div><!-- end section-title -->


        <div class="section_mod-b">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6">
                        <section class="section-contacts-block">
                            <div class="wrap-title-block wrap-title-block_mod-c">
                                <h3 class="contacts-block__title ui-title-inner">Login Below</h3>
                                <div class="decor-2 decor-2_mod-b"></div>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 contacts-block__description">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- end col -->
                                    <div class="col-sm-6 contacts-block__description">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn_mod-a btn-sm btn-effect pull-right">
                                            <span class="btn__inner">{{ __('Login') }}</span>
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form-request -->
                        </section>
                    </div>

                    <div class="col-md-6">

                        <section class="section-contacts-block">
                            <h3 class="contacts-block__title ui-title-inner">{{ setting('site.slogan') }}</h3>
                            <div class="decor-2 decor-2_mod-b"></div>
                            <div class="contacts-block__description">Feel free to contact us via phone or email anytime if you have any questions or need help!</div>
                            <div class="contacts-block clearfix">
                                <i class="icon flaticon-telephone114"></i>
                                <span class="contacts-block__inner">
                                    <span class="contacts-block__emphasis color-primary">{{ setting('site.phone') }}</span> 24/7 HelpLine</span>
                            </div>
                            <div class="contacts-block clearfix">
                                <i class="icon flaticon-mail45"></i>
                                <span class="contacts-block__inner">
                                    <a class="contacts-block__emphasis color-primary" href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a> We usually reply within 24 hours</span>
                            </div>
                        </section><!-- end contacts-block -->

                    </div><!-- end col -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
            
        </div><!-- end section-default -->


@endsection
