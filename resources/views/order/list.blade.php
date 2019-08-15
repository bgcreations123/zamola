@extends('layouts.master')

@section('title', 'Order')

@section('content')
	
	<div class="row">
		{{-- Shipment Info --}}
        <div class="col-md-12 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
					         Shipment information
                </h5>
                <a href="{{ URL::previous() }}" class="btn btn-primary float-right ml-3">Back</a>
              </div>
              <table class="table mt-4">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Dimentions: (L x W x H)</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($orders as $order)
        						<tr class="text-center">
        							<td><a href="{{ route('trace', ['tracer' => $order->tracer]) }}">{{ $order->shipment_category->name }}</a></td>
        							<td>{{ $order->quantity }}</td>
        							<td>{{ $order->weight }}</td>
        							<td>{{ $order->length.' x '.$order->width.' x '.$order->height }}</td>
        							<td>{{ $order->payment_method->name }}</td>
        							<td><span class="badge badge-pill badge-success">{{ $order->status->name }}</span></td>
        						</tr>
        					@endforeach
                </tbody>
              </table>
          	  <span class="float-right">{{ $orders->render() }}</span>
            </div>
          </div>
        </div>
    </div>

@endsection