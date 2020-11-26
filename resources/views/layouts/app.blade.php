n
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | Annewatt</title>
    <!-- Bootstrap Core CSS -->
    <link href="{!!  asset('vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{!!  asset('css/sb-admin-2.css') !!}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style=" display: block; text-align: center; text-transform:uppercase ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @include('theme.footer')
        </main>
    </div>

    <script src="{!!  asset('vendor/jquery/jquery.min.js') !!}"></script>

    <script src="{!!  asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!!  asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    <script src="{!!  asset('js/sb-admin-2.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="{!!  asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
</body>

</html>
