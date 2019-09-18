@extends('layouts.office.master')

@section('title', 'Home')

@section('content')

	@include('layouts._messages')

	<div class="row pt-3">
		{{-- Job Allocation Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	      	<div class="card-title">
	      		<h4>Deliveries</h4>
	      	</div>
	        	@if($deliveries->isEmpty())
	        		<p>No deliveries made yet!</p>
	        	@else
		          <table class="table mt-4">
		            <thead>
		              <tr class="text-center">
		                <th scope="col">Category</th>
		                <th scope="col">Quantity</th>
		                <th scope="col">Packaging</th>
		                <th scope="col">Destination</th>
		                <th scope="col">status</th>
		                <th scope="col">Actions</th>
		              </tr>
		            </thead>
		            <tbody>
		            	@foreach($deliveries as $delivery)
							<tr class="text-center">
								<td><a href="{{ route('trace', ['tracer' => $delivery->order->tracer]) }}">{{ $delivery->order->shipment_category->name }}</a></td>
								<td>{{ $delivery->order->quantity }}</td>
								<td>{{ $delivery->package->name }}</td>
								<td>{{ $delivery->order->destination->location }}</td>
								<td>{{ $delivery->status->name }}</td>
								<td><a href="{{ route('duties.show', ['shipment.id' => $delivery->id]) }}">view</a></td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
	          	@endif
	        </div>
	      </div>
	    </div>
	</div>

@endsection