<!-- partial:assets/new-cryptotrades-dash/partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/"><img src="{{asset('logo/logo.png') }}" alt="logo"/></a>
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
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-warning"></i>
                        Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                            @endif {{Auth::user()->username}}
                        </p>
                        <p class="designation">
                            {{Auth::user()->full_name}}
                        </p>
                    </div>
                </div>
            </li>
       
            <li class="nav-item @if(request()->path() == 'home') active @endif">
                <a class="nav-link " href="{{url('home')}}">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
          
            <li class="nav-item @if(request()->path() == 'deposit') active @endif">
                <a class="nav-link" href="{{url('deposit')}}">
                    <i class="fa fa-share-square menu-icon"></i>
                    <span class="menu-title">Make Deposit</span>
                </a>
            </li>
            <li class="nav-item  @if(request()->path() == 'withdraw') active @endif">
                <a class="nav-link" href="{{url('withdraw')}}">
                    <i class="fa fa-download menu-icon"></i>
                    <span class="menu-title">Request Withdraw</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'deposit_list') active @endif">
                <a class="nav-link" href="{{url('deposit_list')}}">
                    <i class="fa fa-list menu-icon"></i>
                    <span class="menu-title">Deposit List</span>
                </a>
            </li>
              <li class="nav-item @if(request()->path() == 'withdraw_history') active @endif">
                <a class="nav-link" href="{{url('withdraw_history')}}">
                    <i class="fa fa-money-bill menu-icon"></i>
                    <span class="menu-title">Withdraw History</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'earnings') active @endif">
                <a class="nav-link" href="{{url('earnings')}}">
                    <i class="fa fa-list-ol menu-icon"></i>
                    <span class="menu-title">Earnings</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'referals') active @endif">
                <a class="nav-link" href="{{url('referals')}}">
                    <i class="fa fa-unlink menu-icon"></i>
                    <span class="menu-title">Referrals</span>
                </a>
            </li>
            <li class="nav-item @if(request()->path() == 'referallinks') active @endif">
                <a class="nav-link" href="{{url('referallinks')}}">
                    <i class="fa fa-bullhorn menu-icon"></i>
                    <span class="menu-title">Promotional Banners</span>
                </a>
            </li>
             <li class="nav-item @if(request()->path() == 'edit_account') active @endif">
                <a class="nav-link" href="{{url('edit_account')}}">
                    <i class="fa fa-cogs menu-icon"></i>
                    <span class="menu-title">Account Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">

                    <i class="fa fa-arrow-circle-right menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>





        </ul>
    </nav>
