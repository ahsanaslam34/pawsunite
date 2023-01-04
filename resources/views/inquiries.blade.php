@extends('user_layout')

@section('userPanel')


                <div class="dashboard-box">
                  <h2 class="dashbord-title">My Ads</h2>
                </div>
                <div class="dashboard-wrapper">
                 <nav class="nav-table">
                    
                  </nav>
                  <table class="table table-responsive dashboardtable tablemyads">
                    <thead>
                      <tr>
                        
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($inquiryArr as $post)
                      <tr data-category="active">
                        
                        <td data-title="Title">
                          <h3>{{$post->name}}</h3>
                        </td>
                        
                        <td data-title="Price">
                          <h3>{{$post->email}}</h3>
                        </td>

                        <td data-title="Price">
                          <h3>{{$post->contact}}</h3>
                        </td>
                        <td data-title="Price">
                          <h3>{{$post->message}}</h3>
                        </td>
                        <!-- <td data-title="Action">
                          <div class="btns-actions">
                            <a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a>
                            <a class="btn-action btn-edit" href="#"><i class="lni-pencil"></i></a>
                            <a class="btn-action btn-delete" href="#"><i class="lni-trash"></i></a>
                          </div>
                        </td> -->
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
              


  

@endsection