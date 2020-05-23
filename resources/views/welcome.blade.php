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
<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-7">
                    <div class="heading" data-aos="fade-up">
                        <h1 class="heading__header-text mb-4">
                            Easily Edit Music Tags Online
                        </h1>
                        <p class="heading__header-info mb-4">
                            Join the world of free, easy, fast and reliable music tags online editing website.
                        </p>
                        <div class="mt-3">
                            <a href="{{url('upload')}}" class="btn btn--cta px-4">
                                START EDITING
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5">
                    <div class="heading-image mt-5 mt-sm-0" data-aos="fade-up">
                        <img src="{{asset('images/bruce-mars-DBGwy7s3QY0-unsplash-1.jpg')}}" alt=""
                            class="img-fluid heading-image" width="300px">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="introduction">
            <div class="container">
                <div class="text-center col-sm-10 m-auto col-md-8" data-aos="fade-up">
                    <p class="introduction__text">
                        With our free editor you can easily edit or update you music and video tags, just upload your
                        mp3 or mp4 files and we will take care of it.
                    </p>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="personalize">
                    <div class="row justify-content-between">
                        <div class="col-md-6 pr-md-4 mb-5 mb-md-0">
                            <img src="{{asset('images/headphone.jpg')}}" class="img-fluid" alt="headphone">
                        </div>
                        <div class="col-md-6 pl-md-4" data-aos="fade-up">
                            <h2 class="feature__heading">
                                Personalize your music
                            </h2>
                            <p class="feature__text mt-3">
                                Yes, it is very easy, with our free online editor you can join two mp3 files or add a
                                voice
                                note to your mp3. Just select the option you want when editing your mp3 file and just
                                hit
                                submit that's it
                            </p>
                            <div class="feature-list mt-5">
                                <ul class="list-unstyled">
                                    <li class="mb-4">
                                        <i class="fas fa-check feature-list__icon p-2 rounded-circle mr-3"></i>
                                        Edit audio details
                                    </li>
                                    <li class="mb-4">
                                        <i class="fas fa-check feature-list__icon p-2 rounded-circle mr-3"></i>
                                        Change cover art
                                    </li>
                                    <li class="mb-4">
                                        <i class="fas fa-check feature-list__icon p-2 rounded-circle mr-3"></i>
                                        Add a voice note
                                    </li>
                                    <li class="mb-4">
                                        <i class="fas fa-check feature-list__icon p-2 rounded-circle mr-3"></i>
                                        Join two audios
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seamless mt-5">
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
                            <h2 class="feature__heading">
                                Edit multiple audios at once
                            </h2>
                            <p class="feature__text mt-3">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius ea sit obcaecati ullam
                                alias ratione facilis rerum excepturi voluptatem facere voluptatibus commodi aliquam est
                                autem, possimus voluptates dicta, dolor nihil!
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('images/Screenshot from 2020-05-10 23-41-46.png')}}" class="img-fluid"
                                alt="headphone">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="benefits">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 mb-4 mb-sm-1">
                        <div class="shadow-sm benefit bg-white rounded p-3 p-sm-2 p-md-3 text-center"
                            data-aos="fade-up">
                            <div class="benefit__image mb-4">
                                <img src="{{asset('images/easy-to-use.svg')}}" alt="easy to use" class="img-fluid">
                            </div>
                            <h4 class="benefit__heading mb-3">
                                Easy to use
                            </h4>
                            <p class="benefit__text">
                                MP3Tager is easy to use. You don't even need to be registered, it requires just a few
                                clicks.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-1">
                        <div class="shadow-sm benefit bg-white rounded p-3 p-sm-2 p-md-3 text-center"
                            data-aos="fade-up">
                            <div class="benefit__image mb-4">
                                <img src="{{asset('images/quick.svg')}}" alt="quick" class="img-fluid">
                            </div>
                            <h4 class="benefit__heading mb-3">
                                Fast
                            </h4>
                            <p class="benefit__text">
                                MP3Tager is easy to use. You don't even need to be registered, it requires just a few
                                clicks.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-1">
                        <div class="shadow-sm benefit bg-white rounded p-3 p-sm-2 p-md-3 text-center"
                            data-aos="fade-up">
                            <div class="benefit__image mb-4">
                                <img src="{{asset('images/secure.svg')}}" alt="easy to use" class="img-fluid">
                            </div>
                            <h4 class="benefit__heading mb-3">
                                Reliable
                            </h4>
                            <p class="benefit__text">
                                MP3Tager is easy to use. You don't even need to be registered, it requires just a few
                                clicks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection