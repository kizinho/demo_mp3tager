
@section('title')
<title>MP3tager | Pricing</title>
<meta name="description" content="pricing" />
<meta name="keywords" content="pricing" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="pricing" />
<meta property="og:description" content="pricing" />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="How it Works">
<meta name="twitter:description" content="How it Works">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="pricing">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="pricing" />

@endsection
@extends('layouts.app')
@section('content')
<main>
        <section class="price-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="pricing rounded p-3">
                            <h5 class="pricing__name mb-3 text-center">
                                Basic
                            </h5>
                            <div class="pricing__fee mb-3 text-center">
                                <h2>
                                    FREE
                                </h2>
                               
                            </div>
                            
                            <div class="pricing__getstarted-button mb-4">
                                <a href="#" class="btn btn--get-started w-100">Get Started</a>
                            </div>
                            <div class="plan-features">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 750MB storage space
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 1 simultanous edit
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> Save on Google Drive
                                    </li>
                                    <li>
                                        Delete in-active files after - 1 Month
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="pricing rounded p-3">
                            <h5 class="pricing__name mb-3 text-center">
                                Premium
                            </h5>
                            <div class="pricing__fee mb-3 text-center">
                                <h2>
                                    &#8358;500/mo
                                </h2>
                                <div class="pricing__discount">
                                    save 20% on the first year
                                </div>
                            </div>
                            <div class="pricing__getstarted-button mb-4">
                                <a href="#" class="btn btn--get-started w-100">Get Started</a>
                                <div class="pricing__amount-to-pay">
                                    <span>
                                        pay &#8358;5,000.56 - renews at &#8358;7,000.00/yr
                                    </span>
                                </div>

                            </div>
                            <div class="plan-features">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 2GB storage space
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 3 simultanous edit
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> Save on Google Drive
                                    </li>
                                    <li>
                                        Never delete in-active files
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="pricing rounded p-3">
                            <h5 class="pricing__name mb-3 text-center">
                                Professional
                            </h5>
                            <div class="pricing__fee mb-3 text-center">
                                <h2>
                                    &#8358;1000/mo
                                </h2>
                                <div class="pricing__discount">
                                    save 20% on the first year
                                </div>
                            </div>
                            <div class="pricing__getstarted-button mb-4">
                                <a href="#" class="btn btn--get-started w-100">Get Started</a>
                                <div class="pricing__amount-to-pay">
                                    <span>
                                        pay &#8358;5,000.56 - renews at &#8358;7,000.00/yr
                                    </span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 3GB storage space
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 4 simultanous edit
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> Save on Google Drive
                                    </li>
                                    <li>
                                        Never delete in-active files
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="pricing rounded p-3">
                            <h5 class="pricing__name mb-3 text-center">
                                Business
                            </h5>
                            <div class="pricing__fee mb-3 text-center">
                                <h2>
                                    &#8358;3000/mo
                                </h2>
                                <div class="pricing__discount">
                                    save 20% on the first year
                                </div>
                            </div>
                            <div class="pricing__getstarted-button mb-4">
                                <a href="#" class="btn btn--get-started w-100">Get Started</a>
                                <div class="pricing__amount-to-pay">
                                    <span>
                                        pay &#8358;5,000.56 - renews at &#8358;7,000.00/yr
                                    </span>
                                </div>
                            </div>
                            <div class="plan-features">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 5GB storage space
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> 5 simultanous edit
                                    </li>
                                    <li>
                                        <i class="fas fa-check plan__icon"></i> Save on Google Drive
                                    </li>
                                    <li>
                                        Never delete in-active files
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection