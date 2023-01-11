@extends('master')

@section('content')




       <!-- Page Header Start -->
       <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">Posts</h2>
              <ol class="breadcrumb">
                <li><a href="javascript:void(0)">Home /</a></li>
                <li class="current">Posts</li>
				
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
                    <form action="{{Route('ads.update',[$postArr->id])}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group mb-3">
                      <label class="control-label">Name</label>
                      <input class="form-control input-md" name="name" value="{{$postArr->name}}" placeholder="Name" type="text" required>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label class="control-label">Pet Type</label>
                      <select class="form-control" id="pet_type" name="pet_type" required>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                        <option value="Others">Others</option>
                      </select>
                      
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Status</label>
                      <select class="form-control" name="status" id="status">
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
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="">--Select--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Breed</label>
                      <select name="breed" class="form-control" id="breed" required>
                            <option value="none">Breed</option>
                            @foreach($breedArr as $breed)
                              <option>{{$breed->des}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Age</label>
                      <input class="form-control input-md" name="age" id="age" value="{{$postArr->age}}" placeholder="Age" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Colour</label>
                      <input class="form-control input-md" name="color" value="{{$postArr->color}}"  placeholder="Colour" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Where Lost</label>
                      <input class="form-control input-md" name="where_loss" value="{{$postArr->where_loss}}" placeholder="Where Lost" type="text" required>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Identification marks</label>
                      <input class="form-control input-md" name="identification_marks" value="{{$postArr->identification_marks}}" placeholder="Identification marks" type="text" required>
                    </div>
                    <div class="row">
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Tagged</label>
                        <br>
                        <label><input type="radio" value="yes" name="tagged" @if($postArr->tagged=="yes") checked @endif required> Yes</label>
                        <label><input type="radio" value="no" name="tagged" @if($postArr->tagged=="no") checked @endif required> No</label>
                      </div>
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Microchipped </label>
                        <br>
                        <label><input type="radio" value="yes" name="microchipped" @if($postArr->microchipped=="yes") checked @endif required> Yes</label>
                        <label><input type="radio" value="no" name="microchipped" @if($postArr->microchipped=="no") checked @endif required> No</label>
                      </div>
                      <div class="form-group mb-3 col-md-4">
                        <label class="control-label">Tattoed </label>
                        <br>
                        <label><input type="radio" value="yes" name="tattoed" @if($postArr->tattoed=="yes") checked @endif required> Yes</label>
                        <label><input type="radio" value="no" name="tattoed" @if($postArr->tattoed=="no") checked @endif required> No</label>
                      </div>
                    </div>
                    <div class="form-group mb-3">
                      <label class="control-label">Lost In Region</label>
                      <select  class="form-control" id="region" required name="region">
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
                      <input class="form-control input-md" name="postcode" value="{{$postArr->postcode}}" placeholder="Lost In Post Area" type="text" required>
                    </div>
                    <div class="form-group md-3">
                    <label class="control-label">Date Lost</label>
                    <input type="date" name="date_loss" value="{{$postArr->date_loss}}" class="form-control">
                      
                    </div>
                    <div class="form-group md-3">
                    <label class="control-label">Notes</label>
                        <textarea name="other" class="form-control">{{$postArr->other}}</textarea>
                    </div>
                    <label class="tg-fileuploadlabel" for="tg-photogallery">
                      <span>Drop Image to upload</span>
                      <span>Or</span>
                      <span class="btn btn-common">Select Files</span>
                      <span>Maximum upload file size: 500 KB</span>
                      <input id="tg-photogallery" class="tg-fileinput" type="file" name="txtimage[]" accept="image/*" multiple>
                    </label>
                    
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
<script type="text/javascript">
    var pet_type="{{$postArr->pet_type}}";
    var status="{{$postArr->status}}";
    var gender="{{$postArr->gender}}";
    var breed="{{$postArr->breed}}";
    var region="{{$postArr->region}}";

    $("#pet_type").change().val(pet_type);
    $("#status").change().val(status);
    $("#gender").change().val(gender);
    $("#breed").change().val(breed);
    $("#region").change().val(region);
</script>
@endsection