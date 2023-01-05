<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paws Unite Admin</title>
    <base href="{{ \URL::to('/') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/assets/images/favicon.ico" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="dashboard_assets/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="dashboard_assets/dist/css/bootstrap-docs.css" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="dashboard_assets/libs/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="dashboard_assets/libs/slick/slick-theme.css">

    <!-- Rating -->
    <link rel="stylesheet" href="dashboard_assets/libs/rating/rating.min.css" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="dashboard_assets/dist/css/app.min.css" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script type="text/javascript" src="dashboard_assets/dist/js/jquery.js"></script>
</head>
<body>

<!-- preloader -->
<div class="preloader">
    <img src="dashboard_assets/assets/images/logo.png" alt="logo">
    <div class="preloader-icon"></div>
</div>
<!-- ./ preloader -->

<!-- sidebars -->





<!-- menu -->
<div class="menu">
    <div class="menu-header">
        <a href="dashboard" class="menu-header-logo">
            <img src="dashboard_assets/assets/images/logo.png" alt="logo">
        </a>
        <a href="dashboard" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        
        <ul>
            <li>
                <a  class="{{ request()->is('dashboard') ? 'active' : ''}}"
                    href="dashboard">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- <li>
                <a class="{{ request()->is('order') ? 'active' : ''}}" href="order">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>
                
            </li> -->
            
            <li>
                <a class="{{ request()->is('admin/ads') ? 'active' : ''}}"  href="{{Route('admin.ads')}}">
                    <span class="nav-link-icon">
                        <i class="bi bi-badge-ad-fill"></i>
                    </span>
                    <span>Post Listing</span>
                </a>
            </li>
            
           
            
            <li>
                <a class="{{ request()->is('user') ? 'active' : ''}}"  href="user">
                    <span class="nav-link-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="logout">
                    <span class="nav-link-icon">
                        <i class="bi bi-box-arrow-right"></i>
                    </span>
                    <span>Logout</span>
                </a>            
               </li>
            
        </ul>
    </div>
</div>
<!-- ./  menu -->

<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    <div class="header">
    <div class="menu-toggle-btn"> <!-- Menu close button for mobile devices -->
        <a href="javascript:void(0)">
            <i class="bi bi-list"></i>
        </a>
    </div>
    <!-- Logo -->
    <a href="dashboard" class="logo">
        <img width="100" src="dashboard_assets/assets/images/ntc_reg.svg" alt="logo">
    </a>
    <!-- ./ Logo -->
    <div class="page-title">Dashboard</div>
 
   
    <!-- Header mobile buttons -->
    <div class="header-mobile-buttons">
       
        <a href="javascript:void(0)" class="actions-btn">
            <i class="bi bi-three-dots"></i>
        </a>
    </div>
    <!-- ./ Header mobile buttons -->
</div>
    <!-- ./ header -->

    <!-- content -->
    <div class="content ">

    @yield('content')


  
    </div>
    <!-- ./ content -->

    <!-- content-footer -->
    
    <!-- ./ content-footer -->

</div>
<!-- ./ layout-wrapper -->

<!-- Bundle scripts -->
<script src="dashboard_assets/libs/bundle.js"></script>

<!-- Apex chart -->
<script src="dashboard_assets/libs/charts/apex/apexcharts.min.js"></script>

    <!-- Examples -->
    <script src="dashboard_assets/dist/js/examples/sweet-alert.js"></script>
<!-- Slick -->
<script src="dashboard_assets/libs/slick/slick.min.js"></script>
<!-- Examples -->
<script src="dashboard_assets/dist/js/examples/product-detail.js"></script>
<!-- Rating -->
<script src="dashboard_assets/libs/rating/jquery.rating.min.js"></script>

<!-- Examples -->
<script src="dashboard_assets/dist/js/examples/dashboard.js"></script>

<!-- Main Javascript file -->
<script src="dashboard_assets/dist/js/app.min.js"></script>
</body>


</html>
