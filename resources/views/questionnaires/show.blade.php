@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Questionnaires
        </div>
        <div class="card-body">
          @if (count($questionnaires)<=0)
            <div class="text-danger"> No Questions Added</div>
          @else
            <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Survey Name</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Operation</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($questionnaires as $questionnaire)
                  <tr>
                    <th scope="row">{{$questionnaire->id}}</th>
                    <td>{{$questionnaire->title}}</td>
                    <td>{{$questionnaire->purpose}}</td>
                    <td>
                        <a  href="{{route('surveys',$questionnaire ->id)}}" class="btn btn-secondary">Take Survey</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              @endif
        </div>
    </div>       
@endsection