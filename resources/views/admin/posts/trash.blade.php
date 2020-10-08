@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post ->id }}</th>
                        <td><img src="{{ asset('public/'.$post ->featured ) }}" alt="{{ $post ->title }}" width="100" height="50"></td>
                        <td>{{ $post ->title }}</td>
                        <td>
                            <a href="{{ route('post.trash') }}" class="btn btn-success btn-sm" >Restore</a>
                            <a href="{{ route('post.trash') }}" class="btn btn-danger btn-sm" >Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="float-right">
            </div>

        </div>
    </div>
@endsection
