@extends('layouts.master')

@section('title', 'Registration')

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
                        <h1 class="ui-title-page">Unregistered?</h1>
                        <div class="ui-subtitle-page">Registration is required</div>
                        <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section__inner -->
    </div><!-- end section-title -->


    <div class="section_mod-c">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section class="section-contacts-block">
                        <h3 class="contacts-block__title ui-title-inner">24/7 Express Logistics Services</h3>
                        <div class="decor-2 decor-2_mod-b"></div>
                        <div class="contacts-block__description">Feel free to contact us via phone or email anytime if you have any questions or need help!</div>
                        <div class="contacts-block clearfix">
                            <i class="icon flaticon-telephone114"></i>
                            <span class="contacts-block__inner">
                                <span class="contacts-block__emphasis color-primary">(007) 123 456 7890</span> 24/7 Free HelpLine</span>
                        </div>
                        <div class="contacts-block clearfix">
                            <i class="icon flaticon-mail45"></i>
                            <span class="contacts-block__inner">
                                <a class="contacts-block__emphasis color-primary" href="mailto:inquiry@domain.com">inquiry@domain.com</a> We usually reply within 24 hours</span>
                        </div>
                    </section><!-- end contacts-block -->

                </div><!-- end col -->

                <div class="col-sm-6">
                    <section class="section-form-request">
                        <div class="wrap-title-block wrap-title-block_mod-c">
                            <h3 class="ui-title-block ui-title-block_mod-c">Register Below</h3>
                            <div class="decor-1 decor-1_mod-b"><i class="icon flaticon-delivery36"></i></div>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- end col -->
                            </div><!-- end row -->
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password-confirm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn_mod-a btn-sm btn-effect pull-right">
                                        <span class="btn__inner">{{ __('Register') }}</span>
                                    </button>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form><!-- end form-request -->
                    </section>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
        
    </div><!-- end section-default -->

@endsection
