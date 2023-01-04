@extends('user_layout')

@section('userPanel')

                <div class="dashboard-box">
                  <h2 class="dashbord-title">My Ads</h2>
                </div>
                <div class="dashboard-wrapper">
                 <nav class="nav-table">
                    <ul>
                    <li ><a href="myac">All Ads ({{count($postArr)}})</a></li>
                      <li><a href="{{Route('userAds.active')}}">Active ({{count($activeArr)}})</a></li>
                      <!-- <li><a href="featuredads">Featured (12)</a></li> -->
              <li><a href="{{Route('userAds.pending')}}">Pending Ads ({{count($pendArr)}})</a></li>
					    <li class="active"><a href="{{Route('userAds.reject')}}">Rejected Ads ({{count($rejectArr)}})</a></li>
                      
                    </ul>
                  </nav>
                  <table class="table table-responsive dashboardtable tablemyads">
                    <thead>
                      <tr>
                        <th>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkedall">
                            <label class="custom-control-label" for="checkedall"></label>
                          </div>
                        </th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Ad Status</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($postArr as $post)
                      <tr data-category="active">
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="adone">
                            <label class="custom-control-label" for="adone"></label>
                          </div>
                        </td>
                        <td class="photo"><img class="img-fluid" src="assets/img/post/{{$post->image}}" alt=""></td>
                        <td data-title="Title">
                          <h3>{{$post->title}}</h3>
                        </td>
                        <td data-title="Category"><span class="adcategories">
                          @if($post->cat_id)
                                        {{$post->getCategories->des}}
                                    @endif
                        </span></td>
                        <td data-title="Ad Status"><span class="adstatus adstatusactive">
                            @if($post->status==0)
                                    Pending
                                    
                                    @elseif($post->status==1)
                                    Approve

                                    @elseif($post->status==2)
                                    Reject

                                    @endif
                        </span></td>
                        <td data-title="Price">
                          <h3>{{$post->price}} /-</h3>
                        </td>
                        <td data-title="Action">
                          <div class="btns-actions">
                            <a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a>
                            <a class="btn-action btn-edit" href="#"><i class="lni-pencil"></i></a>
                            <a class="btn-action btn-delete" href="#"><i class="lni-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
              

  

@endsection