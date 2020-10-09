@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-message')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            @if($posts->count() > 0)
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
                           <td><img src="{{$post ->featured}}" alt="{{ $post ->title }}" width="100" height="50"></td>
                           <td>{{ $post ->title }}</td>
                           <td>
                               <a href="{{ route('post.restore',$post ->id) }}" class="btn btn-success btn-sm" >Restore</a>
                               <a href="{{ route('post.kill',$post ->id) }}" class="btn btn-danger btn-sm" >Delete</a>
                           </td>
                       </tr>

                </tbody>
            </table>
            @endforeach


            @else
                No Trashed Posts yet!
            @endif
            <div class="float-right">
            </div>

        </div>
    </div>
@endsection
