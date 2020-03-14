@section('title')
<title>MP3 tag editor - tag mp3 files online | the best mp3 tagger 2020</title>
<meta name="description" content="Tagmp3.net is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image." />
<meta name="keywords" content="tagmp3, mp3tag, tag mp3, mp3 tag" />
<meta name="apple-mobile-web-app-title" content="Tagmp3" />
<meta property="fb:app_id" content="2291526731101380" />
<meta http-equiv="Cache-control" content="public">
<meta name="theme-color" content="#d1ecf1"/>
<meta property="og:title" content="MP3 tag editor - tag mp3 files online | tagmp3.net" />
<meta property="og:description" content="Tagmp3.net is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image." />
<meta property="og:url" content="https://tagmp3.net/" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Tagmp3" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@Tagmp31">
<meta name="twitter:title" content="MP3 tag editor - tag mp3 files online | tagmp3.net">
<meta name="twitter:description" content="Tagmp3.net is a free mp3 tag editor available online where you can tag mp3 files, change id3 tags, edit mp3 image, add or change existing album art in mp3 and change mp3 cover image.">
<link rel="canonical" href="https://tagmp3.net/" />
<meta property="og:image" content="https://tagmp3.net/images/tagmp3-1200x630.png" />
<meta property="og:image:alt" content="MP3 tag editor - tag mp3 files online | tagmp3.net">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="https://tagmp3.net/images/tagmp3-1200x630.png" />
<meta name="twitter:image:alt" content="MP3 tag editor - tag mp3 files online | tagmp3.net" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/tags.css')}}">
@endsection
@extends('layouts.app')
@section('content')
<!-- Start of tags pages -->
<div class="container">
    <div class="upload-container">
        <form action="">

            @foreach($details as $tag)

            {{$tag}}

            <div class="tag-field">
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Existing image</label>
                    </div>
                    <div class="col-sm browse-btn-cont preview-field"  onchange="loadFile(this)">
                        <img id="picture" src="" alt= "uploaded Song has no cover art" />
                    </div>
                </div>
            </div>
            <div class="tag-field tag-field-join">
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Join anther song ?</label>
                        <input type="file" id="mp3-file-2" data-index="2"  class="d-nn" accept=".mp3">
                    </div>
                    <div class="col-sm browse-btn-cont">
                        <label for="mp3-file-2" class="browse-btn browse-btn-js">Browse</label>
                        <input type="text" placeholder="mp3 ,  wav"  data-select="txt2" id="aud-text2" readonly>
                    </div>
                </div>
                <div class="select-btn">
                    <div class="lbl-sel lbl-sel-none">
                        <label for="none-song">none</label>
                        <input type="radio" name="JoinSelect" value="none" id='none-song' class="none-song-rad" checked='checked'>
                        <label for="none-song" class="none-song-lbl">✔</label>
                    </div>
                    <div class="lbl-sel">
                        <label for="start-song">start</label>
                        <input type="radio" name="JoinSelect" value="strat" id='start-song'class="start-song-rad">
                        <label for="start-song" class="start-song-lbl">✔</label>
                    </div>
                    <div class="lbl-sel">
                        <label for="end-song">end</label>
                        <input type="radio" name="JoinSelect" value="end" id='end-song' class="end-song-rad" >
                        <label for="end-song" class="end-song-lbl">✔</label>
                    </div>
                </div>
            </div>

            <div class="tag-field">
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Select image file (up to 25Mb)</label>
                        <input type="file" id='img-file'  data-index='0' class="d-nn" accept=".png,.jpg,.jpeg">
                    </div>
                    <div class="col-sm browse-btn-cont">
                        <label for="img-file" class="browse-btn">Browse</label>
                        <input type="text" placeholder="png , jpg , jpeg" data-select="txt0"  id="img-text" readonly>
                    </div>
                </div>
            </div>

            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Title</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder=''>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Artist</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='my name'>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Album</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='My Album'>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Track Number</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='12'>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Genre</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='country'>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Comments</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='my comments'>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Year</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='2020'>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="tag-field tag-responsive tag-field-save">
                <div class="row">
                    <div class="col-sm">
                        <div class="lbl-sel-data">
                            <label for="temp-data">(save data for 10 mins)</label>
                            <input type="radio" name="saveData" value="10mins" id='temp-data' class="temp-data-chk" checked='checked'>
                            <label for="temp-data" class="temp-data">✔</label>
                        </div>
                        <div class="lbl-sel-data">
                            <label for="forever-data" >(save data forever)</label>
                            <input type="radio" name="saveData" value="forever" id='forever-data' class="forever-data-chk">
                            <label for="forever-data" class="forever-data">✔</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm sub-btn-form">
                        <input type="submit" value="apply and save">
                    </div>
                </div>
            </div>

        </form>
        <!-- End of container -->
    </div>
</div>
@section('script')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

@endsection
@endsection