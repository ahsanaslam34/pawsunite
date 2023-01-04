@extends('master')

@section('content')




       <!-- Page Header Start -->
       <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">Pet Lost</h2>
              <ol class="breadcrumb">
                <li><a href="#">Home /</a></li>
                <li class="current">Pet Lost</li>
				
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
        <div class="row justify-content-center">
          
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row page-content">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="inner-box">
                  <div class="dashboard-box">
                    <h2 class="dashbord-title">Detail</h2>
                  </div>
                  <div class="dashboard-wrapper">
                    @if(Session::has('limit'))
                     <div class="alert alert-danger">{{Session::get('limit')}}</div>
                      @endif
                    <form action="{{Route('ads.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group mb-3">
                      <label class="control-label">Name</label>
                      <input class="form-control input-md" name="name" placeholder="Name" type="text" required>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label class="control-label">Pet Type</label>
                      <select class="form-control" name="pet_type" required>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Parrot">Parrot</option>
                      </select>
                      
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Status</label>
                      <select class="form-control" name="status">
                        <option value="Any">Any</option>
                        <option value="Lost">Lost</option>
                        <option value="Found">Found</option>
                        <option value="Reunited">Reunited</option>
                        <option value="Rainbow Bridge">Rainbow Bridge</option>
                        <option value="Stolen">Stolen</option>
                      </select>
                      
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Gender</label>
                      <select class="form-control" name="gender" required>
                        <option value="">--Select--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Breed</label>
                      <select name="breed" class="form-control" required>
                            <option value="none">Breed</option>
                            @foreach($breedArr as $breed)
                              <option>{{$breed->des}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Age</label>
                      <input class="form-control input-md" name="age" placeholder="Age" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Color</label>
                      <input class="form-control input-md" name="color" placeholder="Color" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Where Lost</label>
                      <input class="form-control input-md" name="where_loss" placeholder="Where Lost" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Identification marks</label>
                      <input class="form-control input-md" name="identification_marks" placeholder="Identification marks" type="text" required>
                    </div>
                    <div class="row">
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Tagged</label>
                        <br>
                        <label><input type="radio" value="yes" name="tagged" required> Yes</label>
                        <label><input type="radio" value="no" name="tagged" required> No</label>
                      </div>
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Microchipped </label>
                        <br>
                        <label><input type="radio" value="yes" name="microchipped" required> Yes</label>
                        <label><input type="radio" value="no" name="microchipped" required> No</label>
                      </div>
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Tattoed </label>
                        <br>
                        <label><input type="radio" value="yes" name="tattoed" required> Yes</label>
                        <label><input type="radio" value="no" name="tattoed" required> No</label>
                      </div>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Lost In Region</label>
                      <select  class="form-control" required name="region">
                        <option value="">Any</option>
                        <option>Central</option>
                        <option>East Anglia</option>
                        <option>North East</option>
                        <option>North West</option>
                        <option>Northern Ireland</option>
                        <option>Rainbow Bridge</option>
                        <option>Scotland</option>
                        <option>South East</option>
                        <option>South West</option>
                        <option>Southern Ireland</option>
                        <option>Wales</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Lost In Post Area</label>
                      <input class="form-control input-md" name="postcode" placeholder="Lost In Post Area" type="text" required>
                    </div>
                    <div class="form-group md-3">
                    <label class="control-label">Date Lost</label>
                    <input type="date" name="date_loss" class="form-control">
                      
                    </div>
                    <div class="form-group md-3">
                    <label class="control-label">Notes</label>
                        <textarea name="other" class="form-control"></textarea>
                    </div>
                    <label class="tg-fileuploadlabel" for="tg-photogallery">
                      <span>Drop Image to upload</span>
                      <span>Or</span>
                      <span class="btn btn-common">Select Files</span>
                      <span>Maximum upload file size: 500 KB</span>
                      <input id="tg-photogallery" class="tg-fileinput" type="file" name="txtimage[]" required accept="image/*" multiple>
                    </label>
                    <!-- <label class="tg-fileuploadlabel" for="tg-photogallery2">
                      <span>Drop Related Images</span>
                      <span>Or</span>
                      <span class="btn btn-common">Select Files</span>
                      <span>Maximum upload file size: 500 KB</span>
                      <input id="tg-photogallery2" class="tg-fileinput" type="file" accept="image/*" name="txtrelatedimg[]" multiple>
                    </label> -->
                    <div class="form-group md-3">
                    <div class="col-sm-4 offset-md-4 text-center">
                      <button type="submit" id="postbtn" class="btn btn-common btn-block">Post Now</button>
                    </div>
                    </div>
                  </form>
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