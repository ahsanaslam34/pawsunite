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
                    <li class="breadcrumb-item active" aria-current="page">Units List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Units</div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalVarying" data-bs-whatever="@mdo">Add Unit
                        </button>
                        <!-- Model -->
                        <div class="modal fade" id="exampleModalVarying" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">

                             <form action="{{Route('unit.save')}}" method="post">
                                @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalVaryingLabel">Manage Unit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Unit Name:</label>
                                                <input type="text" class="form-control" required id="recipient-name" name="txtdes">
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                         <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel
                                        </button>
                                       
                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>

                        <!-- Model End -->
                        <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('unit.delete')}}" onkeydown="return event.key != 'Enter';">
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

                        <!--Edit Model-->
                        <div class="modal fade" id="modelEdit" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" action="{{Route('unit.update')}}" id="formDataUpdate" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalVaryingLabel">Manage Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <input type="hidden" id="txtidUpdate" name="txtid">
                                                <label for="txtdesEdit" class="col-form-label">Category Name:</label>
                                                <input type="text" name="txtsubCat" class="form-control" id="txtdesEdit">
                                                <span class="error-msg"></span>
                                            </div>
                                            
                                            
                                        
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" id="btnUpdate" class="btn btn-primary">Update</button>
                                        <button type="button" id="cancel2" class="btn btn-danger" data-bs-dismiss="modal">Cancel
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
                    <th>Unit</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($unitArr as $unit)
                <tr>
                    <td><input type="hidden" id="txtid{{$unit->id}}" value="{{$unit->id}}">{{$unit->id}}</td>
                    <td><input type="hidden" id="txtdes{{$unit->id}}" value="{{$unit->des}}">{{$unit->des}}</td>
                    <td>{{$unit->created_at}}</td>
                     <td>

                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                               class="btn btn-floating"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a id="{{$unit->id}}"  class="dropdown-item  btn-edit">Edit</a>
                                                
                                                <a id="{{$unit->id}}"  class="dropdown-item btn-delete">Delete</a>
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

         $(document).on('click','.btn-edit',function(){
                var id=$(this).attr('id');
                $("#txtidUpdate").val($("#txtid"+id).val());
                $("#txtdesEdit").val($("#txtdes"+id).val());
                $("#txtcatSelect").val($("#txtcat"+id).val()).change();
                $('#modelEdit').modal('toggle');

                    
                    
        });

        $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val($("#txtid"+id).val());
                $("#desDelete").text($("#txtdes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
    });

</script>

@endsection