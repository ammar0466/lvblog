@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session('success')}}
            </div>
            @endif      
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8"><h2>All Posts</h2></div>
                    <div class="col-md-4"><span class="pull-right">
                    <a href="{{ route('post.create')}}" class="btn btn-primary">Create Post</a>
                    </span></div>

                </div> 
                </div>



                <div class="panel-body">
                {{-- SEARCH BAR --}}
                <form id="searchForm" name="searchForm" action="{{ route('post.search')}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12 input-group">
                        <div class="col-md-6">
                            <input type="text" name="searchtext" class="form-control" placeholder="Search for...">
                        </div>
                        <div class="col-md-4">
                            <select name="searchopt" class="form-control">
                                <option value="id">ID</option>
                                <option value="title">Title</option>
                                <option value="story">Story</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!                                   
                                </button>
                            </span>
                            
                        </div>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>User</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($postview as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td><div class="btn-group">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a><a href="{{ route('post.delete', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
