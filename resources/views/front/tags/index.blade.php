@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
    <div class="clearfix">
        <a href="{{ route('tags.create') }}"
         class="btn btn-success float-right"
         style="margin-bottom:10px">Add Tag</a>

         <a href="{{route('tag.Trash')}}"
         class="btn btn-danger float-letf btn-sm"
         style="margin-bottom:10px"> Trashed Tags</a>
    </div>
    <div class="card card-default">
       <div class="card-header">
          All Tags
       </div>
       <div class="card-body">
         <table class="table">
             <tbody>
                @forelse($tags as $tag)
                   <tr>
                       <td>
                           {{$tag->name}} <span class="ml-2 badge badge-primary">{{ $tag->posts->count() }}</span>
                       </td>
                       <td>
                            <form class="float-right ml-2" action="{{ route('tags.destroy' , $tag->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                <button class="btn btn-danger btn-sm">{{$tag->trashed() ? 'Delete' : 'Trashed'}}</button>
                            </form>

                          @if(!$tag->trashed())
                            <a href="{{route('tags.edit', $tag->id)}}"
                              class="btn btn-primary btn-sm float-right">Edit</a>
                          @else
                            <a href="{{route('tag.restore', $tag->id)}}"
                              class="btn btn-primary btn-sm float-right">Restore</a>
                          @endif
                       </td>

                   </tr>

                @empty
                    <div class="card-body">

                    <h4 class="text-center"> No Tags Yet </h4>
                    </div>

                @endforelse

             </tbody>
         </table>
       </div>
    </div>
@endsection
