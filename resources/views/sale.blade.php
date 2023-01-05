@extends('master')


@section('content')

    @php $dnsCheck=request()->getHost();@endphp

<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Sales<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category Name</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			
                            <div class="products mb-3">
                                <div class="row justify-content-center">


                        @foreach($productArr as $product)

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                    @if($dnsCheck=="tajjcollection.com")

                                                             @if($product->discount_dollar)
                                                                <span class="product-label label-new">
                                                                    {{$product->discount_dollar}}%
                                                                </span>
                                                                @endif

                                                     @else

                                                        @if($product->discount)
                                                                <span class="product-label label-new">
                                                                    {{$product->discount}}%
                                                                </span>
                                                                @endif
                                                    @endif
                                                <a href="{{Route('productDetail.show',[$product->id])}}">
                                                    <img src="assets/img/post/{{$product->img}}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                   
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="{{Route('productDetail.show',[$product->id])}}" class="btn-product btn-cart"><span>Quick View</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <!-- <a href="javascript:void(0)">Women</a> -->
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">{{$product->pname}}</a></h3><!-- End .product-title -->
                                                
                                                <div class="product-price">
                                                    @if($dnsCheck=="tajjcollection.com")


                                                    @if($product->discount_dollar || $product->discount_dollar!=null || $product->discount_dollar!=0)
                                                    <span class="old-price"><del>$ {{$product->price_dollar}} </del></span> 
                                                    $ {{$product->new_price_dollar}}
                                                    @else
                                                    $ {{$product->price_dollar}}

                                                    @endif

                                                 @else

                                                    @if($product->discount || $product->discount!=null || $product->discount!=0)
                                                    <span class="old-price"><del>Rs. {{$product->price}} </del></span> 
                                                    Rs. {{$product->new_price}}
                                                    @else
                                                    Rs. {{$product->price}}

                                                   

                                                    @endif
                                                 @endif  
                                                </div><!-- End .product-price -->


                                                <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                               
                                            </div><!-- End .product-body -->


                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    @endforeach

                                   
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="javascript:void(0)" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>
							        <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0)">1</a></li>
							        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
							        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="javascript:void(0)" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Filters:</label>
                					<a href="javascript:void(0)" class="sidebar-filter-clear">Clean All</a>
                				</div><!-- End .widget widget-clean -->

                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Category
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-1">
										<div class="widget-body">
											<div class="filter-items filter-items-count">
												
                                                        @foreach($categoryArr as $category)
                                                        <a href="product?id={{$category->id}}">
												<div class="filter-item">

                                                    
                                                    <div class="custom-control custom-checkbox">
                                                        
                                                        <label class="custom-control-label" for="cat-1">{{$category->des}}</label>
                                                    </div>


                                                    <!-- <span class="item-count">3</span> -->
                                                </div><!-- End .filter-item -->
                                            </a>
                                                @endforeach

											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						

        						

        						
                                <div class="widget widget-banner-sidebar">
                                   
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="javascript:void(0)">
                                            <img src="assets/assets/images/demos/demo-13/banners/banner-6.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


@endsection