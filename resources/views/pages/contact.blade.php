
@section('title')
<title>MP3tager | Contact Us</title>
<meta name="description" content="Contact Us" />
<meta name="keywords" content="Contact Us" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Contact Us" />
<meta property="og:description" content="Contact Us" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Contact Us">
<meta name="twitter:description" content="Contact Us">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="Contact Us">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="Contact Us" />

<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection
@extends('layouts.app')
@section('content')
 <!-- --------------Start of Body----------->
<div class="Mycontainer">
    <div class="contactus-content">
    <form action="" class="contact-form">
    <div class="conatact-data-field">
        <span>Your name *</span>
        <input type="text" name="" value=""  class="d-bl" placeholder="Type your name" required>
    </div>
    <div class="conatact-data-field">
        <span>Your Email *</span>
        <input type="email" name="" value=""  class="d-bl" placeholder="Type your mail" required>
    </div>
    <div class="conatact-data-field">
        <span>Your message *</span>
        <textarea name="name" rows="8" cols="40" placeholder="Type your message" required></textarea>
    </div>
    <div class="conatact-data-field conatact-data-btn">
        <input type="submit" name="" value="Send" class="contact-sub-btn">
        
    </div>
    </form>
</div>


@endsection