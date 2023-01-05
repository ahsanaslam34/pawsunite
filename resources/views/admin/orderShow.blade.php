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
                    <li class="breadcrumb-item active" aria-current="page">Orders Details</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
				<div class="statusform">
				<form action="{{Route('order.status',[$order->id])}}" method="post">
                        @csrf
            			<label>Status</label>
	            		<select class="dropdown-css" name="txtstatus">
                            @if($order->status==1)
                            <option value="1">Processing</option>
                            <option value="2">Completed</option>
	            			<option value="0">Cancelled</option>
                            @elseif($order->status==2)
                            <option value="2">Completed</option>
	            			<option value="1">Processing</option>
                            <option value="0">Cancelled</option>
                            @elseif($order->status==0)
                            <option value="0">Cancelled</option>
                            <option value="1">Processing</option>
                            <option value="2">Completed</option>
                            @endif
	            		</select>
	            		<button type="submit" class="btn btn-primary">Save</button>
            		</form>
				</div>
			
                <div class="row">
                	<div class="col-md-6">
	                <h3>User Information</h3>
	              	<b><p class="margin-bottom-1">User Name:</b> {{$user->name}}</p>
	                <b><p class="margin-bottom-1">Email:    </b>{{$user->email}}</p>
                    <b><p class="margin-bottom-1">Contact: 	</b>{{$user->contact}}</p>
	                <b><p class="margin-bottom-1">Address: 	</b>{{$user->address}}</p>
                </div>
                <div class="col-md-6">
                	<h3>Order Information</h3>
	                <p class="margin-bottom-1">Order Number: {{$order->id}}</p>
	                <p class="margin-bottom-1">Total: <b>{{$order->currency}} {{$order->total}} </b> For <b> {{$order->item}}</b> Item</p>
	                <p class="margin-bottom-1">Date: {{$order->date.' '.$order->time}}</p>
                </div>
                </div>

                
                <h3>Order Details</h3>
                <table class="table table-striped">
            			<tr>
            				<th>Image</th>
            				<th>Product</th>
            				<th>Rate</th>
            				<th>Quantity</th>
            				<th>Total</th>
            			</tr>
            			@foreach($orderDetail as $orderDetails)
            			<tr>
            				<td><img src="assets/img/post/{{$orderDetails->img}}" alt="image" style="width:50px;"></td>
            				<td>
                                {{$orderDetails->pname}}
                                @if($orderDetails->attr_size)
                                    ({{$orderDetails->attr_size}})
                                @endif
                            </td>
            				<td>{{$order->currency}} {{$orderDetails->rate}}/-</td>
            				<td>{{$orderDetails->quantity}}</td>
            				<td>{{$order->currency}} {{$orderDetails->rate*$orderDetails->quantity}}/-</td>
            			</tr>
						
            			@endforeach
						<tr>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td><b> Sub Total </b></td>
            				<td>{{$order->currency}} {{$order->total}}/-</td>
            			</tr>
            		</table>
            		<br>
            		
            		
            </div>
        </div>


@endsection
