@extends('master')


@section('content')

 <!-- Page Header Start -->
 <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">404</h2>
              <ol class="breadcrumb">
                <li><a href="javascript:void(0)">Home /</a></li>
                <li class="current">404</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->  

    <!-- Start Content -->
    <div class="error section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="error-content">
              <div class="error-message">
                <h2>404</h2>
                <h3><span>Ooooops!</span> Something Went Wrong...</h3>
              </div>
              <form class="form-error-search">
                <input type="search" name="search" class="form-control" placeholder="Search Here">
                <button class="btn btn-common btn-search" type="button">Search Now</button>
              </form>
              <div class="description">
                <span>Or Goto <a href="javascript:void(0)">Homepage</a></span>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>
    <!-- End Content -->



@endsection