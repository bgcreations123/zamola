@extends('layouts.office.master')

@section('title', 'Home')

@section('content')
	
	{{-- {{dd($shipment->order)}} --}}

	{{-- Actions --}}
	<div class="row my-4">
	    <div class="col-12">
			<span class="mt-4 noprint"><strong>Order details</strong></span>
			<span class="float-right">
				<a href="{{ URL::previous() }}" class="btn btn-primary float-right ml-3">Back</a>
			</span> 
	    </div> 
	</div>


	<div class="row noprint">
		{{-- Point of origin --}}
        {{-- Shipment Info --}}
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
                  Order information
                  <br>
                  <span class="small">Ordered By: {{ $shipment->order->user->name }}</span>
                </h5>
                <span class="text-info">
                    <strong class="mr-3">Status:</strong><span class="badge badge-pill badge-success">{{ $shipment->status->name }}</span>
                </span>
              </div>
              <table class="table mt-4">
                <thead class="text-middle">
                  <tr class="text-center">
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Dimentions: <br /><small>(L x W x H)</small></th>
                    <th scope="col">Payment Method</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>{{ $shipment->order->shipment_category->name }}</td>
                    <td>{{ $shipment->order->quantity }}</td>
                    <td>{{ $shipment->order->weight }}</td>
                    <td>{{ $shipment->order->length.' x '.$shipment->order->width.' x '.$shipment->order->height }}</td>
                    <td>{{ $shipment->order->payment_method->name }}</td>
                  </tr>
                </tbody>
              </table>

              <h5 class="text-primary mt-5">
          Origin Information
              </h5>
              <ul class="list-group  list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Name
                    </span> 
                    <span>
                      {{ $shipment->order->origin->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Mobile
                    </span> 
                    <span>
                      {{ $shipment->order->origin->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Email
                    </span> 
                    <span>
                      {{ $shipment->order->origin->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Address
                    </span> 
                    <span>
                      {{ $shipment->order->origin->address }}
                    </span>
                  </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- Point of destination --}}
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
          Tracer Number: <span class="ml-3"><small>{{ $shipment->order->tracer }}</small></span>
                </h5>
              </div>
              <table class="table table-sm table-borderless mt-4">
                <thead class="text-middle">
                  <tr>
                    <th scope="col" style="width: 50%">From Location</th>
                    <th scope="col" class="text-right">To Location</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $shipment->order->origin->location }}</td>
                    <td class="text-right">{{ $shipment->order->destination->location }}</td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-sm table-border mt-4">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Date Today</th>
                    <th scope="col">Order Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td style="vertical-align:bottom;">{{ \Carbon\Carbon::now()->toDayDateTimeString() }}</td>
                    <td>
                      {{ \Carbon\Carbon::parse($shipment->created_at)->diffForHumans() }}
                      <br />
                      {{ \Carbon\Carbon::parse($shipment->created_at)->toDayDateTimeString() }}
                    </td>
                  </tr>
                </tbody>
              </table>

              <h5 class="text-primary mt-5">
          Destination information
              </h5>
              <ul class="list-group  list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Name
                    </span> 
                    <span>
                      {{ $shipment->order->destination->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Mobile
                    </span> 
                    <span>
                      {{ $shipment->order->destination->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Email
                    </span> 
                    <span>
                      {{ $shipment->order->destination->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Address
                    </span> 
                    <span>
                      {{ $shipment->order->destination->address }}
                    </span>
                  </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- Shipment Info --}}
        <div class="col-md-12 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
    				Shipment information
                </h5>
                <span class="text-danger">
                  	<strong class="mr-3">Notice:</strong><span>Mandatory field for parcel clearance</span>
                </span>
              </div>
              <div class="float-right">
                <form class="form-inline" method="POST" action="#">
                  {{ csrf_field() }}
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="amount" class="sr-only">Amount</label>
                    <input type="text" class="form-control" id="amount" placeholder="Amount">
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </form> 
              </div>
          	</div>
      	  </div>
  		</div>
    </div>

@endsection