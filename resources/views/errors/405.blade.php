@section('title')
<title>Not  Authorized</title>
<meta name="description" content="Not  Authorized" />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#d1ecf1"/>
<meta property="og:title" content="File not Found" />
<meta property="og:description" content="Not  Authorized" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta name="twitter:description" content="Not  Authorized">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com" />
<link rel="stylesheet" href="{{asset('css/notfound.css')}}">
  <!-- --------------Start of Body----------->
  @endsection
@extends('layouts.app')
@section('content')
<div class="Mycontainer">
   <div class="notfound-content"></div>
        <div class="notfound-content-dup">
            <h1>Invalid User!</h1>
            <p>You are not Authorized to use this script :'(</p>
            <a href="{{url('https://mp3tager.com')}}"><span> Contact mp3tager </span></a>
        </div>
</div>

@endsection