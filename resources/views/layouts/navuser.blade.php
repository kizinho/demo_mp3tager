<!-- partial:assets/new-cryptotrades-dash/partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/"><img src="{{asset('logo/logo.png') }}" width="40px" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('logo/logo.png') }}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item nav-search d-none d-md-flex">
                <div class="nav-link">

                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="{{url('about-us')}}">
                    <span class="btn btn-warning text-white">About Us</span>
                </a>


            </li>



            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('images/user.jpg')}}" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="{{url('edit_account')}}" class="dropdown-item">
                        <i class="fas fa-cog text-warning"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form1').submit();">
                        <i class="fas fa-power-off text-warning"></i>
                        Logout</a>

                    <form id="logout-form1" action="{{ url('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>

    </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:assets/new-cryptotrades-dash/partials/_settings-panel.html -->


    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <div class="nav-link">
                    <div class="profile-image">
                        <img src="{{asset('images/user.jpg')}}" alt="image"/>
                    </div>
                    <div class="profile-name">
                        <p class="name">
                            @if(session()->has('login.content'))
                            {!! session('login.content') !!}
                            @endif {{$user->username}}
                        </p>
                        <p class="designation">
                           {{$user->username}}
                        </p>
                    </div>
                </div>
            </li>
       
            <li class="nav-item @if(request()->path() == 'dashboard') active @endif">
                <a class="nav-link " href="{{url('dashboard')}}">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'add-storage') active @endif">
                <a class="nav-link" href="{{url('add-storage')}}">
                    <i class="fa fa-database menu-icon"></i>
                    <span class="menu-title">Choose Preferred Storage</span>
                </a>
            </li>
           
            <li class="nav-item  @if(request()->path() == 'my-files') active @endif">
                <a class="nav-link" href="{{url('my-files')}}">
                    <i class="fa fa-file menu-icon"></i>
                    <span class="menu-title">My Files</span>
                </a>
            </li>
            @foreach($user->roles as $role)

            @if($role->name == 'SuperAdmin')
             <li class="nav-item  @if(request()->path() == 'all-files') active @endif">
                <a class="nav-link" href="{{url('all-files')}}">
                    <i class="fa fa-cloud-upload-alt menu-icon"></i>
                    <span class="menu-title">All Uploaded Files</span>
                </a>
            </li>
            @endif
            @endforeach
             <li class="nav-item @if(request()->path() == 'upload') active @endif">
                <a class="nav-link" href="{{url('upload')}}">
                    <i class="fa fa-upload menu-icon"></i>
                    <span class="menu-title">Upload File</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'discover') active @endif">
                <a class="nav-link" href="{{url('discover')}}">
                    <i class="fa fa-file-archive menu-icon"></i>
                    <span class="menu-title">Discover</span>
                </a>
            </li>
              <li class="nav-item @if(request()->path() == 'upload-youtube') active @endif">
                <a class="nav-link" href="{{url('upload-youtube')}}">
                    <i class="fa fa-link menu-icon"></i>
                    <span class="menu-title">Upload Youtube Url Mp3</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'transactions') active @endif">
                <a class="nav-link" href="{{url('transactions')}}">
                    <i class="fa fa-sort-amount-up menu-icon"></i>
                    <span class="menu-title">Transactions History</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'referals') active @endif">
                <a class="nav-link" href="{{url('referals')}}">
                    <i class="fa fa-unlink menu-icon"></i>
                    <span class="menu-title">Referrals</span>
                </a>
            </li>
           
             <li class="nav-item @if(request()->path() == 'edit_account') active @endif">
                <a class="nav-link" href="{{url('edit_account')}}">
                    <i class="fa fa-cogs menu-icon"></i>
                    <span class="menu-title">Account Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">

                    <i class="fa fa-arrow-circle-right menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>





        </ul>
    </nav>
