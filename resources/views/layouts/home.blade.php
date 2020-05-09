<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Main Page Title -->
    <!-- Favicons -->
    <link rel="icon" href="{{asset('logo/logo.png') }}">
    <link rel="shortcut icon" href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"   href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    <link rel="apple-touch-icon"  href="{{asset('logo/logo.png') }}">
    @yield('title')
      <link rel="stylesheet" href="{{asset('assets/new/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/new/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/new/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/new/css/style.css')}}">
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link href="{{ asset('sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&amp;display=swap" rel="stylesheet">
    
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
        @include('layouts.navuser')
        @yield('content')
      
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="{{asset('images/reload.gif')}}"  >
                </div>
            </div>
        @include('layouts.footeruser')
  <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 <script src="{{ asset('assets/new/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('assets/new/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/new/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/new/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/new/js/misc.js')}}"></script>
  <script src="{{ asset('assets/new/js/settings.js')}}"></script>
  <script src="{{ asset('assets/new/js/todolist.js')}}"></script>

     <script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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
 <script>
//
///*Register Service Worker if it is supported*/
//if ('serviceWorker' in navigator) {
//    window.addEventListener('load', () => {
//        navigator.serviceWorker.register('/mp3sw.js').then(event => {
//        }).catch((err) => {
//            console.log(err);
//        });
//    });
//} else {
//    console.log('No service worker');
//}

    </script>
    @yield('script')
</body>
</html>
