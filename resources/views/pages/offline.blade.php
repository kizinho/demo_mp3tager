@section('title')
<title>You are offline</title>
<meta name="description" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting." />
<meta name="keywords" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting." />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting." />
<meta property="og:description" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting." />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting.">
<meta name="twitter:description" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting.">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting.">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="Looks like your internet is disconnected. Please make sure you aren't marching any cable, we'll be waiting." />
<link rel="stylesheet" href="{{asset('css/error.css')}}">
@endsection

@extends('layouts.app')
@section('content')
<div class="Mycontainer">
    <div class="error-content">
        <div>
            <h1>Offline</h1>
            <p>Try turn on your internet connection, we'll be waiting..</p>
            <a onClick="window.location.reload();" href="#"><span> Click to   </span>Refresh<i class="fa fa-plug"></i></a>
        </div>
    </div>
    <div class="error-content-dup">
        <h1>Offline</h1>
        <p>Try turn on your internet connection, we'll be waiting..</p>
        <a onClick="window.location.reload();" href="#"><span> Click to   </span>Refresh<i class="fa fa-plug"></i></a>
    </div>    
</div>

@endsection