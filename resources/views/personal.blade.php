@extends('master')

@section('content')


       <!-- Page Header Start -->
       <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">Payment</h2>
              <ol class="breadcrumb">
                <li><a href="javascript:void(0)">Home /</a></li>
                <li class="current">Payment</li>
				
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
                    <a href="javascript:void(0)"><img src="assets/img/author/img1.jpg" alt=""></a>
                  </figure>
                  <div class="usercontent">
                    <h3>user name's</h3>
                    <h4>Personal Account</h4>
                     
                  </div>
                  <div class="usercontent">
                  <a href="payment" class="btn btn-primary btn-full">Upgrade to Commercial</a>  
</div>
                </div>
                <nav class="navdashboard">
                  <ul>
                  <li>
                      <a href="userdashboard">
                        <i class="lni-dashboard"></i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                    <li>
                      <a href="profile">
                        <i class="lni-cog"></i>
                        <span>Profile Settings</span>
                      </a>
                    </li>
                    <li>
                    <a href="myac">
                        <i class="lni-layers"></i>
                        <span>My Ads</span>
                      </a>
                    </li>
                     <li>
                      <a href="publishedads">
                        <i class="lni-bookmark-alt"></i>
                        <span>Published Ads</span>
                      </a>
                    </li>
					  <li>
                      <a  href="featuredads">
                        <i class="lni-star"></i>
                        <span>Featured Ads</span>
                      </a>
                    </li>
                    <li>
                      <a href="pendingads">
                        <i class="lni-bug"></i>
                        <span>Pending Ads </span>
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
                <div class="dashboard-box">
                  <h2 class="dashbord-title">Personal Account</h2>
                </div>
                <div class="dashboard-wrapper">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-sx-12">
                      <div class="order-details">
                        <div class="dashboardboxtitle">
                          <h2>Your Account Features</h2>
                        </div>
                        <div class="order_review mb-6">
                          <table class="table table-responsive dashboardtable table-review-order">
                          <thead>
    <tr>
      <th scope="col">Catergorys</th>
      <th scope="col">Features</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>Listings</td>
      <td>No limits </td>
    
    </tr>
    <tr>
     
     <td>Vehicles</td>
     <td>Limited to 2 per month </td>
   
   </tr>
   <tr>
     
     <td>Real Estate</td>
     <td>Limited to 2 per month </td>
   
   </tr>
   <tr>
     
     <td>Communities</td>
     <td>No Limits </td>
   
   </tr>
   <tr>
     
     <td>Jobs</td>
     <td>Limited to 2 per month </td>
   
   </tr>
   <tr>
     
     <td>Services</td>
     <td>Limited to 2 per month </td>
   
   </tr>
   <tr>
     
     <td>Local Business</td>
     <td> Commercial only </td>
   
   </tr>
   <tr>
     
     <td>Vacation Rental</td>
     <td> Commercial only </td>
   
   </tr>

  </tbody>
                          </table>
                        </div>               
                      </div>
                    </div>

                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>  
      </div>      
    </div>
    <!-- End Content -->


  

@endsection