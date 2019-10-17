<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <meta name="client-id" content="{{ optional(Auth::user())->id }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name') }}
        @else 
            {{ config('app.name') }}
        @endif
    </title>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-file.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-theme/master.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/flaticon/flaticon.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.css" integrity="sha256-8RDBVgbg42pOdwRZt7jisxrQG1ZW2dx1J9FrgSFLhb0=" crossorigin="anonymous" /> --}}

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ Voyager::image('settings/favicon.ico') }}" type="image/x-icon">
  
    {{-- <script src="{{ asset('plugins/jquery/jquery-1.11.3.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/home-theme/modernizr.custom.js') }}"></script> --}}

    {{-- <script>
        window.Laravel = @php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); @endphp
    </script> --}}

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <div id="app">

        <!-- Loader -->
        <div id="page-preloader"><span class="spinner"></span></div>
        <!-- Loader end -->

        <div class="layout-theme animated-css"  data-header="sticky" data-header-top="200">
            
            {{-- @include('layouts._app') --}}
            @include('layouts._nav-bar')
            
            @if (Request::path() == '/')
                @include('layouts._slides')
            {{-- @else
                @include('layouts._banner') --}}
            @endif

            {{-- {{menu('main', 'layouts._navbar')}} --}}
            
            {{-- @include('layouts._messages') --}}

            @yield('content')

            @include('layouts._footer')

        </div>

        {{-- @include('layouts._footer') --}}

    </div>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- <script src="{{ asset('js/custom.js') }}" defer></script> --}}
    {{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> --}}

    <!-- SCRIPTS MAIN -->

    <script src="{{ asset('js/home-theme/jquery-migrate-1.2.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/home-theme/waypoints.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('js/home-theme/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/home-theme/cssua.min.js') }}"></script>

    <!--SCRIPTS THEME-->

    <!-- Home slider -->
    <script src="{{ asset('plugins/slider-pro/dist/js/jquery.sliderPro.js') }}"></script>
    <!-- Sliders -->
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('plugins/flexslider/jquery.flexslider.js') }}"></script>
    <!-- Modal -->
    <script src="{{ asset('plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
    <!-- Select customization -->
    <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <!-- Chart -->
    <script src="{{ asset('plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
    <!-- Animation -->
    <script src="{{ asset('plugins/scrollreveal/dist/scrollreveal.min.js') }}"></script>
    <!-- Menu for android-->
    <script src="{{ asset('js/home-theme/doubletaptogo.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/home-theme/custom.js') }}"></script>
    
</body>
</html>