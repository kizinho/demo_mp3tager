@section('title')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mp3tag Register">
<meta name="author" content="Mp3tag">
<meta name="theme-color" content="#08192D"/>
<meta property="og:description" content="Mp3tag Register" />
<title>Mp3tag - Register Page</title>
@endsection

@extends('layouts.app')
@section('content')
<main class="signup-page">
        <section class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="p-4">
                            <h5 class="mb-5 text-center">
                                Create an account
                            </h5>
                            <img src="{{asset('images/developers-doing-discussion-about-wireframe-1.jpg')}}" class="img-fluid"
                                width="500px">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="login-form">
                            <form action="#" id='register'>
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-input">
                                    <i class="input__icon fas fa-user"></i>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control form-input">
                                    <i class="input__icon fas fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-input">
                                    <i class="input__icon fas fa-key"></i>
                                </div>
                                <div class="form-group">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="cpassword" name="cpassword" id="cpassword"
                                        class="form-control form-input">
                                    <i class="input__icon fas fa-key"></i>
                                </div>
                                <input type='hidden' id="ref" value="{{$ref}}" class="form-control">
                                <div class="form-group">
                                    <button class="btn btn-primary px-5 py-2">Sign Up</button>
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
     register
     */
    $('#register').submit(function (event) {
        event.preventDefault();
        var checkbox = document.getElementById("customCheck1");
        if (checkbox.checked) {
        } else {
            toastr.warning("You Must Agree To Our Terms, Click the CheckBox", {timeOut: 50000});
            return false;
        }
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
            url: "{{url('/signup')}}",
            type: 'POST',
            data: {
                username: jQuery('#username').val(),
                email: jQuery('#email').val(),
                password: jQuery('#password').val(),
                confirm_password: jQuery('#confirm_password').val(),
                actions: jQuery('#actions').val(),
                ref: jQuery('#ref').val()
            },
            success: function (data) {
                if (data.data['status'] === 401) {
                    jQuery.each(data.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            //window.location.href = "{{url('/register')}}";
                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                 if (data.data['status'] === 422) {
                        var message = data.data['message'];
                        toastr.error(message, {timeOut: 50000});

                        return false;
                    }
                
                if (data.data['status'] === 200) {
                    jQuery.each(data.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            window.location.href = "{{url('/dashboard')}}";
                        };
                        toastr.success(message, {timeOut: 50000});
                    });
                    return false;
                }
            }

        });
    });</script> 
@endsection
@endsection