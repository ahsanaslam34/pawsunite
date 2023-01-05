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
                    <li class="breadcrumb-item active" aria-current="page">Messages List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Messages</div>
            
                
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
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Delete</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($contactArr as $contact)
            <tr>
                <td>{{ $loop->iteration }}
                    <input type="hidden" id="txtnamedes{{$contact->id}}" value="{{$contact->name}}" name="">
                    <input type="hidden" id="txtemaildes{{$contact->id}}" value="{{$contact->email}}" name="">

                </td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->sub}}</td>
                <td>{{$contact->msg}}</td>
                <td>{{$contact->created_at}}</td>
                <td><button id="{{$contact->id}}" type="button" class="btn btn-danger btn-delete">Delete</button></td>
            </tr>

            @endforeach
           
            </tbody>
        </table>
    </div>

   <!--Delete Model-->
                        <div class="modal fade" id="modelDelete" tabindex="-1"
                             aria-labelledby="modelEdit"
                             aria-hidden="true">
                             <form  method="post" id="formDataDelete" action="{{Route('contact.delete')}}" onkeydown="return event.key != 'Enter';">
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
                $("#emailDesDelete").text($("#txtemaildes"+id).val());
                
                $('#modelDelete').modal('toggle');

                    
                    
        });
    });

</script>
@endsection