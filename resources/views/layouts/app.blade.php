<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
    <meta name="viewport" content="width=1024" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    @yield('title')
    <!--== bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--== animate -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css" />

    <!--== fontawesome -->
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet" type="text/css" />

    <!--== themify -->
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet" type="text/css" />

    <!--== lightgallery -->
    <link href="{{asset('css/lightgallery/lightgallery.css')}}" rel="stylesheet" type="text/css" />

    <!--== audioplayer -->
    <link href="{{asset('css/lightgallery/audioplayer.css')}}" rel="stylesheet" type="text/css" />

    <!--== magnific-popup -->
    <link href="{{asset('css/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

    <!--== owl-carousel -->
    <link href="{{asset('css/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />

    <!--== slit-slider -->
    <link href="{{asset('css/slit-slider/slit-slider.css')}}" rel="stylesheet" type="text/css" />

    <!--== slick-slider -->
    <link href="{{asset('css/slick-slider/slick.css')}}" rel="stylesheet" type="text/css" />

    <!--== base -->
    <link href="{{asset('css/base.css')}}" rel="stylesheet" type="text/css" />

    <!--== shortcodes -->
    <link href="{{asset('css/shortcodes.css')}}" rel="stylesheet" type="text/css" />

    <!--== default-theme -->
    <link href="{{asset('css/default-theme.css')}}" rel="stylesheet" type="text/css" />

    <!--== responsive -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <!--== color-customizer -->
    <link href="#" data-style="styles" rel="stylesheet">
    <link href="{{asset('css/color-customize/color-customizer.css')}}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,500i,700,700i&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <style>
        .toast {
            opacity: 0.9!important;
        }
        :root {
            --wpcargo: #00A924;
        }
        .modal
        {
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: Black;
            filter: alpha(opacity=60);
            opacity: 0.6;
            -moz-opacity: 0.8;
        }
        .mcenter
        {
            z-index: 1000;
            margin: 300px auto;
            padding: 10px;
            width: 130px;
            background-color: White;
            border-radius: 10px;
            filter: alpha(opacity=100);
            opacity: 1;
            -moz-opacity: 1;
        }
        .mcenter img
        {
            height: 100px;
            width: 100px;
        }
        /*contentBot*/
        .contentBotContainer {
            width: 100%;
            background: #d84f1d
        }
        .contentBotInner {
            width: 1170px;
            margin: 0 auto;
            padding: 30px 0;
            background: url(images/bg3.html) transparent no-repeat center;
            background-size: cover;
        }
        .content-bot-part {
            border-radius: 3px;
            background: #eeeff0;
            padding: 15px;
        }
        .content-bot-part h3 {
            line-height: 39px;
            text-align: center;
            border-radius: 3px;
            background: #292D4E;
            font-size: 18px;
            color: #ffffff;
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            text-transform: uppercase;
            margin: 0;
            margin-bottom: 15px;
        }
        .content-bot-part table {
            margin: 0;
        }
        .content-bot-part table tr:nth-child(odd) td {
            background: #d0d3d5;
        }
        .content-bot-part table tr:nth-child(even) td {
            background: #dbdfe3;
        }
        .content-bot-part2 {
            margin: 0 2%;
        }


        /* ======= PRICING ======= */



        .bs-pricing-four {
            font-size: 16px;
            font-family: 'Open Sans', sans-serif;
        }
        .bs-pricing {
            background:#fff;
        }
        .bs-pricing-four .btn,
        .bs-pricing-four .navbar > li > a.btn {
            border: none;
            border-radius: 3px;
            position: relative;
            padding: 12px 30px;
            margin: 10px 1px;
            font-size: 12px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0;
            will-change: box-shadow, transform;
            transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bs-pricing-four .btn {
            border-radius: 30px;
        }





        /* btn-danger */
        .bs-pricing-four .btn.btn-danger {
            color: #FFFFFF;
            background-color: #f44336;
            border-color: #f44336;
            box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
        }

        .bs-pricing-four .btn.btn-danger:focus,
        .bs-pricing-four .btn.btn-danger:active,
        .bs-pricing-four .btn.btn-danger:hover {
            box-shadow: 0 14px 26px -12px rgba(244, 67, 54, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(244, 67, 54, 0.2);
        }


        /* btn-success */
        .bs-pricing-four .btn.btn-success {
            color: #FFFFFF;
            background-color: #4caf50;
            border-color: #4caf50;
            box-shadow: 0 2px 2px 0 rgba(76, 175, 80, 0.14), 0 3px 1px -2px rgba(76, 175, 80, 0.2), 0 1px 5px 0 rgba(76, 175, 80, 0.12);
        }

        .bs-pricing-four .btn.btn-success:focus,
        .bs-pricing-four .btn.btn-success:active,
        .bs-pricing-four .btn.btn-success:hover {
            box-shadow: 0 14px 26px -12px rgba(76, 175, 80, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(76, 175, 80, 0.2);
        }




        /* btn-white */
        .bs-pricing-four .btn.btn-white {
            color: #3C4857;
            background-color: #fff;
            border-color: #fff;
            box-shadow: 0 2px 2px 0 rgba(153, 153, 153, 0.14), 0 3px 1px -2px rgba(153, 153, 153, 0.2), 0 1px 5px 0 rgba(153, 153, 153, 0.12);
        }

        .bs-pricing-four .btn.btn-white:focus,
        .bs-pricing-four .btn.btn-white:active,
        .bs-pricing-four .btn.btn-white:hover {
            box-shadow:  0 14px 26px -12px rgba(255, 255, 255, 0.42), 0 4px 23px 0px rgba(255, 255, 255, 0.12), 0 8px 10px -5px rgba(255, 255, 255, 0.2)
        }








        .bs-pricing-four .bs {
            display: inline-block;
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            border-radius: 6px;
            color: #444;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }

        .bs-pricing-four .bs.bs-background-img{
            background: url(images/pricing-bg-image.html) no-repeat center center;
            background-size: cover;
            position: relative;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            transition: all 1s;
        }
        .bs-pricing-four .bs.bs-background-img:hover{
            -webkit-filter: grayscale(0%);
            filter: grayscale(0%);
        }
        .bs-pricing-four .bs-background-img,
        .bs-pricing-four .bs-background-img h1 small{
            color:#fff ;
        }
        .bg-danger{background-color: #f44336}

        .bs-pricing-four .bg-danger,
        .bs-pricing-four .bg-danger h1 small
        {
            color:#fff;
        }


        .bs-pricing-four .bs-background-img:after {
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            display: bs;
            left: 0;
            top: 0;
            content: "";
            background-color: rgba(0, 0, 0, 0.56);
            border-radius: 6px;
        }

        .bs-pricing-four .bs-pricing {
            text-align: center;
            position: relative;
        }

        .bs-pricing-four .bs-pricing .bs-caption {
            margin-top: 30px;
        }

        .bs-pricing-four .bs-pricing .cotent {
            padding: 15px;
            margin-bottom: 0px;
            z-index: 2;
            position: relative;
        }



        .bs-pricing-four .bs-pricing ul {
            list-style: none;
            padding: 0;
            margin: 10px auto;

        }

        .bs-pricing-four .bs-pricing ul li {
            text-align: center;
            padding: 12px 0;
        }
        .bs-pricing-four .bs-pricing ul:not(.nav-pills) li{
            border-bottom: 1px solid rgba(153, 153, 153, 0.3);
        }

        .input-group {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
        }

        .input-group>.form-control:not(:last-child), .input-group>.custom-select:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group>.form-control, .input-group>.form-control-plaintext, .input-group>.custom-select, .input-group>.custom-file {
            position: relative;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            margin-bottom: 0;
        }
        .border-dark {
            border-color: #343a40 !important;
        }

        .input-group-append {
            margin-left: -1px;
        }
        .input-group-prepend, .input-group-append {
            display: -ms-flexbox;
            display: flex;
        }


        .well-services {
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            z-index: 1;
            background: #fff;
        }
        .top-icon {
            position: absolute;
            right: 15px;
            font-size: 44px;
            bottom: 0px;
            background: #F6A724;
            width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            color: #fff;
            border-radius: 5px 5px 0px 0px;
            z-index: 9;
        }
        .main-services {
            display: block;
            overflow: hidden;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .well-icon {
            width: 60px;
            float: left;
            height: 100px;
            font-size: 40px;
            color: #80c32f;
        }
        .services-img {
            overflow: hidden;
            position: relative;
            text-align: center;
        }
        .services-img img {
            transform: scale(1.1);
            transition: 0.4s;
        }
        .image-layer {
            position: absolute;
            left: 0;
            top: 100%;
            width: 100%;
            height: 100%;
            background: rgba(0,44,87,0.95) none repeat scroll 0 0;
            z-index: 1;
            opacity: 1;
            transition: 0.4s;
            padding: 30px 20px;
        }
        .image-layer a {
            display: block;
            text-align: left;
            position: relative;
            margin-bottom: 10px;
            color: #fff;
            font-size: 14px;
        }
        .image-layer a i {
            border-radius: 50%;
            background: transparent;
            font-size: 20px;
            opacity: 0.90;
            line-height: 30px;
            margin-right: 15px;
        }
        .service-content h4 {
            display: inline-block;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 0;
            padding: 0 0 10px;
            text-transform: uppercase;
        }
        .service-btn {
            font-weight: 700;
            text-transform: uppercase;
            color: #444;
            position: relative;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            z-index: 2;
        }
        .service-btn::after {
            position: absolute;
            content: "\f105";
            font-family: fontAwesome;
            right: -15px;
            top: -5px;
            font-size: 16px;
        }
        .well-services:hover .services-img img {
            transform: scale(1);
            transition: 0.4s;
        }
        .well-services:hover .image-layer {
            position: absolute;
            left: 0;
            top: 0;
            transition: 0.4s;
        }
        .well-services:hover .service-content h4{
            color: #80c32f;
        }
        .well-services:hover .service-btn:hover{
            color: #80c32f;
        }
        .image-layer a:hover{
            color: #80c32f;
        }

        .carousel-item {
            min-height: 650px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
         #dashboard {
    height: auto;
    width: 100%;
  
    min-width: 1170px;
    }


#sub_dashboard {
    width: 1140px;
    margin: 0 auto;
    overflow: hidden;
    padding: 40px 0px;
}

.dash_head {
    width: auto;
    overflow: hidden;
    margin: 0 auto;
    display: table;
    border-bottom: 1px solid#2d313d;
    }

.dash_head p{
    color: #2d313d;
    font-size: 40px;
    margin-top: -5px;
    }


.desh_menu {
    height: auto;
    width: 100%;
    background-color: #2d313d;
    overflow: hidden;
    padding: 15px 0px;
    margin-top: 25px;
    border-radius: 5px;
    margin-bottom: 30px;
    }

.desh-menu{
	height:auto;
	width:100%;
	margin-top:12px;
    text-align: center;
	overflow:hidden;
	}

.desh-menu:first-child{
	margin-top:0px;
	}
.desh-menu ul{
	list-style:none;
    display: inline-flex;
	}

.desh-menu ul li{
	width:auto;
	background-color:#3d414c;
	border-radius:1px;
	float:left;
	margin-left:2px;
	}
.desh-menu ul li:hover{
		background-color:#3d414c;
	}

.desh-menu ul li:first-child{
	margin-left:0px;
	}
	
.desh-menu ul li a{
    color: #FFFFFF;
    text-transform: capitalize;
    font-size: 14px;
    display: block;
    padding: 4px 14.5px;
    text-align: center;
    border-radius: 2px;
    letter-spacing: 0.5px;
	}
	
.desh-menu ul li a:hover{
    background: #6666ff;
    color: #000;
}
 
.duser {
    height: auto;
    width: auto;
    margin: 0 auto;
    display: table;
    overflow: hidden;
}

.duseri {
    width: auto;
    float: left;
    overflow: hidden;
}

.duser_textr {
    height: auto;
    width: auto;
    margin-left: 10px;
    margin-top: 5px;
    float: left;
    }

.duser_textr p{
    color: #000000;
    font-size: 24px;
    text-transform: uppercase;
    font-weight: 600;
}


.desh_mid{
    width: 100%;
    height: auto;
    overflow: hidden;
    margin-top: 25px;
    }



.desh_mid_one {
    width: 366px;
    height: 50px;
    background-image: url({{url('images/dbg.png')}});
    background-repeat: no-repeat;
    float: left;
    margin-left: 20px;
    
    }
.desh_mid_one:first-child{
    margin-left: 0px;
}

.desh_mid_one p{
    color: #fff;
    font-size: 14px;
    letter-spacing: 1px;
    padding: 13px 20px;
}

.desh_mid_one p span{
    float: right;
}


.balancei {
    height: auto;
    width: auto;
    text-align: center;
    margin-top: 15px;
    }

.balance_tittle {
    height: auto;
    width: auto;
    text-align: center;
    margin-top: 10px;
    
    }
.balance_tittle p{
    color: #fff;
    letter-spacing: 1px;
    font-size: 18px;
}

.balance_border {
    height: 1px;
    width: 50px;
    margin: 0 auto;
    display: table;
    background-color: #00cc00;
    margin-top: 5px;
}

.all_balances {
    width: 100%;
    height: auto;
    overflow: hidden;
    margin-top: 14px;
}

.balance1{
    width: 100%;
    overflow: hidden;
    border-bottom: 1px dashed #00cc00;
    margin-top: 20px;
    }
.balance1:first-child{
    margin-top: 0px;
}

.balance1 p{
    color: #fff;
    padding-bottom: 5px;
    letter-spacing: 0.5px;
}

.balance1 p span{
    float: right;
    }


.invest_nowa {
    height: auto;
    width: 210px;
    margin: 0 auto;
    display: table;
    padding-top: 16px;
}
.invest_nowa a{
    text-transform: uppercase;
}

.refer_tittles {
    height: auto;
    width: auto;
    text-align: center;
    margin-top: 20px;
}

.refer_tittles p{
    color: #000000;
    font-size: 20px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.banners {
    height: auto;
    width: 100%;
    background-color: #F6A724;
    padding: 10px 0px;
    border-radius: 5px;
    margin-top: 15px;
}
.banners p{
       color: #fdfafa;
    text-align: center;
    font-size: 18px;
    letter-spacing: 2px;
}

.plan_select {
    width: 100%;
    padding-bottom: 1px;
    margin-top: 30px;
    border-bottom: 1px dashed #2e323e;
    }
.plan_select p{
    color: #000000;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.invest_all{
    width: 100%;
    height: auto;
    overflow: hidden;
    margin-top: 25px;
    }


.invest_one{
    height: auto;
    width: 550px;
    background-image: url({{url('images/latest.png')}});
    background-repeat: no-repeat;
    height: 423px;
    float: left;
    margin-left: 40px;
    overflow: hidden;
    }

.invest_one:first-child{
    margin-left: 0px;
}


.invest_head {
    height: auto;
    width: auto;
    float: left;
    overflow: hidden;
}
.standard-text{
    height: auto;
     
    overflow: hidden;
    float: left;
    margin-left: -11px;
    writing-mode: vertical-rl;
    margin-top: 90px;
    transform: rotate(180deg);
	}
.standard-text h5{
    color: #000;
    letter-spacing: 4px;
}


.latest_all {
    height: auto;
    width: 440px;
    padding: 30px;
    float: right;
    overflow: hidden;
}

.refer_right{
    float: right;
    width: 243px;
    text-align: center;
    overflow: hidden;
}

.refer_right h1{
    font-size: 35px;
    margin-top: 92px;
}

.refer_left {
    width: 842px;
    float: left;
    overflow: hidden;
}

.first{
    height: auto;
    width: 100%;
    float: left;
    padding: 2px 0px;
    overflow: hidden;
    padding-bottom: 1px;
    font-size: 15px;
     margin-top: 21px;

    border-bottom: 1px dashed#fff;
 }
	
.first:first-child{
	margin-top:0px;
	}  
</style>




<style>
    @media only screen and (max-width: 767px) {
   .desh-menu ul {
    list-style: none;
    display: block;
  
}
    #dashboard {
    height: auto;
    width: 100%;
    
    min-width: 100%;
    }


#sub_dashboard {
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
    padding: 40px 0px;
} 
.desh_mid_one {
    width: 366px;
     height: 66px; 
    background-image: url({{url('images/dbg.png')}});
    background-repeat: no-repeat;
    float: left;
    margin-left: 0px; 
}
.balance1 {
    width: 62%;
    overflow: hidden;
    border-bottom: 1px dashed #00cc00;
    margin-top: 20px;
}
.balancei {
    height: auto;
    width: auto;
   text-align: left;
    margin-top: 15px;
}
.balance_tittle {
    height: auto;
    width: auto;
    text-align: left; 
    margin-top: 10px;
}
.latest_all {
    height: auto;
    width: 440px;
    padding: 30px;
    float: left;
    overflow: hidden;
}
.invest_one {
    height: auto;
    width: 550px;
    background-image: url({{url('images/latest.png')}});
    background-repeat: no-repeat;
    height: 423px;
    float: left;
    margin-left: 0px;
   
    overflow: hidden;
}
.invest_nowa {
    height: auto;
    width: 210px;
    display: table;
    padding-top: 16px;
}
}
.ca{
 box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
    </style>

 <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
</head>

<body>

<body style="font-family: 'Ubuntu', sans-serif !important;">

    <!--page wrapper start-->

    <div class="page-wrapper">

        @include('layouts.nav')
        @yield('content')
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="{{asset('images/reload.gif')}}"  >
                </div>
            </div>
        @include('layouts.footer')


    </div>


    <!--== jquery -->
    <script src="{{asset('js/jquery.3.3.1.min.js')}}"></script>

    <!--== popper -->
    <script src="{{asset('js/popper.min.js')}}"></script>

    <!--== bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!--== jquery appear -->
    <script src="{{asset('js/jquery.appear.js')}}"></script> 

    <!--== jquery easing -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>

    <!--== modernizr -->
    <script src="{{asset('js/modernizr.js')}}"></script> 

    <!--== menu -->
    <script src="{{asset('js/menu/jquery.smartmenus.js')}}"></script>

    <!--== lightgallery -->
    <script src="{{asset('js/lightgallery/lightgallery.js')}}"></script> 

    <!--== audioplayer -->
    <script src="{{asset('js/lightgallery/audioplayer.js')}}"></script>

    <!--== magnific-popup -->
    <script src="{{asset('js/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

    <!--== owl-carousel -->
    <script src="{{asset('js/owl-carousel/owl.carousel.min.js')}}"></script> 

    <!--== slit-slider -->
    <script src="{{asset('js/slit-slider/jquery.ba-cond.min.js')}}"></script>
    <script src="{{asset('js/slit-slider/jquery.slitslider.js')}}"></script>

    <!--== slick-slider -->
    <script src="{{asset('js/slick-slider/slick.js')}}"></script>

    <!--== jarallax -->
    <script src="{{asset('js/jarallax/jarallax.min.js')}}"></script> 

    <!--== counter -->
    <script src="{{asset('js/counter/counter.js')}}"></script> 

    <!--== countdown -->
    <script src="{{asset('js/countdown/jquery.countdown.min.js')}}"></script> 

    <!--== isotope -->
    <script src="{{asset('js/isotope/isotope.pkgd.min.js')}}"></script> 

    <!--== contact-form -->
    <script src="{{asset('js/contact-form/contact-form.js')}}"></script>

    <!--== validate -->
    <script src="{{asset('js/contact-form/jquery.validate.min.js')}}"></script>

    <!--== map api -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <!--== map -->
    <script src="{{asset('js/map.js')}}"></script>

    <!--== typer -->
    <script src="{{asset('js/typer/typer.js')}}"></script>

    <!--== color-customizer -->
    <script src="{{asset('js/color-customize/color-customizer.js')}}"></script> 

    <!--== theme-script -->
    <script src="{{asset('js/theme-script.js')}}"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
       <script>
            $(".deleted").on("submit", function () {

                return confirm("Are you sure?");
            });
        </script>

        <script>
            $(".deleted-list").on("submit", function () {

                return confirm("Are you sure?");
            });
        </script>
        
@if(session()->has('message.level'))
<script type="text/javascript">
    swal({
        title: "{{ session('message.level') }}",
        html: true,
        text: "<span style='color:{{ session('message.color') }};font-size:20px;margin:10px'>{!! session('message.content') !!}",
        timer: 10000,
        type: "{{ session('message.level') }}",
         confirmButtonColor: "#0000cc"
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
</script>
@endif
    @yield('script')
</body>
</html>
