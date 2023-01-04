@extends('admin/layout/master')



@section('content')
<div class="col-lg-12 col-md-12">
                    <form action="" method="post">
                        @csrf
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                        
                        <a href="{{Route('collection.show')}}" class="btn btn-theme-mini float-right">Collection List</a>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <h2>{{$data->des}}</h2>
                                                    
                        </div>
                        <div class="col-md-6">
                            <a href="{{Route('collectionPro.add',[$data->id])}}" class="btn btn-theme-mini float-right">Add Products In Collection</a>
                                                    
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-custom mb-0" id="recent-products">
                            <thead>
                            <tr>
                             
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productArr as $product)  
            <tr>
               
                <td>
                    <input type="hidden" id="txtid{{$product->id}}" value="{{$product->id}}">
                    <input type="hidden" id="txtdes{{$product->id}}" value="{{$product->pname}}">
                    {{$product->pid}}</td>
                <td><img src="assets/img/post/{{$product->img}}" style="width:50px;"></td>
                <td>{{$product->pname}}</td>
                <td><button  id="{{$product->id}}" class="btn-delete btn btn-outline-danger btn-icon" type="button">
                                    <i class="bi bi-trash me-0"></i>
                                </button></td>
                
            </tr>
           

           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    </form>

        </div>


 <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('collectionPro.delete')}}" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Delete Orders</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <input type="hidden" id="txtidDelete" name="txtid">
                                                <p class="sure-msg">Are you sure?</p>
                                                <span id="orderDelete" class="font-size-20"></span>
                                                <br>
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

                        <!--Model End-->

<script type="text/javascript">
    

     $(document).ready(function(){

       


         $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val($("#txtid"+id).val());
                $("#desDelete").text($("#txtdes"+id).val());
                $("#orderDelete").text("ID: #"+id);
                
                $('#modelDelete').modal('toggle');

                    
                    
        });


     });
</script>

@endsection
