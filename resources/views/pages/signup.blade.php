@section('title')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mp3tag Register">
<meta name="author" content="Mp3tag">
<meta name="theme-color" content="#08192D"/>
<meta property="og:description" content="Mp3tag Register" />
<title>Mp3tag - Register Page</title>
<link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
@endsection

@extends('layouts.app')
@section('content')
<div class="Mycontainer">
    <div class="form-container">
        <div class="side-form-box">
            <img src="{{asset('images/signup.jpg')}}" alt="band">
            <p class="signup-p">already member ? <a href="{{url('signin')}}">sign in</a></p>
        </div>
        <div class="form-box">
            <form id='register'>

                <div class="form-field">
                    <h3>Join the amazing world of Mp3tag Editing</h3>
                    <br>
                    <p>create an account and let us save your file forever </p>
                </div>
                <div class="form-field form-field-sigup">
                    <label><i class="far fa-user"></i></label>
                    <input type="hidden"  id="actions" value="tag">
                    <input type="text" id="username" placeholder="Username"  required>
                </div>
                <div class="form-field form-field-sigup">
                    <label><i class="far fa-envelope"></i></label>
                    <input type="email" id="email" placeholder="mail"  required>
                </div>
                <div class="form-field form-field-sigup">
                    <label><i class="fas fa-key"></i></label>
                    <input type="password" id="password" placeholder="Password" required >
                </div>
                <div class="form-field form-field-sigup">
                    <label><i class="fas fa-lock"></i></label>
                    <input type="password" id="confirm_password" placeholder="confirm Password" required >
                </div>
                
            <input type='hidden' id="ref" value="{{$ref}}" class="form-control">
                <div class="form-field form-field-sigup">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="customCheck1" class="custom-control-input" id="customCheck1" onclick="if (this.checked)">
                        <label class="custom-control-label" for="customCheck1">I agree to all <a class="p" href="{{url('tos')}}">Terms</a></label> 
                    </div> 
</div>
            
        <div class="form-field form-field-sigup">
            <input type="submit" value="Sign Up">
        </div>
    </form>
</div>
</div>
</div>
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