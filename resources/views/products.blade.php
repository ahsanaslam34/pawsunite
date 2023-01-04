@extends('master')


@section('content')

    
   <!-- Page Header Start -->
   <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">{{$postName}}</h2>
              <ol class="breadcrumb">
                <li><a href="#">Home /</a></li>
                <li class="current">{{$postName}}</li>
               
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->  

    <!-- Main container Start -->  
    <div class="main-container section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
            <aside>
              <!-- Searcg Widget -->
              <div class="widget_search">
                <form role="search" id="search-form">
                  <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">
                  <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i></button>
                </form>
              </div>
              <!-- Categories Widget -->
              <div class="widget categories">
             
                <h4 class="widget-title">All Categories</h4>
             <nav class="sidebar categories-list">
                <ul class="nav flex-column" id="nav_accordion">
                	 @foreach($categoryArr as $category)
                  <?php
                    $linkUrl=$category->des;
                    $adsSlugs=str_replace(' ', '-', $linkUrl);
                  ?>
                	<li class="nav-item has-submenu">
                		<a class="nav-link" href="{{Route('ads.page',[$adsSlugs])}}">{{$category->des}}  </a>
                		<ul class="submenu collapse">
                		    @foreach ($category->submenus as $subCat)
                		        <li><a class="nav-link" href="#">{{$subCat->des}}</a></li>
                			@endforeach
                		
                		</ul>
                	</li>
                	   @endforeach
                	
                </ul>
                </nav>
               
              </div>
              <div class="widget">
                <h4 class="widget-title">Advertisement</h4>
                <div class="add-box">
                  <img class="img-fluid" src="assets/img/img1.jpg" alt="">
                </div>
              </div>
            </aside>
          </div>
          <div class="col-lg-9 col-md-12 col-xs-12 page-content">
            <!-- Product filter Start -->
            <div class="product-filter">
              <div class="short-name">
                <span>Showing (1 - 12 products of 7371 products)</span>
              </div>
              <div class="Show-item">
                <span>Show Items</span>
                <form class="woocommerce-ordering" method="post">
                  <label>
                    <select name="order" class="orderby">
                      <option selected="selected" value="menu-order">49 items</option>
                      <option value="popularity">popularity</option>
                      <option value="popularity">Average ration</option>
                      <option value="popularity">newness</option>
                      <option value="popularity">price</option>
                    </select>
                  </label>
                </form>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                </li>
              </ul>
            </div>
            <!-- Product filter End -->

            <!-- Adds wrapper Start -->
            <div class="adds-wrapper">
              <div class="tab-content">
                <div id="grid-view" class="tab-pane fade active show">
                  <div class="row">
                @foreach($postArr as $product)
                <?php
                $linkUrl=$product->title;
                $slugs=str_replace(' ', '-', $linkUrl);
              ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="featured-box">
                        <figure>
                          <div class="icon">
                            <i class="lni-heart"></i>
                          </div>
                          <a href="{{Route('productDetail.show',[$product->id])}}"><img class="img-fluid" src="assets/img/post/{{$product->image}}" alt=""></a>
                        </figure>
                        <div class="feature-content">
                          <div class="product">
                            @if($product->cat_id)
                                        
                            <a href="{{Route('productDetail.show',[$product->id])}}"><i class="lni-folder"></i> {{$product->getCategories->des}}</a>
                                    @endif
                          </div>
                          <h4><a href="{{Route('productDetail.show',[$slugs])}}">{{$product->title}}</a></h4>
                          <span>Last Updated: 3 hours ago</span>
                          
                          <div class="listing-bottom">
                            <h3 class="price float-left">Rs. {{$product->price}}/-</h3>
                            <a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach   
                  </div>
                </div>
                <div id="list-view" class="tab-pane fade">
                  <div class="row">
                      @foreach($postArr as $product)
                <?php
                $linkUrl=$product->title;
                $slugs=str_replace(' ', '-', $linkUrl);
              ?>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="featured-box">
                        <figure>
                          <div class="icon">
                            <i class="lni-heart"></i>
                          </div>
                          <a href="{{Route('productDetail.show',[$slugs])}}"><img class="img-fluid" src="assets/img/post/{{$product->image}}" alt=""></a>
                        </figure>
                        <div class="feature-content">
                          <div class="product">
                                @if($product->cat_id)
                            <a href="{{Route('productDetail.show',[$slugs])}}"><i class="lni-folder"></i> {{$product->getCategories->des}}</a>
                             @endif
                          </div>
                          <h4><a href="{{Route('productDetail.show',[$slugs])}}">{{$product->title}}</a></h4>
                          <span>Last Updated: 4 hours ago</span>
                          <ul class="address">
                            <li>
                              <a href="#"><i class="lni-map-marker"></i>Louis, Missouri, US</a>
                            </li>
                            <li>
                              <a href="#"><i class="lni-alarm-clock"></i> May 18, 2018</a>
                            </li>
                            
                            <li>
                              <a href="#"><i class="lni-package"></i> Brand New</a>
                            </li>
                          </ul>
                          <div class="listing-bottom">
                            <h3 class="price float-left">{{$product->price}}</h3>
                            <a href="#" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach 
                  </div>
                </div>
              </div>
            </div>
            <!-- Adds wrapper End -->
      
            <!-- Start Pagination -->
          <!--   <div class="pagination-bar">
               <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item"><a class="page-link active" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div> -->
            <!-- End Pagination -->
            
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->  

<script>
    
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
</script>

@endsection