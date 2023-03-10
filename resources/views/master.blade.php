<!DOCTYPE html>
<html lang="en">
  
<!-- Developed by MarkDev Solutions -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Paws Unite</title>
    <base href="{{ \URL::to('/') }}">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <script src="assets/js/jquery-min.js"></script>

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="lni-menu"></span>
              <span class="lni-menu"></span>
              <span class="lni-menu"></span>
            </button>
            <a href="\" class="navbar-brand"><img src="assets/img/logo.png"  alt=""></a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            
            <ul class="sign-in width-100">
              <li class="nav-item dropdown float-right">

                @if(!Session::has('dogLossProjectUser'))
                <a class="nav-link" href="login"><i class="lni-lock"></i>Login</a>
                <a class="nav-link" href="register"><i class="lni-pencil"></i>Sign Up</a>
                
                @endif
                  @if(Session::has('dogLossProjectUser'))
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni-user"></i>My Account</a>


                <div class="dropdown-menu">
                  <a class="dropdown-item" href="myac"><i class="lni-wallet"></i> Dashboard</a>
                
                  <a class="dropdown-item" href="{{Route('user.logout')}}"><i class="lni-user"></i> Logout</a>
                  
                </div>
                  @else
                  @endif
              </li>
            </ul>
             <a class="tg-btn" href="{{Route('ads.index')}}">
              <i class="lni-pencil-alt"></i>Posts
            </a>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            
        @if(Session::has('dogLossProjectUser'))
        
        <li><a href="myac">Dashboard</a></li>
        <li><a href="{{Route('user.logout')}}">Logout</a></li>    
        @else
        <li><a href="login">Log In</a></li>
        <li><a href="register">Sign up</a></li>
        @endif
        <li><a href="adsPost">Posts</a></li>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <!-- Navbar End -->

     
    <!-- Header Area wrapper End -->
    @yield('content')
 
    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section class="footer-Content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="footer-logo"><img src="assets/img/logo.png" alt=""></h3>
                <div class="textwidget">
                  
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12"> <div
            class="widget"> <h3 class="block-title">Help & Support</h3> <ul
            class="menu"> <li><a href="javascript:void(0)">Privacy</a></li> </ul> </div>
            </div> <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6
            col-mb-12"> <div class="widget">
                <!-- <h3 class="block-title"></h3> -->
                <!-- <p class="text-sub">We have over 5 years of experience Our suppoer avalable to help you 24 hours a day, seven days week</p> -->
               <br>
               <br>
               <br>
                <ul class="footer-social">
                  <li><a class="facebook" href="javascript:void(0)"><i class="lni-facebook-filled"></i></a></li>
                  <li><a class="twitter" href="javascript:void(0)"><i class="lni-twitter-filled"></i></a></li>
                  <li><a class="linkedin" href="javascript:void(0)"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" href="javascript:void(0)"><i class="lni-google-plus"></i></a></li>
                </ul>          
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Footer area End -->
      
      <!-- Copyright Start  -->
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info float-left">
                <p>All copyrights reserved &copy; 2020 - Paws Unite - Designed by <a target="_blank" href="https://upbound.studio/" rel="nofollow">Upbound Studio</a></p>
              </div>              
              <div class="float-right">  
                <ul class="bottom-card">
                  <li>
                      <a href="javascript:void(0)"><img src="assets/img/footer/card1.jpg" alt="card"></a>
                  </li>
                  <li>
                      <a href="javascript:void(0)"><img src="assets/img/footer/card2.jpg" alt="card"></a>
                  </li>
                  <li>
                      <a href="javascript:void(0)"><img src="assets/img/footer/card3.jpg" alt="card"></a>
                  </li>
                  <li>
                      <a href="javascript:void(0)"><img src="assets/img/footer/card4.jpg" alt="card"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright End -->

    </footer>
    <!-- Footer Section End --> 

    <!-- Go to Top Link -->
    <a href="javascript:void(0)" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="assets/js/jquery-min.js"></script> -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/nivo-lightbox.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.min.js"></script>
    <script src="assets/js/summernote.js"></script>

  </body>

<!-- Mirrored from preview.uideck.com/items/classixer-1.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Sep 2022 05:14:34 GMT -->
</html>
