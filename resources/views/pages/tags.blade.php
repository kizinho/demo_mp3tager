
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
<meta property="og:image" content="{{url(config('app.logo'))}}" />
<meta property="og:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{url(config('app.logo'))}}" />
<meta name="twitter:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files" />

<link rel="stylesheet" href="{{asset('css/tags.css')}}">
<style>


    input[type="checkbox"] { 
        position: absolute;
        opacity: 0;
    }

    /* Normal Track */
    input[type="checkbox"].ios-switch + div {
        vertical-align: middle;
        border: 1px solid #cd6133;
        border-radius: 999px;
        background-color: rgba(0, 0, 0, 0.1);
        -webkit-transition-duration: .4s;
        -webkit-transition-property: background-color, box-shadow;
        box-shadow: inset 0 0 0 0px rgba(0,0,0,0.4);
        white-space: nowrap;
        cursor: pointer;
    }

    /* Checked Track (Blue) */
    input[type="checkbox"].ios-switch:checked + div {

        background-position: 0 0;
        background-color: #cd6133;
        border: 1px solid #cd6133;
        box-shadow: inset 0 0 0 10px #cd6133;
    }

    /* Tiny Track */
    input[type="checkbox"].tinyswitch.ios-switch + div {
        width: 34px;    height: 18px;
    }



    /* Normal Knob */
    input[type="checkbox"].ios-switch + div > div {
        float: left;
        width: 18px; height: 18px;
        border-radius: inherit;
        background: #ffffff;
        -webkit-transition-timing-function: cubic-bezier(.54,1.85,.5,1);
        -webkit-transition-duration: 0.4s;
        -webkit-transition-property: transform, background-color, box-shadow;
        -moz-transition-timing-function: cubic-bezier(.54,1.85,.5,1);
        -moz-transition-duration: 0.4s;
        -moz-transition-property: transform, background-color;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3), 0px 0px 0 1px rgba(0, 0, 0, 0.4);
        pointer-events: none;
        margin-top: 1px;
        margin-left: 1px;
    }


    /* Tiny Knob */
    input[type="checkbox"].tinyswitch.ios-switch + div > div {
        width: 16px; height: 16px;
        margin-top: 1px;
    }

    /* Checked Tiny Knob (Blue Style) */
    input[type="checkbox"].tinyswitch.ios-switch:checked + div > div {
        -webkit-transform: translate3d(16px, 0, 0);
        -moz-transform: translate3d(16px, 0, 0);
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3), 0px 0px 0 1px #cd6133;
    }

