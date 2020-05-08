@section('title')
<title>Mp3tager &mdash; {{$user->username}} Dashbord</title>
<meta  name="description" content="{{$user->username}} Dashbord">
<meta itemprop="keywords" name="keywords" content="Mp3tager &mdash; {{$user->username}} Dashbord"/>
<meta name="author" content="Mp3tager" />

@endsection
@extends('layouts.home')
@section('content')

  <div class="main-panel">
      
  <div class="content-wrapper">
 <div class="row">
                <div class="col-md-4">
                  <div class="grid-margin stretch-card">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{asset('images/user.jpg')}}" class="img-lg rounded-circle mb-2" alt="profile image"/>
                            <h4>{{ucfirst($user->username)}}</h4>
                            <p class="text-muted">{{ucfirst($user->username)}}</p>
                            
                            <a href="{{url('add-storage')}}" class="btn btn-warning btn-sm mt-3 mb-4 text-white"> <i class="fa fa-database "></i> Preferred Storage</a>
                            <a href="{{url('add-fund')}}" class="btn btn-warning btn-sm mt-3 mb-4 text-white"> <i class="fa fa-money-bill-alt "></i> Fund top Up </a>
                            <div class="border-top pt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>{{ date('F d, Y', strtotime($user->created_at)) }}</h6>
                                        <p>Joined Date</p>
                                    </div>
                                     
                                   
                                    <div class="col-4">
                                        <h6>{{ucfirst($user->username)}}</h6>
                                        <p>Username</p>
                                    </div>
                                      <div class="col-4">
                                          <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('upload')}}"><i class="fa fa-upload "></i> Upload</a></h6>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="border-top pt-3">
                                <div class="row">
                                    
                                      <div class="col-6">
                                          <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('my-plan')}}"><i class="fa fa-sub "></i> My Plan</a></h6>
                                        <p>Basic</p>
                                    </div>
                                    
                                      <div class="col-6">
                                          <h6><a  class="btn btn-warning btn-sm text-white" href="{{url('add-storage')}}"><i class="fa fa-sub "></i> My Storage</a></h6>
                                        <p>Google Drive</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="col-md-12">
                             <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Disk Usage</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">545444</h2>
                                        
                                    </div>
                                    <small class="text-gray">Your total Earnings</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-money-bill-alt text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
      




                <div class="col-md-8">
                    <div class="row">
                  
                    <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Account Balance</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">$0</h2>
                                       
                                    </div>
                                    <small class="text-gray"> <a href="{{url('add-fund')}}" class="text-danger"> <i class="fa fa-money-bill-alt "></i> Top Up </a>
                           </small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-dollar-sign text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                        
                         <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Total Upload</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">545444</h2>
                                        
                                    </div>
                                    <small class="text-gray">Your total Uploads</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-upload text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                         <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Pending Task</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">545444</h2>
                                       
                                    </div>
                                    <small class="text-gray">Your Pending Task</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-spinner text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                          <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Completed Task</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">545444</h2>
                                      
                                    </div>
                                    <small class="text-gray">Your Completed Task</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-check text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  

                    <div class="col-md-12" style="padding-top: 10px;">
                        <div class="card">
                            <div class="card-body p-0">
                                <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">Recent Upload Task</h5>
                                <!-- stat 1 -->
                                <div class="media px-3 py-2 border-bottom btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">14 mb</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 2 -->
                                <div class="media px-3 py-2 border-bottom">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">34mb</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 3 -->
                                <div class="media px-3 py-2 btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><b>wizkik ft ddj mp3</b></h4>
                                        <span class="text-muted">23 mb</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>
                            </div>
                        </div>
                    </div>

          

                
                    </div>
                </div>
              </div>

    <br>
              <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" value="{{url('signup')}}?ref={{$user->username}}" class="form-control" id="inputReferralLink">
                                    <label for="inputReferralLink">Referral Link</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>
              

            
        </div>
            
            
            

@endsection
