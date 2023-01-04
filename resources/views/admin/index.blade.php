@extends('admin/layout/master')



@section('content')
    
<div class="row row-cols-1 row-cols-md-3 g-4">
   
        <div class="col-lg-3 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <img src="dashboard_assets/assets/images/sales.png">
                        </div>  
                    </div>
                    <h4 class="mb-3">Total Users</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7">{{$totalUser}}</div>
                      
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <img src="dashboard_assets/assets/images/today.png">
                        </div>
                       
                    </div>
                    <h4 class="mb-3">Today Found</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"></div>
                      
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <img src="dashboard_assets/assets/images/calendar.png">
                        </div>
                     
                    </div>
                    <h4 class="mb-3">Total Pets</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"></div>
                     
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                           <img src="dashboard_assets/assets/images/year.png">
                        </div>
                     
                    </div>
                    <h4 class="mb-3">Pending Pets</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7"></div>
                      
                    </div>
                 
                </div>
            </div>
        </div>
       

        
        
        

    @endsection