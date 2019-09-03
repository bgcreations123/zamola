@extends('layouts.master')

@section('title', 'Order')

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
						<h1 class="ui-title-page">Shipment Inforomation</h1>
						<div class="ui-subtitle-page">The following form is required as to reserve your order.</div>
						<div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section__inner -->
    </div><!-- end section-title -->


    <div class="section_mod-c">
        <div class="container">
            <div class="row">
	
				<div id="app">
					<order-component></order-component>
				</div>

			</div>
		</div>
	</div>

@endsection