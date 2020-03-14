
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

<link rel="stylesheet" href="{{asset('css/tags.css')}}">
@endsection
@extends('layouts.app')
@section('content')
<!-- Start of tags pages -->
<div class="container">
    <div class="upload-container">
        <form action="">

            @foreach($details as $tag)
            <div class="tag-field-head alert alert-success">
                <div class="row">
                    <div class="col-sm tag-title">
                        <label class="tag-responsive-p " id="title"><span class='badge badge-primary'> {{ $loop->iteration }}</span> {{$tag->file_name}}</label>
                    </div>
                </div>
            </div>

            <div class="tag-field">
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Existing image</label>
                    </div>
                    <div class="col-sm browse-btn-cont preview-field"  onchange="loadFile(this)">
                        @if(empty($tag->cover_art))
                        uploaded Song has no cover art
                        @else
                        <img id="picture" src=" {{$tag->cover_art}}" alt= "{{$tag->file_name}}" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="tag-field tag-field-join">
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Join Voice Tag or Join Another Song ?</label>
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
                        <label for="start-song">at beginning</label>
                        <input type="radio" name="JoinSelect" value="strat" id='start-song'class="start-song-rad">
                        <label for="start-song" class="start-song-lbl">✔</label>
                    </div>
                    <div class="lbl-sel">
                        <label for="end-song">at end</label>
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
                        <input type="text" placeholder='Enter Title' value="{{$tag->title}}" >
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Artist</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Enter Artist Name' value=" {{$tag->artist}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Album</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Album' value=" {{$tag->album}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Track Number</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Track Number' value=" {{$tag->track_number}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Genre</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Genre' value=" {{$tag->genre}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Comments</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='comments' value=" {{$tag->comments}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Year</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='year' value=" {{$tag->year}}">
                    </div>
                </div>
            </div>
            @if(!empty($tag->publisher))
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Publisher</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Publisher' value=" {{$tag->publisher}}">
                    </div>
                </div>
            </div>
            @endif
            @if(!empty($tag->encoded_by))
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Encoded by</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Encoded by' value=" {{$tag->encoded_by}}">
                    </div>
                </div>
            </div>
            @endif
            @if(!empty($tag->composer))
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Composer</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Composer' value=" {{$tag->composer}}">
                    </div>
                </div>
            </div>
            @endif
            @if(!empty($encoder_settings))
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Encoder Settings</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Encoder Settings' value=" {{$tag->encoder_settings}}">
                    </div>
                </div>
            </div>
            @endif
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

@endsection
