<!-- --------------Start of navigation bar--------- -->
<div class="navbar">
    <div class="logo">
        <a href="{{url('/')}}"><i class="fas fa-compact-disc"></i>
            Mp3Tag<span>.com</span></a>
    </div>
    <div class="nav-links">
        <input type="checkbox" id="chk-list-hide">
        <label for="chk-list-hide">
            <i class="fa fa-bars"></i>
        </label>
        <ul>
            <li><a  class="@if(request()->path() == '/') active @endif" href="{{url('/')}}">home</a></li>
            <li><a href="#aboutUs">about us</a></li>
        <li><a href="{{url('contact-us')}}">contact Us</a></li>
        <li><a class="@if(request()->path() == 'upload') active @endif @if(request()->path() == 'tags') active @endif @if(request()->path() == 'downloads') active @endif"  href="{{url('upload')}}">Start Uploading</a></li>
        <li><a class="@if(request()->path() == 'signup') active @endif"  href="{{url('signup')}}">Sign up</a></li>
        <li><a class="@if(request()->path() == 'signin') active @endif"  href="{{url('signin')}}">Sign in<i class="fas fa-sign-in-alt"></i></a></li>
<!--            <li> <span class="menu" id="google_translate_element"></span>

        </li>-->
                                            </ul>
                                            </div>
                                            </div>