
@section('title')
<title>Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files {{date('Y')}}</title>
<meta name="description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files " />
<meta name="keywords" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files" />
<meta property="og:description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files " />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Upload mp3 -  join two mp3 and Mp4  files online | mp3 tager for editing mp3 files">
<meta name="twitter:description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files ">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{asset('logo/logo.png') }}" />
<meta property="og:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{asset('logo/logo.png') }}" />
<meta name="twitter:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files" />
<link rel="stylesheet" href="{{asset('css/tags.css')}}">

@endsection
@extends('layouts.app')
@section('content')
<!-- Start of tags pages -->
<div class="Mycontainer">
    <div class="upload-container">

        <form id="savetag" enctype="multipart/form-data"> 
            @if($user == false)
            <input type="hidden"  name='user_id' value="">
            @else
            <input type="hidden"  name='user_id' value="{{ $user->id }}">

            @endif

            @csrf
            @foreach($details as $key => $tag)

            <input type="hidden"  name='id[{{$key}}]' value="{{ $tag->id }}">
            <input type="hidden"  name='path[{{$key}}]' value="{{ $tag->path }}">
            <div class="tag-field-head alert alert-success">
                <div class="row">
                    <div class="col-sm tag-title">
                        <label class="tag-responsive-p " id="title"><span class='badge badge-primary'> {{ $loop->iteration }}</span> {{$tag->file_name}}</label>
                    </div>
                </div>
            </div>
            @if($tag->mime_type == 'mp3')
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

            <!--------------------------------------- start selection -------------------------->
            <div class="tag-field tag-field-join" data-render="{{$key}}"> <!-- variable here -->
                <div class="row">
                    <div class="col-sm" data-render="{{$key}}"> <!-- variable here -->
                        <label class="tag-responsive-p">Join Voice Tag or Join Another Song ? (optional)</label>
                        <input type="file" id="mp3Browser-{{$key}}"  data-type='txt' name="viocetag[{{$key}}]"  class="d-nn" accept=".mp3"> <!-- variable here -->
                        <!-- =============Range section================ -->
                        <div class="contorlRange">
                            <label class="currentPosition">0</label>
                            <input type="range" name="" id="songRange-{{$key}}" class="songRange" min="0" max="{{$tag->seconds}}" value="0">
                            <label>{{$tag->seconds}}</label>
                        </div>
                        <div class="contorlRangeBtn my-2">
                            <button type="button" class="setRangeBtn">Add Join Point {secs}</button>
                        </div>
                        <!-- =============End Range section================ -->
                    </div>
                    <div class="col-sm browse-btn-cont align-self-center">
                        <label for=""  class="browse-btn browse-btn-js">Browse</label> <!-- variable here -->
                        <input type="text" placeholder="mp3 ,  wav"  class="song-txt-title"  id="aud-text-{{$key}}" readonly> <!-- variable here -->
                        <!-- =================Browse section=============== -->
                        <div class="rangeValue my-2" id="rangeValue-{{$key}}" data-render="{{$key}}"><!-- variable here -->
                            <input type="hidden" name="joinSelect[{{$key}}]" class="holder" id="holder-{{$key}}" ><!-- variable here -->
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------------------------- End selection -------------------------->

            <div class="tag-field tag-field-img"  data-render="{{ $loop->iteration }}"> <!-- variable here -->
                <div class="row">
                    <div class="col-sm">
                        <label class="tag-responsive-p">Select image file (up to 2Mb) </label>
                        <input type="file" id='img-file-{{ $loop->iteration }}' name="coverart[{{$key}}]" data-type='img' class="d-nn" accept=".png,.jpg,.jpeg"> <!-- variable here -->
                    </div>
                    <div class="col-sm browse-btn-cont img-txt-style">
                        <label for="img-file-{{ $loop->iteration }}" class="browse-btn">Browse</label> <!-- variable here -->
                        <input type="text" placeholder="png , jpg , jpeg"   id="img-text-{{ $loop->iteration }}" readonly> <!-- variable here -->
                    </div>
                </div>
            </div>
            @else 
            <!-- =========== watermark ===========-->
            <div class="tag-field tag-responsive">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="watermarkSelect">[ optional ]
                            <select class="markSelect" name="watermark[{{$key}}]" data-render="{{ $loop->iteration }}"> <!-- variable here -->
                                <option value="" selected disabled>Add WaterMark </option>
                                <option value="1">logo top left</option>
                                <option value="2">logo top Right</option>
                                <option value="3">logo bottom left</option>
                                <option value="4">logo bottom Right</option>
                                <option value="5">Text top Left</option>
                                <option value="6">Text top Right</option>
                                <option value="7">Text bottom left</option>
                                <option value="8">Text bottom Right</option>
                                <option value="9">Moving Text</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="waterMarkcont" id="waterMarkcont-{{ $loop->iteration }}"> <!-- variable here -->
                            <label class="waterMarkBtn">Browse</label>
                            <input type="text"  readonly placeholder="png , jpeg , jpg" class="waterMarkImgUrl">
                            <input type="file" name="watermark_image[{{$key}}]"  class="waterMarkfile" accept=".png,.jpg,.jpeg" style="display: none;">
                        </div>
                        <div class="waterMarkTxt" id="waterMarkTxt-{{ $loop->iteration }}"> <!-- variable here -->
                            <input type="text" name="watermark_text[{{$key}}]" placeholder="Enter your watermark text">
                            <div class="row control-cont">
                                <div class="col-sm-6 my-2">
                                    <input type="color" name="watermark_color[{{$key}}]" data-selected-color='#000000' class="inptColor" required>
                                </div>
                                <div class="col-sm-6 my-2">
                                    <input type="text" name="watermark_font[{{$key}}]" value="40" placeholder="font size eg 20,40" data-font-size="40" class="logo-fnt-size" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===========End of watermark ===========-->
            @endif


            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Title</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Enter Title' name="title[{{$key}}]" value="{{$tag->title}}" required>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Artist</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Enter Artist Name' name="artist[{{$key}}]" value=" {{$tag->artist}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Album</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Album' name="album[{{$key}}]" value=" {{$tag->album}}">
                    </div>
                </div>
            </div>
            @if($tag->mime_type == 'mp3')
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Track Number</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Track Number' name="track_number[{{$key}}]" value=" {{$tag->track_number}}">
                    </div>
                </div>
            </div>
            @endif
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Genre</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Genre' name="genre[{{$key}}]" value=" {{$tag->genre}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Comments</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='comments' name="comments[{{$key}}]" value=" {{$tag->comments}}">
                    </div>
                </div>
            </div>

            @if($tag->mime_type == 'mp3')
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Year</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='year' name="year[{{$key}}]" value=" {{$tag->year}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Publisher</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Publisher' name="publisher[{{$key}}]" value=" {{$tag->publisher}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Encoded by</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Encoded by' name="encoded_by[{{$key}}]" value=" {{$tag->encoded_by}}">
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Composer</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Composer' name="composer[{{$key}}]" value=" {{$tag->composer}}">
                    </div>
                </div>
            </div>

            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Encoder Settings</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Encoder Settings' name="encoder_settings[{{$key}}]" value=" {{$tag->encoder_settings}}">
                    </div>
                </div>
            </div>


            @endif
             <!-- =================is private section======================= -->
            @if(!empty($user))
  <div class="tag-field tag-responsive">
    <div class="row justify-content-center">
        <h4 class="py-1">Is Private ?</ا3>
     </div>
      <div class="row private-selector">
        <div class="inputGroup">
            <input id="pns-{{$key}}" name="ps[{{$key}}]" value="0" type="radio" checked/><!-- variable here -->
          <label for="pns-{{$key}}">No</label><!-- variable here -->
        </div>
        <div class="inputGroup">
            <input id="pys-{{$key}}" name="ps[{{$key}}]" value="1" type="radio"/> <!-- variable here -->
          <label for="pys-{{$key}}">Yes</label><!-- variable here -->
        </div>
      </div>
    </div>
            @endif
<!-- =================End is private section======================= -->
            
            @endforeach
           
            <div class="tag-field tag-responsive tag-field-save">
                <div class="row">
                    <div class="col-sm">
                        <div class="lbl-sel-data">
                            <label for="temp-data">(save data for 24 hrs)</label>
                            <input type="radio" name="saveData" value="0" id='temp-data' class="temp-data-chk" @if($user == false) checked='checked' @endif>
                                   <label for="temp-data" class="temp-data">✔</label>
                        </div>
                        <div class="lbl-sel-data">
                            <label for="forever-data" >(save data forever)</label>
                            <input type="radio" name="saveData" value="1" id='forever-data' class="forever-data-chk" @if(!empty($user)) checked='checked' @endif >
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
<!--  var name = $("input[name=name]").val();-->

<script>

    $('#savetag').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".modal").show();
            },
            complete: function () {
                $(".modal").hide();


            }
        });
        jQuery.ajax({
            url: "{{url('tags')}}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.data['status'] === 401) {
                    jQuery.each(data.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                if (data.data['status'] === 422) {
                    var message = data.data['message'];

                    toastr.error(message, {timeOut: 50000});

                    return false;
                }
                if (data.data['status'] === 200) {
                    let url = data.data['data'];
                    window.location.href = "{{url('/downloads')}}?" + url;

                    return false;
                }
            }

        });
    });

