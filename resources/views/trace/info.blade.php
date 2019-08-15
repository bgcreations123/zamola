@extends((auth()->user()->role->name==='user')?'layouts.master':'layouts.office.master')

@section('title', 'Order')

@section('content')

{{-- {{dd($shipment->shipment_category->name)}} --}}
	
	<div class="row py-4 noprint">
    <div class="col-12">
      <span class="float-left"><strong>Order info: </strong>as determined by the {{ $shipment->user->name }}.</span>

      @if(auth()->user()->id == $shipment->user_id)
        <span class="float-right">An email was sent in response.</span> 
      @endif
    </div> 
  </div>

  {{-- Waypass Document --}}
  <div class="row my-4 noprint">
    <div class="col-12">
      <span class="float-left"><strong>Waypass document</strong></span>

      <span class="float-right">
        <a href="{{ URL::previous() }}" class="btn btn-primary float-right ml-3">Back</a>
        @if(auth()->user()->id == $shipment->user_id)
          <a href="javascript:window.print()" class="btn btn-success float-right">Print Waypass</a>
        @endif
      </span> 
    </div> 
  </div>
	
  <div class="row" id="div-printable" style="body .printable {display:block;}">
      <div class="col-12">
          <div class="card">
              <div class="card-body p-0">
                  <div class="row px-5 py-4">
                      <div class="col-md-6">
                          <img src="{{ Voyager::image(setting('site.logo')) }}" style="width: 5%;">
                          Zamola Entreprises LTD
                      </div>

                      <div class="col-md-6 text-right">
                          <p class="font-weight-bold mb-1">Waypass #000{{ $shipment->id }}</p>
                          {{-- <p class="text-muted">Due to: 4 Dec, 2019</p> --}}
                      </div>
                  </div>

                  <hr class="mx-5 my-3">

                  <div class="row px-5 py-2">
                      <div class="col-md-4">
                          <p class="font-weight-bold mb-4">Origin</p>
                          <p class="mb-1"><span class="text-muted">Name: </span> {{ $origin->name }}</p>
                          <p class="ml-md-5">{{ $origin->address }}</p>
                          <p class="mb-1"><span class="text-muted">Location: </span> {{ $origin->location }}</p>
                          <p class="mb-1"><span class="text-muted">Phone: </span> {{ $origin->phone }}</p>
                          <p class="mb-1"><span class="text-muted">Email: </span> {{ $origin->email }}</p>
                      </div>

                      <div class="col-md-4">
                          <p class="font-weight-bold mb-4">Destination</p>
                          <p class="mb-1"><span class="text-muted">Name: </span> {{ $destination->name }}</p>
                          <p class="ml-md-5">{{ $destination->address }}</p>
                          <p class="mb-1"><span class="text-muted">Location: </span> {{ $destination->location }}</p>
                          <p class="mb-1"><span class="text-muted">Phone: </span> {{ $destination->phone }}</p>
                          <p class="mb-1"><span class="text-muted">Email: </span> {{ $destination->email }}</p>
                      </div>

                      <div class="col-md-4 text-center">
    {{-- 
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
      <br/>
      <br/>
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
      <br/>
      <br/>
      <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
      <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />   
    --}}
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($shipment->tracer, 'C39E')}}" alt="barcode" style="width: 100%; height: 100px" />
    <div class="m-3"><strong>Tracer: </strong>{{ $shipment->tracer }}</div>
                      </div>
                  </div>

                  <div class="row px-5 py-2">
                      <div class="col-md-12">
                          <table class="table mt-4">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Dimentions: (L x W x H)</th>
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


                  <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                      {{-- <div class="py-3 px-5 text-right">
                          <div class="mb-2">Grand Total</div>
                          <div class="h2 font-weight-light">$234,234</div>
                      </div> --}}

                      <div class="py-3 px-5 text-right">
                          <div class="mb-2">All Payments </div>
                          <div class="h2 font-weight-light">On delivery</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection