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
                    <li class="breadcrumb-item active" aria-current="page">Attributes List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Attributes</div>
                    <a href="{{Route('admin.attrAdd')}}" class="btn btn-primary">Add Attributes
                        </a>
                       
                        <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('attr.delete')}}" onkeydown="return event.key != 'Enter';">
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

                        <!--Model End-->

                        
                
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="categoryData">
                 <thead>
                    <tr>
                        
                    <th>ID</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Type</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($attrArr as $attr)
                <tr>
                    <td>{{$attr->id}}</td>
                    <td><input type="hidden" id="txtdes{{$attr->id}}" value="{{$attr->name}}">{{$attr->name}}</td>
                    <td>{{$attr->value}}</td>
                    <td>{{$attr->type}}</td>
                    <td>{{$attr->created_at}}</td>
                     <td>

                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                               class="btn btn-floating"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{Route('attr.edit',[$attr->id])}}"  class="dropdown-item  btn-edit">Edit</a>
                                                
                                                <a id="{{$attr->id}}"  class="dropdown-item btn-delete">Delete</a>
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
        <br>
    </div>




<script type="text/javascript">
    $(document).ready(function(){

        

        $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val(id);
                $("#desDelete").text($("#txtdes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
    });

</script>

@endsection