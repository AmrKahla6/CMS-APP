@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Add a new Tag
        </div>
        <div class="card-body">
            <form action="{{ route('tags.store') }}" method="POST">
               @csrf
               @include('partials._errors')
               <div class="form-group">
                  <label for="category">Tag Name :</label>
                  <input type="text" name="name" class="form-control" placeholder="Add a new Tag">
               </div>
               <div class="form-group">
                  <button class="btn btn-success">Add</button>
               </div>
            </form>
        </div>
     </div>
@endsection
