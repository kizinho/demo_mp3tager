
<!-- --------------Start of navigation bar--------- -->
<!-- <div class="navbar">
    <div class="logo">
        <a href="{{url('/')}}"><i class="fas fa-compact-disc"></i>
            Mp3Tager<span>.com</span></a>
    </div>
    <div class="nav-links">
        <label id="chk-list-hide"><i class="fa fa-bars"></i></label>
        <ul>
            <li><a class="@if(request()->path() == '/') active @endif" href="{{url('/')}}" class="active">home</a></li>
            <li><a class="start-upload-btn @if(request()->path() == 'upload') active @endif @if(request()->path() == 'tags') active @endif @if(request()->path() == 'downloads') active @endif" href="{{url('upload')}}" >Start Uploading</a></li>
          <li><a class="@if(request()->path() == 'how-it-works') active @endif @if(request()->path() == 'how-it-works') active @endif" href="{{url('how-it-works')}}" class="start-upload-btn">How it Works?</a></li>
            
            <li> -->
                <!-- doropdown list -->
                <!-- <div class="dropdown active">
                    <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('contact-us')}}">Contact Us</a>
                        <a class="dropdown-item" href="{{url('about-us')}}">About Us</a>
                        <a class="dropdown-item" href="{{url('privacy-policy')}}">Privacy & Policy</a>
                        <a class="dropdown-item" href="{{url('tos')}}">Terms Of Service</a>
                    </div>
                </div> -->
                <!-- End of dropdown list -->
            <!-- </li>
            @if($user == false)
            
            <li><a class="@if(request()->path() == 'signup') active @endif"  href="{{url('signup')}}">Sign up</a></li>
            <li><a class="@if(request()->path() == 'signin') active @endif"  href="{{url('signin')}}">Sign in<i class="fas fa-sign-in-alt"></i></a></li>
            @else
            <li><a class="@if(request()->path() == 'dashboard') active @endif"  href="{{url('dashboard')}}">{{$user->username}} <i class="fas fa-user"></i></a></li>
            @endif
              <li id="google_translate_element"></li>


        </ul>
    </div>
</div> -->

<div class="navigation container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand logo" href="{{url('/')}}">
                <i class="fas fa-compact-disc logo__icon"></i>
                Mp3Tager
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item @if(request()->path() == '/') active @endif">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'pricing') active @endif">
                        <a class="nav-link" href="{{url('pricing')}}">Pricing</a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'upload') active @endif">
                        <a class="nav-link" href="{{url('upload')}}">Start Editing</a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'how-it-works') active @endif">
                        <a class="nav-link" href="{{url('how-it-works')}}">How it works</a>
                    </li>
                     <li id="google_translate_element"></li>
                </ul>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item mr-md-3">
                        <a class="nav-link" href="{{url('signin')}}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn--signup px-4 text-light" href="{{url('signup')}}">Create Account</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>