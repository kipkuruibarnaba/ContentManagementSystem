@extends('layouts.app')
@section('content')
    <div class="card">
        @include('includes.flash-message')
        <div class="card-header">
          Survey  Reports
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
                 @foreach ($surveys as $survey)
                  <tr>
                    <th scope="row"> <span class="badge badge-dark">{{$loop->iteration}}</span></th>
                    <td>{{@$survey->category->title}}</td>
                    <td>{{@$survey->question_name}}</td>
                    <td>{{@$survey->answer->answer}}</td>
                    <td>{{@$survey->name}}</td>
                    <td>{{@$survey->email}}</td>
                  </tr>
                 @endforeach
                </tbody>
              </table>

              <form action="{{route('generateSurveyPdf')}}" method="post">
                @csrf
                @foreach ($surveys as $survey)
                    <input type="hidden" name="id[]" value={{$survey->id }}>
                @endforeach
                <button class="btn btn-info" type="submit">Generate Pdf</button>
            </form>
              
        </div>
    </div>       
@endsection
