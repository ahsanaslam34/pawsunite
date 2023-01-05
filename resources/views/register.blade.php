@extends('master')

@section('content')

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">Join Us</h2>
              <ol class="breadcrumb">
                <li><a href="javascript:void(0)">Home /</a></li>
                <li class="current">Register</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->  

    <!-- Content section Start --> 
    <section class="register section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="register-form login-area">
              <h3>
                Register
              </h3>
              <form class="login-form" action="{{Route('user.save')}}" method="post">
              @csrf
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="text" id="Name" class="form-control" name="name" placeholder="Full Name" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-envelope"></i>
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                  </div>
                </div> 

                 
                <div class="form-group" id="featuresData">
                
                </div> 
               
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-phone"></i>
                    <input type="number"  class="form-control" name="contact" placeholder="Contact Number" required>
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-icon">
                    <i class="lni-world"></i>
                    <input type="text" class="form-control" name="country" placeholder="Country" required>
                  </div>
                </div> 
                <div class="form-group"> 
                <div class="input-icon">
                    <i class="lni-world"></i>
                    <input type="text"  class="form-control" name="postcode" placeholder="Post Code" required>
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-icon">
                    <i class="lni-world"></i>
                    <input type="text"  class="form-control" name="region" placeholder="Region" required>
                  </div>
                </div> 
                <div class="form-group">
                <div class="input-icon">
                    <i class="lni-envelope"></i>
                    <input type="text"  class="form-control" name="address" placeholder="Address" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                  </div>
                </div>  
               
                <div class="form-group mb-3">
                  <div class="checkbox">
                    
                    <label><input type="checkbox" required> By registering, you accept our Terms & Conditions</label>
                  </div>
                </div>   
                <div class="text-center">
                  <button  type="submit" class="btn btn-common log-btn">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End --> 



@endsection