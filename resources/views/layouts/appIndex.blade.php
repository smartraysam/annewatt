<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">




    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | Annewatt</title>
    <!-- Bootstrap Core CSS -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <link href="{!! asset('vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      margin: auto;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="500">

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top static-top shadow ">
             <a class="navbar-brand" style="text-transform:uppercase " href="{{ url('/') }}">
                        <img src="{!! asset('favicon.ico') !!}" style="width:25px;height:25px;">
                        {{ config('app.name', 'ANNEWATT') }}
            </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item"><a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#excos">Excos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact us</a></li>
            </ul>
            <form class="form-inline my-2 my-md-0 navbar-search">
                <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Enter Rider ID..." aria-label="Search" aria-describedby="basic-addon2" id="rideridheader">
                  <div class="input-group-append">
                    <span class="input-group-text view-rider lime lighten-2" type="button" id="basic-text1"><i class="fas fa-search fa-sm text-grey"
                        aria-hidden="true"></i></span>
                  </div>
                </div>
            </form>

            <!--<form class="form-inline my-2 my-md-0">-->
            <!--  <input class="form-control" type="text" placeholder="Search">-->
            <!--</form>-->
          </div>
    </nav>
    @yield('content')
    @include('theme.footer')

    </div>

    {{-- <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script> --}}
    <script src="{!! asset('vendor/jquery/jquery.js') !!}"></script>
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('js/sb-admin-2.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>

</body>

</html>
