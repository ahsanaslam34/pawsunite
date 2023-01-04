<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog Lost Admin</title>
    <base href="{{ \URL::to('/') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="dashboard_assets/assets/images/favicon.ico" >

    <!-- Themify icons -->
    <link rel="stylesheet" href="dashboard_assets/dist/icons/themify-icons/themify-icons.css" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="dashboard_assets/dist/css/app.min.css" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="auth">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->


    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                               
                                <div class="my-5 text-center text-lg-start">
                                    <h1 class="display-8">Sign In</h1>
                                    <p class="text-muted">Sign in to Dog Lost Admin Dashboard</p>
                                </div>
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                <form class="mb-5" method="post" action="{{Route('admin.login')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="txtuser" class="form-control" placeholder="Enter Username" autofocus
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="txtpass" class="form-control" placeholder="Enter Password"
                                               required>
                                    </div>
                                    <div class="text-center text-lg-start">
                                       
                                        <button class="btn btn-primary">Sign In</button>
                                    </div>
                                </form>
                                <div class="social-links justify-content-center">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                        <div class="logo">
                            <img width="400" src="dashboard_assets/assets/images/logo.png" alt="logo">
                        </div>
                        <div>
                            <h3 class="fw-bold">Welcome to Dog Lost!</h3>
                            <p class="lead my-5">Please use the right User Name and Password.
                                <br> if it's incorrect then you will be blocked.</p>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Bundle scripts -->
<script src="dashboard_assets/libs/bundle.js"></script>

<!-- Main Javascript file -->
<script src="dashboard_assets/dist/js/app.min.js"></script>
</body>

</html>
