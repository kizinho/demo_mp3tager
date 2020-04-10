
@section('title')
<title>MP3tager | How it Works</title>
<meta name="description" content="How it Works" />
<meta name="keywords" content="How it Works" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="How it Works" />
<meta property="og:description" content="How it Works" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="How it Works">
<meta name="twitter:description" content="How it Works">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="How it Works">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="How it Works" />

@endsection
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/policy.css')}}">
<!-- --------------Start of Body----------->
<div class="Mycontainer">
    <div class="policy-content">

        <h2>How It Works?.</h2>
        <p>
            Please watch the video and see how mp3tager works. Using mp3tager you can change ID3 tags of any mp3 files.

            You can change mp3 tags like (comments, album, artist, year, genre, cover art). We also made it possible for you to join another song or add a voice tag to any mp3 files, once done save your files and download the updated files.</p>


        <iframe width="100%" height="515" src="https://www.youtube.com/embed/AvnW4Huk8u4?autoplay=1 " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
    </div>

</div>

@endsection