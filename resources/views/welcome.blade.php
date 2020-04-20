@section('title')
<title>MP3tager - mp3 and Mp4  files online mp3 and Mp4 tag editor | the best mp3 voice joiner {{date('Y')}}</title>
<meta name="description" content="Mp3Tager.com is a free online editor that you can use to edit mp3, Mp4 , join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files " />
<meta name="keywords" content="join voice tag, Mp4 tag, mp3 tag, mp3tag, join two mp3, voice tag" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="MP3tager editor - tag mp3 and Mp4  files online | the best mp3 voice joiner" />
<meta property="og:description" content="Mp3Tager.com is a free online editor that you can use to edit mp4, mp3, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files " />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="MP3tager editor - tag mp3 and Mp4  files online | the best mp3 voice joiner">
<meta name="twitter:description" content="Mp3Tager.com is a free online editor that you can use to edit mp4, mp3, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files ">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="MP3tager editor - tag mp3 and Mp4  files online | the best mp3 voice joiner">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="MP3tager editor - tag mp3 and Mp4  files online | the best mp3 voice joiner" />

<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Editor",
    "name": "MP3tager - mp3 and Mp4  files online mp3 tag editor | the best mp3 voice joiner {{date('Y')}}",
    "description": "Mp3Tager.com is a free online editor that you can use to edit mp4, mp3, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files  ",
    "provider": {
    "@type": "Organization",
    "name": "Mp3tager",
    "sameAs": "http://mp3tager.com"
    }
    }
</script>

@endsection
@extends('layouts.app')
@section('content')

<!-- --------------Start of Body----------->
<div class="Mycontainer-home">
    <div id="aboutUs">
        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2> <span>Music</span> for the world <i class="fas fa-music"></i></h2>
                    <p>
                        Join the world of free, easy, fast and reliable music tags online editing  website.
                    </p>
                    <a href="{{url('upload')}}" id="Upload-btn">Upload</a>
                    @if($user == false)
                    <a href="{{url('signup')}}">sign up</a>
                    @else
                    <a href="{{url('dashboard')}}">Dashboard</a>
                    @endif
                </div>
                <div class="section-img section-img-1"></div>
            </section>
        </div>
        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2>Edit your music tags</h2>
                    <p>With our free editor you can easily edit or update you music and video tags, just upload your mp3 or mp4 files and we will take care of it.
                        <br>mp3tager can change mp3 cover art, artist, album, title, year etc, add watermark to mp4 using logo or text, just give it a try .
                    </p>
                </div>
                <div class="section-img section-img-2"></div>
            </section>
        </div>

        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2>Want to join two files? </h2>
                    <p>Yes, it is very easy, with our free online editor you can join two mp3 files or add a voice note to your mp3. 
                        Just select the option you want when editing your mp3 file and just hit submit that's it  :)
                    </p>
                </div>
                <div class="section-img section-img-3"></div>
            </section>
        </div>

        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2>Tired from too many steps</h2>
                    <p>We have made editing of your mp3 file to be very easy it takes us 2 clicks to get the job done, 
                        just click to upload your music, choose what to do, click to save & download
                    </p>
                </div>
                <div class="section-img section-img-4"></div>
            </section>
        </div>

        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2>It is fast</h2>
                    <p>
                        Our processes to make the job done is very easy, you can edit more than 4 mp3 files at a go, too simple and too easy
                    </p>
                </div>
                <div class="section-img section-img-5"></div>
            </section>
        </div>

        <div class="body-content">
            <section>
                <div class="section-text">
                    <h2>Easy to Download</h2>
                    <p>
                        With just a simple click you get your updated mp3 or mp4 files downloaded to your mobile phone or Pc, if you edit multiple files, you can download it as zip files for your updated mp3 files.
                        If you don't want want to be in a hurry to download the updated file, we can save it for you using our server storage or your own google drive storage, it's just
                        your choice
                    </p>
                </div>
                <div class="section-img section-img-6"></div>
            </section>
        </div>
    </div>

</div>


@endsection