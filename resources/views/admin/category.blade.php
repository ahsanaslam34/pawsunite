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
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>

       
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Categories</div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalVarying" data-bs-whatever="@mdo">Add Category
                        </button>

                        <div class="modal fade" id="exampleModalVarying" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                             <form  method="post" id="formData" onkeydown="return event.key != 'Enter';">
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
                                                <label for="txtdes" class="col-form-label">Category Name:</label>
                                                <input type="text" name="txtdes" class="form-control" id="txtdes">
                                                <span class="error-msg"></span>
                                            </div>
                                            
                                       
                                    </div>
                                    <div class="modal-footer">
                                       
                                        <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                                         <button type="button" id="cancel" class="btn btn-danger" data-bs-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                <!--Edit Model-->
                        <div class="modal fade" id="modelEdit" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataUpdate" onkeydown="return event.key != 'Enter';">
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
                                                <input type="text" name="txtdes" class="form-control" id="txtdesEdit">
                                                <span class="error-msg"></span>
                                            </div>
                                            
                                        
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" id="btnUpdate" class="btn btn-primary">Update</button>
                                        <button type="button" id="cancel2" class="btn btn-danger" data-bs-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <!--Model End-->

                         <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" onkeydown="return event.key != 'Enter';">
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
                                        
                                        <button type="button" id="btnDelete" class="btn btn-primary">Delete</button>
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

        </table>
        <br>
        <br>
        <br>
    </div>

   


<script type="text/javascript">
        
    
    $(document).ready(function(){


        var show=function(){
            $.ajax({
                    type:'GET',
                    url:"{{Route('admin.catShow')}}",
                    data:$("#formData").serialize(),
                    success:function(html){
                            
                           $("#categoryData").html(html);
                    }
                });
        }
        show();

        var save=function(){
            var des=$("#txtdes").val();
            if (des=="") {
                $(".error-msg").text("Please enter the category name");
            }else{

            
                 $.ajax({
                    type:'POST',
                    url:"{{Route('cat.save')}}",
                    data:$("#formData").serialize(),
                    success:function(html){
                            
                            show();
                            $("#cancel").click(); 
                            $("#formData")[0].reset(); 
                            $(".error-msg").text('');
                    }
                });

            }
        }
        var update=function(){
            var des=$("#txtdesEdit").val();
            if (des=="") {
                $(".error-msg").text("Please enter the category name");
            }else{

            
                 $.ajax({
                    type:'POST',
                    url:"{{Route('cat.update')}}",
                    data:$("#formDataUpdate").serialize(),
                    success:function(html){
                            
                            show();
                            $("#cancel2").click(); 
                            $("#formDataUpdate")[0].reset(); 
                            $(".error-msg").text('');
                    }
                });

            }
        }

        var delete_fun=function(){
           

            // alert('test');
                 $.ajax({
                    type:'POST',
                    url:"{{Route('cat.delete')}}",
                    data:$("#formDataDelete").serialize(),
                    success:function(html){
                            
                            show();
                            $("#cancel3").click(); 
                            $("#formDataDelete")[0].reset(); 
                            $(".error-msg").text('');
                    }
                });

            
        }

        $(document).on('click','.btn-edit',function(){
                var id=$(this).attr('id');
                $("#txtidUpdate").val($("#txtid"+id).val());
                $("#txtdesEdit").val($("#txtdes"+id).val());
                
                $('#modelEdit').modal('toggle');

                    
                    
        });
        $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val($("#txtid"+id).val());
                $("#desDelete").text($("#txtdes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
        $(document).on("click","#btnSave",function(){
            save();
               

        });
        $(document).on("click","#btnUpdate",function(){
            update();
               

        });
        $(document).on("click","#btnDelete",function(){
            delete_fun();
               

        });

        $(document).keyup(function (e) {
        if ($("#txtdes").is(":focus") && (e.keyCode == 13)) {
            save();
        }
        if ($("#txtdesEdit").is(":focus") && (e.keyCode == 13)) {
            update();
        }
    }); 

    });
</script>

@endsection