@extends('layouts.master')

@section('title', 'Home')

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
                          <h1 class="ui-title-page">{{ setting('site.title') }}</h1>
                          <div class="ui-subtitle-page">{{ setting('site.description') }}</div>
                          <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                      </div><!-- end col -->
                  </div><!-- end row -->
              </div><!-- end container -->
              <div class="container">
                <p class="hidden-xs">Ready to make a new order with Zamola Canada?</p>
                <a class="btn btn_mod-b btn-effect" href="{{ route('order') }}"><span class="btn__inner">New Order</span></a>
              </div>
          </div><!-- end section__inner -->
      </div><!-- end section-title -->

      <section class="section_mod-e">
        <div class="block-about">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h2 class="ui-title-block"><span class="ui-title-emphasis ui-title-emphasis_sm">we provide best <br> international freight &</span>logistics services</h2>
                <div class="decor-1"><i class='icon flaticon-delivery36'></i></div>
                <div class="ui-subtitle-block">Lorem ipsum dolor sit amet consectetur adipisicing sed eiusmod tempor incididunt ut labore et dolore</div>
                <div class="block-about__description">
                  <p>Lorem ipsum dolor sit amet elit sed aiusmod tempor incididunt ut labore dolore magna aliqua sed ipsum ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiu mod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div><!-- end col -->
              <div class="col-sm-6">
                <img class="block-about__img img-responsive" src="{{ asset('storage/home-theme/posts/487x335/1.jpg') }}" alt="Foto">
              </div>
            </div><!-- end row -->
          </div><!-- end container -->
        </div>
      </section><!-- end section-default -->

      <section class="section-bg" style="margin-top: 60px;">
        <div class="parallax-bg parallax-primary">
          <ul class="bg-slideshow">
            <li>
              <div style="background-image:url({{ asset('storage/home-theme/bg/bg-7.jpg') }})" class="bg-slide"></div>
            </li>
          </ul>
        </div>
        <div class="section__inner">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="block-download clearfix">
                  <div class="block-download__inner">
                    <h2 class="block-download__title">View your Order Stats</h2>
                    <div class="block-download__description">Below is a summery of the orders you have made with Zamola Ltd. Welcome again.</div>
                  </div>
                  <div class="block-download__btn">
                    <a class="btn btn_mod-c btn-sm btn-effect" href="{{ route('order.list', ['id' => Auth()->User()->id]) }}"><span class="btn__inner">View Full Stats ({{ $all_orders_count->count() }})</span></a>
                  </div>
                  <i class="block-download__icon flaticon-map2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-default">
        <div class="container">

          <!-- Content Row -->
          <div class="row">
            <div class="col-md-4 mb-4">
              <h5 class="text-primary">
                <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'pending']) }}" class="">Pending orders ({{ $pending_orders_count->count() }})</a>
              </h5>
              <span class="badge badge-info text-light pull-right">
                <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'pending']) }}" class="badge badge-info text-light">{{ $pending_orders_count->count() }}</a>
              </span>
              {{ $pending_orders_count->count() == 0 ? 'No Pending Orders' : '' }}
              <ul class="list-group  list-group-flush">
                @foreach($pending_orders as $pending_order)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('trace', ['tracer' => $pending_order->tracer]) }}">
                      {{ $pending_order->shipment_category->name }}
                    </a> 
                    <span>
                      {{ $pending_order->tracer }}
                    </span>
                  </li>
                  @endforeach
              </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-4">
              <h5 class="text-primary">
                <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'transit']) }}" class="">Processing orders ({{ $processing_orders_count->count() }})</a>
              </h5>
              {{ $processing_orders_count->count() == 0 ? 'No Processing Orders' : '' }}
              <ul class="list-group  list-group-flush">
                @foreach($processing_orders as $processing_order)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('trace', ['tracer' => $processing_order->tracer]) }}">
                      {{ $processing_order->shipment_category->name }}
                    </a> 
                    <span>
                      {{ $processing_order->tracer }}
                    </span>
                  </li>
                @endforeach
              </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-4">
              <h5 class="text-primary">
                <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'delivered']) }}" class="">Completed orders ({{ $completed_orders_count->count() }})</a>
              </h5>
              {{ ($completed_orders_count->count() == 0) ? 'No Completed Orders' : '' }}
              <ul class="list-group  list-group-flush">
                @foreach($completed_orders as $completed_order)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('trace', ['tracer' => $completed_order->tracer]) }}">
                      {{ $completed_order->shipment_category->name }}
                    </a> 
                    <span>
                      {{ $completed_order->tracer }}
                    </span>
                  </li>
                @endforeach
              </ul>
            </div> <!-- /.col-md-4 -->

          </div> <!-- /.row -->
        </div>
      </section>

@endsection