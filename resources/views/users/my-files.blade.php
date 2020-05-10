@section('title')
<title>Mp3tager &mdash; {{$user->username}} Dashbord</title>
<meta  name="description" content="{{$user->username}} Dashbord">
<meta itemprop="keywords" name="keywords" content="Mp3tager &mdash; {{$user->username}} Dashbord"/>
<meta name="author" content="Mp3tager" />

@endsection
@extends('layouts.home')
@section('content')
<style>
    .media:nth-child(even){
        background-color: #E9E8EF!important
    } 
</style>
<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">



            <!--                start content-->


            <div class="col-md-8 offset-md-2" style="padding-top: 10px;">
                <div class="card">
                    <div class="card-body p-0">
                        <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">My Uploaded Task</h5>
                        <br/>

                        @foreach($task->data as $key => $t)
                        <div class="media px-3 py-2 border-bottom ">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>{{$t->title}}</b></h5>
                                <span class="text-muted">{{$t->size}} - <b>{{$t->mime_type}}</b></span>
                            </div>

                            <a class="p" href="{{url('downloads?' . $key . '='.$t->slug)}}" > <li class="fa fa-download " style="font-size: 18px; margin-top: 14px;"> {{App\Http\Controllers\Converter::number_format_short(intval($t->downloads))}}</li></a> &nbsp;&nbsp;
                            <a class="p" href="{{url('tags?' . $key . '='.$t->slug)}}" > <li class="fa fa-edit " style="font-size: 18px; margin-top: 14px;"></li></a> &nbsp;&nbsp;

                           
                            <a class="p" href="{{url('analytics/'.$t->slug)}}" > <li class="fa fa-chart-bar" style="font-size: 18px; margin-top: 14px;"></li></a>
                        </div>
                        @endforeach
                        <br/>
                        <div class="text-center">
                            @if(!empty($task->prev_page_url))
                            <a href="{{$task->prev_page_url}}" class="btn btn-primary btn-sm">&laquo; Previous</a>
                            @endif
                            @if(!empty($task->next_page_url))
                            <a href="{{ $task->next_page_url}}" class="btn btn-primary btn-sm">Next &raquo;</a>
                            @endif
                            <br/>  
                        </div>
                    </div>
                </div>
            </div>





        </div>




    </div>


    @section('script')


    @endsection
    @endsection
