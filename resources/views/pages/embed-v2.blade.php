@if($tags->mime_type == 'mp3')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$tags->title}} - Audio Player</title>
        <link rel="stylesheet" type="text/css" href="{{asset('embed/css/jquery.mCustomScrollbar.css')}}" media="all" /><!-- playlist scroll -->
        <link rel="stylesheet" type="text/css" href="{{asset('embed/css/art-narrow.css')}}" /><!-- main css file -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="{{asset('embed/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('embed/js/jquery.mCustomScrollbar.concat.min.js')}}"></script><!-- playlist scroll -->
        <script src="{{asset('embed/js/sharemanager.js')}}"></script><!-- share -->
        <script src="{{asset('embed/js/new.js')}}"></script><!-- main js file -->  
        <script src="{{asset('embed/js/volume_slider.js')}}"></script>
<!--         <style>
            .hap-player-thumb:before {
                content: "MP3TAGER";
                color: #cd6133;
                font-size: 15px;
            }
        </style>-->
        <script>

jQuery(document).ready(function ($) {

    var settings = {
        instanceName: "player1",
        sourcePath: "",
        activePlaylist: "#playlist-audio1",
        activeItem: 0,
        volume: 0.5,
        autoPlay: true,
        preload: "auto",
        randomPlay: false,
        loopState: 'playlist',
        usePlaylistScroll: true,
        playlistScrollOrientation: "vertical",
        playlistScrollTheme: "dark-2",
        useNumbersInPlaylist: false,
        playlistItemContent: "title,thumb",
        multilineTitle: true,

    };

    $("#hap-wrapper").hap(settings);

});

        </script>

    </head>
    <body> 

        <!-- player code -->   
        <div id="hap-wrapper" class="hap-art-narrow-light">

            <div class="hap-player-outer">

                <div class="hap-wrapper-inner">

                    <div class="hap-playlist-holder">

                        <div class="hap-playlist-filter-msg"><span>NOTHING FOUND!</span></div>

                        <div class="hap-bottom-bar">

                            <input class="hap-search-filter" type="text" placeholder="Search..">
                            <div class="hap-sort-alpha hap-contr-btn">
                                <div class="hap-btn hap-btn-sort-alpha-up" data-tooltip="Title sort desc">
                                    <svg viewBox="0 0 448 512"><path d="M16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.21 0 21.38-17.24 11.31-27.31l-80-96a16 16 0 0 0-22.62 0l-80 96C-5.35 142.74 1.78 160 16 160zm400 128H288a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h56l-61.26 70.45A32 32 0 0 0 272 446.37V464a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-56l61.26-70.45A32 32 0 0 0 432 321.63V304a16 16 0 0 0-16-16zm31.06-85.38l-59.27-160A16 16 0 0 0 372.72 32h-41.44a16 16 0 0 0-15.07 10.62l-59.27 160A16 16 0 0 0 272 224h24.83a16 16 0 0 0 15.23-11.08l4.42-12.92h71l4.41 12.92A16 16 0 0 0 407.16 224H432a16 16 0 0 0 15.06-21.38zM335.61 144L352 96l16.39 48z"></path></svg>
                                </div>
                                <div class="hap-btn hap-btn-sort-alpha-down" data-tooltip="Title sort asc">
                                    <svg viewBox="0 0 448 512"><path d="M176 352h-48V48a16 16 0 0 0-16-16H80a16 16 0 0 0-16 16v304H16c-14.19 0-21.36 17.24-11.29 27.31l80 96a16 16 0 0 0 22.62 0l80-96C197.35 369.26 190.22 352 176 352zm240-64H288a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h56l-61.26 70.45A32 32 0 0 0 272 446.37V464a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-56l61.26-70.45A32 32 0 0 0 432 321.63V304a16 16 0 0 0-16-16zm31.06-85.38l-59.27-160A16 16 0 0 0 372.72 32h-41.44a16 16 0 0 0-15.07 10.62l-59.27 160A16 16 0 0 0 272 224h24.83a16 16 0 0 0 15.23-11.08l4.42-12.92h71l4.41 12.92A16 16 0 0 0 407.16 224H432a16 16 0 0 0 15.06-21.38zM335.61 144L352 96l16.39 48z"></path></svg>
                                </div>
                            </div>
                            <div class="hap-playlist-close hap-contr-btn" data-tooltip="Back">
                                <svg viewBox="0 0 448 512"><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg>
                            </div>

                        </div>

                        <div class="hap-playlist-inner">
                            <div class="hap-playlist-content">

                            </div>
                        </div>
                        <div class="hap-load-more-wrap"><span class="hap-load-more-btn">LOAD MORE</span></div>
                    </div>

                    <div class="hap-player-holder">

                        <!--                        <div class="hap-top-bar">
                        
                                                    <div class="hap-playlist-toggle hap-contr-btn" data-tooltip="Playlist">
                                                        <svg viewBox="0 0 512 512"><path d="M149.333 216v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-80c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zM125.333 32H24C10.745 32 0 42.745 0 56v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zm80 448H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm-24-424v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24zm24 264H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24z"></path></svg>
                                                    </div>
                        
                                                    <div class="hap-top-bar-controls-right">
                        
                                                        <div class="hap-share-toggle hap-contr-btn" data-tooltip="Share">
                                                            <svg viewBox="0 0 448 512"><path d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z"></path></svg>
                                                        </div>
                                                                                    
                                                                                    <div class="hap-popup-toggle hap-contr-btn" data-tooltip="Expand">
                                                                                        <svg viewBox="0 0 512 512"><path d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path></svg>
                                                                                    </div>
                        
                                                    </div>
                        
                                                </div>-->

                        <div class="hap-player-thumb-wrapper">
                            <div class="hap-player-header">
                                <div class="hap-player-image">
                                    <div class="hap-player-thumb"></div>
                                </div>
                                <div class="hap-info">
                                    <div class="hap-player-title"></div>
                                    <div class="hap-player-artist"></div>
                                </div>
                            </div>

                            <div class="hap-volume-wrapper">
                                <div class="hap-volume-toggle hap-contr-btn" data-tooltip="Volume">
                                    <div class="hap-btn hap-btn-volume-up">
                                        <svg viewBox="0 0 576 512"><path d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z"></path></svg>
                                    </div>
                                    <div class="hap-btn hap-btn-volume-down">
                                        <svg viewBox="0 0 384 512"><path d="M215.03 72.04L126.06 161H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V89.02c0-21.47-25.96-31.98-40.97-16.98zm123.2 108.08c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 229.28 336 242.62 336 257c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.87z"></path></svg>
                                    </div>
                                    <div class="hap-btn hap-btn-volume-off">
                                        <svg viewBox="0 0 640 512"><path d="M633.82 458.1l-69-53.33C592.42 360.8 608 309.68 608 256c0-95.33-47.73-183.58-127.65-236.03-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 42.78-11.96 83.59-33.22 119.06l-38.12-29.46C503.49 318.68 512 288.06 512 256c0-63.09-32.06-122.09-85.77-156.16-11.19-7.09-26.03-3.8-33.12 7.41-7.09 11.2-3.78 26.03 7.41 33.13C440.27 165.59 464 209.44 464 256c0 21.21-5.03 41.57-14.2 59.88l-39.56-30.58c3.38-9.35 5.76-19.07 5.76-29.3 0-31.88-17.53-61.33-45.77-76.88-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61 11.76 6.46 19.12 18.18 20.4 31.06L288 190.82V88.02c0-21.46-25.96-31.98-40.97-16.97l-49.71 49.7L45.47 3.37C38.49-2.05 28.43-.8 23.01 6.18L3.37 31.45C-2.05 38.42-.8 48.47 6.18 53.9l588.36 454.73c6.98 5.43 17.03 4.17 22.46-2.81l19.64-25.27c5.41-6.97 4.16-17.02-2.82-22.45zM32 184v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V352.6L43.76 163.84C36.86 168.05 32 175.32 32 184z"></path></svg>
                                    </div>
                                </div>
                                <div class="hap-volume-seekbar hap-volume-vertical">
                                    <div class="hap-volume-bg">
                                        <div class="hap-volume-level"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="hap-player-bottom">


                            <div class="hap-seekbar">
                                <div class="hap-progress-bg">
                                    <div class="hap-load-level"></div>
                                    <div class="hap-progress-level"></div>
                                </div>

                                <div class="hap-range-handle-a" data-width="30">
                                    <div class="hap-range-handle-a-hit"></div> 
                                </div>
                                <div class="hap-range-handle-b" data-width="30">
                                    <div class="hap-range-handle-b-hit"></div>
                                </div>

                            </div>

                            <div class="hap-media-time-wrap">
                                <div class="hap-media-time-current">0:00</div>
                                <div class="hap-media-time-total">0:00</div>
                            </div>
