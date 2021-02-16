<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{url('/manifest.json')}}">
    <!-- Favicons -->
    <link rel="icon" href="{{url(config('app.logo'))}}">
    <link rel="shortcut icon" href="{{url(config('app.logo'))}}">
    <link rel="apple-touch-icon"   href="{{url(config('app.logo'))}}">
    <link rel="apple-touch-icon"  href="{{url(config('app.logo'))}}">
    <link rel="apple-touch-icon"  href="{{url(config('app.logo'))}}">
    <link rel="apple-touch-icon"  href="{{url(config('app.logo'))}}">
    @yield('title')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font.css')}}">
     <link rel="stylesheet" href="{{asset('assets/new/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link href="{{ asset('sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <style>
        .toast {
            opacity: 0.9!important;
        }
        .dropzone {
            border: 3px dashed  {{config('app.color_site')}};

        }
        .btn-success {
            background-color: {{config('app.color_site')}} !important;
            border-color: {{config('app.color_site')}} !important;
        }
        .logo .logo__icon {
            color: {{config('app.color_site')}} !important;
        }
        a.text-ads {
            border: 1px solid #212121!important;
            height: 90%!important;
            display: block!important;
            margin-bottom: 6px!important;
            display: -moz-box!important;
            display: -ms-flexbox!important;
            display: -webkit-flex!important;
            display: flex!important;
            text-align: center!important;
            line-height: 28px!important;
            align-items: center!important;
            justify-content: center!important;
            border-radius: 30px!important;
            -webkit-box-sizing: border-box!important;
            -moz-box-sizing: border-box!important;
            box-sizing: border-box!important;
            white-space: nowrap!important;
            overflow: hidden!important;
            text-overflow: ellipsis!important;
            text-decoration: none!important;
            color:#222!important;
            font-weight: normal!important;
            font-family: arial,sans-serif!important;
            font-size: 20px!important;
        }
    </style>

</head>
<body>
    @include('layouts.nav')
    @yield('content')
    <div class="modal" style="display: none">
        <div class="mcenter">
            <img src="{{asset('images/reload.gif')}}"  >
        </div>
    </div>
    @include('layouts.footer')
    <script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('script/aos.js')}}"></script>

    <script src="{{asset('script/script.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js')}}"></script>

    <script>
$(".deleted").on("submit", function () {

    return confirm("Are you sure?");
});
    </script>

    <script>
        $(".deleted-list").on("submit", function () {

            return confirm("Are you sure?");
        });
    </script>
    <script>
        $(".update").on("click", function () {

            return confirm("Are you sure? this will download latest version of the tager");
        });
          $(".cache").on("click", function () {

            return confirm("Are you sure? this will clear all your login and cached datas");
        });
    </script>

    @if(session()->has('message.level'))
    <script type="text/javascript">
        swal({
            title: "{{ session('message.level') }}",
            html: true,
            text: "<span style='color:{{ session('message.color') }};font-size:20px;margin:10px'>{!! session('message.content') !!}",
            timer: 10000,
            type: "{{ session('message.level') }}",
            confirmButtonColor: "#DA0353"
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
    </script>
    @endif

    @yield('script')
</body>
</html>
