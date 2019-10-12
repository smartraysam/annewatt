<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">
    <title>{{ config('app.name', 'Annewatt') }}</title>
    <!-- Bootstrap Core CSS -->

    <link href="{!! asset('theme/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">


    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">




    <!-- MetisMenu CSS -->

    <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">

   
    <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{!! asset('theme/css/sb-admin-2.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('theme/css/main.css') !!}">
    <link rel="stylesheet" href="{!! asset('theme/css/jquery.steps.css') !!}">

    <!-- Morris Charts CSS -->

    <link href="{!! asset('theme/vendor/morrisjs/morris.css') !!}" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="{!! asset('theme/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    

</head>

<body  id="page-top">
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

    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>

    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>
    <script src="{!! asset('theme/js/app.js') !!}"></script>
    <script src="{!! asset('theme/js/jquery.js') !!}"></script>
    <script src="{!! asset('theme/js/jquery.validate.js') !!}"></script>
    <script src="{!! asset('theme/vendor/chart.js/Chart.min.js') !!}"></script>
    <script src="{!! asset('theme/js/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! asset('theme/js/demo/chart-pie-demo.js') !!}"></script>
    <script src="{!! asset('theme/js/jquery.steps.js') !!}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>




    <!-- Bootstrap Core JavaScript -->

    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>


</body>
</html>