<!--                            <div class="hap-media-time-ad">Advertising will end in&nbsp;<span></span></div>-->

                            <div class="hap-player-controls">

                                <div class="hap-player-controls-left">

                                    <div class="hap-random-toggle hap-contr-btn">
                                        <div class="hap-btn hap-btn-random-off" data-tooltip="Shuffle off">
                                            <svg viewBox="0 0 512 512"><path d="M504.971 359.029c9.373 9.373 9.373 24.569 0 33.941l-80 79.984c-15.01 15.01-40.971 4.49-40.971-16.971V416h-58.785a12.004 12.004 0 0 1-8.773-3.812l-70.556-75.596 53.333-57.143L352 336h32v-39.981c0-21.438 25.943-31.998 40.971-16.971l80 79.981zM12 176h84l52.781 56.551 53.333-57.143-70.556-75.596A11.999 11.999 0 0 0 122.785 96H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12zm372 0v39.984c0 21.46 25.961 31.98 40.971 16.971l80-79.984c9.373-9.373 9.373-24.569 0-33.941l-80-79.981C409.943 24.021 384 34.582 384 56.019V96h-58.785a12.004 12.004 0 0 0-8.773 3.812L96 336H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h110.785c3.326 0 6.503-1.381 8.773-3.812L352 176h32z"></path></svg>
                                        </div>
                                        <div class="hap-btn hap-btn-random-on hap-contr-btn-hover" data-tooltip="Shuffle on">
                                            <svg viewBox="0 0 512 512"><path d="M504.971 359.029c9.373 9.373 9.373 24.569 0 33.941l-80 79.984c-15.01 15.01-40.971 4.49-40.971-16.971V416h-58.785a12.004 12.004 0 0 1-8.773-3.812l-70.556-75.596 53.333-57.143L352 336h32v-39.981c0-21.438 25.943-31.998 40.971-16.971l80 79.981zM12 176h84l52.781 56.551 53.333-57.143-70.556-75.596A11.999 11.999 0 0 0 122.785 96H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12zm372 0v39.984c0 21.46 25.961 31.98 40.971 16.971l80-79.984c9.373-9.373 9.373-24.569 0-33.941l-80-79.981C409.943 24.021 384 34.582 384 56.019V96h-58.785a12.004 12.004 0 0 0-8.773 3.812L96 336H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h110.785c3.326 0 6.503-1.381 8.773-3.812L352 176h32z"></path></svg>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="hap-skip-backward hap-contr-btn" data-tooltip="Backward 10 seconds" data-skip-time="10">
                                        <svg viewBox="0 0 426.667 426.667" style="height:22px;"><path d="M213.333,85.333V0L106.667,106.667l106.667,106.667V128c70.4,0,128,57.6,128,128s-57.6,128-128,128s-128-57.6-128-128 H42.667c0,93.867,76.8,170.667,170.667,170.667S384,349.867,384,256S307.2,85.333,213.333,85.333z"/><path d="M236.8,318.933c4.267,1.067,7.467,2.133,12.8,2.133c5.333,0,9.6,0,12.8-2.133c3.2-2.133,6.4-4.267,9.6-7.467   s5.333-7.467,6.4-11.733s2.133-10.667,2.133-17.067v-16c0-6.4-1.067-12.8-2.133-17.067s-4.267-8.533-6.4-11.733  c-2.133-3.2-5.333-6.4-9.6-7.467c-4.267-1.067-7.467-2.133-12.8-2.133c-5.333,0-9.6,0-12.8,2.133c-3.2,2.133-6.4,4.267-9.6,7.467   s-5.333,7.467-6.4,11.733c-1.067,4.267-2.133,10.667-2.133,17.067v16c0,6.4,1.067,12.8,2.133,17.067  c1.067,4.267,4.267,8.533,6.4,11.733S232.533,317.867,236.8,318.933z M237.867,264.533c0-4.267,1.067-8.533,1.067-10.667  c0-2.133,1.067-5.333,2.133-6.4c1.067-1.067,3.2-2.133,4.267-3.2c1.067-1.067,3.2-1.067,5.333-1.067s3.2,1.067,5.333,1.067  c2.133,0,3.2,2.133,4.267,3.2c1.067,1.067,1.067,3.2,2.133,6.4c1.067,3.2,1.067,6.4,1.067,10.667V284.8  c0,4.267-1.067,8.533-1.067,10.667s-1.067,5.333-2.133,6.4c-1.067,1.067-3.2,2.133-4.267,3.2c-1.067,1.067-3.2,1.067-5.333,1.067 s-3.2-1.067-5.333-1.067c-2.133,0-3.2-2.133-4.267-3.2c-1.067-1.067-1.067-3.2-2.133-6.4s-1.067-6.4-1.067-10.667V264.533z"/><polygon points="189.867,320 189.867,228.267 187.733,228.267 150.4,242.133 150.4,257.067 171.733,250.667 171.733,320"/></svg>
                                    </div>
    
                                    <div class="hap-skip-forward hap-contr-btn" data-tooltip="Forward 10 seconds" data-skip-time="10">
                                        <svg viewBox="0 0 512 512" style="height:22px;"><path d="M409.6,307.2c0,84.48-69.12,153.6-153.6,153.6s-153.6-69.12-153.6-153.6S171.52,153.6,256,153.6V256l128-128L256,0v102.4  c-112.64,0-204.8,92.16-204.8,204.8S143.36,512,256,512s204.8-92.16,204.8-204.8H409.6z"/> <polygon points="226.56,384 226.56,273.92 224,273.92 179.2,290.56 179.2,308.48 204.8,300.8 204.8,384 "/> <path d="M313.6,276.48c-5.12-1.28-8.96-2.56-15.36-2.56s-11.52,0-15.36,2.56c-3.84,2.56-7.68,5.12-11.52,8.96  s-6.4,8.96-7.68,14.08c-1.28,5.12-2.56,12.8-2.56,20.48v19.2c0,7.68,1.28,15.36,2.56,20.48c1.28,5.12,5.12,10.24,7.68,14.08   s6.4,7.68,11.52,8.96c5.12,1.28,8.96,2.56,15.36,2.56s11.52,0,15.36-2.56c3.84-2.56,7.68-5.12,11.52-8.96s6.4-8.96,7.68-14.08   c1.28-5.12,2.56-12.8,2.56-20.48V320c0-7.68-1.28-15.36-2.56-20.48c-1.28-5.12-5.12-10.24-7.68-14.08S318.72,277.76,313.6,276.48  z M313.6,341.76c0,5.12-1.28,10.24-1.28,12.8s-1.28,6.4-2.56,7.68c-1.28,1.28-3.84,2.56-5.12,3.84c-1.28,1.28-3.84,1.28-6.4,1.28  s-3.84-1.28-6.4-1.28c-2.56,0-3.84-2.56-5.12-3.84c-1.28-1.28-1.28-3.84-2.56-7.68c-1.28-3.84-1.28-7.68-1.28-12.8v-24.32  c0-5.12,1.28-10.24,1.28-12.8c0-2.56,1.28-6.4,2.56-7.68c1.28-1.28,3.84-2.56,5.12-3.84c1.28-1.28,3.84-1.28,6.4-1.28  s3.84,1.28,6.4,1.28c2.56,0,3.84,2.56,5.12,3.84c1.28,1.28,1.28,3.84,2.56,7.68c1.28,3.84,1.28,7.68,1.28,12.8V341.76z"/></svg>
                                    </div>
    
                                    -->                                <div class="hap-playback-rate-toggle hap-contr-btn" data-tooltip="Speed">
                                        <svg viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zM88 256H56c0-105.9 86.1-192 192-192v32c-88.2 0-160 71.8-160 160zm160 96c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96zm0-128c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z"></path></svg>
                                    </div> 

                                </div>

                                <div class="hap-player-controls-center">
                                    <div class="hap-prev-toggle hap-contr-btn">
                                        <svg viewBox="0 0 512 512"><path d="M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2zm256 0l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2z"></path></svg>
                                    </div>
                                    <div class="hap-playback-toggle hap-contr-btn">
                                        <div class="hap-btn hap-btn-play">
                                            <svg viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                                        </div>
                                        <div class="hap-btn hap-btn-pause">
                                            <svg viewBox="0 0 448 512"><path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="hap-next-toggle hap-contr-btn">
                                        <svg viewBox="0 0 512 512"><path d="M500.5 231.4l-192-160C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2zm-256 0l-192-160C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160c15.3-12.8 15.3-36.4 0-49.2z"></path></svg>
                                    </div>
                                </div> 

                                <div class="hap-player-controls-right">

                                    <div class="hap-range-toggle hap-contr-btn" data-tooltip="AB loop">
                                        <svg style="height:26px;" viewBox="0 0 24 24"><path d="M12.516 8.016v4.219l3.469 2.109-0.703 1.219-4.266-2.578v-4.969h1.5zM21 10.125h-6.797l2.766-2.813q-2.063-2.063-4.945-2.086t-4.945 1.992q-0.844 0.844-1.453 2.273t-0.609 2.602 0.609 2.602 1.453 2.273 2.297 1.453 2.625 0.609 2.648-0.609 2.32-1.453q2.016-2.016 2.016-4.875h2.016q0 3.703-2.625 6.281-2.625 2.625-6.375 2.625t-6.375-2.625q-2.625-2.578-2.625-6.258t2.625-6.305q1.078-1.078 2.93-1.852t3.398-0.773 3.398 0.773 2.93 1.852l2.719-2.813v7.125z"></path></svg>
                                    </div>

                                    <div class="hap-loop-toggle hap-contr-btn">
                                        <div class="hap-btn hap-btn-loop-playlist hap-contr-btn-hover" data-tooltip="Loop playlist">
                                            <svg viewBox="0 0 512 512"><path d="M493.544 181.463c11.956 22.605 18.655 48.4 18.452 75.75C511.339 345.365 438.56 416 350.404 416H192v47.495c0 22.475-26.177 32.268-40.971 17.475l-80-80c-9.372-9.373-9.372-24.569 0-33.941l80-80C166.138 271.92 192 282.686 192 304v48h158.875c52.812 0 96.575-42.182 97.12-94.992.155-15.045-3.17-29.312-9.218-42.046-4.362-9.185-2.421-20.124 4.8-27.284 4.745-4.706 8.641-8.555 11.876-11.786 11.368-11.352 30.579-8.631 38.091 5.571zM64.005 254.992c.545-52.81 44.308-94.992 97.12-94.992H320v47.505c0 22.374 26.121 32.312 40.971 17.465l80-80c9.372-9.373 9.372-24.569 0-33.941l-80-80C346.014 16.077 320 26.256 320 48.545V96H161.596C73.44 96 .661 166.635.005 254.788c-.204 27.35 6.495 53.145 18.452 75.75 7.512 14.202 26.723 16.923 38.091 5.57 3.235-3.231 7.13-7.08 11.876-11.786 7.22-7.16 9.162-18.098 4.8-27.284-6.049-12.735-9.374-27.001-9.219-42.046z"></path></svg>
                                        </div>
                                        <div class="hap-btn hap-btn-loop-single hap-contr-btn-hover" data-tooltip="Loop single">
                                            <svg viewBox="0 0 512 512"><path d="M493.544 181.463c11.956 22.605 18.655 48.4 18.452 75.75C511.339 345.365 438.56 416 350.404 416H192v47.495c0 22.475-26.177 32.268-40.971 17.475l-80-80c-9.372-9.373-9.372-24.569 0-33.941l80-80C166.138 271.92 192 282.686 192 304v48h158.875c52.812 0 96.575-42.182 97.12-94.992.155-15.045-3.17-29.312-9.218-42.046-4.362-9.185-2.421-20.124 4.8-27.284 4.745-4.706 8.641-8.555 11.876-11.786 11.368-11.352 30.579-8.631 38.091 5.571zM64.005 254.992c.545-52.81 44.308-94.992 97.12-94.992H320v47.505c0 22.374 26.121 32.312 40.971 17.465l80-80c9.372-9.373 9.372-24.569 0-33.941l-80-80C346.014 16.077 320 26.256 320 48.545V96H161.596C73.44 96 .661 166.635.005 254.788c-.204 27.35 6.495 53.145 18.452 75.75 7.512 14.202 26.723 16.923 38.091 5.57 3.235-3.231 7.13-7.08 11.876-11.786 7.22-7.16 9.162-18.098 4.8-27.284-6.049-12.735-9.374-27.001-9.219-42.046zm163.258 44.535c0-7.477 3.917-11.572 11.573-11.572h15.131v-39.878c0-5.163.534-10.503.534-10.503h-.356s-1.779 2.67-2.848 3.738c-4.451 4.273-10.504 4.451-15.666-1.068l-5.518-6.231c-5.342-5.341-4.984-11.216.534-16.379l21.72-19.939c4.449-4.095 8.366-5.697 14.42-5.697h12.105c7.656 0 11.749 3.916 11.749 11.572v84.384h15.488c7.655 0 11.572 4.094 11.572 11.572v8.901c0 7.477-3.917 11.572-11.572 11.572h-67.293c-7.656 0-11.573-4.095-11.573-11.572v-8.9z"></path></svg>
                                        </div> 
                                        <div class="hap-btn hap-btn-loop-off" data-tooltip="Loop off">
                                            <svg viewBox="0 0 512 512"><path d="M493.544 181.463c11.956 22.605 18.655 48.4 18.452 75.75C511.339 345.365 438.56 416 350.404 416H192v47.495c0 22.475-26.177 32.268-40.971 17.475l-80-80c-9.372-9.373-9.372-24.569 0-33.941l80-80C166.138 271.92 192 282.686 192 304v48h158.875c52.812 0 96.575-42.182 97.12-94.992.155-15.045-3.17-29.312-9.218-42.046-4.362-9.185-2.421-20.124 4.8-27.284 4.745-4.706 8.641-8.555 11.876-11.786 11.368-11.352 30.579-8.631 38.091 5.571zM64.005 254.992c.545-52.81 44.308-94.992 97.12-94.992H320v47.505c0 22.374 26.121 32.312 40.971 17.465l80-80c9.372-9.373 9.372-24.569 0-33.941l-80-80C346.014 16.077 320 26.256 320 48.545V96H161.596C73.44 96 .661 166.635.005 254.788c-.204 27.35 6.495 53.145 18.452 75.75 7.512 14.202 26.723 16.923 38.091 5.57 3.235-3.231 7.13-7.08 11.876-11.786 7.22-7.16 9.162-18.098 4.8-27.284-6.049-12.735-9.374-27.001-9.219-42.046z"></path></svg>
                                        </div>       

                                    </div>

                                </div>

                            </div>     
                            <div class="move" style="float:right; font-size: 13px">
                                <i class="fa fa-download"></i> {{App\Http\Controllers\Converter::number_format_short(intval($tags->downloads))}}
                                &nbsp;
                                <i class="fa fa-play"></i> {{App\Http\Controllers\Converter::number_format_short(intval($tags->played))}}
                            </div>
                        </div>

                    </div>

                </div>

                <div class="hap-share-holder">

                    <div class="hap-share-holder-inner">
                        <div class="hap-share-item hap-contr-btn" data-type="tumblr" data-tooltip="Share on Tumblr">
                            <svg viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-82.3 364.2c-8.5 9.1-31.2 19.8-60.9 19.8-75.5 0-91.9-55.5-91.9-87.9v-90h-29.7c-3.4 0-6.2-2.8-6.2-6.2v-42.5c0-4.5 2.8-8.5 7.1-10 38.8-13.7 50.9-47.5 52.7-73.2.5-6.9 4.1-10.2 10-10.2h44.3c3.4 0 6.2 2.8 6.2 6.2v72h51.9c3.4 0 6.2 2.8 6.2 6.2v51.1c0 3.4-2.8 6.2-6.2 6.2h-52.1V321c0 21.4 14.8 33.5 42.5 22.4 3-1.2 5.6-2 8-1.4 2.2.5 3.6 2.1 4.6 4.9l13.8 40.2c1 3.2 2 6.7-.3 9.1z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="twitter" data-tooltip="Share on Twitter">
                            <svg viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="facebook" data-tooltip="Share on Facebook">
                            <svg viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="whatsapp" data-tooltip="Share on WhatsApp">
                            <svg viewBox="0 0 448 512"><path d="M224 122.8c-72.7 0-131.8 59.1-131.9 131.8 0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6 49.9-13.1 4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8 0-35.2-15.2-68.3-40.1-93.2-25-25-58-38.7-93.2-38.7zm77.5 188.4c-3.3 9.3-19.1 17.7-26.7 18.8-12.6 1.9-22.4.9-47.5-9.9-39.7-17.2-65.7-57.2-67.7-59.8-2-2.6-16.2-21.5-16.2-41s10.2-29.1 13.9-33.1c3.6-4 7.9-5 10.6-5 2.6 0 5.3 0 7.6.1 2.4.1 5.7-.9 8.9 6.8 3.3 7.9 11.2 27.4 12.2 29.4s1.7 4.3.3 6.9c-7.6 15.2-15.7 14.6-11.6 21.6 15.3 26.3 30.6 35.4 53.9 47.1 4 2 6.3 1.7 8.6-1 2.3-2.6 9.9-11.6 12.5-15.5 2.6-4 5.3-3.3 8.9-2 3.6 1.3 23.1 10.9 27.1 12.9s6.6 3 7.6 4.6c.9 1.9.9 9.9-2.4 19.1zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM223.9 413.2c-26.6 0-52.7-6.7-75.8-19.3L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5 29.9 30 47.9 69.8 47.9 112.2 0 87.4-72.7 158.5-160.1 158.5z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="linkedin" data-tooltip="LinkedIn">
                            <svg role="img" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="reddit" data-tooltip="Reddit">
                            <svg role="img" viewBox="0 0 512 512"><path d="M201.5 305.5c-13.8 0-24.9-11.1-24.9-24.6 0-13.8 11.1-24.9 24.9-24.9 13.6 0 24.6 11.1 24.6 24.9 0 13.6-11.1 24.6-24.6 24.6zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-132.3-41.2c-9.4 0-17.7 3.9-23.8 10-22.4-15.5-52.6-25.5-86.1-26.6l17.4-78.3 55.4 12.5c0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.3 24.9-24.9s-11.1-24.9-24.9-24.9c-9.7 0-18 5.8-22.1 13.8l-61.2-13.6c-3-.8-6.1 1.4-6.9 4.4l-19.1 86.4c-33.2 1.4-63.1 11.3-85.5 26.8-6.1-6.4-14.7-10.2-24.1-10.2-34.9 0-46.3 46.9-14.4 62.8-1.1 5-1.7 10.2-1.7 15.5 0 52.6 59.2 95.2 132 95.2 73.1 0 132.3-42.6 132.3-95.2 0-5.3-.6-10.8-1.9-15.8 31.3-16 19.8-62.5-14.9-62.5zM302.8 331c-18.2 18.2-76.1 17.9-93.6 0-2.2-2.2-6.1-2.2-8.3 0-2.5 2.5-2.5 6.4 0 8.6 22.8 22.8 87.3 22.8 110.2 0 2.5-2.2 2.5-6.1 0-8.6-2.2-2.2-6.1-2.2-8.3 0zm7.7-75c-13.6 0-24.6 11.1-24.6 24.9 0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.1 24.9-24.6 0-13.8-11-24.9-24.9-24.9z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="digg" data-tooltip="Digg">
                            <svg role="img" viewBox="0 0 512 512"><path d="M81.7 172.3H0v174.4h132.7V96h-51v76.3zm0 133.4H50.9v-92.3h30.8v92.3zm297.2-133.4v174.4h81.8v28.5h-81.8V416H512V172.3H378.9zm81.8 133.4h-30.8v-92.3h30.8v92.3zm-235.6 41h82.1v28.5h-82.1V416h133.3V172.3H225.1v174.4zm51.2-133.3h30.8v92.3h-30.8v-92.3zM153.3 96h51.3v51h-51.3V96zm0 76.3h51.3v174.4h-51.3V172.3z"></path></svg>
                        </div>
                        <div class="hap-share-item hap-contr-btn" data-type="pinterest" data-tooltip="Pinterest">
                            <svg role="img" viewBox="0 0 496 512"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg>
                        </div>
                    </div>

                    <div class="hap-share-close hap-contr-btn" data-tooltip="Close">
                        <svg viewBox="0 0 352 512"><path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                    </div>

                </div>

                <div class="hap-playback-rate-holder">

                    <div class="hap-playback-rate-seekbar">
                        <div class="hap-playback-rate-bg">
                            <div class="hap-playback-rate-level"><div class="hap-playback-rate-drag"></div></div>
                        </div>
                    </div>

                    <div class="hap-playback-rate-close hap-contr-btn" data-tooltip="Close">
                        <svg viewBox="0 0 352 512"><path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                    </div>

                </div>

                <div class="hap-tooltip"></div>  	

            </div> 

            <div class="hap-preloader"></div>

        </div>  

        <!-- PLAYLIST LIST -->
        <div id="hap-playlist-list">
            <!-- audio playlist -->
            <div id="playlist-audio1">

                <div class="hap-playlist-item" data-type="audio" data-mp3="{{url($download_path.$tags->time_folder.$tags->slug)}}"  data-artist="{{$tags->artist}}" data-title="{{$tags->title}}" data-thumb="{{$tags->cover_art}}" data-share="{{url('embed-link?slug='.$tags->slug)}}"></div>

            </div> 
            <input id="tag" type="hidden" value="{{$tags->id}}">


        </div>       
        <script>

            jQuery(document).on('click', '.hap-btn-play', function (event) {
                var formData = jQuery("#tag").val();
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{url('played')}}",
                    type: 'POST',
                    data: {id: formData},
                    success: function (data) {
                        if (data.status === 200) {

                            return false;
                        }

                    }

                });
            });

        </script>
    </body>
