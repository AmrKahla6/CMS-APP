@extends('layouts.app')
@section('stylesheet')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
@include('partials._session')
@include('partials._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Add a new Post
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST"
                  enctype="multipart/form-data">
               @csrf
               @include('partials._errors')
               <div class="form-group">
                  <label for="post title">Title :</label>
                  <input type="text" name="title" class="form-control" placeholder="Add a new title">
               </div>
               <div class="form-group">
                  <label for="description"> Description :</label>
                  <textarea type="text" name="description" rows="3"
                  class="form-control" placeholder="Add a new description"></textarea>
               </div>
               <div class="form-group">
                  <label for="content"> Content :</label>
                  <!-- <textarea type="text" name="content" class="form-control"
                   placeholder="Add a new content" rows="4"></textarea> -->
                   <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
               </div>
               <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control-file">
               </div>
               <div class="form-group">
                    <label for="selectCategory">Select Category</label>
                    <select class="form-control" id="selectCategory" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
               </div>
               @if(!$tags->count() <= 0)
                <div class="form-group">
                        <label for="selectCategory">Select a Tag</label>
                        <select name="tags[]" class="form-control tags" id="selectTag"  multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                </div>
               @endif
               <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
               <div class="form-group">
                  <button type="submit" class="btn btn-success">Add</button>
               </div>
            </form>
        </div>
     </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
          $(document).ready(function() {
             $('.tags').select2();
          });
    </script>
@endsection
