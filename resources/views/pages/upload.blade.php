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

<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<link rel="stylesheet" href="{{asset('dropzone/dropzone.min.css')}}">
@endsection
@extends('layouts.app')
@section('content')
<!-- --------------Start of Body----------->
<div class="container">
    <div class="tabs-container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="true"><span> Upload Files </span><i class="far fa-folder-open"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links" aria-selected="false"><span> Enter URL </span><i class="fas fa-link"></i></a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files">
                <!-- Strat of inside  file choose -->
                <form class="section-container">
                    <input type="hidden" name="user_token" id="user_token" value="testnn">
                    <div class="data-field">

                        <div class="card text-left dropzone dropzone-area " id="myUpload">


                            <div class="card-body">

                                <div  class="fallback">
                                    <input  name="file" type="file" multiple />
                                </div>
                                <div class="dz-message"><h4>Drag & Drop Files Here</h4>
                                    <br/>
                                    <span class="btn btn-success text-white padding">Choose Files</span>

                                </div>

                                <div class="alert alert-info small" role="alert">
                                    Allowed file types: MP3, MP4, M4A, WMA, AAC, WAV, 3GP, OGV, AMR, FLAC
                                </div>
                                <div class="alert alert-secondary small text-center " >Files updated this year: &nbsp; <span class="text-danger">1,094,126</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="data-field data-field-btn ">
                        <input type="submit" id="submit-file"  value="upload">
                    </div>
                </form>
                <!-- End of inside file choose -->
            </div>
            <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                <!-- Strat of inside search bar -->
                <div class="data-field data-field-search">
                    <p>Please enter a valid audio url</p>
                    <form action="">
                        <input type="search" placeholder="https://www.yourdomain.com/yoursong.mp3" required>
                        <input type="submit"  value="Go"><i class="fas fa-sign-in-alt"></i>
                    </form>
                </div>
                <!-- End of inside search bar -->
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{asset('dropzone/dropzone.min.js')}}"></script>
<script>

Dropzone.options.myUpload = {
    url: "{{url('upload')}}",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 6,
    maxFiles: 6,
    timeout: 3000000,
    acceptedFiles: '.mp3,.mp4,.m4a,.wma,.aac,.wav,.3gp,.ogv,.amr,.flac',
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    init: function () {

        dzClosure = this;
        document.getElementById("submit-file").addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();


        });

        this.on("sendingmultiple", function (data, xhr, formData) {
            $(".modal").show();
            formData.append("user_token", jQuery("#user_token").val());
            $.each(data, function (key, el) {
                formData.append(el.name, el.value);
            });
            console.log(formData);

        });
        this.on("success", function (file, responseText) {
            if (responseText.data['status'] === 401) {
                jQuery.each(responseText.data['message'], function (key, value) {
                    var message = ('' + value + '');
                    toastr.options.onHidden = function () {
                        $('.dz-preview').remove();
                        $(".modal").hide();

                    };
                    toastr.error(message, {timeOut: 50000});
                });

                return false;
            }
            if (responseText.data['status'] === 422) {
                var message = responseText.data['message'];
                toastr.options.onHidden = function () {
                    $('.dz-preview').remove();
                    $(".modal").hide();

                };
                toastr.error(message, {timeOut: 50000});

                return false;
            }
            if (responseText.data['status'] === 200) {
                let url = responseText.data['data'];
                window.location.href = "{{url('/tags')}}?" + url;
                $(".modal").hide();

                return false;
            }

        });
    }
};
</script>

@endsection
@endsection