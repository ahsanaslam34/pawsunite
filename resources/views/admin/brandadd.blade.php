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
                    <li class="breadcrumb-item active" aria-current="page">Add brand</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body pad-top-div">
                <div class="">
                        <div class="">Add Brands
                            <a href="{{Route('brand.show')}}" class="btn btn-theme-mini float-right">Brand List</a>
                        </div>
                        
                    </div>
            </div>
        </div>
        
       <hr>
<div class="card">
 
<div class="card-body">
                    <form class="row g-3 needs-validation" novalidate action="{{Route('brand.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Brand Title</label>
                            <input type="text" name="txttitle" class="form-control" id="validationCustom01"  required>
                            <div class="invalid-feedback">
                                Please Fill Brand Title
                            </div>
                        </div>
                        
                        <div class="col-md-12">
  <label for="formFile" class="form-label">Brand Image</label>
  <input class="form-control" type="file" id="formFile" name="txtimage" required>
  <div class="invalid-feedback">
                            Please Upload File
                            </div>
</div>
                        
                        
                       
                     

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                </div>
                
           <script>
 
               // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
               </script>
               

@endsection