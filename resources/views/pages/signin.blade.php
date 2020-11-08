@section('title')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=" {{config('app.name')}}g Login">
<meta name="author" content=" {{config('app.name')}}">
<meta name="theme-color" content="#08192D"/>
<meta property="og:description" content=" {{config('app.name')}} Login" />
<title> {{config('app.name')}}- Login Page</title>

@endsection

@extends('layouts.app')
@section('content')

<main class="login-page">
    <section class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="p-4 text-center">
                        <h5 class="mb-5">
                            Please Log in
                        </h5>
                        <img src="{{asset('images/concept-of-remote-team.png')}}" class="img-fluid" width="300px">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="login-form">
                        @if(session()->has('message.verify'))
                        <div class="alert alert-{{ session('message.verify') }} mb-4"> 
                            {!! session('message.content') !!}
                        </div>
                        @endif
                        <form action="#" id="login">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-input">
                                <i class="input__icon fas fa-user"></i>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password"
                                       class="form-control form-input">
                                <i class="input__icon fas fa-key"></i>
                            </div>
                            <div class="custom-control custom-checkbox mb-4">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                            </div>
                            <div class="form-group"> 
                                <button id="sign" class="btn btn-success px-5 py-2">Log In</button>
                            </div>
                            <div class="mt-4 note">
                                <span><bold>Note:</bold> You can login with your Mp3tager or Naijacrawl credentials</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@section('script')
<script>
    /*
     login
     */
    $('#login').submit(function (event) {
        event.preventDefault();
         let disable = document.getElementById('sign');
                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
               disable.setAttribute('disabled', 'true');
            },
            complete: function () {
              disable.removeAttribute('disabled', 'true');
            }
        });
        jQuery.ajax({
            url: "{{url('/signin')}}",
            type: 'POST',
            data: {
                remember: jQuery('#customCheck1').val(),
                username: jQuery('#username').val(),
                password: jQuery('#password').val()
            },
            success: function (data) {
                if (data.data['status'] === 401) {
                    var message = data.data['message'];
                    toastr.error(message, {timeOut: 50000});
                    return false;
                }
                if (data.data['status'] === 200) {
                    var message = data.data['message'];
                    toastr.options.onHidden = function () {
                        window.location.href = "{{url('/upload')}}";
                    };
                    toastr.success(message, {timeOut: 50000});

                    return false;
                }
            }

        });
    });

</script> 
@endsection
@endsection