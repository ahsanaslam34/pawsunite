@extends('master')


@section('content')

<main class="main">
<div class="page-header text-center" style="background-image: url('assets/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">About Us<span>Keep in Touch</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <h2 class="title">Our Vision</h2><!-- End .title -->
                            <p>Exploring the worlds of fashion + culture + inspiration, The Cool Hour is an international online destination for the creative cool. We are a new creative collective based out of Pakistan that is independently run, on a pursuit to find what’s next for the 21st century girl and boy.  </p>
                        </div><!-- End .col-lg-6 -->
                        
                        <div class="col-lg-6">
                            <h2 class="title">Our Mission</h2><!-- End .title -->
                            <p>We feature the latest in lookbooks, collections and trends, as well as surface underground and yet-to-be-known brands and designers from around the world. Our curated shopping selection is a collection of new season pieces from some our favorite designers and brands.
 </p>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <div class="mb-5"></div><!-- End .mb-4 -->
                </div><!-- End .container -->

                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title">Who We Are</h2><!-- End .title -->
                                <p class="lead text-primary mb-3">Tajj Collection is a contemporary clothing brand known for its trend-driven styles with affordable prices. <br>Drawing inspiration from the latest trends, from street style to runway </p><!-- End .lead text-primary -->
                     
                               
                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <img src="assets/assets/images/about/img-1.jpg" alt="" class="about-img-front">
                                    <img src="assets/assets/images/about/img-2.jpg" alt="" class="about-img-back">
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="brands-text">
                                <h2 class="title">The world's premium design brands in one destination.</h2><!-- End .title -->
                            </div><!-- End .brands-text -->
                        </div><!-- End .col-lg-5 -->
                        <div class="col-lg-7">
                            <div class="brands-display">
                                <div class="row justify-content-center">
                                    
                                     @foreach($brandArr as $brand)

                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                             <img src="assets/img/brand/{{$brand->img}}" alt="{{$brand->title}}">

                                        </a>
                                    </div><!-- End .col-sm-4 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .brands-display -->
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->

                   
                </div><!-- End .container -->

                
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection