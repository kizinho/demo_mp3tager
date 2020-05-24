@section('title')
<title>Mp3tager &mdash; {{$user->username}} Dashbord</title>
<meta  name="description" content="{{$user->username}} Dashbord">
<meta itemprop="keywords" name="keywords" content="Mp3tager &mdash; {{$user->username}} Dashbord"/>
<meta name="author" content="Mp3tager" />

@endsection
@extends('layouts.home')
@section('content')

<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">


            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Strat of inside search bar -->
                        <div class="data-field data-field-search">
                            <p>Please enter a valid youtube link for your mp3</p>
                            <form id="link">
                                <input type="hidden"  id='user_id' value="{{ $user->id }}">
                                <input class="form-control" id="url" placeholder="https://youtu.be/mRQTIrmFOEA" required>
                                <input class="form-control" value="mp3" type="hidden" id="action" placeholder="" required>
                                <br/>
                                <div class="text-center">
                                    <button type="submit"  class="btn btn-success" id="submit-file"  style="background:#CD6133;color:#fff">Go <i class="fas fa-sign-in-alt"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- End of inside search bar -->
                    </div>

                </div>    </div>

        </div>




    </div>


    @section('script')
    <script>
        /*
         link
         */
        $('#link').submit(function (event) {
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
                url: "{{url('/upload-link')}}",
                type: 'POST',
                data: {
                    url: jQuery('#url').val(),
                    user_id: jQuery('#user_id').val(),
                    action: jQuery('#action').val()
                },
                success: function (responseText) {
                    if (responseText.data['status'] === 401) {
                        jQuery.each(responseText.data['message'], function (key, value) {
                            var message = ('' + value + '');
                            toastr.options.onHidden = function () {

                            };
                            toastr.error(message, {timeOut: 50000});
                        });

                        return false;
                    }
                    if (responseText.data['status'] === 422) {
                        var message = responseText.data['message'];
                        toastr.options.onHidden = function () {

                        };
                        toastr.error(message, {timeOut: 50000});

                        return false;
                    }

                    if (responseText.data['status'] === 200) {
                        let url = responseText.data['data'];
                        window.location.href = "{{url('/tags')}}?" + url;
                        return false;
                    }
                }

            });
        });

    </script> 
    @endsection
    @endsection
