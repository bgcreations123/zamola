@extends('layouts.master')

@section('title', '404 - Error')

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
						<h1 class="ui-title-page">404 - Error</h1>
						<div class="ui-subtitle-page">Sorry, the page cannot be found!</div>
						<div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end section__inner -->
	</div><!-- end section-title -->

	<section class="section_mod-e">
        <div class="block-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">Page cannot be found....</h3>
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
        </div>
	</section><!-- end section-default -->

@endsection