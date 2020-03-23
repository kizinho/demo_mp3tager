
@section('title')
<title>MP3 tag editor - tag mp3 files online | the best mp3 tagger 2020</title>
<meta name="description" content="Mp3Tager.com is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image." />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#d1ecf1"/>
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
<link rel="stylesheet" href="{{asset('css/wallet.css')}}">
@endsection
@extends('layouts.app')
@section('content')

  <!-- --------------Start of Body----------->
<div class="Mycontainer">
      <div class="btc-container">
        <header>
          <h3>Desposite Bitcoin</h3>
          </header>
            <div class="text-center"><strong>Scan to pay</strong></div>
          <div class="qr-img">
          
              <img height="300" width="300" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=1D3KBBq4BCbud5jffEq9SpJJSa4P5rUJF9?amount={{$amount_convert}}"/></td>
                                    
              
              
          </div>
      
      
      <div class="wallet-address">Amount: <strong> {{$amount_convert}} BTC </strong></div>
      <div class="wallet-address"><strong>1D3KBBq4BCbud5jffEq9SpJJSa4P5rUJF9</strong></div>
      <p>You can send Bitcoin to the above address</p>
      </div>
</div>
@endsection