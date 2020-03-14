<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset('logo/logo.png') }}">
    <link rel="shortcut icon" href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"   href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    @yield('title')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/font.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link href="{{ asset('sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <style>
        .toast {
            opacity: 0.9!important;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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

    @if(session()->has('message.level'))
    <script type="text/javascript">
        swal({
            title: "{{ session('message.level') }}",
            html: true,
            text: "<span style='color:{{ session('message.color') }};font-size:20px;margin:10px'>{!! session('message.content') !!}",
            timer: 10000,
            type: "{{ session('message.level') }}",
            confirmButtonColor: "#0000cc"
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
    </script>
    @endif
    @yield('script')
</body>
</html>
