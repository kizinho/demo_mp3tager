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

    meter-bar {

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

    meter-bar::-webkit-meter-bar-bar {

        background: none; /* Important to get rid of default background. */
        background-color: whiteSmoke;

        box-shadow: 0 5px 5px -5px #333 inset;
    }

    meter-bar::-webkit-meter-bar-optimum-value {

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

    meter-bar::-webkit-meter-bar-optimum-value:hover {

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

    meter-bar::-moz-meter-bar-bar {

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

    .meter-bar-gauge {

        border: 1px solid #ccc;
        border-radius: 3px;

        background-color: whiteSmoke;
        box-shadow: 0 5px 5px -5px #333 inset;

        width: 100%;
        height: 25px;

        display: block;
    }

    .meter-bar-gauge > span {

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
                                        <p>
                                            <!--                                            check plan-->
                                            Basic
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('add-storage')}}"><i class="fa fa-sub "></i> My Storage</a></h6>
                                        <p>
                                            @if(empty($user_storages))  No Storage @else {{$user_storages->user_storage->name}}  @endif    

                                        </p>
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
                                <!--                                 check plan     -->
                                <p>
                                    @if(empty($user_storages))  No Storage @else {{$user_storages->user_storage->name}}  @endif 
                                    <span class="free-space">
                                        @if(empty($user_storages))  
                                        0 Mb

                                        @else 

                                        {{$user_spaces}} free out of  {{$user_storages->size}} Mb
                                        @endif 

                                    </span></p>
                                @if(empty($user_storages))  
                                <meter-bar value="0" min="0" max="0" title="MB">
                                    <div class="meter-bar-gauge">
                                        <span style="width: 0%;">Disk Usage - 0 MB out of 0 MB</span>
                                    </div>
                                </meter-bar>  

                                @else 

                                <meter-bar value="{{$user_spaces_string}}" min="0" max="{{$user_storages->size}}" title="MB">
                                    <div class="meter-bar-gauge">
                                        <span style="width: {{$user_load_space}}%;">Disk Usage - {{$user_spaces}} out of {{$user_storages->size}} Mb</span>
                                    </div>
                                </meter-bar>  
                                @endif 
                                <ul class="swatch">
                                    @if(!empty($user_ex[0]))
                                    <li class="swatch__elem">{{$user_ex[0]}} 
                                        <span class="used-space">{{$user_ex_size[0]}}</span></li>
                                    @endif
                                    @if(!empty($user_ex[1]))
                                    <li class="swatch__elem">{{$user_ex[1]}}<span class="used-space">{{$user_ex_size[1]}}</span></li>
                                    @endif
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
                                            <h2 class="mb-0">{{number_format($total_task)}}</h2>

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
                                            <h2 class="mb-0">{{number_format($pending_task)}}</h2>

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
                                            <h2 class="mb-0">{{number_format($completed_task)}}</h2>

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
                                <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">
                                    @if(empty($recent_task)) No Recent Uploaded Task  @else  Recent Uploaded Task @endif
                                </h5>
                                @foreach($recent_task as $key => $task)
                                <div class="media px-3 py-2 border-bottom ">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>{{$task->title}}</b></h5>
                                        <span class="text-muted">{{$task->size}} - <b>{{$task->mime_type}}</b></span>
                                        <br/>
                                        <b>
                                            <span class="text-muted">{{ date('F d, Y', strtotime($task->created_at)) }} {{ date('g:i A', strtotime($task->created_at)) }}</span>
                                        </b>
                                    </div>
                                    <a class="p" href="{{url('downloads?' . $key . '='.$task->slug)}}" > <li class="fa fa-download " style="font-size: 18px; margin-top: 14px;"> {{App\Http\Controllers\Converter::number_format_short(intval($task->downloads))}}</li></a> &nbsp;&nbsp;
                                    <a class="p" href="{{url('tags?' . $key . '='.$task->slug)}}" > <li class="fa fa-edit " style="font-size: 18px; margin-top: 14px;"></li></a> &nbsp;&nbsp;

                                    <a class="p" href="{{url('analytics/'.$task->slug)}}" > <li class="fa fa-sort-amount-up" style="font-size: 20px; margin-top: 14px;"></li></a>
                                </div>
                                @endforeach
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
