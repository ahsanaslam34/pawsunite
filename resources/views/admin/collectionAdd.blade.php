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
                    <li class="breadcrumb-item active" aria-current="page">Add Attributes</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">Add Attributes</div>
                </div>
            </div>
        </div>
        
       <hr>
<div class="card col-lg-8 offset-lg-2">
 
<div class="card-body">
                    <form  action="{{Route('collection.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Collection Name</label>
                            <input type="text" name="txtname" class="form-control" id="validationCustom01"  required>
                            
                            <br>
                            
                        </div>
                        
                     

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                </div>
                
               

@endsection