</html>
@else
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$tags->title}} - Video Player</title>
        <script src="{{asset('embed/js/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('media/js/player.js')}}"></script>
        <link type="text/css" rel="stylesheet" href="{{asset('media/css/player.css')}}">

        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            /*            .vjs-big-play-centered:before {
                            content: "MP3TAGER";
                            color: #cd6133;
                            font-size: 20px
                        }*/
            #mep_0{
                width: 100%!important;
                height:226px!important;   
            }
        </style>
    </head>
    <video 
        class="mep-playlist" 
        data-showplaylist="true" 

        width="100%" 
        height="226" 
        poster="" 
        controls="controls" 
        preload="auto" 
        loop=""
        >
        <source src="{{url($download_path.$tags->time_folder.$tags->slug)}}" type="video/webm" title="{{$tags->title}}" data-poster="">
        <source src="{{url($download_path.$tags->time_folder.$tags->slug)}}" type="video/mp4" title="{{$tags->title}}" data-poster="">
        <source src="{{url($download_path.$tags->time_folder.$tags->slug)}}"  type="video/mkv" title="{{$tags->title}}" data-poster="">
        <img src="{{asset('no-video-playlist.png')}}" width="530" title="No video playlist capabilities. Please upgrade your browser!">

    </video> 
    <input id="tag-mp4" type="hidden" value="{{$tags->id}}">
    <div class="move" style="float:right; font-size: 13px">
        <i class="fa fa-download"></i> {{App\Http\Controllers\Converter::number_format_short(intval($tags->downloads))}}
        &nbsp;
        <i class="fa fa-play"></i> {{App\Http\Controllers\Converter::number_format_short(intval($tags->played))}}
    </div>
    <script>
            $(document).ready(function () {

                $(".play-pause").click(function (event) {
                    var formData = jQuery("#tag-mp4").val();
                    event.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{url('played')}}",
                        type: 'POST',
                        data: {id: formData},
                        success: function (data) {
                            if (data.status === 200) {

                                return false;
                            }

                        }

                    });
                });



            });

    </script>
</body>
</html>
@endif