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
                    <li class="breadcrumb-item active" aria-current="page">Orders List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Orders</div>
            
                
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
                <th>Order ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>

              @foreach($orderArr as $order)  
            <tr>
                <td>
                  1
                </td>
                <td><input type="hidden" id="txtid{{$order->id}}" value="{{$order->id}}">
                    <a>#{{$order->id}}</a>
                </td>
                <td>{{$order->date.' '.$order->time}}</td>
                <td>
                    @if($order->status==1)

                    <span class="badge bg-primary">Processing</span>
                    @elseif($order->status==2)
                    <span class="badge bg-success">Completed</span>
                    @elseif($order->status==0)
                    <span class="badge bg-danger">Cancelled</span>

                    @endif
                </td>
                <td><input type="hidden" id="txtdes{{$order->id}}" value="{{$order->total}} For {{$order->item}} Item">{{$order->currency}} {{$order->total}} For {{$order->item}} Item</td>
                
                
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown"
                               class="btn btn-floating"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{Route('orderShow.show',[$order->id])}}" class="dropdown-item">Show</a>
                                
                                <a id="{{$order->id}}"  class="dropdown-item btn-delete">Delete</a>
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
                             <form  method="post" id="formDataDelete" action="{{Route('order.delete')}}" onkeydown="return event.key != 'Enter';">
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
                $("#orderDelete").text("Order ID: #"+id);
                
                $('#modelDelete').modal('toggle');

                    
                    
        });


     });
</script>




@endsection