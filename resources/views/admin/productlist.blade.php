@extends('admin/layout/master')



@section('content')


<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pad-top-div">
                    <div class="">
                        <div class="">All Products
                            <a href="{{Route('product.add')}}" class="btn btn-theme-mini float-right">Add Product</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        <th>
                          SR
                        </th>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php   
                            echo count($productArr);
                         ?>
                        @foreach($productArr as $product)
                            <tr>
                                
                                <td>{{$product->id}}</td>
                                <td>

                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                               class="btn btn-floating"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{Route('product.edit',$product->id)}}" class="dropdown-item">Edit</a>
                                                
                                                <a id="{{$product->id}}"  class="dropdown-item btn-delete">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                               
                             </td>
                            </tr>
                        @endforeach
                     
                  
                    </tbody>
                </table>
                <br>
                <br>
            </div>
            
        </div>
        
    </div>
 <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('product.delete')}}" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Manage Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <input type="hidden" id="txtidDelete" name="txtid">
                                                <p>Are you sure?</p>
                                                <span id="desDelete"></span>
                                            </div>
                                            
                                        
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" id="btnDelete" class="btn btn-primary">Delete</button>
                                        <button type="button" id="cancel3" class="btn btn-danger" data-bs-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

    <script type="text/javascript">
    

     $(document).ready(function(){

       

         $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val($("#txtid"+id).val());
                $("#desDelete").text($("#txtdes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });


     });
</script>

@endsection