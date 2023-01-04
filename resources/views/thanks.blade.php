@extends('master')

@section('content')
<style type="text/css">
    
</style>

<!-- Start Page Header Wrapper -->
<div class="page-header-wrapper  layout-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="page-header-content">
                    <h2>Thank You</h2>
                    <nav class="page-breadcrumb">
                        <ul class="d-flex justify-content-center">
                            <li><a href="myac" class="active">For Your Order </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header Wrapper -->
   @if($order->user_id==session('dogLossProjectUser')['id'])
<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="index">
                                                    <img src="assets/img/hafizlogo.png" width="40%" alt="">
                                                </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="">
                                    Order Status
                                    </a>
                                    </h2>
                                    <div>
                                        
                                        @if($order->status==1)
                                        In Proccess
                                        @elseif($order->status==2)
                                        Complete
                                        @elseif($order->status==0)
                                        Cancelled
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">Your Details:</div>
                                    <h2 class="to">{{session('dogLossProjectUser')['name']}}</h2>
                                    <div class="address">{{session('dogLossProjectUser')['address']}}</div>
                                    <div class="email">{{session('dogLossProjectUser')['email']}}
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">Order no. #{{$order->id}}</h1>
                                    <div class="date">Date of Order: {{$order->date.' '.$order->time}}</div>
                                    
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                            <th>Product</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"></td>
                                        <td colspan="2"></td>
                                    </tr>
                                   
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>{{$order->currency}} {{$order->total}}/-</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="thanks">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">Return Note.......................</div>
                            </div>
                        </main>
                        <footer>Order Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
                           
                           
@else

    <p class="no-available">Oops! Something Went Wrong</p>                                                    
                                              
@endif


@endsection