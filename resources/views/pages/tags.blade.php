
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
<div class="Mycontainer">
    <div class="upload-container">

        <form method="POST" action="{{ route('tags') }}" enctype="multipart/form-data">
            @csrf
            @foreach($details as $tag)
            <input type="hidden"  name='id[]' value="{{ $tag->id }}">
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
       <div class="tag-field tag-field-join" data-render="{{ $loop->iteration }}"> <!-- variable here -->
    <div class="row">
        <div class="col-sm">
          <label class="tag-responsive-p">Join Voice Tag or Join Another Song ?</label>
          <input type="file" id="mp3-file-2-{{ $loop->iteration }}" name="viocetag[]" data-type='txt'  class="d-nn" accept=".mp3"> <!-- variable here -->
      </div>
      
    <div class="col-sm browse-btn-cont">
          <label for="mp3-file-2-{{ $loop->iteration }}" id="lbl-{{ $loop->iteration }}" class="browse-btn browse-btn-js">Browse</label> <!-- variable here -->
          <input type="text" placeholder="mp3 ,  wav"  class="song-txt-title"  id="aud-text2-{{ $loop->iteration }}" readonly> <!-- variable here -->
    </div>
  </div>
  <!--------------------------------------- selection -------------------------->
  <div class="select-btn optionSelect" data-render="{{ $loop->iteration }}"> <!-- variable here -->
    <select name="joinSelect[]" ><!-- variable here -->
      <option value="none">none</option>
      <option value="start">at beginning</option>
      <option value="end">at end</option>
    </select>
</div>
</div>

<div class="tag-field tag-field-img"  data-render="{{ $loop->iteration }}"> <!-- variable here -->
    <div class="row">
        <div class="col-sm">
          <label class="tag-responsive-p">Select image file (up to 25Mb)</label>
          <input type="file" id='img-file-{{ $loop->iteration }}' name="coverart[]" data-type='img' class="d-nn" accept=".png,.jpg,.jpeg"> <!-- variable here -->
      </div>
    <div class="col-sm browse-btn-cont img-txt-style">
          <label for="img-file-{{ $loop->iteration }}" class="browse-btn">Browse</label> <!-- variable here -->
          <input type="text" placeholder="png , jpg , jpeg"   id="img-text-{{ $loop->iteration }}" readonly> <!-- variable here -->
    </div>
  </div>
</div>


        

            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Title</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Enter Title' name="title[]" value="{{$tag->title}}" >
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Artist</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Enter Artist Name' name="artist[]" value=" {{$tag->artist}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Album</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Album' name="album[]" value=" {{$tag->album}}">
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
                            <input type="radio" name="saveData" value="0" id='temp-data' class="temp-data-chk" checked='checked'>
                            <label for="temp-data" class="temp-data">✔</label>
                        </div>
                        <div class="lbl-sel-data">
                            <label for="forever-data" >(save data forever)</label>
                            <input type="radio" name="saveData" value="1" id='forever-data' class="forever-data-chk">
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

@endsection
@endsection
