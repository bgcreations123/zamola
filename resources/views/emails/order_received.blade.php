<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
  <title>{{ setting('site.title') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/custom.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>



{{-- Waypass Document --}}
  <div class="row my-4 noprint">
    <div class="col-12">
      <span class="float-left"><strong>Waypass document</strong></span>

      <span class="float-right">
        <a href="javascript:window.print()" class="btn btn-success float-right">Print Waypass</a>
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
                          <p class="font-weight-bold mb-1">Waypass #000{{ $order->id }}</p>
                          {{-- <p class="text-muted">Due to: 4 Dec, 2019</p> --}}
                      </div>
                  </div>

                  <hr class="mx-5 my-3">

                  <div class="row px-5 py-2">
                      <div class="col-md-4">
                          <p class="font-weight-bold mb-4">Origin</p>
                          <p class="mb-1"><span class="text-muted">Name: </span> {{ $sender_terminus->name }}</p>
                          <p class="ml-md-5">{{ $sender_terminus->address }}</p>
                          <p class="mb-1"><span class="text-muted">Location: </span> {{ $sender_terminus->location }}</p>
                          <p class="mb-1"><span class="text-muted">Phone: </span> {{ $sender_terminus->phone }}</p>
                          <p class="mb-1"><span class="text-muted">Email: </span> {{ $sender_terminus->email }}</p>
                      </div>

                      <div class="col-md-4">
                          <p class="font-weight-bold mb-4">Destination</p>
                          <p class="mb-1"><span class="text-muted">Name: </span> {{ $receiver_terminus->name }}</p>
                          <p class="ml-md-5">{{ $receiver_terminus->address }}</p>
                          <p class="mb-1"><span class="text-muted">Location: </span> {{ $receiver_terminus->location }}</p>
                          <p class="mb-1"><span class="text-muted">Phone: </span> {{ $receiver_terminus->phone }}</p>
                          <p class="mb-1"><span class="text-muted">Email: </span> {{ $receiver_terminus->email }}</p>
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
    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($order->tracer, 'C39E')}}" alt="barcode" style="width: 100%; height: 100px" />
    <div class="m-3"><strong>Tracer: </strong>{{ $order->tracer }}</div>
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
                                <td>{{ $order->shipment_category->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->weight }}</td>
                                <td>{{ $order->length.' x '.$order->width.' x '.$order->height }}</td>
                                <td>{{ $order->payment_method->name }}</td>
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
