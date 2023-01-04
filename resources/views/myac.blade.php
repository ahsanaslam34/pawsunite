@extends('user_layout')

@section('userPanel')


       
<div class="dashboard-box">
                  <h2 class="dashbord-title">My Post</h2>
                </div>
                <div class="dashboard-wrapper">
                 <nav class="nav-table">
                    <ul>
                        <li class="active"><a href="myac">All Post ({{count($postArr)}})</a></li>
                        <li ><a href="{{Route('userAds.active')}}">Active ({{count($activeArr)}})</a></li>
              <li><a href="{{Route('userAds.inactive')}}">Inactive ({{count($inactiveArr)}})</a></li>
                    </ul>
                  </nav>
                  <table class="table table-responsive dashboardtable tablemyads">
                    <thead>
                      <tr>
                        
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($postArr as $post)
                      <tr data-category="active">
                        @php
                        $image="";
                          if($post->image){
                              $image=explode(",",$post->image);
                              $image=$image[0];
                          }
                        @endphp
                        <td class="photo"><img class="img-fluid" src="assets/img/post/{{$image}}" alt=""></td>
                        <td data-title="Title">
                          <h3>{{$post->name}}</h3>
                        </td>
                        <td>{{$post->age}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->gender}}</td>
                        <td>{{$post->date_loss}}</td>
                       
                        
                        
                        <td data-title="Action">
                          <div class="btns-actions">
                            <a class="btn-action btn-view" href="{{Route('productDetail.show',[$post->id])}}" target="_blank"><i class="lni-eye"></i></a>
                            <a class="btn-action btn-edit" href="{{Route('ads.edit',[$post->id])}}"><i class="lni-pencil"></i></a>
                            <a onclick="return checkdelete()" class="btn-action btn-delete" href="{{Route('ads.destroy')}}?id={{$post->id}}"><i class="lni-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
  
<script type="text/javascript">
  function checkdelete(){
  
    return confirm("Are you sure");
  }
</script>

@endsection