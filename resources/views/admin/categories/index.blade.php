@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
           Categories
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category ->id }}</th>
                    <td>{{$category ->name }}</td>
                    <td>
                        <a href="{{ route('category.edit',$category ->id) }}" class="btn btn-warning btn-sm" >Edit</a>
                        <a href="{{ route('category.delete',$category ->id) }}" class="btn btn-danger btn-sm" >Trash</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$categories->links()}}
            </div>

        </div>
    </div>
@endsection
