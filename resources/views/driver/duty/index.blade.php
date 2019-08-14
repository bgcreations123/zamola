@extends('layouts.office.master')

@section('title', 'Home')

@section('content')

	<div class="row pt-3">
		{{-- Job Allocation Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	      	<div class="card-title">
	      		<h4>In Progress</h4>
	      	</div>
	        	@if($progresses->isEmpty())
	        		<p>No Work in progress!</p>
	        	@else
		          <table class="table mt-4">
		            <thead>
		              <tr class="text-center">
		                <th scope="col">Category</th>
		                <th scope="col">Quantity</th>
		                <th scope="col">Packaging</th>
		                <th scope="col">Destination</th>
		                <th scope="col">Actions</th>
		              </tr>
		            </thead>
		            <tbody>
		            	@foreach($progresses as $progress)
							<tr class="text-center">
								<td><a href="{{ route('trace', ['tracer' => $progress->order->tracer]) }}">{{ $progress->order->shipment_category->name }}</a></td>
								<td>{{ $progress->order->quantity }}</td>
								<td>{{ $progress->package->name }}</td>
								<td>{{ $progress->order->destination->location }}</td>
								<td><a href="{{ route('duties.show', ['shipment.id' => $progress->id]) }}">view</a></td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
	          	@endif
	        </div>
	      </div>
	    </div>
	</div>

	<div class="row pt-3">
		{{-- Shipment Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	      	<div class="card-title">
	      		<h4>Duties Allocated</h4>
	      	</div>
	        	@if($duties->isEmpty())
	        		<p>No booked Orders!</p>
	        	@else
	          <table class="table mt-4">
	            <thead>
	              <tr class="text-center">
	                <th scope="col">Category</th>
	                <th scope="col">Quantity</th>
	                <th scope="col">Packaging</th>
	                <th scope="col">Destination</th>
	                <th scope="col">Actions</th>
	              </tr>
	            </thead>
	            <tbody>
	            	@foreach($duties as $duty)
						<tr class="text-center">
							<td><a href="{{ route('trace', ['tracer' => $duty->order->tracer]) }}">{{ $duty->order->shipment_category->name }}</a></td>
							<td>{{ $duty->order->quantity }}</td>
							<td>{{ $duty->package->name }}</td>
							<td>{{ $duty->order->destination->location }}</td>
							<td><a href="{{ route('duties.show', ['shipment.id' => $duty->id]) }}">view</a></td>
						</tr>
					@endforeach
	            </tbody>
	          </table>
	          	@endif
	      	  <span class="float-right">{{ $duties->render() }}</span>
	        </div>
	      </div>
	    </div>
	</div>

@endsection