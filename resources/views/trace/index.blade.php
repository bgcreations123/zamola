@extends('layouts.master')

@section('title', 'Home')

@section('content')

	<div class="section-title parallax-bg parallax-light noprint">
        <ul class="bg-slideshow">
            <li>
                <div style="background-image:url({{ asset('storage/home-theme/bg/bg-title.jpg') }})" class="bg-slide"></div>
            </li>
        </ul>
        <div class="section__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="ui-title-page">Search Tracer</h1>
                        <div class="ui-subtitle-page">Fill the form below to check your shipment details.</div>
                        <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section__inner -->
    </div><!-- end section-title -->

    {{-- tracer form --}}
    <div class="section_mod-a">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-trace clearfix">
						<div class="subscribe__inner">
							<h2 class="trace__title">Search Tracer Number</h2>
							<div class="subscribe__info">
								get your latest 
								<strong>shipping status</strong>
							</div>
						</div>
						<form class="form-subscribe" method="post" action="{{ route('trace.check') }}">
							{{ csrf_field() }}
							<input class="form-subscribe__input form-control" type="text" placeholder="No. ZEL-00-00XXXX" name="tracer" required>
							<button class="form-subscribe__btn btn btn_mod-b btn-sm btn-effect" type="submit"><span class="btn__inner">Trace</span></button>
						</form>
						<div class="subscribe__decor decor-4">
							<i class="subscribe__icon icon flaticon-logistics3"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection