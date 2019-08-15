@extends('layouts.office.master')

@section('title', 'Home')

@section('content')

	<div class="row pt-3">
		{{-- Shipment Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	        	<div class="card-title">
		      		<h4>My Bookings</h4>
		      	</div>
	        	@if($assignments->isEmpty())
	        		<p>No booked Orders!</p>
	        	@else
					<table class="table mt-4">
						<thead>
						  <tr class="text-center">
						    <th scope="col">Category</th>
						    <th scope="col">Quantity</th>
						    <th scope="col">Packaging</th>
						    <th scope="col">Driver</th>
						    <th scope="col">Status</th>
						    <th scope="col">Actions</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($assignments as $assignment)
							{{-- {{ dd($assignment) }} --}}
								<tr class="text-center">
									<td><a href="{{ route('trace', ['tracer' => $assignment->tracer]) }}">{{ $assignment->order->shipment_category->name }}</a></td>
									<td>{{ $assignment->quantity }}</td>
									<td>{{ $assignment->package->name }}</td>
									<td>{{ $assignment->user->name }}</td>
									<td>{{ $assignment->status->name }}</td>
									<td></td>
								</tr>
							@endforeach
						</tbody>
					</table>
		        @endif
	      	  <span class="float-right">{{ $assignments->render() }}</span>
	        </div>
	      </div>
	    </div>
	</div>

@endsection