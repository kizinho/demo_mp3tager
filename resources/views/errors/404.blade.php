@section('title')
<title>Error 404</title>
<meta name="description" content="We could not find the page you are looking for. You can get back with these links" />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#d1ecf1"/>
<meta property="og:title" content="Error 404" />
<meta property="og:description" content="We could not find the page you are looking for. You can get back with these links" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta name="twitter:description" content="We could not find the page you are looking for. You can get back with these links">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com" />
<link rel="stylesheet" href="{{asset('css/error.css')}}">
@endsection
@extends('layouts.app')
@section('content')
  <!-- --------------Start of Body----------->
<div class="Mycontainer">
   <div class="error-content">
        <div>
            <h1>404</h1>
            <p>Looks like you've got lost...</p>
            <a href="{{url('/')}}"><span> go back </span>home<i class="fa fa-home"></i></a>
        </div>
   </div>
        <div class="error-content-dup">
                <h1>404</h1>
                <p>Looks like you've got lost...</p>
                <a href="{{url('/')}}"><span> go back </span>home<i class="fa fa-home"></i></a>
        </div>

</div>

@endsection