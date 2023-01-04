@extends('master')

@section('content')


       <!-- Page Header Start -->
       <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">User Panel</h2>
              <ol class="breadcrumb">
                <li><a href="#">Home /</a></li>
                <li class="current">My Ads</li>
				
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->  

    <!-- Start Content -->
    <div id="content" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
            <aside>
              <div class="sidebar-box">
                <div class="user">
                  <figure>
                    <a href="#"><img src="assets/img/author/img1.jpg" alt=""></a>
                  </figure>
                  <div class="usercontent">
                    <h3>{{session('dogLossProjectUser')['name']}}'s</h3>
                    <h4>Profile</h4>
                   

                  </div>
                    
                </div>
                <nav class="navdashboard">
                  <ul>
                  <!-- <li>
                      <a href="userdashboard">
                        <i class="lni-dashboard"></i>
                        <span>Dashboard</span>
                      </a>
                    </li> -->
                    <li>
                      <a href="profile">
                        <i class="lni-cog"></i>
                        <span>Profile Settings</span>
                      </a>
                    </li>
                    <li>
                    <a class="{{ request()->is('myac') ? 'active' : ''}}" href="myac">
                        <i class="lni-layers"></i>
                        <span>My Post</span>
                      </a>
                    </li>
                    <li>
                      <a class="{{ request()->is('user/ads/active') ? 'active' : ''}}" href="{{Route('userAds.active')}}">
                        <i class="lni-bookmark-alt"></i>
                        <span>Active Post</span>
                      </a>
                    </li>
                      <li>
                      <a class="{{ request()->is('user/ads/inactive') ? 'active' : ''}}"  href="{{Route('userAds.inactive')}}">
                        <i class="lni-star"></i>
                        <span>Inactive Post</span>
                      </a>
                    </li>
                     
                    
                    <li>
                      <a href="{{Route('user.logout')}}">
                        <i class="lni-enter"></i>
                        <span>Logout</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="widget">
                <h4 class="widget-title">Advertisement</h4>
                <div class="add-box">
                  <img class="img-fluid" src="assets/img/img1.jpg" alt="">
                </div>
              </div>
            </aside>
        </div>

          <div class="col-sm-12 col-md-8 col-lg-9">
            <div class="page-content">
              <div class="inner-box">
                      @yield('userPanel')
                



              </div>
            </div>
          </div>
        </div>  
      </div>      
    </div>
    <!-- End Content -->


  

@endsection