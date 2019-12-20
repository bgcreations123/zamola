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
                      <h1 class="ui-title-page">My Stats</h1>
                      <div class="ui-subtitle-page">Track your orders ever since you started with Zamola.</div>
                      <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                  </div><!-- end col -->
              </div><!-- end row -->
          </div><!-- end container -->
      </div><!-- end section__inner -->
  </div><!-- end section-title -->

  @include('layouts._messages')

  <div class="section_mod-b">
    <div class="container">
      <div class="row">

        <span class="pull-right">
          <a href="{{ URL::previous() }}" class="header__btn btn btn-primary btn-sm btn-effect-2 pull-right" style="margin-right: 30px;">Back</a>
        </span> 
        	
        <table class="table mt-4">
          <thead>
            <tr class="text-center">
              <th scope="col">Category</th>
              <th scope="col">Quantity</th>
              <th scope="col">Weight</th>
              <th scope="col">Dimentions: (L x W x H)</th>
              <th scope="col">Order Date</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($orders as $order)
  						<tr class="text-center">
  							<td><a href="{{ route('trace', ['tracer' => $order->tracer]) }}">{{ $order->shipment_category->name }}</a></td>
  							<td>{{ $order->quantity }}</td>
  							<td>{{ $order->weight }}</td>
  							<td>{{ $order->length.' x '.$order->width.' x '.$order->height }}</td>
  							<td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
  							<td>
                  <span class="label {{ $order->status->name == "pending" ? 'label-danger' : ($order->status->name == "transit" ? 'label-warning' : 'label-success') }}">
                    {{ $order->status->name }}
                  </span>
                </td>
                <td>
                  @if(Auth::user()->role->name == 'user' && $order->status_id == 2)
                      <a class="btn btn-xs" href="#" data-toggle="modal" data-target="#review{{ $order->id }}">Review</a>
                  @endif
                </td>
  						</tr>

              <!-- Review Modal -->
              <div id="review{{ $order->id }}" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header">
                            Service Review - Tracer No. {{ $order->tracer }}
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST" id="review">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="review">Review: </label>
                                <textarea class="form-control mb-4" rows="5" id="review" name="review"></textarea>
                                <div class="rating">
                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="xs">
                                </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" form="review" id="myFormSubmit">Submit</button>
                        </div>
                      </div>

                  </div>
              </div>
              <!-- end Modal content-->

            @endforeach
          </tbody>
        </table>

    	  <span class="page-link pull-right">{{ $orders->links('vendor.pagination.default') }}</span>
                      
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('#myFormSubmit').click(function(e){
      e.preventDefault();
      alert($('#review').val());
      /*
      $.post('http://path/to/post', 
         $('#myForm').serialize(), 
         function(data, status, xhr){
           // do something here with response;
         });
      */
    });
  </script>

@endsection