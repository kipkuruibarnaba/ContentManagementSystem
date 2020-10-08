@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create a New Category
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter the Name">
                </div>

                <button class="btn btn-info float-right" type="submit">Save Category</button>
            </form>
        </div>
    </div>
@endsection
