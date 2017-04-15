@extends('layouts.app')

@section('content')
<!-- <?php
   // dd($post);
?> -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (count($errors) > 0)
                
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8"><h2>Edit Post</h2></div>
                    <div class="col-md-4"><span class="pull-right">
                    <a href="{{ route('post.index')}}" class="btn btn-danger">Cancel</a>
                    </span></div>

                </div> 
                </div>

                


                <form name="frm" method="post" action="{{route('post.edit.update',$id)}}">
                <div class="panel-body">
                
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control input-lg" value="{{ $post->title}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <label>Story</label>
                            <textarea name="story" class="form-control"> {{ $post->story}}</textarea> 
                        </div>

                    </div>
                </div>
                </div>
               

                <!-- panelfooter -->
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-1 pull-right">
                            <button type="submit" class="btn btn-block btn-success">Save</button>
                            
                        </div>
                    </div>
                <!-- EndPanelFooter -->
                </div>
 </form>
            </div>
        </div>
    </div>
</div>
@endsection
