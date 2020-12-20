@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Add a new category
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
               @csrf
               @include('partials._errors')
               <div class="form-group">
                  <label for="category">Category Name :</label>
                  <input type="text" name="name" class="form-control" placeholder="Add a new category">
               </div>
               <div class="form-group">
                  <button class="btn btn-success">Add</button>
               </div>
            </form>
        </div>
     </div>
@endsection
