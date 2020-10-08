@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Update Category <strong>{{ $category->name }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update',$category ->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-info float-right">Update Category</button>
            </form>
        </div>
    </div>
@endsection