</script> 
<script>
    $('.waterMarkfile').change(function (e) {
        $(this).prev().val(e.target.files[0].name)
    })
    $('.waterMarkBtn').click(function () {
        $(this).next().next().click();
    })
    $('.markSelect').change(function () {
        var renderIndex = $(this).attr('data-render');
        var selectMarkOption1 = `#waterMarkcont-${renderIndex}`
        var selectMarkOption2 = `#waterMarkTxt-${renderIndex}`
        if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4) {
            $(`${selectMarkOption1}`).css('display', 'flex')
            $(`${selectMarkOption2}`).css('display', 'none')
        } else if ($(this).val() == 5 || $(this).val() == 6 || $(this).val() == 7 || $(this).val() == 8 || $(this).val() == 9) {
            $(`${selectMarkOption1}`).css('display', 'none')
            $(`${selectMarkOption2}`).css('display', 'block')
        }
    })

    $('.inptColor').change(function () {
        $(this).attr("data-selected-color", $(this).val())
    })
    $('.logo-fnt-size').keyup(function () {
        $(this).attr("data-font-size", $(this).val())
    })



    //--------------- End of water mark section---------------

    $("input[type = file]").change(function (e) {
        var parentIndex = $(this).parent().parent().parent().attr('data-render');
        var txtclear = "#aud-text-" + parentIndex;
        if ($(this).attr('data-type') == 'txt')
            $(txtclear).val(e.target.files[0].name);
    })
    $("input[type = file]").change(function (e) {
        var parentIndexImg = $(this).parent().parent().parent().attr('data-render');
        var mylbltext = "#img-text-" + parentIndexImg;
        if ($(this).attr('data-type') == 'img')
            $(mylbltext).val(e.target.files[0].name);
    })


    var rangValusAray = [];
    $('.setRangeBtn').click(function () {
        var rangBtnIndex = $(this).parent().parent().attr("data-render");
        var rangId = `songRange-${rangBtnIndex}`;
        var appendId = `rangeValue-${rangBtnIndex}`
        var holderId = `holder-${rangBtnIndex}`
        rangValue = $(`#${rangId}`).val()
        if (rangValusAray[rangBtnIndex] == null) {
            var currntArry = [];
            currntArry.push(rangValue)
            rangValusAray.push(currntArry)
        } else {
            var oldarr = rangValusAray[rangBtnIndex];
            oldarr.push(rangValue)
        }
        var child = `<p class="val-cont"><span class="rangeHolder">${rangValue}</span><span class="btnRangclear fas fa-times-circle" data-range-index="${rangValue}"></span></p>`
        $(`#${appendId}`).append(child)
        $(`#${holderId}`).attr("value", rangValusAray[rangBtnIndex])
    })
    $(document).click(function (e) {
        if (e.target.classList.contains("btnRangclear")) {
            var holderIdIndex = e.target.parentNode.parentNode.getAttribute('data-render');
            var holderIdVal = `holder-${holderIdIndex}`
            e.target.parentNode.remove();
            var targetItem = e.target.getAttribute("data-range-index");
            var delElement = rangValusAray[holderIdIndex].indexOf(targetItem);
            rangValusAray[holderIdIndex].splice(delElement, 1)
            $(`#${holderIdVal}`).attr("value", rangValusAray[holderIdIndex])

        }
    })

    $('.songRange').change(function () {
        document.querySelectorAll('.songRange')
        $(this).prev().text($(this).val())
        var rangeFileIndex = $(this).parent().parent().attr("data-render");
        var rangeFileId = `mp3Browser-${rangeFileIndex}`
        this.parentNode.parentNode.parentNode.children[1].children[0].setAttribute('for', rangeFileId)
        if ($(this).val() == 0) {
            this.parentNode.parentNode.parentNode.children[1].children[0].setAttribute('for', "")
            this.parentNode.parentNode.parentNode.children[1].children[1].value = '';
        } else {
            this.parentNode.parentNode.parentNode.children[1].children[0].setAttribute('for', rangeFileId)
        }
    })
</script>
@endsection
@endsection
