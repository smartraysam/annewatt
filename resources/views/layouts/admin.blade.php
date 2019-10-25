<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{!! asset('vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/bootstrap-select.min.css') !!}" rel="stylesheet">
   
    <link href="{!! asset('css/bootstrap-select-country.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/select2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
  
  
    </head>

<body id="page-top">
    <div id="wrapper">
        <!-- Navigation -->
        @include('theme.sidebar')


        <div id="content-wrapper" class="d-flex flex-column">

            @yield('content')
            @include('theme.footer')
        </div>
    </div>

    <!-- /#wrapper -->

    @include('theme.logout')

    <!-- jQuery -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
   
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('js/sb-admin-2.min.js') !!}"></script>

   
    <script src="{!! asset('vendor/chart.js/Chart.min.js') !!}"></script>
    <script src="{!! asset('js/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! asset('js/demo/chart-pie-demo.js') !!}"></script>
  
  
    <script src="{!! asset('js/appscript.js') !!}"></script>
    <script src="{!! asset('js/bootstrap-select.min.js') !!}"></script>
    
    <script src="{!! asset('js/bootstrap-select-country.min.js') !!}"></script>
    <script src="{!! asset('js/select2.min.js') !!}"></script>
    <script src="{!! asset('js/lga.js') !!}"></script>

  <!-- Page level plugins -->
  <script src="{!!asset('vendor/datatables/jquery.dataTables.min.js') !!}"></script>
  <script src="{!!asset('vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>

  <!-- Page level custom scripts -->
  <script src="{!!asset('js/demo/datatables-demo.js') !!}"></script>
    
    <!-- Core plugin JavaScript-->
   
</body>

</html>