@section('title')
<title>Analytics {{$title}}</title>
<meta name="description" content="Analytics - {{$title}}" />
<meta name="keywords" content="Analytics - {{$title}}" />
<meta name="apple-mobile-web-app-title" content="Mp3Tager" />
<meta property="fb:app_id" content="" />
<meta name="theme-color" content="#08192D"/>
<meta property="og:title" content="Analytics - {{$title}}" />
<meta property="og:description" content="Analytics - {{$title}} " />
<meta property="og:url" content="{{url('/')}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Analytics - {{$title}}" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@mp3tager">
<meta name="twitter:title" content="Analytics - {{$title}}">
<meta name="twitter:description" content="Analytics - {{$title}}">
<link rel="canonical" href="{{url('/')}}" />
<meta property="og:image" content="{{url(config('app.logo'))}}" />
<meta property="og:image:alt" content="Analytics - {{$title}}">
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:image" content="{{url(config('app.logo'))}}" />
<meta name="twitter:image:alt" content="My files" />


@endsection
@extends('layouts.app')
@section('content')
<style>
    .media:nth-child(even){
        background-color: #E9E8EF!important
    } 

    .search {
        width: 100%;
        display: flex;
    }

    .searchTerm {
        width: 100%;
        border: 3px solid {{config('app.color_site')}};
        border-right: none;
        padding: 5px;
        height: 36px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: #9DBFAF;
    }

    .searchTerm:focus{
        color: {{config('app.color_site')}};
    }

    .searchButton {
        width: 40px;
        height: 36px;
        border: 1px solid {{config('app.color_site')}};
        background: {{config('app.color_site')}};
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap{
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
    }
    [type="checkbox"]:not(:checked) + label,
    [type="checkbox"]:checked + label {
        position: relative;
        padding-left: 1.95em;
        cursor: pointer;
    }

    /* checkbox aspect */
    [type="checkbox"]:not(:checked) + label:before,
    [type="checkbox"]:checked + label:before {
        content: '';
        position: absolute;
        left: 0; top: 0;
        width: 1.25em; height: 1.25em;
        border: 2px solid #ccc;
        background: #fff;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
    }
    /* checked mark aspect */
    [type="checkbox"]:not(:checked) + label:after,
    [type="checkbox"]:checked + label:after {
        content: '\2713\0020';
        position: absolute;
        top: .15em; left: .22em;
        font-size: 1.3em;
        line-height: 0.8;
        color: {{config('app.color_site')}};
        transition: all .2s;
        font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
    }
    /* checked mark aspect changes */
    [type="checkbox"]:not(:checked) + label:after {
        opacity: 0;
        transform: scale(0);
    }
    [type="checkbox"]:checked + label:after {
        opacity: 1;
        transform: scale(1);
    }
    /* disabled checkbox */
    [type="checkbox"]:disabled:not(:checked) + label:before,
    [type="checkbox"]:disabled:checked + label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
    }
    [type="checkbox"]:disabled:checked + label:after {
        color: #999;
    }
    [type="checkbox"]:disabled + label {
        color: #aaa;
    }
    /* accessibility */
    [type="checkbox"]:checked:focus + label:before,
    [type="checkbox"]:not(:checked):focus + label:before {
        border: 2px dotted blue;
    }

    /* hover style just for information */
    label:hover:before {
        border: 2px solid {{config('app.color_site')}}!important;
    }
      .table-responsive-stack tr {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
    }


    .table-responsive-stack td,
    .table-responsive-stack th {
        display:block;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .table-responsive-stack .table-responsive-stack-thead {
        font-weight: bold;
    }

    @media screen and (max-width: 768px) {
        .table-responsive-stack tr {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            border-bottom: 3px solid #ccc;
            display:block;

        }
        /*  IE9 FIX   */
        .table-responsive-stack td {
            float: left\9;
            width:100%;
        }
    }

</style>
<!-- --------------Start of Body----------->
<main class="upload-page">
    <div class="container">
        <div class="tabs-container">
          
      <div class="main-panel">

    <div class="content-wrapper">
        <div class="row">


            <div class="col-md-12"
                                 <!-- Tab panes -->
                                 <div class="tab-content">
                                    <h4 class="text-muted mb-4 text-center"> Analytics for {{$title}} </h4>
                                    <hr>  
                                    <div class="text-center">
                                        <span class="mb-5" style="font-size:15px">
                                            All Analytics of {{$title}} will be found here
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                 {!! $downloads->container() !!}
                                  {!! $downloads_ref->container() !!}
                                    <span class="results-wrapper mt-5">

                                        <table class="table table-bordered table-striped table-responsive-stack table-container"  id="tableOne">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#id</th>
                                                    <th>Country</th>
                                                     <th>Country count</th>
                                                    <th>Referrers</th>
                                                     <th>Referrers count</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                               @foreach($downloads_table->data as $reff)

                                                <tr>
                                                    <td width="50">{{$loop->iteration}}</td>
                                                    <td>{{$reff->name}}</td>
                                                     <td>{{$reff->value}}</td>
                                                    <td>{{$reff->referrer_url}}</td>
                                                     <td>{{$reff->ref}}</td>
                                                </tr>

                                                @endforeach
                                            </tbody>

                                        </table>
                                    </span>

                                    <br/>
                                 <div class="text-center pagination-wrapper" id="pagination-wrapper">
                                        @if(!empty($downloads_table->prev_page_url))

                                        <a href="{{$downloads_table->prev_page_url}}" class="btn btn-primary btn-sm">&laquo; Previous</a>
                                        @endif
                                        @if(!empty($downloads_table->next_page_url))
                                        <a href="{{ $downloads_table->next_page_url}}" class="btn btn-primary btn-sm">Next &raquo;</a>
                                        @endif
                                        <br/>  
                                    </div>
                                </div>
                            </div>  
          



        </div>




    </div>


    @section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
    <script>
    $(document).ready(function () {
        $('.table-responsive-stack').find("th").each(function (i) {

            $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ':</span> ');
            $('.table-responsive-stack-thead').hide();
        });

        $('.table-responsive-stack').each(function () {
            var thCount = $(this).find("th").length;
            var rowGrow = 100 / thCount + '%';
            $(this).find("th, td").css('flex-basis', rowGrow);
        });

        function flexTable() {
            if ($(window).width() < 768) {

                $(".table-responsive-stack").each(function (i) {
                    $(this).find(".table-responsive-stack-thead").show();
                    $(this).find('thead').hide();
                });
            } else {
                $(".table-responsive-stack").each(function (i) {
                    $(this).find(".table-responsive-stack-thead").hide();
                    $(this).find('thead').show();
                });



            }
        }

        flexTable();

        window.onresize = function (event) {
            flexTable();
        };

    });




</script>
  {!! $downloads->script() !!}
  {!! $downloads_ref->script() !!}
    @endsection
@endsection