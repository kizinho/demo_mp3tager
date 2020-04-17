
@section('title')
<title>MP3tager | About Us</title>
<meta name="description" content="About Us" />
<meta name="keywords" content="About Us" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="About Us" />
<meta property="og:description" content="About Us" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="About Us">
<meta name="twitter:description" content="About Us">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="About Us">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="About Us" />

@endsection
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/policy.css')}}">
<!-- --------------Start of Body----------->
<div class="Mycontainer">
    <div class="policy-content">
        Mp3tagger.com is a fast-rising web Application that help users upload and tag their music files very easily with great quality downloads.
        The website allows user to upload as many files they have and also store it for them based on request.
        <br/> <br/>
        The mp3tagger.com web application was mostly centered on people’s interest and that's why we provides a platform for an active music upload and easy tag.
        <br/> <br/>
        Founded in 2020, mp3tagger.com is a fully registered incorporations.
    </div>

</div>

@endsection