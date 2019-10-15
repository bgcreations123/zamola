@extends('layouts.office.master')

@section('title', 'Home')

@section('content')

    @include('layouts._messages')

    <div class="col main py-4">
            
        <div class="row mb-3">
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="rotate">
                            {{-- <span class="fa fa-user fa-4x"></span> --}}
                            <img src="{{ Voyager::image( $staff->avatar ) }}" class="avatar img-circle img-thumbnail" alt="avatar" width="30%">
                        </div>
                        <h6 class="text-uppercase mt-2">{{ $staff->name }}</h6>
                        {{-- <h1 class="display-4">{{ $staff->id }}</h1> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <span class="fa fa-list fa-4x"></span>
                        </div>
                        <h6 class="text-uppercase">My Bookings</h6>
                        <h1 class="display-4">{{ count($assignments) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-info h-100">
                    <div class="card-body bg-info">
                        <div class="rotate">
                            <span class="fa fa-truck fa-4x"></span>
                        </div>
                        <h6 class="text-uppercase">Follow ups</h6>
                        <h1 class="display-4">{{ count($unpaid) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-success h-100">
                    <div class="card-body">
                        <div class="rotate">
                            <span class="fa fa-thumbs-up fa-4x"></span>
                        </div>
                        <h6 class="text-uppercase">Deliveries</h6>
                        <h1 class="display-4">{{ count($paid) }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->

        <div class="row my-4">
            <div class="col-lg-8 col-md-7">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr class="text-center">
                                <th>Tracer</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignments as $assignment)
                                <tr class="text-center">
                                    <td><a href="{{ route('trace', ['tracer' => $assignment->order->tracer]) }}">{{ $assignment->order->tracer }}</a></td>
                                    <td>{{ $assignment->order->quantity }}</td>
                                    <td>{{ $assignment->order->destination->location }}</td>
                                    <td>
                                        @if($assignment->status->name == 'approved')
                                            <a href="{{ route('bookings.show', ['order_id' => $assignment->order->id]) }}" class="btn btn-info btn-sm">
                                                view
                                            </a>
                                        @elseif($assignment->status->name == 'rejected')
                                            <a href="{{ route('bookings.show', ['order_id' => $assignment->order->id]) }}" class="btn btn-danger btn-sm">
                                                Re-assign
                                            </a>
                                        @else
                                            <a href="{{ route('bookings.show', ['order_id' => $assignment->order->id]) }}" class="btn btn-dark btn-sm">push</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($assignments->isEmpty())
                        <span class="text-center">
                            <p class="mt-4">No Bookings in progress. Kindly pick a job under <strong>orders pool</strong> menu.</p>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    {{-- <img class="card-img-top img-fluid" src="//placehold.it/740x180/bbb/fff?text=..." alt="Card image cap"> --}}
                    <div class="card-body">
                        <a href="{{ route('notices') }}"><h4 class="card-title">Notices</h4></a>
                        @if($notices->isEmpty())
                            <p class="card-text">No notice for now.</p>
                        @endif
                        <ul class="list-group list-group-flush">
                            @foreach($notices as $notice)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{-- {{ substr($notice->comment, 0, 19) }}... --}}
                                    <a href="{{ route('trace', ['tracer' => $notice->shipment->order->tracer]) }}">{{ $notice->shipment->order->tracer }}</a>
                                    <a href="#" data-toggle="modal" data-target="#notice{{ $notice->id }}">Read</a>
                                </li>

                                <!-- Modal -->
                                <div id="notice{{ $notice->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                Read Notice - From {{ $notice->sender->name }}
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p><u><strong>Tracer No.</strong> - {{ $notice->shipment->order->tracer }}</u></p>
                                                {!! $notice->comment !!}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end Modal content-->
                            @endforeach
                        </ul>
                        {{-- <a href="#" class="btn btn-primary">Button</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->

    </div>

@endsection