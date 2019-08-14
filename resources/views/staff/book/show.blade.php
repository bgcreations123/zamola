@extends('layouts.office.master')

@section('title', 'Home')

@section('content')
	
	{{-- {{dd($shipment->shipment_category->name)}} --}}

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
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
					Origin Information
                </h5>
              </div>
              <ul class="list-group  list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Name
                    </span> 
                    <span>
                      {{ $origin->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Mobile
                    </span> 
                    <span>
                      {{ $origin->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Email
                    </span> 
                    <span>
                      {{ $origin->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Address
                    </span> 
                    <span>
                      {{ $origin->address }}
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
					Destination information
                </h5>
              </div>
              <ul class="list-group  list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Name
                    </span> 
                    <span>
                      {{ $destination->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Mobile
                    </span> 
                    <span>
                      {{ $destination->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Email
                    </span> 
                    <span>
                      {{ $destination->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Address
                    </span> 
                    <span>
                      {{ $destination->address }}
                    </span>
                  </li>
              </ul>
            </div>
          </div>
        </div>


        {{-- Shipment Info --}}
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
    				Order information
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
                    <td>{{ $shipment->shipment_category->name }}</td>
                    <td>{{ $shipment->quantity }}</td>
                    <td>{{ $shipment->weight }}</td>
                    <td>{{ $shipment->length.' x '.$shipment->width.' x '.$shipment->height }}</td>
                    <td>{{ $shipment->payment_method->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        {{-- Point of destination --}}
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
					Tracer Number: <span class="ml-3"><small>{{ $shipment->tracer }}</small></span>
                </h5>
              </div>
              <table class="table table-sm table-borderless mt-4">
                <thead class="text-middle">
                  <tr class="text-left">
                    <th scope="col">From Location</th>
                    <th scope="col">To Location</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-left">
                    <td>{{ $origin->location }}</td>
                    <td>{{ $destination->location }}</td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-borderless mt-4">
                <thead class="text-middle">
                  <tr class="text-left">
                    <th scope="col">Order Date</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Schedule Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-left">
                    <td>{{ \Carbon\Carbon::parse($shipment->created_at)->diffForHumans() }}</td>
                    <td>{{ \Carbon\Carbon::now() }}</td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
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
              	<form method="POST" action="{{ route('bookings.store') }}">

                  {{ csrf_field() }}

                  <input type="hidden" id="staff" name="staff" value="{{ auth()->user()->id }}">
                  <input type="hidden" id="order" name="order" value="{{ $shipment->id }}">
                  <input type="hidden" id="status" name="status" value="{{ $status->id }}">

        					<div class="form-row">
        						<div class="form-group col-md-6">
        							<label for="package">Package Type</label>
        							<select id="package" name="package" class="form-control">
        								<option value="" selected disabled hidden>Choose...</option>
                        @foreach($packages as $package)
        								  <option value="{{ $package->id }}">{{ $package->name }}</option>
                        @endforeach
        							</select>
        						</div>
        						<div class="form-group col-md-6">
        							<label for="driver">Assign Driver</label>
        							<select id="driver" name="driver" class="form-control">
        								<option value="" selected disabled hidden>Choose...</option>
        								@foreach($drivers as $driver)
                          <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
        							</select>
        						</div>
        					</div>
                  {{-- Actions --}}
                  <div class="row my-4 noprint">
                    <div class="col-12">
                      <span class="float-right">
                        <button type="submit" class="btn btn-success float-right">Approve Booking</button>
                      </span> 
                    </div> 
                  </div>
        				</form>
          	</div>
      	  </div>
  		</div>
    </div>

@endsection