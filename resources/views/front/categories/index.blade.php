@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')
    <div class="clearfix">
        <a href="{{ route('categories.create') }}"
         class="btn btn-success float-right"
         style="margin-bottom:10px">Add Category</a>

         <a href="{{route('trashed.cat')}}"
         class="btn btn-success float-left btn-sm"
         style="margin-bottom:10px"> Trashed Categories</a>
    </div>

    <div class="card card-default">
       <div class="card-header">
          All Categories
       </div>
       <div class="card-body">
         <table class="table">
             <tbody>
                @forelse($categories as $category)
                   <tr>
                       <td>
                           {{$category->name}}
                       </td>
                       <td>
                            <form class="float-right ml-2" action="{{ route('categories.destroy' , $category->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                <button class="btn btn-danger btn-sm">{{$category->trashed() ? 'Delete' : 'Trashed'}}</button>
                            </form>

                          @if(!$category->trashed())
                            <a href="{{route('categories.edit', $category->id)}}"
                              class="btn btn-primary btn-sm float-right">Edit</a>
                          @else
                            <a href="{{route('cat.restore', $category->id)}}"
                              class="btn btn-primary btn-sm float-right">Restore</a>
                          @endif
                       </td>

                   </tr>

                @empty
                    <div class="card-body">

                    <h4 class="text-center"> No Categories Yet </h4>
                    </div>

                @endforelse
            </tbody>
        </table>
        <div class="align-items-md-center">
            {!! $categories->links() !!}
        </div>
    </div>
</div>
@endsection
