@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
    <div class="clearfix">
        <a href="{{ route('posts.create') }}"
         class="btn btn-success float-right"
         style="margin-bottom:10px">Add Post</a>

         <a href="{{ route('trashed.index') }}"
         class="btn btn-success float-left"
         style="margin-bottom:10px"> Trashed Posts</a>
    </div>
    <div class="card card-default">
       <div class="card-header">
          All Posts
       </div>
       <div class="card-body">
     @if($posts->count() > 0)
         <table class="table">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Actions</th>
               </tr>
            </thead>
             <tbody>
             @foreach($posts as $post)
                   <tr>
                       <td>
                           <img class="img-thumbnail" src="{{ asset('images/posts/'.$post->image) }}" alt="not found" width="100px" height="50px">
                       </td>
                       <td>
                           {{$post->title}}
                       </td>
                       <td>
                            <form class="float-right ml-2" action="{{ route('posts.destroy' , $post->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                <button class="btn btn-danger btn-sm">{{$post->trashed() ? 'Delete' : 'Trash'}}</button>
                            </form>

                           @if(!$post->trashed())
                            <a href="{{route('posts.edit', $post->id)}}"
                              class="btn btn-primary btn-sm float-right">Edit</a>
                           @else
                           <a href="{{route('trashed.restore', $post->id)}}"
                              class="btn btn-primary btn-sm float-right">Restore</a>
                           @endif
                       </td>
                   </tr>
                @endforeach
                @else
                    <div class="card-body">

                    <h4 class="text-center text"> No Posts Yet </h4>
                    </div>

             </tbody>
             @endif
         </table>
       </div>
    </div>
@endsection
