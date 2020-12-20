@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Update category
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update' , $category->id) }}" method="POST">
               @csrf
               @method('PUT')
               @include('partials._errors')
               <div class="form-group">
                  <label for="category">Category Name :</label>
                  <input type="text" name="name" class="form-control"
                  value = "{{$category->name}}">
               </div>
               <div class="form-group">
                  <button class="btn btn-success">Update</button>
               </div>
            </form>
        </div>
     </div>
@endsection
