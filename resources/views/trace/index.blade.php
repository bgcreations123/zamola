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

    @include('layouts._messages')

    {{-- tracer form --}}
    <div class="section_mod-a">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-trace clearfix">
						<div class="subscribe__inner">
							<h2 class="trace__title">Search Tracer Number</h2>
							<span style="font: 8pt Tahoma, sans-serif; color: Gray;">Powered by <a style="text-decoration: none;color: Gray;" target="_blank" href="https://www.ontime360.com">OnTime 360</a> Courier Software</span>
						</div>
						{{-- <form class="form-subscribe" method="post" action="{{ route('trace.check') }}"> --}}
						<form class="form-subscribe"name="trForm" method="post" action="https://www.ontime360.com/tracking/trackingresults.aspx" id="trForm">
							{{ csrf_field() }}
							<input class="form-subscribe__input form-control" type="text" placeholder="No. ZEL-00-00XXXX" name="TrackingNumber" maxlength="50" id="TrackingNumber" required>
							<button class="form-subscribe__btn btn btn_mod-b btn-sm btn-effect" type="submit" onclick="trForm.target='_blank';"><span class="btn__inner">Trace</span></button>
							<input type="hidden" name="accid" id="accid" value="5KLfe529X0UKUuOFrAVr9RmupRXXKd24g/uU5ZsQT/5J9QrTXLw0ww==" />
						</form>

						{{-- <form name="trForm" method="post" action="https://www.ontime360.com/tracking/trackingresults.aspx" id="trForm">
						<div style="border: solid 1px gray; padding: 3px; background-color: #EEEEEE; font: 10pt Tahoma, sans-serif;">
						<table><tr><td>Tracking Number:</td></tr>
						<tr><td><input name="TrackingNumber" type="text" maxlength="50" id="TrackingNumber" />&nbsp;<input type="submit" name="btnSubmit" value="Submit" onclick="trForm.target='_blank';" id="btnSubmit" />
						</td></tr><tr><td><span style="font: 8pt Tahoma, sans-serif; color: Gray;">Powered by <a style="text-decoration: none;color: Gray;" target="_blank" href="https://www.ontime360.com">OnTime 360</a> Courier Software</span>
						</td></tr></table>
						<input type="hidden" name="accid" id="accid" value="5KLfe529X0UKUuOFrAVr9RmupRXXKd24g/uU5ZsQT/5J9QrTXLw0ww==" /></div></form> --}}

						<div class="subscribe__decor decor-4">
							<i class="subscribe__icon icon flaticon-logistics3"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection