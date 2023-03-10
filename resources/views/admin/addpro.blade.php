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
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body pad-top-div">
                <div class="">
                    <div class="">Add Product
                     <a href="{{Route('product.show')}}" class="btn btn-theme-mini float-right">Product List</a> </div>
                </div>
            </div>
        </div>
        
       <br>
<div class="card">
 
<div class="card-body">
                    <form class="row g-3 needs-validation" action="{{Route('product.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <label for="validationCustom01" class="form-label">Product Name</label>
                            <input type="text" name="txtpname" class="form-control" id="validationCustom01"  required>
                            <div class="invalid-feedback">
                                Please Fill Product Name
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Brand</label>
                            <select class="form-select" name="txtbrand" id="validationCustom04" required>
                                <option selected disabled value="">Choose ...</option>
                                @foreach($brandArr as $brand)
                                 <option value="{{$brand->id}}">{{$brand->title}}</option>

                               @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a Unit.
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Price in Rs</label>
                            <input type="number" name="txtprice" class="form-control" id="price"  required>
                            <div class="invalid-feedback">
                            Please Fill Product Price
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Discount %</label>
                            <input type="number" name="txtdiscount" id="discount" class="form-control" >
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">New Price Rs</label>
                            <input type="number" name="txtnewprice" class="form-control" id="net_amount">
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Price In Dollars</label>
                            <input type="number" name="txtpricedollar" class="form-control" id="price_dollar" step="any"  required>
                            <div class="invalid-feedback">
                            Please Fill Product Price
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Discount %</label>
                            <input type="number" name="txtdiscountdollar" class="form-control" id="discount_dollar">
                            
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">New Price $</label>
                            <input type="number" name="txtnewpricedollar" class="form-control" id="net_amount_dollar" step="any">
                            
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Add Attributes</label>
                            <select name="txtattr" class="form-control">
                                <option value="0" selected>Simple Product</option>
                                @foreach($attrArr as $attr)
                                 <option value="{{$attr->id}}">{{$attr->name}}</option>

                               @endforeach
                            </select>
                        </div>
                       
                        
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Unit</label>
                            <select class="form-select" name="txtunit" id="validationCustom04" required>
                                <option selected disabled value="">Choose ...</option>
                                @foreach($unitArr as $unit)
                                 <option value="{{$unit->id}}">{{$unit->des}}</option>

                               @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a Unit.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Category</label>
                            <select class="form-select" name="txtcat" id="validationCustom04" required>
                                <option selected disabled value="">Choose ...</option>
                                @foreach($categoryArr as $category)
                                 <option value="{{$category->id}}">{{$category->des}}</option>

                               @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a Category
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Sub-Category</label>
                            <select class="form-select" name="txtsub" id="validationCustom04" required>
                                <option selected disabled value="">Choose ....</option>
                               @foreach($subCatArr as $subCat)
                                 <option value="{{$subCat->id}}">{{$subCat->des}}</option>

                               @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a Sub-Category
                            </div>
                        </div>
                        <div class="col-md-4">
  <label for="formFile" class="form-label">Main Image</label>
  <input class="form-control" name="txtimage" type="file" id="formFile" required>
  <div class="invalid-feedback">
                            Please Upload File
                            </div>
</div>
<div class="col-md-8">
<label for="formFileMultiple" class="form-label">Related Image</label>
  <input class="form-control" type="file" id="formFileMultiple" name="txtrelatedimg[]" multiple>

</div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Product Description</label>
                            
                            <textarea id="" class="form-control" name="txtdes" id="validationCustom01" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Please Fill Product Description
                            </div>
                        </div>
                     

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                </div>

                <script src="dashboard_assets/dist/js/ckeditor/ckeditor.js"></script>
                <script>
                 CKEDITOR.replace('txtdes');
                </script>

<script type="text/javascript">
    var cal_net=function(){
        var discount=0;        
        var price=$("#price").val(); 
            discount=parseInt($("#discount").val());
            // alert(discount);
        if (discount>0) {
            if($("#discount").val()==""){
                 discount=0;
             }
            var net=parseInt(price)*discount/100;
            $("#net_amount").val(parseInt(price)-net);
            
        }else{
            $("#net_amount").val("");
             

        }     
         
    }
     var cal_net_dollar=function(){
        var discount=0;        
        var price=$("#price_dollar").val(); 
            discount=parseInt($("#discount_dollar").val());
            // alert(discount);
        if (discount>0) {
            if($("#discount_dollar").val()==""){
                 discount=0;
             }
            var net=parseInt(price)*discount/100;
            $("#net_amount_dollar").val(parseInt(price)-net);
            
        }else{
            $("#net_amount_dollar").val("");
             

        }     
         
    }
    $(document).on('keyup change keydown','#discount',function(){
        
        cal_net();
        
    
    });

    $(document).on('keyup change keydown','#discount_dollar',function(){
        
        cal_net_dollar();
        
    
    });
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