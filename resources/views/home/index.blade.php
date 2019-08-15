@extends('layouts.master')

@section('title', 'Home')

@section('content')

      <!-- Heading Row -->
      {{-- <div class="row justify-content-center">
        <h1>Welcome to {{ setting('site.title') }}</h1>
      </div> --}}

      <!-- Call to Action Well -->
      {{-- <div class="card text-white bg-secondary mb-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">
            Technical subjects involving sciences and mathematics are subject to an additional 10% of the indicated prices.
            <br>
            Prices above are for one regular page or 275 words.
          </p>
        </div>
      </div> --}}

      <div class="jumbotron jumbotron-muted">
        <div class="row">
          <div class="col-lg-6">
            {!! setting('site.jumbotron') !!}
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter your email">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Subscribe</button>
              </span>
            </div>
          </div>
          <div class="col-lg-6 mt-2">
            <img src="{{ Voyager::image( 'pages/logistics 6.jpg' ) }}" class="mx-auto d-block img-thumbnail" style="opacity: 0.6;">
          </div>
        </div> {{-- /row --}}
      </div> {{-- jumbotron --}}

      <div class="row">
        <div class="col-12">
          <div class="float-left">
            <h2><a href="{{ route('order.list', ['id' => Auth()->User()->id]) }}">My Stats</a></h2>
          </div>
          <div class="float-right">
            <a href="{{ route('order') }}" class="btn btn-outline-primary">Order Shipment</a>
          </div>
        </div>
      </div>

      <hr />

      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
                  Pending orders
                </h5>
                <span class="badge badge-info text-light">
                  <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'pending']) }}" class="badge badge-info text-light">{{ $pending_orders_count->count() }}</a>
                </span>
              </div>
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
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
                  Processing orders
                </h5>
                <span class="badge badge-info text-light">
                  <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'transit']) }}" class="badge badge-info text-light">{{ $processing_orders_count->count() }}</a>
                </span>
              </div>
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
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
                  Completed orders
                </h5>
                <a href="{{ route('order.list', ['id' => Auth()->User()->id, 'status' => 'delivered']) }}" class="badge badge-info text-light">{{ $completed_orders_count->count() }}</a>
              </div>
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
            </div>
            {{-- <div class="card-footer">
              <a href="#" class="btn btn-primary btn-sm">More Info</a>
            </div> --}}
          </div>
        </div> <!-- /.col-md-4 -->
      </div> <!-- /.row -->

      <!--Carousel Wrapper
      <div class="container-fluid">
        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-md-3 active">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text=1" alt="slide 1">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=2" alt="slide 2">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=3" alt="slide 3">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=4" alt="slide 4">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=5" alt="slide 5">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=6" alt="slide 6">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=7" alt="slide 7">
                </div>
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text=8" alt="slide 7">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    /.Carousel Wrapper-->

@endsection