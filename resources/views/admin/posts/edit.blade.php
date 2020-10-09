@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Edit Post <strong>{{ $post->title }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="select category">Select Category</label>
                    <select class="form-control" name="category_id">
                        <option value="0">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="uploadImage">Featured Image</label>
                    <input type="file" class="form-control" name="featured">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" rows="3"  >{{ $post->content }}</textarea>
                </div>
                <button class="btn btn-info float-right" type="submit">Save Post</button>
            </form>
        </div>
    </div>
@endsection
