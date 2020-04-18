
@section('title')
<title>Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files {{date('Y')}}</title>
<meta name="description" content="Upload and use this free online editor tool for editing mp3 files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files " />
<meta name="keywords" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files" />
<meta property="og:description" content="Upload and use this free online editor tool for editing mp3 files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files " />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files">
<meta name="twitter:description" content="Upload and use this free online editor tool for editing mp3 files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files ">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 files" />
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
        <div class="download-songs">click <a href="{{url('tag-downloads/'.$download->slug)}}"> Here  <i class="fa fa-download"></i> </a> to download your file
            <span class="badge badge-danger">{{$download->size}}</span> 
            <button class="badge badge-primary down-btn-item clip-btn"> copy <i class="fas fa-copy"></i></button> link to clipborad 
            <input type="text" style="opacity: 0;">
            <br/>
            <a href="{{url('tags?' . $key . '='.$download->slug)}}"> Edit  <i class="fa fa-pen"></i></a>
            <br/> <br/>
            <audio controls style="width:100%">
                <source src="{{url('tag-downloads/'.$download->slug)}}" type="audio/ogg">
                <source src="{{url('tag-downloads/'.$download->slug)}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <br/> <br/>
            <textarea cols="50" rows="5" class="embd-txt" style="width:100%">
                <audio controls style="width:100%">
                    <source src="{{url('tag-downloads/'.$download->slug)}}" type="audio/ogg">
                    <source src="{{url('tag-downloads/'.$download->slug)}}" type="audio/mpeg">
                  Your browser does not support the audio element.
                  </audio>

            </textarea>

            <button class="embd-btn">copy embedded code</button>
        </div> 


        @endforeach
        @if(count($details) >1 )
        <div class="download-songs" style="background-color: #000"><a href="{{url('batch-downloads?'.$url)}}"> Batch Download All  <i class="fa fa-download"></i></a> &nbsp;<span class="badge badge-primary"><a href="{{url('tags?'.$url)}}"> Edit  <i class="fa fa-pen"></i></a></span></div> 

        @endif

        <div class="support-btn"><a href="{{url('donate')}}">Support Us</a></div> 
        <br/> <br/>
    </div>

</div>
@section('script')
<script>
    $(document).ready(function () {
        $('.clip-btn').click(function () {
            var targetTxt = $(this).next();
            var targetLink = $(this).prev().prev();
            var linKVal = targetTxt.val();
            targetTxt.val(targetLink.attr('href'))
            var copyText = targetTxt;
            copyText.select();
            document.execCommand("copy");
            let message = "Copied the text: " + copyText.val();
            toastr.success(message, {timeOut: 50000});
        })

        $('.embd-btn').click(function () {
            var targetTextArea = $(this).prev();
            var copyTextArea = targetTextArea;
            copyTextArea.select();
            document.execCommand("copy");
            let message = "Embedded Code Copied Successfully , you can use it on your website for post";
            toastr.success(message, {timeOut: 50000});
        })



    })
</script>
@endsection
@endsection