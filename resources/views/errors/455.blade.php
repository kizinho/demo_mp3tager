@section('title')
<title>File not Found</title>
<meta name="description" content="Looks like file has been removed" />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#d1ecf1"/>
<meta property="og:title" content="File not Found" />
<meta property="og:description" content="Looks like file has been removed" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="MP3 tag editor - tag mp3 files online | mp3tager.com">
<meta name="twitter:description" content="Looks like file has been removed">
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
<div class="Mycontainer">
   <div class="notfound-content"></div>
        <div class="notfound-content-dup">
            <h1>Not Found !</h1>
            <p>Looks like file has been removed. :'(</p>
            <a href="{{url('upload')}}"><span> go back  to </span>Upload<i class="fas fa-upload"></i></a>
        </div>
</div>

@endsection