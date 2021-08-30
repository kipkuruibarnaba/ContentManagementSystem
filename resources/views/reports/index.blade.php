@extends('layouts.app')
@section('content')
    <div class="card">
        @include('includes.flash-message')
        <div class="card-header">
            Reports
        </div>
        @if (count($reports)<=0)
        <div class="text-danger"> No Reports Yet Added, Take Survey Questions</div>
        @else
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                       <div class="form-group">
                           <label for="" class="form-control no-border bg-secondary text-white">Filter By</label>
                       </div>
                </div>
                   <div class="col-md-4">
                       <div class="form-group">                          
                           <select id="filterKey" class="form-control">
                            <option >Select Filter Key</option>
                               <option value="1">Participant</option>
                               <option value="2">Survey Category</option>
                           </select>
                       </div>
                   </div>
             </div>   
            <br>

            {{-- Search by Participant --}}
            <div  id="participantFilter">
                <form action="{{route('filter')}}" method="post">
                    @csrf
                    <input type="hidden" name="filterkey" value="1" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <select name="searchKey" class="form-control" required>
                                    <option>Select Participant</option>
                                    @foreach ($participants as $participant)
                                      <option value="{{$participant->email}}">{{$participant->email}}</option>          
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>          
                </form>              
            </div>


             {{-- Search by Survey --}}
             <div  id="surveyFilter">
                <form action="{{route('filter')}}" method="post">
                    @csrf                 
                    <input type="hidden" name="filterkey" value="2" />
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <select name="searchKey"  class="form-control" required>
                                    <option>Select Survey</option>
                                    @foreach ($surveys as $survey)
                                      <option value="{{$survey->category_id}}">{{$survey->category->title}}</option>          
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>         
                </form>              
            </div>           
            <br>

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
                 @foreach ($reports as $report)
                  <tr>
                    <th scope="row"> <span class="badge badge-dark">{{$loop->iteration}}</span></th>
                    <td>{{@$report->category->title}}</td>
                    <td>{{@$report->question_name}}</td>
                    <td>{{@$report->answer->answer}}</td>
                    <td>{{@$report->name}}</td>
                    <td>{{@$report->email}}</td>
                  </tr>
                 @endforeach
                </tbody>
              </table>

              <form action="{{route('generateGeneralPdf')}}" method="post">
                @csrf
                @foreach ($reports as $report)
                    <input type="hidden" name="id[]" value={{$report->id }}>
                @endforeach
                <button class="btn btn-info" type="submit">Generate Pdf</button>
            </form>
         @endif
        </div>
    </div>       
@endsection
