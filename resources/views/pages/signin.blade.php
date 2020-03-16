@section('title')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mp3tag Login">
<meta name="author" content="Mp3tag">
<meta property="og:description" content="Mp3tag Login" />
<title>Mp3tag - Login Page</title>
<link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
 <style media="screen">
    body{height: 100vh;}
     .side-form-box p{margin-top:20px;text-align:center;font-size:15px;margin-left: -10px;}
     .form-field input[type='submit']{flex-basis:50%;margin: auto;margin-top: 10px;}
    </style>
@endsection

@extends('layouts.app')
@section('content')
<div class="Mycontainer">
    <div class="form-container form-container-sginin">
        <div class="side-form-box">
          <img src="{{asset('images/signin1.png')}}" alt="music band">
        </div>
        <div class="form-box">
            <form id="login">
              <div class="form-field">
                <h3 class="signin-h3">Log in and start saving your files forever</h3>
              </div>
                <div class="form-field">
                    <label><i class="far fa-user"></i></label>
                    <input type="text" id="username" placeholder="Username"  required>
                </div>
                <div class="form-field">
                    <label><i class="fas fa-key"></i></label>
                    <input type="password" id="password" placeholder="Password" required >
                </div>
             
                        <div class="form-field">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"  name="remember"  id="customCheck1" >
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div> 
                              
                      
                    </div>
                <div class="form-field">
                    <input type="submit" value="Sign in">
                </div>
                <div class="side-form-box">
                <p>not a member ? <a href="{{url('signup')}}">sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
 <script>
            /*
             login
             */
            $('#login').submit(function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        $(".modal").show();
                    },
                    complete: function () {
                        $(".modal").hide();
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