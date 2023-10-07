<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | Annewatt</title>
    <meta name="description" content="">

    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <link href="{!! asset('vendor/fontawesome-free/css/all.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/font-awesome/css/fontawesome.min.css') !!}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">
    {{-- <link href="{!! asset('css/normalize.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/skeleton.css') !!}" rel="stylesheet"> --}}

    <link href="{!! asset('css/bootstrap-select.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/bootstrap-select-country.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/select2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">




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
    <script src="{!! asset('vendor/jquery/jquery.js') !!}"></script>
    <script src="{!! asset('vendor/jquery/jquery.printPage.js') !!}"></script>

    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('js/sb-admin-2.min.js') !!}"></script>

    <script src="{!! asset('js/appscript.js') !!}"></script>
    <script src="{!! asset('js/printThis.js') !!}"></script>
    <script src="{!! asset('js/bootstrap-select.min.js') !!}"></script>

    <script src="{!! asset('js/bootstrap-select-country.min.js') !!}"></script>
    <script src="{!! asset('js/select2.min.js') !!}"></script>
    <script src="{!! asset('js/lga.js') !!}"></script>

    <!-- Page level plugins -->
    <script src="{!! asset('vendor/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>

    <!-- Page level custom scripts -->
    <script src="{!! asset('js/demo/datatables-demo.js') !!}"></script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>


    <script>
        mobileCheck = function() {
            let check = false;
            (function(a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                    .test(a) ||
                    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                    .test(a.substr(0, 4))) check = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        };
        if (mobileCheck()) {
            $("#accordionSidebar").addClass("toggled");
            $("#page-top").addClass("sidebar-toggle");
        } else {
            $("#accordionSidebar").removeClass("toggled");
            $("#page-top").removeClass("sidebar-toggle");
        }
    </script>
    <!-- Core plugin JavaScript-->

</body>

</html>
