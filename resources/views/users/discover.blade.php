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

    .search {
        width: 100%;
        display: flex;
    }

    .searchTerm {
        width: 100%;
        border: 3px solid #DA0353;
        border-right: none;
        padding: 5px;
        height: 36px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: #9DBFAF;
    }

    .searchTerm:focus{
        color: #DA0353;
    }

    .searchButton {
        width: 40px;
        height: 36px;
        border: 1px solid #DA0353;
        background: #DA0353;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap{
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
    }
    [type="checkbox"]:not(:checked) + label,
    [type="checkbox"]:checked + label {
        position: relative;
        padding-left: 1.95em;
        cursor: pointer;
    }

    /* checkbox aspect */
    [type="checkbox"]:not(:checked) + label:before,
    [type="checkbox"]:checked + label:before {
        content: '';
        position: absolute;
        left: 0; top: 0;
        width: 1.25em; height: 1.25em;
        border: 2px solid #ccc;
        background: #fff;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
    }
    /* checked mark aspect */
    [type="checkbox"]:not(:checked) + label:after,
    [type="checkbox"]:checked + label:after {
        content: '\2713\0020';
        position: absolute;
        top: .15em; left: .22em;
        font-size: 1.3em;
        line-height: 0.8;
        color: #DA0353;
        transition: all .2s;
        font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
    }
    /* checked mark aspect changes */
    [type="checkbox"]:not(:checked) + label:after {
        opacity: 0;
        transform: scale(0);
    }
    [type="checkbox"]:checked + label:after {
        opacity: 1;
        transform: scale(1);
    }
    /* disabled checkbox */
    [type="checkbox"]:disabled:not(:checked) + label:before,
    [type="checkbox"]:disabled:checked + label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
    }
    [type="checkbox"]:disabled:checked + label:after {
        color: #999;
    }
    [type="checkbox"]:disabled + label {
        color: #aaa;
    }
    /* accessibility */
    [type="checkbox"]:checked:focus + label:before,
    [type="checkbox"]:not(:checked):focus + label:before {
        border: 2px dotted blue;
    }

    /* hover style just for information */
    label:hover:before {
        border: 2px solid #DA0353!important;
    }
</style>
<div class="main-panel">

    <div class="content-wrapper">
        <div class="row">


            <!--                start content-->
            <div class="col-md-4 offset-md-4" style="padding-top: 10px;">
                <form>
               
                    <div class="wrap">
                        <div class="search">
                            <input type="text"  name="q" value="{{request('q')}}" class="searchTerm" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <br/><br/>

            <div class="col-md-8 offset-md-2" style="padding-top: 10px;">
                <div class="card">
                    <div class="card-body p-0">

                        <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">
                            @if(empty($task->data)) @if($search == 'q') Search Result @else  No Discovery Yet @endif  @else  Discoveries FIles @endif  
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <ul class="nav float-right" id="myPillTab" role="tablist">

                                    <li class="nav-item">
                                        <form  class="form-group"  method=POST name=opts action="{{url('discover')}}" enctype="multipart/form-data">
                                            @csrf
                                            <td>
                                                <select name=type class="inpts form-control" style="height:36px!important;border: 1px solid #DA0353;" onchange="document.opts.submit();">
                                                    <option value="" selected disabled>Sort by</option>
                                                    <option value="1" {{$type == '1' ? 'selected' : '' }} >By Mp3tager Server</option>
                                                    <option value="2" {{$type == '2' ? 'selected' : '' }}>Google Server</option>
                                                    <option value="mp3" {{$type == 'mp3' ? 'selected' : '' }}> Mp3</option>
                                                    <option value="mp4" {{$type == 'mp4' ? 'selected' : '' }} > Mp4</option>
                                                    <option value="pending" {{$type == 'pending' ? 'selected' : '' }} > Pending</option>
                                                    <option value="completed" {{$type == 'completed' ? 'completed' : '' }}> Completed</option>
                                                    <option value="size" {{$type == 'size' ? 'selected' : '' }}> Size</option>
                                                    <option value="week" {{$type == 'week' ? 'selected' : '' }}> This Week</option>
                                                    <option value="download" {{$type == 'download' ? 'selected' : '' }}> Downloads</option>
                                                    <option value="last" {{$type == 'last' ? 'selected' : '' }}> Last Download</option>


                                                </select>
                                        </form>
                                    </li>

                                    </span>

                                </ul>

                            </div>
                        </h5>
                        <div class="clearfix"></div>   


                        @forelse($task->data as $key => $t)

                        <div class="media px-3 py-2 border-bottom ">
                            <div class="media-body">

                                <h5 class="mt-0 mb-1 font-size-22 font-weight-normal">  
                                    <a class="p" href="{{url('analytics/'.$t->slug)}}" >   <b>{{$t->title}}</b></a></h5>
                                <span class="text-muted">{{$t->size}} - <b>{{$t->mime_type}}</b></span>
                                <br/>
                                <b>
                                    <span class="text-muted">{{ date('F d, Y', strtotime($t->created_at)) }} {{ date('g:i A', strtotime($t->created_at)) }}</span>
                                </b>
                                <br/>
                                <b>
                                    <span class="text-primary fa fa-user">  @if(empty($t->user)) Guest @else {{ucfirst($t->user->username)}} @endif</span>
                                </b>
                            </div>

                            <a class="p" href="{{url('downloads?' . $key . '='.$t->slug)}}" > <li class="fa fa-download " style="font-size: 18px; margin-top: 14px;"> {{App\Http\Controllers\Converter::number_format_short(intval($t->downloads))}}</li></a> &nbsp;&nbsp;

                            <a class="p" href="{{url('analytics/'.$t->slug)}}" > <li class="fa fa-chart-bar" style="font-size: 18px; margin-top: 14px;"></li></a>

                        </div>
                        @empty
                        <div class="text-center"> No Result </div>
                        @endforelse
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
