@extends('layouts.office.master')

@section('title', 'Follow Ups')

@section('content')

	@include('layouts._messages')

	<div class="row pt-3">
		{{-- Shipment Info --}}
	    <div class="col-md-12 mb-4">
	      <div class="card h-100">
	        <div class="card-body">
	        	<div class="card-title">
		      		<h4>Follow Up</h4>
		      	</div>
	        	@if($followups->isEmpty())
	        		<p>No debtors!</p>
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
							@foreach($followups as $followup)
							{{-- {{ dd($followup) }} --}}
								<tr class="text-center">
									<td><a href="{{ route('trace', ['tracer' => $followup->order->tracer]) }}">{{ $followup->order->shipment_category->name }}</a></td>
									<td>{{ $followup->order->quantity }}</td>
									<td>{{ $followup->package->name }}</td>
									<td>{{ $followup->order->user->name }}</td>
									<td>{{ $followup->status->name }}</td>
									<td>
										@if($followup->status->name == 'rejected')
											<a href="{{ route('bookings.show', ['order_id' => $followup->order->id]) }}" class="btn btn-danger btn-sm">
												Re-assign
											</a>
										@else
											<a href="{{ route('bookings.show', ['order_id' => $followup->order->id]) }}" class="btn btn-dark btn-sm">Notify</a>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
		        @endif
	      	  <span class="float-right">{{ $followups->render() }}</span>
	        </div>
	      </div>
	    </div>
	</div>

@endsection