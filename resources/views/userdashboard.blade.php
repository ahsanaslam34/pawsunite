@extends('master')

@section('content')


       <!-- Page Header Start -->
       <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">My Ads</h2>
              <ol class="breadcrumb">
                <li><a href="javascript:void(0)">Home /</a></li>
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
                    <a href="javascript:void(0)"><img src="assets/img/author/img1.jpg" alt=""></a>
                  </figure>
                  <div class="usercontent">
                    <h3>user name's</h3>
                    <h4>Account</h4>
                  </div>
                </div>
                <nav class="navdashboard">
                  <ul>
                  <li>
                      <a class="active" href="userdashboard">
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
                  <h2 class="dashbord-title">Dashboard</h2>
                </div>
                <div class="dashboard-wrapper">
                  <div class="dashboard-sections">
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-write"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Total Ad Posted</a></h2>
                            <h3>480 Add Posted</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-add-files"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Pending Ads</a></h2>
                            <h3>80 Add Posted</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-support"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Approved Ads</a></h2>
                            <h3>2040 Messages</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-support"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Rejected Ads</a></h2>
                            <h3>2040 Messages</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-support"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Billing</a></h2>
                            <h3>2040 Messages</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-support"></i></div>
                          <div class="contentbox">
                            <h2><a href="javascript:void(0)">Payable</a></h2>
                            <h3>2040 Messages</h3>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>  
                  </div>
                  <table class="table table-responsive dashboardtable tablemyads">
                    <thead>
                      <tr>
                        <th>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkedall">
                            <label class="custom-control-label" for="checkedall"></label>
                          </div>
                        </th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Ad Status</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr data-category="active">
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="adone">
                            <label class="custom-control-label" for="adone"></label>
                          </div>
                        </td>
                        <td class="photo"><img class="img-fluid" src="assets/img/post/img1.jpg" alt=""></td>
                        <td data-title="Title">
                          <h3>HP Laptop 6560b core i3 3nd generation</h3>
                          <span>Ad ID: ng3D5hAMHPajQrM</span>
                        </td>
                        <td data-title="Category"><span class="adcategories">Laptops & PCs</span></td>
                        <td data-title="Ad Status"><span class="adstatus adstatusactive">active</span></td>
                        <td data-title="Price">
                          <h3>139$</h3>
                        </td>
                        <td data-title="Action">
                          <div class="btns-actions">
                            <a class="btn-action btn-view" href="javascript:void(0)"><i class="lni-eye"></i></a>
                            <a class="btn-action btn-edit" href="javascript:void(0)"><i class="lni-pencil"></i></a>
                            <a class="btn-action btn-delete" href="javascript:void(0)"><i class="lni-trash"></i></a>
                          </div>
                        </td>
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
    <!-- End Content -->

  

@endsection