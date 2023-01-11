@extends('admin/layout/master')



@section('content')

<div class="mb-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">
                            <i class="bi bi-globe2 small me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                </ol>
            </nav>
        </div>

        
        
<div class="card">
 
<div class="card-body">
                    <form class="row g-3 needs-validation" action="{{Route('admin.adsUpdate',[$postArr->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" value="{{$postArr->name}}" name="name" class="form-control" id="validationCustom01"  required>
                            
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Pet Type</label>
                            <select class="form-select" name="pet_type" id="pet_type">
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Bird">Bird</option>
                                <option value="Others">Others</option>
                            </select>
                            <div class="invalid-feedback">
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="Any">Any</option>
                                <option value="Lost">Lost</option>
                                <option value="Found">Found</option>
                                <option value="Reunited">Reunited</option>
                                <option value="Rainbow Bridge">Rainbow Bridge</option>
                                <option value="Stolen">Stolen</option>
                              </select>
                           
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender" required>
                                <option value="">--Select--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Breed</label>
                            
                            <select name="breed" class="form-select" id="breed" required>
                                <option value="none">Breed</option>
                                @foreach($breedArr as $breed)
                                  <option>{{$breed->des}}</option>
                                @endforeach
                            </select>
                        </div>
                       <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Lost In Region</label>
                            <select  class="form-select" id="region" required name="region">
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
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Colour</label>
                            <input class="form-control" name="color" value="{{$postArr->color}}"  placeholder="Colour" type="text">
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Age</label>
                            <input class="form-control input-md" name="age" id="age" value="{{$postArr->age}}" placeholder="Age" type="text">
                            
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Identification marks</label>
                            <input class="form-control input-md" name="identification_marks" value="{{$postArr->identification_marks}}" placeholder="Identification marks" type="text" >
                        </div>
                        
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Tagged</label>
                            <br>
                            <label><input type="radio" value="yes" name="tagged" @if($postArr->tagged=="yes") checked @endif required> Yes</label>
                        <label><input type="radio" value="no" name="tagged" @if($postArr->tagged=="no") checked @endif required> No</label>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Microchipped</label>
                           <br>
                        <label><input type="radio" value="yes" name="microchipped" @if($postArr->microchipped=="yes") checked @endif required> Yes</label>
                        <label><input type="radio" value="no" name="microchipped" @if($postArr->microchipped=="no") checked @endif required> No</label>
                        </div>
                        <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Tattoed</label>
                            <br>
                            <label><input type="radio" value="yes" name="tattoed" @if($postArr->tattoed=="yes") checked @endif required> Yes</label>
                            <label><input type="radio" value="no" name="tattoed" @if($postArr->tattoed=="no") checked @endif required> No</label>
                        </div>
                         <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Where Lost</label>
                            <input class="form-control input-md" name="where_loss" value="{{$postArr->where_loss}}" placeholder="Where Lost" type="text">
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Lost In Post Area</label>
                            <input class="form-control input-md" name="postcode" value="{{$postArr->postcode}}" placeholder="Lost In Post Area" type="text">
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">date_loss</label>
                            <input type="date" name="date_loss" value="{{$postArr->date_loss}}" class="form-control">

                        </div>
                        <div class="col-md-4">
                          <label for="formFile" class="form-label">Main Image</label>
                          <input class="form-control" name="txtimage[]" type="file" id="formFile" multiple>
                          <div class="invalid-feedback">
                                                    Please Upload File
                                                    </div>
                        </div>
                        

                        <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="active_status" class="form-control">
                            @if($postArr->active_status==1)
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            @elseif($postArr->active_status==2)
                            <option value="2">Inactive</option>
                            <option value="1">Active</option>
                            @endif
                        </select>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <br>
                            <label><input type="checkbox" name="featured" @if($postArr->is_featured==1) checked @endif> Is Featured</label>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Product Description</label>
                            <textarea name="other" class="form-control" rows="4">{{$postArr->other}}</textarea>

                            
                        </div>
                     

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                
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