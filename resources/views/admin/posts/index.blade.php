@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Posts
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
                            <a href="{{ route('post.edit',$post ->id) }}" class="btn btn-warning btn-sm" >Edit</a>
                            <a href="{{ route('post.delete',$post ->id) }}" class="btn btn-danger btn-sm" >Trash</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
@endsection