</style>
@endsection
@extends('layouts.app')
@section('content')
<!-- Start of tags pages -->
<div class="Mycontainer">
    <div class="upload-container">

        <form id="savetag" enctype="multipart/form-data"> 

            @csrf
            @foreach($details as $key => $tag)

            <input type="hidden"  id='id'  value="{{ $tag->id }}">
            <input type="hidden"  name='id[{{$key}}]'  value="{{ $tag->id }}">
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
                    @if(empty($tag_settings) || $tag_settings->active == false)
                    <div class="col-sm browse-btn-cont align-self-center">
                        <label for=""  class="browse-btn browse-btn-js">Browse</label> <!-- variable here -->
                        <input type="text" placeholder="mp3 ,  wav"  class="song-txt-title"  id="aud-text-{{$key}}" readonly> <!-- variable here -->
                        <!-- =================Browse section=============== -->
                        <div class="rangeValue my-2" id="rangeValue-{{$key}}" data-render="{{$key}}"><!-- variable here -->
                            <input type="hidden" name="joinSelect[{{$key}}]" class="holder" id="holder-{{$key}}" ><!-- variable here -->
                        </div>
                    </div>
                    @else
                    <div class="col-sm browse-btn-cont align-self-center">
                        <!-- =================Browse section=============== -->
                        <label class="tag-responsive-p"> Tager Setting</label>

                        <div class="mb-1">
                            <label> <input type="checkbox"  value="{{$tag_settings->active }}"  name="tager_setting_active" @if($tag_settings->active == true)  checked='checked' @endif class="ios-switch green tinyswitch"  /><div><div></div></div></label>

                        </div>
                        <div class="rangeValue my-2" id="rangeValue-{{$key}}" data-render="{{$key}}"><!-- variable here -->
                            <input type="hidden" name="joinSelect[{{$key}}]" class="holder" id="holder-{{$key}}" ><!-- variable here -->
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!--------------------------------------- End selection -------------------------->
            @if(empty($tag_settings) || $tag_settings->active == false)
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
            @endif
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
                        @if(empty($tag_settings) || $tag_settings->active == false)

                        <div class="waterMarkcont" id="waterMarkcont-{{ $loop->iteration }}"> <!-- variable here -->
                            <label class="waterMarkBtn">Browse</label>
                            <input type="text"  readonly placeholder="png , jpeg , jpg" class="waterMarkImgUrl">
                            <input type="file" name="watermark_image[{{$key}}]"  class="waterMarkfile" accept=".png,.jpg,.jpeg" style="display: none;">
                        </div>
                        @else
                        <div class="waterMarkcont  mb-1" id="waterMarkcont-{{ $loop->iteration }}">

                            <label>Use image <input type="checkbox"  name="tager_setting_active" class="ios-switch green tinyswitch"  /><div><div></div></div></label>

                        </div>

                        @endif
                        @if(empty($tag_settings) || $tag_settings->active == false)
                        <div class="waterMarkTxt" id="waterMarkTxt-{{ $loop->iteration }}"> <!-- variable here -->
                            <input type="text" name="watermark_text[{{$key}}]" placeholder="Enter your watermark text">
                            <div class="row control-cont">
                                <div class="col-sm-6 my-2">
                                    <input type="color" name="watermark_color[{{$key}}]" data-selected-color='#000000' class="inptColor" required>
                                </div>
                                <div class="col-sm-6 my-2">
                                    <input type="text" name="watermark_font[{{$key}}]" value="23" placeholder="font size eg 20,40" data-font-size="23" class="logo-fnt-size" name="">
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="waterMarkTxt" id="waterMarkTxt-{{ $loop->iteration }}"> <!-- variable here -->

                            <label>Use text <input type="checkbox"  name="tager_setting_active_text" class="ios-switch green tinyswitch"  /><div><div></div></div></label>

                            <input type="hidden" value="{{$tag_settings->water_text}}" name="watermark_text[{{$key}}]" placeholder="Enter your watermark text">

                            <input type="hidden" value="{{$tag_settings->water_color}}" name="watermark_color[{{$key}}]" data-selected-color='{{$tag_settings->water_color}}' class="inptColor" required>

                            <input type="hidden" value="{{$tag_settings->water_font}}"  name="watermark_font[{{$key}}]" value="{{$tag_settings->water_font}}" placeholder="font size eg 20,40" data-font-size="{{$tag_settings->water_font}}" class="logo-fnt-size">
                        </div>
                        @endif


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
                        <input type="text" placeholder='Enter Artist Name' name="artist[{{$key}}]" value=" {{$tag->artist}}" required>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Album</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Album' name="album[{{$key}}]" value=" {{$tag->album}}" required>
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
                        <input type="text" placeholder='Track Number' name="track_number[{{$key}}]" value=" {{$tag->track_number}}" required>
                    </div>
                </div>
            </div>
            @endif
            @if(empty($tag_settings) || $tag_settings->active == false)
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Genre</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='Genre' name="genre[{{$key}}]" value=" {{$tag->genre}}" required>
                    </div>
                </div>
            </div>
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Comments</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='comments' name="comments[{{$key}}]" value=" {{$tag->comments}}" required>
                    </div>
                </div>
            </div>
            @endif
            @if($tag->mime_type == 'mp3')
            <div class="tag-field tag-responsive">
                <div class="row">
                    <div class="col-sm">
                        <label>Year</label>
                    </div>
                    <div class="col-sm">
                        <input type="text" placeholder='year' name="year[{{$key}}]" value=" {{$tag->year}}" required>
                    </div>
                </div>
            </div>
            @if(empty($tag_settings) || $tag_settings->active == false)
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
            <input type="hidden" placeholder='Encoded by' name="encoded_by[{{$key}}]" value=" {{$tag->encoded_by}}" required>

            <!--            <div class="tag-field tag-responsive">
                            <div class="row">
                                <div class="col-sm">
                                    <label>Encoded by</label>
                                </div>
                                <div class="col-sm">
                                    <input type="text" placeholder='Encoded by' name="encoded_by[{{$key}}]" value=" {{$tag->encoded_by}}">
                                </div>
                            </div>
                        </div>-->
            <input type="hidden" placeholder='Composer' name="composer[{{$key}}]" value=" {{$tag->composer}}">

            <!--            <div class="tag-field tag-responsive">
                            <div class="row">
                                <div class="col-sm">
                                    <label>Composer</label>
                                </div>
                                <div class="col-sm">
                                    <input type="text" placeholder='Composer' name="composer[{{$key}}]" value=" {{$tag->composer}}">
                                </div>
                            </div>
                        </div>-->
            <input type="hidden" placeholder='Encoder Settings' name="encoder_settings[{{$key}}]" value=" {{$tag->encoder_settings}}">

            <!--
                        <div class="tag-field tag-responsive">
                            <div class="row">
                                <div class="col-sm">
                                    <label>Encoder Settings</label>
                                </div>
                                <div class="col-sm">
                                    <input type="text" placeholder='Encoder Settings' name="encoder_settings[{{$key}}]" value=" {{$tag->encoder_settings}}">
                                </div>
                            </div>
                        </div>-->


            @endif
            @endif

            @if($tag->mime_type =='mp3' || $tag->mime_type =='mp4')
            @else
            <!-- =================End is private section======================= -->
            <div class="tag-field tag-responsive">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="watermarkSelect">Invalid FIle Extension

                        </div>

                    </div>
                    <div class="col-sm-6">

                        <select class="markSelect form-control" name="extension[{{$key}}]"         @if($tag->mime_type !=='mp3' || $tag->mime_type !=='mp4') required  @endif> <!-- variable here -->
                                <option value="" selected disabled>Check your File Extension </option>
                            <option value="mp3">Mp3</option>
                            <option value="mp4">Mp4</option>
                        </select>
                    </div>
                </div>
            </div>
            @endif

            @endforeach



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
        let id = jQuery('#id').val();
        checkProgress(id);
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
                if (data.data['status'] === 409) {
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
                if (data.data['status'] === 404) {
                    var message = data.data['message'];

                    toastr.error(message, {timeOut: 50000});

                    return false;
                }
                if (data.data['status'] === 500) {
                    var message = data.data['message'];

                    toastr.error(message, {timeOut: 50000});

                    return false;
                }
                if (data.data['status'] === 411) {
                    var message = data.data['message'];

                    toastr.error(message, {timeOut: 50000});

                    return false;
                }


            }

        });


        function checkProgress(id) {
            var check = setInterval(function () {
                jQuery.ajax({
                    url: "{{url('get-tags')}}",
                    data: {id: id},
                    method: 'GET',
                    success: function (data) {
                        if (data.data['status'] === 200) {
                            let url = data.data['data'];
                            /*Finish*/
                            clearInterval(check);
                            window.location.href = "{{url('/downloads')}}?" + url;

                            return false;
                        }

                    }

                });
            }, 6000);

        }

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
