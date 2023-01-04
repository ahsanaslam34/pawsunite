@extends('admin/layout/master')



@section('content')

<div class="mb-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="bi bi-globe2 small me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">Add Blog</div>
                </div>
            </div>
        </div>
        
       <hr>
<div class="card">
 
<div class="card-body">
                    <form class="row g-3 needs-validation" novalidate action="{{Route('blog.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10">
                            <label for="validationCustom01" class="form-label">Blog Title</label>
                            <input type="text" name="txttitle" class="form-control" id="validationCustom01"  required>
                            <div class="invalid-feedback">
                                Please Fill Blog Title
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Post by:</label>
                            <input type="text" name="txtpost" class="form-control" id="validationCustom02"  required>
                            <div class="invalid-feedback">
                            Please Fill Poster Name
                            </div>
                        </div>
                        <div class="col-md-12">
  <label for="formFile" class="form-label">Blog Image</label>
  <input class="form-control" type="file" id="formFile" name="txtimage" required>
  <div class="invalid-feedback">
                            Please Upload File
                            </div>
</div>
                        
                        
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Blog Description</label>
                            
                            <textarea class="form-control" name="txtdes" id="validationCustom01" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Please Fill Blog Description
                            </div>
                        </div>
                     

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                </div>
                <script src="assets/js/ckeditor/ckeditor.js"></script>
                <script>
                 CKEDITOR.replace('txtdes');
                </script>
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