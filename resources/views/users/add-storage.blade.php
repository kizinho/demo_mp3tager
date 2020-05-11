@section('title')
<title>Mp3tager &mdash; {{$user->username}} Dashbord</title>
<meta  name="description" content="{{$user->username}} Dashbord">
<meta itemprop="keywords" name="keywords" content="Mp3tager &mdash; {{$user->username}} Dashbord"/>
<meta name="author" content="Mp3tager" />

@endsection
@extends('layouts.home')
@section('content')
<style>


    .storage-content{
        text-align: center;
        margin-top: 60px;
    }
    .storage-content button ,.storage-content .dropdown-menu a{
        width: 250px !important;
        text-transform: capitalize;
    }
    .storage-content p {
        background: #fff;
        font-size: 24px;
        text-transform: capitalize;
    }
    .dropdown-menu {
        text-align: center;
    }
    .dropdown-menu a{
        padding:10px 20px !important;
        color: #black;
    }
    .server-contain, .gdrive-contain {
        margin: auto;
        width: 250px ;
        background: #fff;
        border-radius: 3px;
        margin-top: 50px;
        margin-bottom: 50px;
        display: none;
        position: relative;
    }
    .server-contain .btn-close, .gdrive-contain .btn-close{
        position: absolute;
        top:10px;
        right: 10px;
        cursor: pointer;
        border:1px solid #555;
        padding:3px 5px;
    }
    .server-contain .btn-close:hover, .gdrive-contain .btn-close:hover{
        color: #fff;
        border-color:#fff;
    }


    .server-contain header , .gdrive-contain  header{
        background:#ff7675;
        width: 100%;
        color: #fff;
        text-transform: capitalize;
        padding:10px 0;
        font-size: 18px;
        border-radius: 3px 3px 0 0;
    }
    .server-contain p , .gdrive-contain  p{
        font-size: 16px;
        padding: 20px 20px 0px 20px;
        color:#777;
    }
    .gdrive-contain label{
        color:#777;
        font-size: 15px;
    }
    .server-contain input[type='submit'],.gdrive-contain  input[type='submit']{
        width: 100%;
        background: #ccae62;
        height: 40px;
        color: #fff;
        border:none;
        text-transform: capitalize;
        border-radius:0 0 3px 3px ;
        outline: none;
    }
    .showContent{
        display: block;
    }

    .storage-selec{
        width: 150px ;
        text-align: center;
        padding:5px 20px;
        border:1px solid #ddd;
        margin-bottom: 15px;
        background: #ccae62;
        color:#fff;
        outline: none;
        cursor: pointer;
        border-radius: 3px;
        padding-left: 45px;
    }

    .gd-mail{
        width: 240px;
        border:1px solid #ccc;
        padding:5px 10px;
        margin-bottom: 20px;
        border-radius: 2px;
        outline: none;
        font-size: 14px;
        color:#777;
    }
    .gd-mail::placeholder{
        font-size: 14px;
    }
    .gd-mail:focus{

        border-color:#ccae62;
    }

</style>
<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">


            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <!--                start content-->



                        <!-- --------------Start of Body----------->

                        <div class="storage-content">
                            <!-- <div class="d-nn"> -->
                            <p>storage</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(empty($user_storages))  choose your storage  @else  <span class="text-success"> Current [{{$user_storages->user_storage->name}}] </span>    @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($storages as $storage)
                                    <a class="dropdown-item  @if($storage->id == 1) our-server @else gdrive @endif   @if(empty($user_storages))    text-black  @else @if($storage->id == $user_storages->user_storage_id )  text-success  @else text-black @endif     @endif " href="#">{{$storage->name}}</a>
                                    <hr>
                                    @endforeach

                                </div>
                            </div>
                            <!-- </div> -->
                            <form id='server'>
                                <input type="hidden" id="storage" value="{{$storages[0]->id}}">
                                <input id="action" value="server" type="hidden">
                                <div class="server-contain">
                                    <header>our server</header>
                                    <i class="fa fa-times btn-close"></i>
                                    <p>you've chosed our server to
                                        save your data
                                    </p>
                                    <input type="hidden" id="size" value="700">
                                    
                                    <input type="submit" class="btn btn-success" value="save and close">
                                </div>
                            </form>
                            <form id="drive">
                                <input type="hidden" id="storage_drive" value="{{$storages[1]->id}}">
                                <input id="action" value="drive" type="hidden">
                                <div class="gdrive-contain">
                                    <header>google drive</header>
                                    <i class="fa fa-times btn-close"></i>
                                    <p>
                                        we need to authenticate with
                                        your google drive account
                                    </p>
                                    <input type="submit" class="btn btn-success" value="Click to Procceed">
                                </div>
                            </form>
                        </div>




                        <!--             end content           -->
                    </div>
                </div>
            </div>
        </div>




    </div>


    @section('script')
    <script>
        $(document).ready(function () {


            $("#chk-list-hide").click(function () {
                $(".nav-links ul").toggleClass('fade-nav');
            });



            $('.our-server').click(function () {

                $('.server-contain').toggleClass('showContent');
                $('.gdrive-contain').removeClass('showContent');
            });

            $('.gdrive').click(function () {
                $('.gdrive-contain').toggleClass('showContent');
                $('.server-contain').removeClass('showContent');
            });
            $('.btn-close').click(function () {
                $('.gdrive-contain').removeClass('showContent');
                $('.server-contain').removeClass('showContent');
            });
        });


    </script>
    <script>
        /*
         server
         */
        $('#server').submit(function (event) {
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
                url: "{{url('/add-storage')}}",
                type: 'POST',
                data: {
                    size: jQuery('#size').val(),
                    storage: jQuery('#storage').val(),
                    action: jQuery('#action').val()
                },
                success: function (data) {
                    if (data.data['status'] === 401) {
                        jQuery.each(data.data['message'], function (key, value) {
                            var message = ('' + value + '');
                            toastr.error(message, {timeOut: 50000});
                        });
                        return false;
                    }

                    if (data.data['status'] === 200) {
                        var message = data.data['message'];
                        toastr.options.onHidden = function () {
                            window.location.href = "{{url('/add-storage')}}";
                        };
                        toastr.success(message, {timeOut: 50000});

                        return false;
                    }
                }

            });
        });</script> 

    <script>
        /*
         drive
         */
        $('#drive').submit(function (event) {
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
                url: "{{url('/add-drive')}}",
                type: 'POST',
                data: {
                    storage: jQuery('#storage_drive').val()
                },
                success: function (data) {
                    if (data.data['status'] === 401) {
                        jQuery.each(data.data['message'], function (key, value) {
                            var message = ('' + value + '');
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
                        var message = data.data['message'];
                        toastr.options.onHidden = function () {
                            window.location.href = "{{url('/add-storage')}}";
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
