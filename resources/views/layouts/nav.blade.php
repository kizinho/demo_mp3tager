
<!-- --------------Start of navigation bar--------- -->
<div class="navbar">
    <div class="logo">
        <a href="{{url('/')}}"><i class="fas fa-compact-disc"></i>
            Mp3Tag<span>.com</span></a>
    </div>
    <div class="nav-links">
        <label id="chk-list-hide"><i class="fa fa-bars"></i></label>
        <ul>
            <li><a class="@if(request()->path() == '/') active @endif" href="{{url('/')}}" class="active">home</a></li>
            <li><a class="@if(request()->path() == 'upload') active @endif @if(request()->path() == 'upload') active @endif" href="{{url('upload')}}" class="start-upload-btn">Start Uploading</a></li>
            <li>
                <!-- doropdown list -->
                <div class="dropdown ">
                    <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('contact-us')}}">Contact Us</a>
                        <a class="dropdown-item" href="{{url('about-us')}}">About Us</a>
                        <a class="dropdown-item" href="{{url('privacy-policy')}}">Privacy & Policy</a>
                        <a class="dropdown-item" href="{{url('tos')}}">Terms Of Service</a>
                    </div>
                </div>
                <!-- End of dropdown list -->
            </li>
            <li><a class="@if(request()->path() == 'signup') active @endif"  href="{{url('signup')}}">Sign up</a></li>
            <li><a class="@if(request()->path() == 'signin') active @endif"  href="{{url('signin')}}">Sign in<i class="fas fa-sign-in-alt"></i></a></li>
              <li id="google_translate_element"></li>



        </ul>
    </div>
</div>
