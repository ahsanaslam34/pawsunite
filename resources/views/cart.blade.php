@extends('master')

@section('content')
    @php $dnsCheck=request()->getHost();@endphp
    @php
    	$currency="";
	    if($dnsCheck=="tajjcollection.com"){
	    $currency="$";
	    }
	    else{
	    $currency="Rs.";
	    }
	    

    @endphp
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
                                        
                                 @php $total = 0 @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['cartPrice'] * $details['cartQty'] @endphp  
										<tr  data-id="{{ $id }}"> 
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="{{Route('productDetail.show',[$details['cartId']])}}">
															<img src="assets/img/post/{{$details['cartImg']}}" style="width:50px;" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="{{Route('productDetail.show',[$details['cartId']])}}">{{$details['cartName']}}
															
														</a>
														
													</h3><!-- End .product-title -->
													@if($details['cartAttrSize'])
													<span> ({{$details['cartAttrSize']}})</span>
													@endif
												</div><!-- End .product -->

											</td>
											<td class="price-col">{{$details['cartPrice']}}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control quantity update-cart" value="{{$details['cartQty']}}" min="1" max="100" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">{{$currency}} <?php echo $details['cartQty']*$details['cartPrice']?>/-</td>
											<td class="remove-col"><button class="btn-remove remove-from-cart"><i class="icon-close"></i></button></td>
										</tr>
                                        @endforeach
                                     @endif 

									</tbody>
								</table><!-- End .table table-wishlist -->

	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>{{$currency}}{{$total}}/-</td>
	                						</tr><!-- End .summary-subtotal -->
	                						

	                						<tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="myac">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>{{$currency}}{{$total}}/-</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="product" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

<!--== End Cart Page Wrapper ==-->
<script type="text/javascript">
        
        $(document).ready(function(){
            $(".update-cart").change(function (e) {
                e.preventDefault();
          
                var ele = $(this);
          
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id"), 
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                       window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function (e) {
                // alert('test');
                e.preventDefault();
          
                var ele = $(this);
          
                if(confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>

@endsection