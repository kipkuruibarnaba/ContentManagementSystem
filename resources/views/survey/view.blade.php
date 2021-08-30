@extends('layouts.app')
@section('content')
    <div class="card">
        @include('includes.flash-message')
        <div class="card-header">
           Survey
        </div>
        <div class="card-body">
        @if (count($questions)<= 0)
            <p class="text-warning">No Questions have been added to the Survey</p>
        @else
        <form action="{{route('completesurvey',$category ->id)}}" method="post">
            @csrf

            <p><strong class="">{{$category->title}}</strong></p>
            
             @foreach ($questions as $question)  

             <div class="list-group-item active">{{$loop->iteration .'-'. $question->question}}</div>
             <input type="hidden" name="question[]" value="{{ $question->id .'||'. $question->question}}"/>

             <ul class="list-group">
                  @foreach ($question->answer as $answer)
                  
                  <label  for="answer{{ $answer->id }}">
                    <li class="list-group-item">
                        <input type="checkbox" name="answer[]" id="answer[{{ $answer->id }}]" value="{{$answer->id}}" >                    
                        {{$answer->answer}}
                    </li>
                 </label>
                  @endforeach
             </ul>        
            @endforeach   
            <br>
            <div class="card" style="background-color:#FCF0C8;">
                <div class="card-header">
                   Your Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>
                </div>
            </div> 
            <br>
            <button class="btn btn-secondary float-right">Complete Survey</button>
        </form> 
        @endif   
        </div>
    </div>       
@endsection
