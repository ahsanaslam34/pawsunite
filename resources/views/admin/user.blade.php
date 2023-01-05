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
                    <li class="breadcrumb-item active" aria-current="page">Users List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Users</div>
            
                
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                <tr>
                    <th>
                    SR
                </th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>User Type</th>
                <th>Live in</th>
                <th>Address</th>
                <th>Date</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($user as $users)
            <tr>
                <td>{{ $loop->iteration }}
                    <input type="hidden" id="txtnamedes{{$users->id}}" value="{{$users->name}}" name="">
            <input type="hidden" id="txtemaildes{{$users->id}}" value="{{$users->email}}" name="">
                </td>
                <td>{{$users->id}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->contact}}</td>
                <td> 
                @if($users->status==1)
                <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif
                </td>
                <td>{{$users->country.', '.$users->city}}</td>
                <td>{{$users->address}}</td>
                <td>{{$users->created_at}}</td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                               class="btn btn-floating"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                @if($users->status==1)
                                
                                <a href="{{Route('user.inactive',[$users->id])}}" class="dropdown-item">Inactive</a>
                                @else
                                <a href="{{Route('user.active',[$users->id])}}" class="dropdown-item">Active</a>

                                @endif

                                <a id="{{$users->id}}" class="dropdown-item btn-delete">Delete</a>
                                <!-- <a id="#" class="dropdown-item btn-delete">Comercial</a> -->
                            </div>
                        </div>
                    </div>
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
                             <form  method="post" id="formDataDelete" action="{{Route('user.delete')}}" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Manage User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <input type="hidden" id="txtidDelete" name="txtid">
                                                <p>Are you sure to Delete this User?</p>
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
                        $('#datatable-example').DataTable({
                            responsive: true
                        });
                            </script>
<script type="text/javascript">
    $(document).ready(function(){

        

        $(document).on('click','.btn-delete',function(){
                var id=$(this).attr('id');
                $("#txtidDelete").val(id);
                $("#nameDesDelete").text($("#txtnamedes"+id).val());
                $("#emailDesDelete").text($("#txtemaildes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
    });

</script>
@endsection