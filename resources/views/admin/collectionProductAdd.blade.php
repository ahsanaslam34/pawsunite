@extends('admin/layout/master')



@section('content')
<div class="col-lg-12 col-md-12">
                    <form action="{{Route('collectionPro.save',[$data->id])}}" method="post">
                        @csrf
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                        
                        <a href="{{Route('collection.show')}}" class="btn btn-theme-mini float-right">Collection List</a>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Add Products In {{$data->des}}</button>

                                                    
                        </div>
                        <div class="col-md-6">
                            <a href="{{Route('collectionPro.list',[$data->id])}}" class="btn btn-theme-mini float-right">{{$data->des}} List</a>
                                                    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-custom mb-0" id="recent-products">
                            <thead>
                            <tr>
                             
                                <th>#</th>
                                <th>ID</th>
                                <th>Product</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productArr as $product)  
            <tr>
                <td>
                  <input type="checkbox" name="pid[]" value="{{$product->id}}">
                </td>
                <td>{{$product->id}}</td>
                <td>{{$product->pname}}</td>
                
            </tr>
           

           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    </form>

        </div>

@endsection
