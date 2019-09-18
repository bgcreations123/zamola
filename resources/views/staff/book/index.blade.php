@extends('layouts.office.master')

@section('title', 'Home')

@section('content')

	@include('layouts._messages')

	<div class="row pt-3">
		{{-- Shipment Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	        	<div class="card-title">
		      		<h4>Orders Pool</h4>
		      	</div>
		      	@if($pending_orders->isEmpty())
	        		<p>No orders! Our marketers are working hard to make this possible.</p>
	        	@else
					<table class="table mt-4">
						<thead>
						  <tr class="text-center">
						    <th scope="col">Category</th>
						    <th scope="col">Quantity</th>
						    <th scope="col">Dimentions: (L x W x H)</th>
						    <th scope="col">Action</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($pending_orders as $pending_order)
								<tr class="text-center">
									<td><a href="{{ route('trace', ['tracer' => $pending_order->tracer]) }}">{{ $pending_order->shipment_category->name }}</a></td>
									<td>{{ $pending_order->quantity }}</td>
									<td>{{ $pending_order->length.' x '.$pending_order->width.' x '.$pending_order->height }}</td>
									<td><a href="{{ route('bookings.show', ['order_id' => $pending_order->id]) }}">Book</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
	      	  		<span class="float-right">{{ $pending_orders->render() }}</span>
				@endif
	        </div>
	      </div>
	    </div>
	</div>

@endsection