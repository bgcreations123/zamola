@extends('layouts.office.master')

@section('title', 'Home')

@section('content')
	
	{{-- {{dd($shipment->shipment_category->name)}} --}}

  @include('layouts._messages')

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
                  <span class="small">Ordered By: {{ $shipment->user->name }}</span>
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

              <h5 class="text-primary mt-5">
          Origin Information
              </h5>
              <ul class="list-group  list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Name
                    </span> 
                    <span>
                      {{ $shipment->origin->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Mobile
                    </span> 
                    <span>
                      {{ $shipment->origin->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Email
                    </span> 
                    <span>
                      {{ $shipment->origin->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Sender Address
                    </span> 
                    <span>
                      {{ $shipment->origin->address }}
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
          Tracer Number: <span class="ml-3"><small>{{ $shipment->tracer }}</small></span>
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
                    <td>{{ $shipment->origin->location }}</td>
                    <td class="text-right">{{ $shipment->destination->location }}</td>
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
                      {{ $shipment->destination->name }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Mobile
                    </span> 
                    <span>
                      {{ $shipment->destination->phone }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Email
                    </span> 
                    <span>
                      {{ $shipment->destination->email }}
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="text-primary">
                      Receiver Address
                    </span> 
                    <span>
                      {{ $shipment->destination->address }}
                    </span>
                  </li>
              </ul>
            </div>
          </div>
        </div>
        
        @if($shipment->status->name == 'transit')
          <div class="col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">

                <div class="card-title d-flex justify-content-between align-items-center">
                  <h5 class="text-primary">Action</h5>
                  <span class="text-danger">
                      <strong class="mr-3">Notice:</strong><span>Use this button to prompt(rush) the driver</span>
                  </span>
                </div>

                <div class="row my-4 noprint">
                  <div class="col-12">
                    <span class="float-right">
                      <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#push">push</a>
                    </span>
                  </div>
                </div>

              </div> {{-- // cardbody --}}
            </div> {{-- Card --}}
          </div> {{-- col --}}

          <!-- Modal -->
          <div id="push" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  Push Notice
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('bookings.notify', ['order_id' => $shipment->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="comment">Message: </label>
                      <textarea class="form-control mb-4" rows="5" id="comment" name="comment"></textarea>
                      <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- end Modal-->

        @elseif($shipment->status->name == 'approved')
          <div class="col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">

                <div class="card-title d-flex justify-content-between align-items-center">
                  <h5 class="text-primary">Action</h5>
                  <span class="text-danger">
                      <strong class="mr-3">Notice:</strong><span>Waiting to go on transit</span>
                  </span>
                </div>

                <div class="row my-4 noprint">
                  <div class="col-12">
                    <span class="float-right">
                      <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#remind">Remind Driver</a>
                    </span>
                  </div>
                </div>

              </div> {{-- // cardbody --}}
            </div> {{-- Card --}}
          </div> {{-- col --}}

          <!-- Modal -->
          <div id="remind" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  Reminder Notice
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('bookings.notify', ['shipment_id' => $shipment->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="comment">Message: </label>
                      <textarea class="form-control mb-4" rows="5" id="comment" name="comment"></textarea>
                      <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- end Modal content-->
        @elseif($shipment->status->name == 'unpaid')
          <div class="col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">

                <div class="card-title d-flex justify-content-between align-items-center">
                  <h5 class="text-primary">Action</h5>
                  <span class="text-danger">
                      <strong class="mr-3">Notice:</strong><span>Use this button to prompt the client</span>
                  </span>
                </div>

                <div class="row my-4 noprint">
                  <div class="col-12">
                    <span class="float-right">
                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#followUp">Follow Up</a>
                    </span>
                  </div>
                </div>

              </div> {{-- // cardbody --}}
            </div> {{-- Card --}}
          </div> {{-- col --}}

          <!-- Modal -->
          <div id="followUp" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  Follow-up Notice
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('bookings.followup', ['shipment_id' => $shipment->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="comment">Message: </label>
                      <textarea class="form-control mb-4" rows="5" id="comment" name="comment"></textarea>
                      <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- end Modal content-->

        @elseif($shipment->status->name == 'paid')
          <div class="col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">

                <div class="card-title d-flex justify-content-between align-items-center">
                  <h5 class="text-primary">Action</h5>
                  <span class="text-danger">
                      <strong class="mr-3">Notice:</strong><span>Status</span>
                  </span>
                </div>

                <div class="row my-4 noprint">
                  <div class="col-12">
                    <span class="float-right text-success">
                      Cleared
                    </span>
                  </div>
                </div>

              </div> {{-- // cardbody --}}
            </div> {{-- Card --}}
          </div> {{-- col --}}
        @else
          {{-- Shipment Info --}}
          <div class="col-md-12 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                  <h5 class="text-primary">Action</h5>
                  <span class="text-danger">
                      <strong class="mr-3">Notice:</strong><span>Mandatory field for parcel clearance</span>
                  </span>
                </div>

                <form action="{{ route('bookings.store') }}"  method="POST">
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

              </div> {{-- // cardbody --}}
            </div> {{-- Card --}}
          </div> {{-- col --}}
        @endif

        
    </div>

@endsection