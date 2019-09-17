@extends('layouts.office.master')

@section('title', 'Home')

@section('content')



	<div class="col main py-4">
            
        <div class="row mb-3">
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="rotate">
                            {{-- <span class="fa fa-user fa-4x"></span> --}}
                            <img src="{{ Voyager::image( $driver->avatar ) }}" class="avatar img-circle img-thumbnail" alt="avatar" width="30%">
                        </div>
                        <h6 class="text-uppercase mt-2">{{ $driver->name }}</h6>
                        {{-- <h1 class="display-4">{{ $driver->id }}</h1> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <span class="fa fa-list fa-4x"></span>
                        </div>
                        <h6 class="text-uppercase">Total Duties</h6>
                        <h1 class="display-4">{{ count($duties) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-info h-100">
                    <div class="card-body bg-info">
                        <div class="rotate">
                            <span class="fa fa-truck fa-4x"></span>
                        </div>
                        <h6 class="text-uppercase">All on Transit</h6>
                        <h1 class="display-4">{{ count($progresses) }}</h1>
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
                        <h1 class="display-4">{{ count($deliveries) }}</h1>
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
                                @foreach($progresses as $progress)
                                    <tr class="text-center">
                                        <td><a href="{{ route('trace', ['tracer' => $progress->order->tracer]) }}">{{ $progress->order->tracer }}</a></td>
                                        <td>{{ $progress->order->quantity }}</td>
                                        <td>{{ $progress->order->destination->location }}</td>
                                        <td><a href="{{ route('duties.show', ['shipment.id' => $progress->id]) }}">view</a></td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    @if($progresses->isEmpty())
                        <span class="text-center">
                            <p class="mt-4">No shipment in progress. Kindly pick a job under <strong>duties</strong> menu.</p>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    {{-- <img class="card-img-top img-fluid" src="//placehold.it/740x180/bbb/fff?text=..." alt="Card image cap"> --}}
                    <div class="card-body">
                        <h4 class="card-title">Notices</h4>
                        @if($notices->isEmpty())
                            <p class="card-text">No notice for now.</p>
                        @endif
                        <ul class="list-group list-group-flush">
                            @foreach($notices as $notice)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{-- {{ substr($notice->comment, 0, 19) }}... --}}
                                    {{ $notice->shipment->order->tracer }}
                                    <a href="#">Read</a>
                                </li>
                            @endforeach
                        </ul>
                        {{-- <a href="#" class="btn btn-primary">Button</a> --}}
                    </div>
                </div>
                {{-- <div class="card card-inverse bg-inverse mt-3">
                    <div class="card-body">
                        <h3 class="card-title">Flexbox</h3>
                        <p class="card-text">Flexbox is now the default, and Bootstrap 4 supports SASS out of the box.</p>
                        <a href="#" class="btn btn-outline-secondary">Outline</a>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--/row-->

    </div>

@endsection