@extends('user_layout')

@section('userPanel')


						<div class="dashboard-box">
						  <h2 class="dashbord-title">Contact Detail</h2>
						</div>
                    <form action="{{Route('user.update',[session('dogLossProjectUser')['id']])}}" method="post">
                        @csrf
                                <div class="dashboard-wrapper">
                                <div class="form-group mb-6">
                                    <strong>I’m a:</strong>
                                    
                                </div>
                                <div class="form-group mb-6">
                                    <label class="control-label">Full Name*</label>
                                    <input class="form-control input-md" name="name" type="text" value="{{$user->name}}">
                                </div>
                                
                                <div class="form-group mb-6">
                                    <label class="control-label">Phone*</label>
                                    <input class="form-control input-md" name="contact" type="text" value="{{$user->contact}}">
                                </div>
                                
                                
                                <div class="form-group mb-6">
                                    <label class="control-label">Country</label>
                                    <input class="form-control input-md" name="country" type="text" value="{{$user->country}}">
                                    </div>
                              
                                <div class="form-group mb-6">
                                    <label class="control-label">Post Code</label>
                                    <input class="form-control input-md" name="postcode" type="text" value="{{$user->postcode}}">
                                </div>
                                
                                <div class="form-group mb-6">
                                    <label class="control-label">Region</label>
                                    <input class="form-control input-md"name="region" type="text" value="{{$user->region}}">
                                </div>
                                
                                <div class="form-group mb-6">
                                    <label class="control-label">Address </label>
                                    <input class="form-control input-md" name="address" type="text" value="{{$user->address}}">
                                </div>
                                <div class="tg-checkbox">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="tg-agreetermsandrules">
                                    <label class="custom-control-label" for="tg-agreetermsandrules">I agree to all <a href="javascript:void(0);">Terms of Use &amp; Posting Rules</a></label>
                                    </div>
                                </div>
                                <button class="btn btn-common" type="submit">Save</button>
                                </div>
                           
                    </form>
                        

@endsection