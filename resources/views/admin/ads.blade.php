@extends('admin/layout/master')



@section('content')


<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pad-top-div">
                    <div class="col-md-12">
                        <div class="">
                        </div>
                        <form>
                            
                        <select class="form-control user_id" name="user_id" id="user_id" required>
                            <option value="">Select Users</option>
                            @foreach($userArr as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Load</button>
                        <a class="btn btn-primary float-right" href="{{Route('admin.ads')}}">All Records</a>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-custom table-lg mb-0" id="products">
                    <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Date</th>                      
                        <th>Users</th>                      
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($dataArr as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>
                                    @php
                                      $image="";
                                        if($record->image){
                                            $image=explode(",",$record->image);
                                            $image=$image[0];
                                        }
                                      @endphp
                                    <img src="assets/img/post/{{$image}}" style="width:50px;">
                                </td>
                                <td>{{$record->name}}</td>
                                <td>{{$record->age}}</td>
                                <td>{{$record->status}}</td>
                                <td>{{$record->gender}}</td>
                                <td>{{$record->date_loss}}</td>
                                <td>
                                    @if($record->user_id)
                                        {{$record->getUsers->name}}

                                    @endif
                                </td>
                               
                                <td>
                                    @if($record->active_status==1)
                                    <span class="badge bg-success">Active</span>

                                    @elseif($record->active_status==2)
                                    <span class="badge bg-primary">Inactive</span>

                                    @endif

                                    @if($record->is_featured==1)
                                    <span class="badge bg-warning">Featured</span>

                                    @endif
                                    <input type="hidden" id="featured{{$record->id}}" value="{{$record->is_featured}}">
                                    
                                </td>

                                <td>

                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                               class="btn btn-floating"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            
                                            @if($record->active_status==1)
                                             <a id="#" href="{{Route('ads.reject',[$record->id])}}"  class="dropdown-item btn-delete sweetAlert2-example2-success me-1">Inactive</a>

                                            @else
                                            <a id="#" href="{{Route('ads.approve',[$record->id])}}"  class="dropdown-item btn-delete sweetAlert2-example2-success me-1">Active</a>

                                            @endif



                                                <a href="javascript:void(0)"  id="{{$record->id}}"   class="dropdown-item btn-featured">Is Featured</a>
                                                <a href="{{Route('admin.adsEdit',[$record->id])}}"  class="dropdown-item">Edit</a>
                                                <a href="{{Route('productDetail.show',[$record->id])}}" target="_blank" class="dropdown-item">Details</a>
                                               
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
                             <form  method="post" id="formDataDelete" action="#" onkeydown="return event.key != 'Enter';">
                             @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Manage Ads</h5>
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


<!-- Modal -->
<div class="modal fade" id="featuredModal" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <form action="{{Route('adsFeatured.save')}}" method="post">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    
                    <div class="mb-3 text-center">
                        <input type="hidden" name="post_id" id="post_id">
                        <label class="font-22"><input type="checkbox" name="featured" id="featured"> Is Featured</label>
                  
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
<script type="text/javascript">
    $(document).ready(function(){
            $('#user_id').val("{{ app('request')->input('user_id') }}").change();
    });
  
</script>
    <script type="text/javascript">
    

     $(document).ready(function(){

       $(".btn-featured").on("click",function(){
            var id=$(this).attr('id');
            var featured=$("#featured"+id).val();
            $("#post_id").val(id);
            if (featured==1) {
                $("#featured").prop('checked', true);

            }else{
                $("#featured").prop('checked', false);

            }
            $('#featuredModal').modal('toggle');

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