@extends('master')

@section('content')

 <!-- Hero Area Start -->
 <div id="hero-area">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12 text-center">
              <div class="contents">
                <h1 class="head-title">Pet Database Paws<span class="year">Unite</span></h1>
                <p>Check your pet's and get unlimited free updates!</p>
                    <form class="search-form">
                <div class="search-bar">
                    <div class="search-inner">
                    <div class="form-group">
                      <input type="text" name="id" class="form-control" placeholder="Dog ID">
                    </div>
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Dog Name">
                    </div>
                    <div class="form-group inputwithicon">
                      <div class="select" >
                        <select name="status">
                          <option value="none">Status</option>
                          <option value="Any">Any</option>
                          <option value="Lost">Lost</option>
                          <option value="Found">Found</option>
                          <option value="Reunited">Reunited</option>
                          <option value="Rainbow Bridge">Rainbow Bridge</option>
                          <option value="Stolen">Stolen</option>
                        </select>
                      </div>
                      <i class="lni-menu"></i>
                    </div>
                    <div class="form-group inputwithicon">
                      <div class="select">
                        <select name="breed">
                            <option value="none">Breed</option>
                            @foreach($breedArr as $breed)
                              <option>{{$breed->des}}</option>
                            @endforeach
                        </select>
                      </div>
                      <i class="lni-menu"></i>
                    </div>
                    <div class="form-group inputwithicon">
                      <div class="select">
                        <select name="gender">
                          <option value="none">Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                      <i class="lni-menu"></i>
                    </div>
                    <div class="form-group inputwithicon">
                      <div class="select">
                        <select name="region">
                          <option value="none">Region</option>
                          <option value="Any">Any</option>
                          <option>Central</option>
                          <option>East Anglia</option>
                          <option>North East</option>
                          <option>North West</option>
                          <option>Northern Ireland</option>
                          <option>Rainbow Bridge</option>
                          <option>Scotland</option>
                          <option>South East</option>
                          <option>South West</option>
                          <option>Southern Ireland</option>
                          <option>Wales</option>
                        </select>
                      </div>
                      <i class="lni-menu"></i>
                    </div>
                    </div>
                    </div>
                    <button class="btn btn-common" type="submit"><i class="lni-search"></i> Search Now</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End -->

    </header>






<!-- Featured Listings Start -->
<section class="section-padding" >
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
       
        @if(count($postArr)>0)
        <h3 class="section-title">Found</h3>
        @else
        <?php
            if(isset($_GET['gender'])){
              ?>
              <h3 class="section-title">Not Found</h3>

              <?php
            }
        ?>

        @endif
    </div>
    @foreach($postArr as $post)
    <div class="col-md-3">
      <div class="item">
            <div class="product-item">
              <?php
                $linkUrl=$post->title;
                $slugs=str_replace(' ', '-', $linkUrl);
              ?>
                <a href="{{Route('productDetail.show',[$post->id])}}">
              <div class="carousel-thumb">
                  @php
                  $image="";
                    if($post->image){
                        $image=explode(",",$post->image);
                        $image=$image[0];
                    }
                  @endphp
                  <img class="img-fluid" src="assets/img/post/{{$image}}" alt=""> 
                <div class="overlay">
                </div> 
              @if($post->is_featured==1)
              <span class="featured-post">
              Featured
              </span>
              @endif
              </div>    
                </a>
              <div class="product-content">
                <h3 class="product-title"><a href="{{Route('productDetail.show',[$post->id])}}">{{$post->name}}</a></h3>
                <p>{{$post->gender}}</p>
                <p>Age: {{$post->age}}</p>
                <span class="price">Id: {{$post->id}}</span>
                <div class="meta">
                  <span class="icon-wrap">
                    <i class="lni-star-filled"></i>
                    <i class="lni-star-filled"></i>
                    <i class="lni-star-filled"></i>
                    <i class="lni-star"></i>
                    <i class="lni-star"></i>
                  </span>
                  <span class="count-review">
                    <span>1</span> Reviews
                  </span>
                </div>
                <div class="card-text">
                  <div class="float-left">
                    <a href="javascript:void(0)"><i class="lni-map-marker"></i> Date: {{$post->date_loss}} </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
    </div>
    @endforeach
  </div>
</section>
<!-- Featured Listings End -->










 <!-- Featured Section Start -->
 <section class="featured section-padding">
    <div class="container">
      <h1 class="section-title">Featured</h1>
      <div class="row">
        @foreach($postThreeArr as $post)
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <span class="featured-post">
              Featured
              </span>
              
                @php
                $image="";
                  if($post->image){
                      $image=explode(",",$post->image);
                      $image=$image[0];
                  }
                @endphp
              <a href="{{Route('productDetail.show',[$post->id])}}"><img class="img-fluid" src="assets/img/post/{{$image}}" alt=""></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="javascript:void(0)"><i class="lni-folder"></i> 
                 
                </a>
              </div>
              <h4><a href="{{Route('productDetail.show',[$post->id])}}">{{$post->name}}</a></h4>
              <span>Lost: {{$post->date_loss}}</span>
              <ul class="address">
                <li>
                  <a href="javascript:void(0)"><i class="lni-map-marker"></i>Dog Id: {{$post->id}}</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="lni-alarm-clock"></i> {{$post->status}}</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="lni-user"></i> {{$post->gender}}</a>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="lni-package"></i> Age: {{$post->age}}</a>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
        @endforeach
       
      </div>
    </div>
    <div class="text-center">
                  <!-- <button  type="submit" class="btn btn-common log-btn">Load more..</button> -->
        </div>
  </section>
  <!-- Featured Section End -->

<!-- Counter Area Start-->
<section class="counter-section section-padding">
  <div class="container">
    <div class="row">
      <!-- Counter Item -->
      <div class="col-md-3 col-sm-6 work-counter-widget text-center">
        <div class="counter">
          <div class="icon"><i class="lni-layers"></i></div>
          <h2 class="counterUp">12090</h2>
          <p>Regular Posts</p>
        </div>
      </div>
      <!-- Counter Item -->
      <div class="col-md-3 col-sm-6 work-counter-widget text-center">
        <div class="counter">
          <div class="icon"><i class="lni-map"></i></div>
          <h2 class="counterUp">350</h2>
          <p>Locations</p>
        </div>
      </div>
      <!-- Counter Item -->
      <div class="col-md-3 col-sm-6 work-counter-widget text-center">
        <div class="counter">
          <div class="icon"><i class="lni-user"></i></div>
          <h2 class="counterUp">23453</h2>
          <p>Reguler Members</p>
        </div>
      </div>
      <!-- Counter Item -->
      <div class="col-md-3 col-sm-6 work-counter-widget text-center">
        <div class="counter">
          <div class="icon"><i class="lni-briefcase"></i></div>
          <h2 class="counterUp">250</h2>
          <p>Lost</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Counter Area End-->

@endsection