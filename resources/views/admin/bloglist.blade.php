@extends('admin/layout/master')



@section('content')

<div class="mb-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="bi bi-globe2 small me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Blogs</div>
            
                
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Post</th>
                <th>Date Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($blogArr as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td><img src="assets/img/blog/{{$blog->img}}" style="width:50px;"></td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->post}}</td>
                <td>{{$blog->date.' '.$blog->time}}</td>
                <td>
                    <a href="{{Route('blog.edit',[$blog->id])}}" class="btn btn-primary btn-edit">Edit</a>
                    <a href="#" class="btn btn-danger btn-delete">Delete</a>
                </td>
            </tr>
            @endforeach
           
            </tbody>
        </table>
    </div>

   



@endsection