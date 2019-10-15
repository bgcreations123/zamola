@extends((auth()->user()->role->name==='user')?'layouts.master':'layouts.office.master')

@section('title', 'Tracer')

@section('content')

{{-- {{dd($shipment->shipment_category->name)}} --}}

    @if(auth()->user()->role->name==='user')
        <div class="section-title parallax-bg parallax-light noprint">
            <ul class="bg-slideshow">
                <li>
                    <div style="background-image:url({{ asset('storage/home-theme/bg/bg-title.jpg') }})" class="bg-slide"></div>
                </li>
            </ul>
            <div class="section__inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="ui-title-page">Notices</h1>
                            <div class="ui-subtitle-page">List of notices from our office desk.</div>
                            <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section__inner -->
        </div><!-- end section-title -->
    @endif

    @include('layouts._messages')

    <div class="section_mod-b mt-4">
        <div class="container">

            <span class="pull-right noprint">
                <a href="{{ URL::previous() }}" class="header__btn btn btn-primary btn-sm btn-effect-2 pull-right" style="margin-right: 30px;">Back</a>
            </span>

            <div class="row noprint">
                <div class="col-xs-12">
                    <h2 class="ui-title-block">Notices</h2>
                    <div class="decor-1"><i class='icon flaticon-delivery36'></i></div>
                </div>
            </div>

            <table class="table mt-4">
                <thead>
                    <tr class="text-center">
                        <th class="text-center" cla scope="col">Shipment</th>
                        <th class="text-center" scope="col">Sender</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Date</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notices as $notice)
                        <tr class="text-center">
                            <td><a href="{{ route('trace', ['tracer' => $notice->shipment->order->tracer]) }}">{{ $notice->shipment->order->tracer }}</a></td>
                            <td>{{ $notice->sender->name }}</td>
                            <td>{{ $notice->status == 0 ? 'Unread' : 'Read' }}</td>
                            <td>{{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-xs" href="#" id="read" data-toggle="modal" data-target="#notice{{ $notice->id }}">view</a>

                                <a class="btn btn-xs" href="#" data-toggle="modal" data-target="#review{{ $notice->id }}">Review</a>
                            </td>
                        </tr>

                        <script type="application/javascript">
                            $(document).ready(function () {
                                $( "#notice{{ $notice->id }}" ).on('hidden.bs.modal', function (e) {
                                    // alert("I want this to appear after the modal has opened!");
                                    window.location.href = "{{ route('notice.read', ['id' => $notice->id]) }}";
                                });
                            });
                        </script>
                        
                        <!-- Notice Modal -->
                        <div id="notice{{ $notice->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Read Notice - From {{ $notice->sender->name }}
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><u><strong>Tracer No.</strong> - {{ $notice->shipment->order->tracer }}</u></p>
                                        {!! $notice->comment !!}
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end Modal content-->

                        <!-- Review Modal -->
                        <div id="review{{ $notice->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form action="#" method="">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            Service Review - Tracer No. {{ $notice->shipment->order->tracer }}
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="review">Review: </label>
                                                <textarea class="form-control mb-4" rows="5" id="review" name="review"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- end Modal content-->
                    @endforeach
                </tbody>
            </table>

            <span class="page-link pull-right text-center">{{ $notices->links('vendor.pagination.default') }}</span>

        </div>
    </div>

@endsection