@extends('layouts.app')
@section('content')
    @include('includes.flash-message')
    @include('includes.errors')
    <div class="card">
        <div class="card-header">
            Create Questionnaire Category
        </div>
        <div class="card-body">
            <form action="{{ route('storequestionnaire') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="Category">Category</label>
                    <input type="text" class="form-control" name="category" placeholder="Enter the Category" required>
                     <small id="categoryHelp" class="form-text text-muted">Give a category tjat attracts attention.</small>
                </div>
                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <input type="text" class="form-control" name="purpose" placeholder="Enter the Purpose" required>
                    <small id="purposeHelp" class="form-text text-muted">Give a purpose that increases response.</small>                   
                </div>
                <button class="btn btn-info float-right" type="submit">Save Category</button>
            </form>
        </div>
    </div>       
@endsection