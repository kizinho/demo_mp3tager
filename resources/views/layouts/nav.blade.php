
<!--header start-->

<header id="site-header" class="header header-1">
  <div class="top-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <div class="topbar-link text-left">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="mailto:{{$settings['site_email']}}"><i class="ti-email"></i>{{$settings['site_email']}}</a>
              </li>
              <li class="list-inline-item">
                <a href="tel:{{$settings['site_phone']}}"> <i class="ti-mobile"></i>{{$settings['site_phone']}}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="social-icons social-hover top-social-list text-right">
            <ul class="list-inline">
              
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--  
  
<style>
.menu a:hover
{
    color:#ff4500;
}
</style>  
   --> 
  <div id="header-wrap" style="background-color: #292D4E !important; border-bottom: 4px #F6A724 solid;">
    <div class="container ">
      <div class="row">
        <div class="col-lg-12 ">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand logo" href="{{url('/')}}">
              <img id="logo-img" class="img-center" src="{{asset($settings['logo']) }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <!-- Left nav -->
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active"><span class="menu"><a class="nav-link" href="{{url('/')}}">Home</a></span>
                 
                  </li>
                  <li class="nav-item"><span class="menu"><a class="nav-link" href="{{url('about-us')}}">About</a></span>
                    
                  </li>
                  <li class="nav-item ">
                   <span class="menu"> <a class="nav-link" href="{{url('faq')}}"> Faq
                    </a></span>
                  </li>
                  @Auth
                    <li class="nav-item ">
                   <span class="menu"> <a class="nav-link" href="{{url('home')}}"> Account
                    </a></span>
                  </li>
                    <li class="nav-item "><span class="menu">
                  <a class="nav-link " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     Logout</a></span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                  </li>
                  @else
                 <li class="nav-item"><span class="menu"><a class="nav-link" href="{{url('login')}}">Login</a></span>
                  </li>
                  <li class="nav-item "><span class="menu"><a class="nav-link " href="{{url('register')}}">Signup</a></span>
                   @endAuth
                  </li>
                                    <li class="nav-item"><span class="menu"><a class="nav-link" href="{{url('contact-us')}}">Contact</a></span>
                    
                  </li>
                  <li class="nav-item"><span class="menu" id="google_translate_element"></span>
                    
                  </li>
              </ul>
            </div>
         
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<!--header end-->

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>