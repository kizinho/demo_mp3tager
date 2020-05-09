@section('title')
<title>Mp3tager &mdash; {{$user->username}} Dashbord</title>
<meta  name="description" content="{{$user->username}} Dashbord">
<meta itemprop="keywords" name="keywords" content="Mp3tager &mdash; {{$user->username}} Dashbord"/>
<meta name="author" content="Mp3tager" />

@endsection
@extends('layouts.home')
@section('content')
<style>
    xmp {

        font-family: Consolas, Monaco, monospace;
        font-size: 85%;
        color: #666;
        font-weight: 400;
    }

    meter {

        display: block;
        margin: 0 auto;

        width: 100%;
        height: 25px;

        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;

        border: 1px solid #ccc;
        border-radius: 3px;

        /* Firefox */
        background: none; /* Required to get rid of the default background prop. */
        background-color: whiteSmoke;  
        box-shadow: 0 5px 5px -5px #333 inset;
    }

    meter::-webkit-meter-bar {

        background: none; /* Important to get rid of default background. */
        background-color: whiteSmoke;

        box-shadow: 0 5px 5px -5px #333 inset;
    }

    meter::-webkit-meter-optimum-value {

        transition: width .5s;
        box-shadow: 0 5px 5px -5px #999 inset;

        background-image: linear-gradient( 90deg, 
            #8bcf69 5%, 
            #e6d450 5%,
            #e6d450 15%,
            #f28f68 15%,
            #f28f68 55%,
            #cf82bf 55%,
            #cf82bf 95%,
            #719fd1 95%,
            #719fd1 100%);

        background-size: 100% 100%;
    }

    meter::-webkit-meter-optimum-value:hover {

        background-image: linear-gradient( 90deg, 
            #8bcf69 20%, 
            #e6d450 20%,
            #e6d450 40%,
            #f28f68 40%,
            #f28f68 60%,
            #cf82bf 60%,
            #cf82bf 80%,
            #719fd1 80%,
            #719fd1 100%);

        transition: width .5s;
        width: 100% !important; /* !important keyword used to override the inline style in ebkit browsers. */
    }

    meter::-moz-meter-bar {

        box-shadow: 0 5px 5px -5px #999 inset;

        background-image: linear-gradient( 90deg, 
            #8bcf69 5%, 
            #e6d450 5%,
            #e6d450 15%,
            #f28f68 15%,
            #f28f68 55%,
            #cf82bf 55%,
            #cf82bf 95%,
            #719fd1 95%,
            #719fd1 100%);

        background-size: 100% 100%;
    }

    p {

        margin: 0 auto ;
        width: 100%;
        line-height: 2.5;
    }

    .free-space {

        float: right;
    }

    .swatch {

        margin: 0; padding:0;
        margin: 5em auto;
        list-style-type: none;
        width: 100%;
        display: block;
        position: relative;
    }

    .swatch::before {

        content: '';
        width: 40%;
        height: 10px;
        outline: 0px solid #000;
        position: absolute;
        top: -20px;
        left: 0;
        border-radius: 2px;

        background-image: linear-gradient( 90deg, 
            #8bcf69 20%, 
            #e6d450 20%,
            #e6d450 40%,
            #f28f68 40%,
            #f28f68 60%,
            #cf82bf 60%,
            #cf82bf 80%,
            #719fd1 80%,
            #719fd1 100%);

    }

    .swatch__elem {

        outline: 0px solid #c00;
        float: left;
        width: 110px;
        padding-left: 5px;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .used-space {

        display: block;
        line-height: 2;
        font-size: 85%;
        color: #666;
    }

    .meter-gauge {

        border: 1px solid #ccc;
        border-radius: 3px;

        background-color: whiteSmoke;
        box-shadow: 0 5px 5px -5px #333 inset;

        width: 100%;
        height: 25px;

        display: block;
    }

    .meter-gauge > span {

        height: inherit;  
        box-shadow: 0 5px 5px -5px #999 inset;

        background-color: blue;
        background-image: linear-gradient( 90deg, 
            #8bcf69 5%, 
            #e6d450 5%,
            #e6d450 15%,
            #f28f68 15%,
            #f28f68 55%,
            #cf82bf 55%,
            #cf82bf 95%,
            #719fd1 95%,
            #719fd1 100%);

        background-size: 100% 100%;

        display: block;
        text-indent: -9999px;
    }
</style>
<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="grid-margin stretch-card">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{asset('images/user.jpg')}}" class="img-lg rounded-circle mb-2" alt="profile image"/>
                            <h4>{{ucfirst($user->username)}}</h4>
                            <p class="text-muted">{{ucfirst($user->username)}}</p>

                            <a href="{{url('add-storage')}}" class="btn btn-warning btn-sm mt-3 mb-4 text-white"> <i class="fa fa-database "></i> Preferred Storage</a>
                            <a href="{{url('add-fund')}}" class="btn btn-warning btn-sm mt-3 mb-4 text-white"> <i class="fa fa-money-bill-alt "></i> Fund top Up </a>
                            <div class="border-top pt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>{{ date('F d, Y', strtotime($user->created_at)) }}</h6>
                                        <p>Joined Date</p>
                                    </div>


                                    <div class="col-4">
                                        <h6>{{ucfirst($user->username)}}</h6>
                                        <p>Username</p>
                                    </div>
                                    <div class="col-4">
                                        <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('upload')}}"><i class="fa fa-upload "></i> Upload</a></h6>

                                    </div>
                                </div>
                            </div>
                            <div class="border-top pt-3">
                                <div class="row">

                                    <div class="col-6">
                                        <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('my-plan')}}"><i class="fa fa-sub "></i> My Plan</a></h6>
                                        <p>Basic</p>
                                    </div>

                                    <div class="col-6">
                                        <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('add-storage')}}"><i class="fa fa-sub "></i> My Storage</a></h6>
                                        <p>Google Drive</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-0">Disk Usage</h4>

                                <p>
                                    Mp3tager <span class="free-space">64.54 GB free out of 120.47 GB</span></p>

                                <meter value="55.93" min="0" max="120.47" title="GB">
                                    <div class="meter-gauge">
                                        <span style="width: 46.42%;">Disk Usage - 55.93GB out of 120GB</span>
                                    </div>
                                </meter>  

                                <ul class="swatch">
                                    <li class="swatch__elem">Mp3<span class="used-space">670.5 MB</span></li>
                                    <li class="swatch__elem">Mp4<span class="used-space">10.1 GB</span></li>
                                </ul>  


                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-6 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Account Balance</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">$0</h2>

                                        </div>
                                        <small class="text-gray"> <a href="{{url('add-fund')}}" class="text-danger"> <i class="fa fa-money-bill-alt "></i> Top Up </a>
                                        </small>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fas fa-dollar-sign text-warning icon-lg"></i>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Total Upload</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">545444</h2>

                                        </div>
                                        <small class="text-gray">Your total Uploads</small>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fas fa-upload text-warning icon-lg"></i>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Pending Task</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">545444</h2>

                                        </div>
                                        <small class="text-gray">Your Pending Task</small>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fas fa-spinner text-warning icon-lg"></i>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Completed Task</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">545444</h2>

                                        </div>
                                        <small class="text-gray">Your Completed Task</small>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fas fa-check text-warning icon-lg"></i>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12" style="padding-top: 10px;">
                        <div class="card">
                            <div class="card-body p-0">
                                <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">Recent Upload Task</h5>
                                <!-- stat 1 -->
                                <div class="media px-3 py-2 border-bottom btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">14 mb</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 2 -->
                                <div class="media px-3 py-2 border-bottom">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">34mb</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 3 -->
                                <div class="media px-3 py-2 btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">23 mb</span>
                                    </div>
                                    <li class="fa fa-download" style="font-size: 18px; margin-top: 14px;"> 0 </li>&nbsp;&nbsp;
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="text" value="{{url('signup')}}?ref={{$user->username}}" class="form-control" id="inputReferralLink">
                                <label for="inputReferralLink">Referral Link</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>



    </div>




    @endsection
