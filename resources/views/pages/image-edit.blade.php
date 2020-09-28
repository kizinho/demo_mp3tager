@section('title')
<title>Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4 files {{date('Y')}}</title>
<meta name="description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files " />
<meta name="keywords" content="Upload mp3 -  join two mp3 and Mp4  files online | mp3 tager for editing mp3 files" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Upload mp3 -  join two mp3 and Mp4  files online | mp3 tager for editing mp3 files" />
<meta property="og:description" content=" Upload and use this free online editor tool for editing mp3 and Mp4  files, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files " />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Mp3Tager" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Upload mp3 -  join two mp3   files online | mp3 tager for editing mp3 and Mp4  files">
<meta name="twitter:description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files, join mp3  or voice tag, editing of mp3 tags like changing the cover art, album, title, of any mp3 files">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{url(config('app.logo'))}}" />
<meta property="og:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3and Mp4   files">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{url(config('app.logo'))}}" />
<meta name="twitter:image:alt" content="Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files" />

<link rel="stylesheet" href="{{asset('dropzone/dropzone.min.css')}}">

@endsection
@extends('layouts.app')
@section('content')
<!-- --------------Start of Body----------->
<main class="upload-page">
    <div class="container">
        <div class="tabs-container">
            @if(config('app.ads_enable') == true)
            @include('layouts.banner')
            @endif

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="true"><span> Upload Files </span><i class="far fa-folder-open"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links" aria-selected="false"><span> Enter URL </span><i class="fas fa-link"></i></a>
                </li>
              
                 <li class="nav-item">
                    <a class="nav-link " id="zip-tab" data-toggle="tab" href="#zip" role="tab" aria-controls="zip" aria-selected="false"><span> Zip </span><i class="fas fa-file-import"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="zip-link-tab" data-toggle="tab" href="#ziplink" role="tab" aria-controls="ziplink" aria-selected="false"><span> Zip Url </span><i class="fas fa-link"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files">
                    <!-- Strat of inside  file choose -->
                    <form class="section-container">

                        <div class="data-field">

                            <div class="card text-left dropzone dropzone-area " id="myUpload">
                                @if(config('app.ads_enable') == true)
                                @include('layouts.banner')
                                @endif
                                <div class="card-body">

                                    <div  class="fallback">
                                        <input  name="file" type="file" multiple />
                                    </div>
                                    <div class="dz-message"><h4>Drag & Drop Files Here</h4>
                                        <br/>
                                        <span class="btn btn-success text-white padding">Choose Files (up to 2GB)</span>

                                    </div>

                                    <div class="alert alert-info small" role="alert">
                                        Allowed file types:  jpg , png , jpeg , gif
                                    </div>
                                    @if(config('app.ads_enable') == true)
                                    @include('layouts.text')
                                    @endif
                                    <div class="alert alert-secondary small text-center " >Mp3 , Mp4, MKV , Mov , M4a , 3gp , 3g2 , jpg , png , gif , jpeg &  Mj2 Edited this year: &nbsp; <span class="text-danger">{{number_format($count_upload)}}</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="data-field data-field-btn mt-3">
                            <input type="submit" id="submit-file"  value="upload" class="btn btn-success px-5 mb-3">
                        </div>

                    </form>

                    <!-- End of inside file choose -->
                </div>
                <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                    <!-- Strat of inside search bar -->
                    <div class="data-field data-field-search mt-3">
                        <p>Please enter a valid image url</p>
                        <form id="link">

                            <input class="col col-sm-12 form-control" id="url" placeholder="domain.com/song.png" required>

                            <button type="submit" class="btn btn-success px-5 mt-3 mb-4"  id="submit-file">Go <i class="fas fa-sign-in-alt"></i> </button>
                        </form>
                    </div>
                    <!-- End of inside search bar -->
                </div>

              
                  <div class="tab-pane fade" id="zip" role="tabpanel" aria-labelledby="zip-tab">
                    <!-- Strat of inside search bar -->
                    <div class="data-field data-field-search mt-3">
                        <p>Zip upload</p>
                        <form id="zip">
                           
                            <input class="col col-sm-12 form-control" type="file" name="zip" accept=".zip" placeholder="domain.com/file.zip" required>

                            <button type="submit" class="btn btn-success px-5 mt-3 mb-4"  id="submit-file">Go <i class="fas fa-sign-in-alt"></i> </button>
                        </form>
                    </div>
                    <!-- End of inside search bar -->
                </div>
                <div class="tab-pane fade" id="ziplink" role="tabpanel" aria-labelledby="ziplink-tab">
                    <!-- Strat of inside search bar -->
                    <div class="data-field data-field-search mt-3">
                        <p>Zip upload Link</p>
                        <form id="zip-link">
                          
                            <input class="col col-sm-12 form-control" type="text" id="url-zip"  placeholder="domain.com/file.zip" required>

                            <button type="submit" class="btn btn-success px-5 mt-3 mb-4"  id="submit-file">Go <i class="fas fa-sign-in-alt"></i> </button>
                        </form>
                    </div>
                    <!-- End of inside search bar -->
                </div>
            </div>
            @if(config('app.ads_enable') == true)
            @include('layouts.banner')
            @endif
            {{config('app.name')}} is the best online editing tool to change your mp3  , jpg , gif , png , jpegand Mp4 tags like watermark on mp4, cover art and join two mp3 files . 
            Using this platform you can upload and edit your mp3 tags or join another mp3 .
            Download your updated files by using our easy download button .
            <br/>  <br/>
            <small>
                {{config('app.name')}} you can now change your mp3 , jpg , png , gif , jpeg and Mp4 files by adding pictures to mp3 or Mp4 tag, changing mp3tag title, changing mp3tag album, changing mp3tag artist and joining mp3 voice tag . 
            </small>
            @if(config('app.ads_enable') == true)
            @include('layouts.text')
            @endif

        </div>
    </div>
