
@section('title')
<title>Upload mp3 -  join two mp3 files online | mp3 tager for editing mp3 and Mp4  files {{date('Y')}}</title>
<meta name="description" content="Upload and use this free online editor tool for editing mp3 and Mp4  files   , join mp3  or voice tag , editing of mp3 tags like changing the cover art , album, title, of any mp3 files " />
<meta name="keywords" content="Upload mp3 -  join two mp3 and Mp4  files online | mp3 tager for editing mp3 files" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Upload mp3 -  join two mp3 and Mp4  files online | mp3 tager for editing mp3 files" />
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
<link rel="stylesheet" href="{{asset('css/download.css')}}">
@endsection
@extends('layouts.app')
@section('content')

<div class="Mycontainer">
    <div class="msg-content">
        @if(config('app.ads_enable') == true)
        @include('layouts.banner')
        @endif
        <p class="bg-success text-center text-white p-2 mt-5">your settings saved successfully <i class="fas fa-thumbs-up"></i></p>
        <div id="accordion">
            @foreach($details as $key => $download)
            <div class="card-header-card" id="heading{{$key}}">
                <a href="#" class=" @if($key == 0) @else collapsed @endif" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="collapse{{$key}}">

                    <div class="download-songs " style="background-color: #d4edda; color: #000">

                        <span class='badge badge-primary'> {{ $loop->iteration }}</span> {{$download->file_name}} <i class="fa fa-plus"></i>

                    </div>
                </a>
            </div>
            <article id="collapse{{$key}}" class="collapse @if($key == 0) show @endif" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                <div class="download-songs">click <a @if($p == true) href="{{url($download_path.$download->slug)}}"  @else  href="{{url($download_path.$download->time_folder.$download->slug)}}" @endif> Here  <i class="fa fa-download"></i> </a> to download your file
                    <span class="badge badge-danger">{{$download->size}}</span> 
                    <button class="badge badge-primary down-btn-item clip-btn"> copy <i class="fas fa-copy"></i></button> link to clipborad 
                    <input type="text" style="opacity: 0;">
                    <br/>

                    <br/> <br/>
                    @if($download->mime_type == 'mp3')
                    <audio controls style="width:100%" loop>
                        @if($p == true)
                        <source src="{{url($download_path.$download->slug)}}" type="audio/ogg">
                        <source src="{{url($download_path.$download->slug)}}" type="audio/mpeg">
                        @else
                        <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="audio/ogg">
                        <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="audio/mpeg">

                        @endif
                        Your browser does not support the audio element.
                    </audio>

                    <br/> <br/>
                    <textarea cols="50" rows="5" class="embd-txt" style="width:100%">
                <audio controls style="width:100%" loop>
                     @if($p == true)
                      <source src="{{url($download_path.$download->slug)}}" type="audio/ogg">
                    <source src="{{url($download_path.$download->slug)}}" type="audio/mpeg">
                     @else
                     <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="audio/ogg">
                    <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="audio/mpeg">
                  
                    @endif
                  Your browser does not support the audio element.
                  </audio>

                    </textarea>
                    @else
                    @if($download->mime_type == 'jpg' || $download->mime_type == 'png' || $download->mime_type == 'jpeg' || $download->mime_type == 'gif')
                    @if($p == true)

                    <img src="{{url($download_path.$download->slug)}}" width="300" height="150"/>
                    @else

                    <img src="{{url($download_path.$download->time_folder.$download->slug)}}" width="300" height="150"/>
                    @endif
                    @else
                    <video style="width:100%" controls loop>
                        @if($p == true)
                        <source src="{{url($download_path.$download->slug)}}" type="video/mp4">
                        <source src="{{url($download_path.$download->slug)}}" type="video/ogg">
                        @else
                        <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="video/mp4">
                        <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="video/ogg">

                        @endif
                        Your browser does not support HTML video.
                    </video>
                    @endif
                    <br/> <br/>
                    <textarea cols="50" rows="5" class="embd-txt" style="width:100%">
               @if($download->mime_type == 'jpg' || $download->mime_type == 'png' || $download->mime_type == 'jpeg' || $download->mime_type == 'gif')
                        @if($p == true)
                      <img src="{{url($download_path.$download->slug)}}" width="100" height="100"/>
                         @else
                          <img src="{{url($download_path.$download->time_folder.$download->slug)}}" width="100" height="100"/>
                         @endif
             
                    @else
                <video style="width:100%" controls loop>
                  @if($p == true)
                <source src="{{url($download_path.$download->slug)}}" type="video/mp4">
                <source src="{{url($download_path.$download->slug)}}" type="video/ogg">
                @else 
                 <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="video/mp4">
                <source src="{{url($download_path.$download->time_folder.$download->slug)}}" type="video/ogg">
               
                @endif
                
                Your browser does not support HTML video.
            </video>
              @endif

                    </textarea>
                    @endif

                    <button class="embd-btn">copy embedded code</button>
                </div> 
                @if(config('app.ads_enable') == true)
                @include('layouts.text')
                @endif
                <div class="clearfix"></div>
            </article>

            @endforeach
            @if(count($details) >1 )
            @if(!empty(config('app.tag_path')))
            <div class="download-songs " style="background-color:  {{config('app.color_site')}}"><a class="text-white" href="{{url('zip-downloads?slug='.$zip)}}"> Batch Download All  <i class="fa fa-download"></i></a> &nbsp;</div> 
            @else 
            <div class="download-songs " style="background-color:  {{config('app.color_site')}}"><a class="text-white" href="{{url(config('app.main_site_url') . '/' . config('app.main_site'). '/' .'zip-downloads?zip='.$zip)}}"> Batch Download All  <i class="fa fa-download"></i></a> &nbsp;</div> 

            @endif
            @endif
        </div>

    </div>

</div>
@section('script')
<script>
    $(document).ready(function () {
        $('.clip-btn').click(function () {
            var targetTxt = $(this).next();
            var targetLink = $(this).prev().prev();
            var linKVal = targetTxt.val();
            targetTxt.val(targetLink.attr('href'));
            var copyText = targetTxt;
            copyText.select();
            document.execCommand("copy");
            let message = "Copied the text: " + copyText.val();
            toastr.success(message, {timeOut: 50000});
        });

        $('.embd-btn').click(function () {
            var targetTextArea = $(this).prev();
            var copyTextArea = targetTextArea;
            copyTextArea.select();
            document.execCommand("copy");
            let message = "Embedded Code Copied Successfully , you can use it on your website for post";
            toastr.success(message, {timeOut: 50000});
        });



    })
</script>
<script>
    $(document).ready(function () {
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function () {
            $(this).prev(".card-header-card").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function () {
            $(this).prev(".card-header-card").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function () {
            $(this).prev(".card-header-card").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Get saved data from sessionStorage
        let selectedCollapse = sessionStorage.getItem('selectedCollapse');
        if (selectedCollapse !== null) {
            $('.accordion .collapse').removeClass('show');
            $(selectedCollapse).addClass('show');
        }
        //To set, which one will be opened
        $('.accordion .btn-link').on('click', function () {
            let target = $(this).data('target');
            //Save data to sessionStorage
            sessionStorage.setItem('selectedCollapse', target);
        });
    });
</script>
@endsection
@endsection