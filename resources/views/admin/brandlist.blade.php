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
                    <li class="breadcrumb-item active" aria-current="page">brand List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body pad-top-div">
                <div class="">
                        <div class="">All Brands
                            <a href="{{Route('brand.add')}}" class="btn btn-theme-mini float-right">Add Brands</a>
                        </div>
                        
                    </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($brandArr as $brand)
            <tr>
                <td>{{$brand->id}}</td>
                <td><img src="assets/img/brand/{{$brand->img}}" style="width:50px;"></td>
                <td><input type="hidden" id="txtnamedes{{$brand->id}}" value="{{$brand->title}}">{{$brand->title}}</td>
                <td>{{$brand->created_at}}</td>
                <td>
                    <a href="{{Route('brand.edit',[$brand->id])}}" class="btn btn-primary btn-edit">Edit</a>
                    <a id="{{$brand->id}}" class="btn btn-danger btn-delete">Delete</a>
                </td>
            </tr>
            @endforeach
           
            </tbody>
        </table>
    </div>

   

<!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('brand.delete')}}" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Brand Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <input type="hidden" id="txtidDelete" name="txtid">
                                                <p>Are you sure?</p>
                                                <span id="nameDesDelete"></span>
                                                <br>
                                                <span id="emailDesDelete"></span>
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
                $("#txtidDelete").val(id);
                $("#nameDesDelete").text($("#txtnamedes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
    });

</script>



@endsection