</main>
@section('script')
<script src="{{asset('dropzone/dropzone.min.js')}}"></script>
<script>

Dropzone.options.myUpload = {
    url: "{{url('upload')}}",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 15,
    maxFiles: 15,
    maxFilesize: 2000,
    timeout: 3000000,
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
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
            let generateRandomString = (stringLength) => {
                stringLength = typeof stringLength === 'number' ? stringLength : 20;
                const possibleCharacters = 'abcdefghijklmnopqrstuvwxyz1234567890';
                let str = '';
                for (let i = 0; i < stringLength; i++) {
                    const randomChar = possibleCharacters.charAt(
                            Math.floor(Math.random() * possibleCharacters.length)
                            );
                    str += randomChar;
                }
                return str;
            };
            var count = dzClosure.files.length;
            let generator = generateRandomString(10);
            formData.append("random_string_upload", generator);
            let ping = setInterval(function () {
                checkUpload(count, generator);
            }, 6000);
            function clear_interval(interval) {
                return clearInterval(interval);
            }
            $(".modal").show();
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
                clearInterval(ping);
                return false;
            }
            if (responseText.data['status'] === 411) {
                var message = responseText.data['message'];
                toastr.options.onHidden = function () {
                    $('.dz-preview').remove();
                    $(".modal").hide();

                };
                toastr.info(message, {timeOut: 50000});
                clearInterval(ping);
                return false;
            }

            if (responseText.data['status'] === 422) {
                var message = responseText.data['message'];
                toastr.options.onHidden = function () {
                    $('.dz-preview').remove();
                    $(".modal").hide();

                };
                toastr.info(message, {timeOut: 50000});
                clearInterval(ping);
                return false;
            }


            if (responseText.data['status'] === 200) {
                toastr.info('upload still in progress... please wait', {timeOut: 500});
                $(".modal").hide();

                return false;
            }

        });
        function checkUpload(count, generator) {
            jQuery.ajax({
                url: "{{url('get-upload-muitple')}}",
                data: {id: generator, count: count},
                method: 'GET',
                success: function (data) {
                    if (data.data['status'] === 200) {
                        let url = data.data['data'];
                        toastr.success('success please wait ... redirecting', {timeOut: 500});
                        window.location.href = "{{url('/tags')}}?" + url;
                        /*Finish*/
                        clear_interval(ping);
                        return false;
                    }

                }

            });

        }

    }
};
</script>
<script type="text/javascript">
    $(document).ready(function () {
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        }
        $(document.body).on("click", "a[data-toggle='tab']", function (event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on("popstate", function () {
        var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
        $("a[href='" + anchor + "']").tab("show");
    });
</script>
<script>
    /*
     link
     */
    $('#link').submit(function (event) {
        event.preventDefault();
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
        let generateRandomString = (stringLength) => {
            stringLength = typeof stringLength === 'number' ? stringLength : 20;
            const possibleCharacters = 'abcdefghijklmnopqrstuvwxyz1234567890';
            let str = '';
            for (let i = 0; i < stringLength; i++) {
                const randomChar = possibleCharacters.charAt(
                        Math.floor(Math.random() * possibleCharacters.length)
                        );
                str += randomChar;
            }
            return str;
        };
        let generator = generateRandomString(10);
        let ping = setInterval(function () {
            checkUpload(generator);
        }, 6000);
        function clear_interval(interval) {
            return clearInterval(interval);
        }
        jQuery.ajax({
            url: "{{url('/upload-link')}}",
            type: 'POST',
            data: {
                url: jQuery('#url').val(),
                random_string_upload: generator
            },
            success: function (responseText) {
                if (responseText.data['status'] === 401) {
                    jQuery.each(responseText.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {

                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 411) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {
                        $('.dz-preview').remove();
                        $(".modal").hide();

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 422) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 200) {
                    toastr.info('upload still in progress... please wait', {timeOut: 50000});
                    return false;
                }
            }

        });
        function checkUpload(generator) {
            jQuery.ajax({
                url: "{{url('get-upload')}}",
                data: {id: generator},
                method: 'GET',
                success: function (data) {
                    if (data.data['status'] === 200) {
                        let url = data.data['data'];
                        toastr.success('success please wait ... redirecting', {timeOut: 500});
                        window.location.href = "{{url('/tags')}}?" + url;
                        /*Finish*/
                        clear_interval(ping);
                        return false;
                    }

                }

            });

        }
    });
    /*
     link youtube
     */
    $('#link-youtube').submit(function (event) {
        event.preventDefault();
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
        let generateRandomString = (stringLength) => {
            stringLength = typeof stringLength === 'number' ? stringLength : 20;
            const possibleCharacters = 'abcdefghijklmnopqrstuvwxyz1234567890';
            let str = '';
            for (let i = 0; i < stringLength; i++) {
                const randomChar = possibleCharacters.charAt(
                        Math.floor(Math.random() * possibleCharacters.length)
                        );
                str += randomChar;
            }
            return str;
        };
        let generator = generateRandomString(10);
        let ping = setInterval(function () {
            checkUpload(generator);
        }, 6000);
        function clear_interval(interval) {
            return clearInterval(interval);
        }
        jQuery.ajax({
            url: "{{url('/upload-link')}}",
            type: 'POST',
            data: {
                url: jQuery('#url_youtube').val(),
                action: jQuery('#action').val(),
                random_string_upload: generator
            },
            success: function (responseText) {
                if (responseText.data['status'] === 401) {
                    jQuery.each(responseText.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {

                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 411) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {
                        $('.dz-preview').remove();
                        $(".modal").hide();

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 422) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }

                if (responseText.data['status'] === 200) {
                    toastr.info('upload still in progress... please wait', {timeOut: 50000});
                    return false;
                }
            }

        });
        function checkUpload(generator) {
            jQuery.ajax({
                url: "{{url('get-upload')}}",
                data: {id: generator},
                method: 'GET',
                success: function (data) {
                    if (data.data['status'] === 200) {
                        let url = data.data['data'];
                        toastr.success('success please wait ... redirecting', {timeOut: 500});
                        window.location.href = "{{url('/tags')}}?" + url;
                        /*Finish*/
                        clear_interval(ping);
                        return false;
                    }

                }

            });

        }
    });
 /*
     Zip link
     */
    $('#zip-link').submit(function (event) {
        event.preventDefault();
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
        let generateRandomString = (stringLength) => {
            stringLength = typeof stringLength === 'number' ? stringLength : 20;
            const possibleCharacters = 'abcdefghijklmnopqrstuvwxyz1234567890';
            let str = '';
            for (let i = 0; i < stringLength; i++) {
                const randomChar = possibleCharacters.charAt(
                        Math.floor(Math.random() * possibleCharacters.length)
                        );
                str += randomChar;
            }
            return str;
        };
        let generator = generateRandomString(10);
        let ping = setInterval(function () {
            checkUpload(generator);
        }, 6000);
        function clear_interval(interval) {
            return clearInterval(interval);
        }
        jQuery.ajax({
            url: "{{url('/upload-zip-link')}}",
            type: 'POST',
            data: {
                url: jQuery('#url-zip').val(),
                random_string_upload: generator
            },
            success: function (responseText) {
                if (responseText.data['status'] === 401) {
                    jQuery.each(responseText.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {

                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 422) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }

                if (responseText.data['status'] === 200) {
                    toastr.info('upload still in progress... please wait', {timeOut: 50000});
                    return false;
                }
            }

        });
        function checkUpload(generator) {
            jQuery.ajax({
                url: "{{url('get-upload-m')}}",
                data: {id: generator},
                method: 'GET',
                success: function (data) {
                    if (data.data['status'] === 200) {
                        let url = data.data['data'];
                        toastr.success('success please wait ... redirecting', {timeOut: 500});
                        window.location.href = "{{url('/tags')}}?" + url;
                        /*Finish*/
                        clear_interval(ping);
                        return false;
                    }

                }

            });
        }
    });



    /*
     zip
     */
    $('form#zip').submit(function (event) {
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
        let generateRandomString = (stringLength) => {
            stringLength = typeof stringLength === 'number' ? stringLength : 20;
            const possibleCharacters = 'abcdefghijklmnopqrstuvwxyz1234567890';
            let str = '';
            for (let i = 0; i < stringLength; i++) {
                const randomChar = possibleCharacters.charAt(
                        Math.floor(Math.random() * possibleCharacters.length)
                        );
                str += randomChar;
            }
            return str;
        };
        let generator = generateRandomString(10);
        formData.append('random_string_upload', generator);
        let ping = setInterval(function () {
            checkUpload(generator);
        }, 6000);
        function clear_interval(interval) {
            return clearInterval(interval);
        }
        jQuery.ajax({
            url: "{{url('/upload-zip')}}",
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (responseText) {
                if (responseText.data['status'] === 401) {
                    jQuery.each(responseText.data['message'], function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {

                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    clearInterval(ping);
                    return false;
                }
                if (responseText.data['status'] === 422) {
                    var message = responseText.data['message'];
                    toastr.options.onHidden = function () {

                    };
                    toastr.info(message, {timeOut: 50000});
                    clearInterval(ping);
                    return false;
                }

                if (responseText.data['status'] === 200) {
                    toastr.info('upload still in progress... please wait', {timeOut: 50000});
                    return false;
                }
            }

        });
        function checkUpload(generator) {
            jQuery.ajax({
                url: "{{url('get-upload-m')}}",
                data: {id: generator},
                method: 'GET',
                success: function (data) {
                    if (data.data['status'] === 200) {
                        let url = data.data['data'];
                        toastr.success('success please wait ... redirecting', {timeOut: 500});
                        window.location.href = "{{url('/tags')}}?" + url;
                        /*Finish*/
                        clear_interval(ping);
                        return false;
                    }

                }

            });
        }
    });


</script> 
@endsection
@endsection