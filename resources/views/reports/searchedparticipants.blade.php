@extends('layouts.app')
@section('content')
    <div class="card">
        @include('includes.flash-message')
        <div class="card-header">
           Participants Reports
        </div>
        <div class="card-body">

            <table class="table table-bordered table-hovern table-sm">
                <thead>
                  <tr>
                    <th scope="col">
                      #
                    </th>
                    <th scope="col">Survey Name</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($participants as $participant)
                  <tr>
                    <th scope="row"> <span class="badge badge-dark">{{$loop->iteration}}</span></th>
                    <td>{{@$participant->category->title}}</td>
                    <td>{{@$participant->question_name}}</td>
                    <td>{{@$participant->answer->answer}}</td>
                    <td>{{@$participant->name}}</td>
                    <td>{{@$participant->email}}</td>
                  </tr>
                 @endforeach
                </tbody>
              </table>

              <form action="{{route('generateParticipantsPdf')}}" method="post">
                @csrf
                @foreach ($participants as $participant)
                    <input type="hidden" name="id[]" value={{$participant->id }}>
                @endforeach
                <button class="btn btn-info" type="submit">Generate Pdf</button>
            </form>
        </div>
    </div>       
@endsection
