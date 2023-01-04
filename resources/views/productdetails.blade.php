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
                <li class="current">Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->  
@if($productArr->active_status == 1)
    <!-- Ads Details Start -->
    <div class="section-padding">
      <div class="container">
        <!-- Product Info Start -->
        <div class="product-info row">
          <div class="col-lg-7 col-md-12 col-xs-12">
            <div class="details-box ads-details-wrapper">
              <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                  <div class="product-img">
                  @php

                  $image="";
                    if($productArr->image){
                        $image=explode(",",$productArr->image);
                        $image=$image[0];
                    }
                  @endphp

                    <img class="img-fluid" src="assets/img/post/{{$image}}" alt="">
                  </div>
                </div>
                @if($productArr->image)
                <?php
                    $name=explode(",",$productArr->image);
                    for ($i=0; $i < count($name); $i++) { 
                      if($i!=0){

                ?>
                <div class="item">
                  <div class="product-img">
                    <img class="img-fluid" src="assets/img/post/<?php echo $name[$i];?>" alt="">
                  </div>
                </div>
                <?php
                      }
                    }
                ?>
                
                @endif
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="details-box">
              <div class="ads-details-info">
                <h2>{{$productArr->name}}</h2>
                <div class="details-meta">
                  <span><a href="#"><i class="lni-alarm-clock"></i> {{$productArr->date_loss}}</a></span>
                <!-- <span><a href="#"><i class="lni-map-marker"></i>  New York</a></span> -->
                  <!-- <span><a href="#"><i class="lni-eye"></i> 299 View</a></span> -->
                </div>
                <!-- form start -->
                <!-- form end -->
              </div>
             
               <div class="ads-btn">
                 <a href="#" class="btn btn-common btn-reply"><i class="lni-envelope"></i>  @if($productArr->user_id)
                    {{$productArr->getUsers->email}}
                  @endif
                 </a>
          
                <a href="#" class="btn btn-common"><i class="lni-phone-handset"></i> @if($productArr->user_id)
                    {{$productArr->getUsers->contact}}
                  @endif</a>
              </div>
                
          
              <div class="description-info margin-0">
                <div class="short-info">
                <h4>Short Info</h4>
                <ul>
                  <li><a href="javascript:void(0)"> Type:  <span>{{$productArr->pet_type}}</span></a></li>
                  <li><a href="javascript:void(0)"> Age:  <span>{{$productArr->age}}</span></a></li>
                  <li><a href="javascript:void(0)"> Color:  <span>{{$productArr->color}}</span></a></li>
                  <li><a href="javascript:void(0)"> Gender:  <span>{{$productArr->gender}}</span></a></li>
                  <li><a href="javascript:void(0)"> Breed:  <span>{{$productArr->breed}}</span></a></li>
                  <li><a href="javascript:void(0)"> Post Code:  <span>{{$productArr->postcode}}</span></a></li>
                  <li><a href="javascript:void(0)"> Status:  <span>{{$productArr->status}}</span></a></li>
                  <li><a href="javascript:void(0)"> Date:  <span>{{$productArr->date_loss}}</span></a></li>
                  <li><a href="javascript:void(0)"> Where Loss:  <span>{{$productArr->where_loss}}</span></a></li>
                  <li><a href="javascript:void(0)"> Region:  <span>{{$productArr->region}}</span></a></li>
                  <li><a href="javascript:void(0)"> Idenfication Marks:  <span>{{$productArr->identification_marks}}</span></a></li>
                  <li><a href="javascript:void(0)"> Tagged:  <span>{{$productArr->tagged}}</span></a></li>
                  <li><a href="javascript:void(0)"> Microchipped:  <span>{{$productArr->microchipped}}</span></a></li>
                  <li><a href="javascript:void(0)"> Tattoed:  <span>{{$productArr->tattoed}}</span></a></li>
                </ul>
              </div>
              </div>
              
             
            
            </div>
          </div>
        </div>
        <!-- Product Info End -->

        <!-- Product Description Start -->
        <div class="description-info">
          <div class="row">
            <div class="col-lg-8 col-md-6 col-xs-12">
              <div class="description">
                <h4>Description</h4>
                <p>{{$productArr->other}}</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
            
            </div>
          </div>
        </div>
        <!-- Product Description End -->
      </div>    
    </div>
    <!-- Ads Details End -->

    <!-- Featured Listings Start -->
    <section class="featured-lis section-padding" >
      <div class="container">
        <h3 class="section-title">Related Pets</h3>
        <div class="row">
          @foreach($randomProductArr as $post)
          
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <div class="icon">
                <i class="lni-heart"></i>
              </div>
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
                <a href="#"><i class="lni-folder"></i> 
                 
                </a>
              </div>
              <h4><a href="{{Route('productDetail.show',[$post->id])}}">{{$post->name}}</a></h4>
              <span>Lost: {{$post->date_loss}}</span>
              <ul class="address">
                <li>
                  <a href="#"><i class="lni-map-marker"></i>Dog Id: {{$post->id}}</a>
                </li>
                <li>
                  <a href="#"><i class="lni-alarm-clock"></i> {{$post->status}}</a>
                </li>
                <li>
                  <a href="#"><i class="lni-user"></i> {{$post->gender}}</a>
                </li>
                <li>
                  <a href="#"><i class="lni-package"></i> Age: {{$post->age}}</a>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
        
          @endforeach
        </div>
      </div>
    </section>
    <!-- Featured Listings End -->
    <!-- Button trigger modal -->


<!-- Modal -->

@endif
@endsection
