@extends('layouts.app')
@section('content')
@include('partials._session')
@include('partials._errorSession')

    <div class="card card-default">
       <div class="card-header">
          All Users
       </div>
       <div class="card-body">
     @if($users->count() > 0)
         <table class="table">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>username</th>
                  <th>Permissions</th>
               </tr>
            </thead>
             <tbody>
             @foreach($users as $user)
                   <tr>
                       <td>
                           <!-- <img src="{{ asset('storage/'.$user->image) }}" alt="not found" width="100px" height="50px"> -->
                           <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) :  asset('images/user/'.$user->image) }} " style="border-radius:50%" width="60px" height="60px" alt="">
                       </td>
                       <td>
                           {{$user->name}}
                       </td>
                       <td>
                        @if (!$user->isAdmin())
                                <form action="{{ route('users.make-admin' , $user->id) }}" method="POST">
                                @csrf
                                     <button class="btn btn-success" type="submit">Make Admin</button>
                                </form>
                        @else(!$user->isWriter())
                                <form action="{{ route('users.make-writer' , $user->id) }}" method="POST">
                                @csrf
                                     <button class="btn btn-success" type="submit">Make Writer</button>
                                </form>
                        @endif
                       </td>
                   </tr>
                @endforeach
                @else
                    <div class="card-body">

                    <h4 class="text-center text"> No Users Yet </h4>
                    </div>

             </tbody>
             @endif
         </table>
       </div>
    </div>
@endsection
