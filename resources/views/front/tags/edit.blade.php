@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Update Tag
        </div>
        <div class="card-body">
            <form action="{{ route('tags.update' , $tag->id) }}" method="POST">
               @csrf
               @method('PUT')
               @include('partials._errors')
               <div class="form-group">
                  <label for="category">Tag Name :</label>
                  <input type="text" name="name" class="form-control"
                  value = "{{$tag->name}}">
               </div>
               <div class="form-group">
                  <button class="btn btn-success">Update</button>
               </div>
            </form>
        </div>
     </div>
@endsection
