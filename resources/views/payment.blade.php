@extends('user_layout')

@section('userPanel')



     
                <div class="dashboard-box">
                  <h2 class="dashbord-title">Payments</h2>
                  
                </div>
                <div class="dashboard-wrapper">
                  <div class="row">



                    @if(session('dogLossProjectUser')['status']=="1")
                    <div class="col-md-6 col-sm-6 col-sx-12">
                      <div class="order-details">
                        <div class="dashboardboxtitle">
                          <h2>Commercial Account Package</h2>
                        </div>
                        <div class="order_review mb-3">
                          <table class="table table-responsive dashboardtable table-review-order">
                            <thead>
                              <tr>
                                <th scope="col">Categories</th>
                                <th scope="col">Features</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                               
                                <td>Listings</td>
                                <td><i>Only For Personal Use </i></td>
                              
                              </tr>
                              <tr>
                               
                               <td>Vehicles</td>
                               <td>No Limits </td>
                             
                             </tr>
                             <tr>
                               
                               <td>Real Estate</td>
                               <td>No Limits</td>
                             
                             </tr>
                             <tr>
                               
                               <td>Communities</td>
                               <td>No Limits </td>
                             
                             </tr>
                             <tr>
                               
                               <td>Jobs</td>
                               <td>No Limits </td>
                             
                             </tr>
                             <tr>
                               
                               <td>Services</td>
                               <td>No Limits </td>
                             
                             </tr>
                             <tr>
                               
                               <td>Local Business</td>
                               <td> No Limits</td>
                             
                             </tr>
                             <tr>
                               
                               <td>Vacation Rental</td>
                               <td> No Limits</td>
                             
                             </tr>

                            </tbody>               
                          </table>
                        </div>               
                      </div>
                    </div>

                    @endif

                    @if(session('dogLossProjectUser')['status']=="1")
                    <div class="col-md-6 col-sm-6 col-sx-12">
                    @elseif(session('dogLossProjectUser')['status']=="2")
                    <div class="col-md-12 col-sm-12 col-sx-12">


                    @endif

                    @if(session('dogLossProjectUser')['status']=="2")
                     <div class="alert alert-danger">To post an ads, you must first submit your payment</div>
                      @endif

                      <div class="dashboardboxtitle">
                        <h2>Payment Method</h2>
                      </div>
                      <!-- /Payment Method -->
                      <div class="form-group mb-3">
                        <label>Payment Information <sup>*</sup></label>
                        <input class="form-control" type="text">
                      </div>
                      <div class="form-group mb-3 tg-inputwithicon">
                        <label class="control-label">Billing Information<sup>*</sup></label>
                        <input class="form-control" placeholder="Email" value="{{session('dogLossProjectUser')['email']}}" type="text">
                        
                      </div>
                      <div class="form-group mb-3">
                        <label>Credit Card Number  <sup>*</sup></label>
                        <input class="form-control" type="text">
                      </div>     
                      
                      <!-- GRAND TOTAL -->
                      <div class="card card--padding fill-bg">
                        <table class="table-total-checkout">                
                          <tbody>
                            <tr>
                              <th>TOTAL:</th>
                              <td>$50.00</td>
                            </tr>
                          </tbody>
                        </table>
                        <button type="submit" class="btn btn-common btn-full">Submit Payment</button>              
                      </div>
                      <!-- /GRAND TOTAL -->
                    </div>





                  </div>
                </div>
              


  

@endsection