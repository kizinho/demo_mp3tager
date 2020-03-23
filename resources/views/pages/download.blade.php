
@section('title')
<title>MP3 tag editor - tag mp3 files online | the best mp3 tagger 2020</title>
<meta name="description" content="Mp3Tager.com is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image." />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="MP3 tag editor - tag mp3 files online | mp3tager.com" />
<meta property="og:description" content="Mp3Tager.com is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image." />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta name="twitter:description" content="Mp3Tager.com is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image.">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="MP3 tag editor - tag mp3 files online | mp3tager.com" />
<link rel="stylesheet" href="{{asset('css/download.css')}}">
@endsection
@extends('layouts.app')
@section('content')

<div class="Mycontainer">
    <div class="msg-content">
        <p class="bg-success text-center text-white p-2 mt-5">your settings saved successfully <i class="fas fa-thumbs-up"></i></p>
  
        @foreach($details as $key => $download)
      
        <div class="download-songs " style="background-color: #d4edda; color: #000">

            <span class='badge badge-primary'> {{ $loop->iteration }}</span> {{$download->file_name}}

        </div>
        <div class="download-songs">click <a href="{{url('tag-downloads/'.$download->slug)}}"> Here  <i class="fa fa-download"></i></a> <span class="badge badge-danger">{{$download->size}}</span> to download your file or Copy the link. <a href="{{url('tags?' . $key . '='.$download->slug)}}"> Edit  <i class="fa fa-pen"></i></a></div> 
         
        @endforeach
          @if(count($details) >1 )
          <div class="download-songs" style="background-color: #000"><a href="{{url('batch-downloads?'.$url)}}"> Batch Download All  <i class="fa fa-download"></i></a> &nbsp;<span class="badge badge-primary"><a href="{{url('tags?'.$url)}}"> Edit  <i class="fa fa-pen"></i></a></span></div> 
         
        @endif
        <div class="support-btn"><a href="{{url('donate')}}">Support Us</a></div> 
    </div>

</div>
@endsection