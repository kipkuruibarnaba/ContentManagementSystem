@extends('layouts.app')
@section('content')
    @include('includes.flash-message')
    @include('includes.errors')
    <div class="card">
        <div class="card-header">
            Create Question
        </div>
        <div class="card-body">
            <p><strong class="">{{$category->title}}</strong></p>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestion">
              Add Question
          </button>     
          <br><br>      
             @foreach ($questions as $question) 
            <ul class="list-group">
                <li class="list-group-item">{{$loop->iteration .'-'. $question->question}}</li>
             @foreach ($question->answer as $answer)
                <li class="list-group-item">{{$answer->answer}}</li>
                @endforeach
              </ul>
              @endforeach       
        </div>
    </div>       
@endsection



  <!-- Modal -->
  <div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="addQuestionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addQuestionTitle">{{$category->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('storequestion') }}" method="post">
                @csrf
                    <input  type="hidden" value="{{$category->id}}" name="category">
            
                <div class="form-group">
                    <label for="Question">Question</label>
                    <input type="text" class="form-control" name="question" placeholder="Enter the Question" required>
                     <small id="questionHelp" class="form-text text-muted">Give a question that attracts attention.</small>
                </div>                
        
                <div class="h4">Choices</div>
                <small id="questionHelp" class="form-text text-muted">Give choices that give you the most insight into your question.</small>
                
                <br>
                    <div class="form-group">
                        <label for="choice1">Choice 1</label>
                        <input type="text" class="form-control" name="choice[]" placeholder="Enter Choice 1" required>              
                    </div>
                    <div class="form-group">
                        <label for="choice2">Choice 2</label>
                        <input type="text" class="form-control" name="choice[]" placeholder="Enter Choice 2" required>              
                    </div>
                    <div class="form-group">
                        <label for="choice3">Choice 3</label>
                        <input type="text" class="form-control" name="choice[]" placeholder="Enter Choice 3" required>              
                    </div>
                    <div class="form-group">
                        <label for="choice4">Choice 4</label>
                        <input type="text" class="form-control" name="choice[]" placeholder="Enter Choice 4" required>              
                    </div>                                               
                {{-- <button class="btn btn-info float-right" type="submit">Add Question</button> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
      </div>
    </div>
  </div>