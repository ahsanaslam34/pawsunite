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
                    <li class="breadcrumb-item active" aria-current="page">Orders List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
                <div class="card-body pad-top-div">
                    <div class="">
                        <div class="">Collection
                            <a href="{{Route('collection.add')}}" class="btn btn-theme-mini float-right">Add Collection</a>
                        </div>
                        
                    </div>
                </div>
            </div>

        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                <tr>
                    
                <th>ID</th>
                <th>Des</th>
                <th>Status</th>
                <th>Add Product</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>

              @foreach($dataArr as $data)  
            <tr>
                
                <td><input type="hidden" id="txtid{{$data->id}}" value="{{$data->id}}">
                    <input type="hidden" id="txtdes{{$data->id}}" value="{{$data->des}}">
                    <a>#{{$data->id}}</a>
                </td>
                <td><a href="{{Route('collectionPro.list',[$data->id])}}">{{$data->des}}</a></td>
                <td>
                    @if($data->status==1)

                    <span class="badge bg-success">Active</span>
                    @elseif($data->status==2)
                    <span class="badge bg-primary">Inactive</span>
                    @elseif($data->status==0)
                    <span class="badge bg-danger">Cancelled</span>

                    @endif
                </td>
                <td><a href="{{Route('collectionPro.add',[$data->id])}}" class="btn btn-theme-mini">Add Product</a></td>
                
                
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                               class="btn btn-floating"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                
                                
                                <a href="{{Route('collection.edit',[$data->id])}}"  class="dropdown-item btn-edit">Edit</a>
                                <a id="{{$data->id}}"  class="dropdown-item btn-delete">Delete</a>
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

     <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('collection.delete')}}" onkeydown="return event.key != 'Enter';">
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