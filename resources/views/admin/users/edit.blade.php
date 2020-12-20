@extends('layouts.app')
@section('content')
@include('layouts._session')
@include('layouts._errorSession')
     <div class="card card-default">
        <div class="card-header">
           Profile
        </div>
        <div class="card-body">
            <form action="{{ route('users.update' , $user->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @include('layouts._errors')
               <div class="form-group">
                  <label for="name">Name :</label>
                  <input type="text" name="name" class="form-control" vlue="{{$user->name}}">
               </div>
               <div class="form-group">
                  <label for="name">Email :</label>
                  <input type="text" name="email" class="form-control" vlue="{{$user->email}}">
               </div>
               <div class="form-group">
                  <label for="about">About:</label>
                  <textarea type="text" name="about" rows="3"
                  class="form-control" placeholder="Tell Us About You">{{$profile->about}}</textarea>
              </div>
               <div class="form-group">
                  <label for="facebook">Facebook:</label>
                  <input type="text" name="facebook" class="form-control" vlue="{{ $profile->facebook }}">
               </div>
               <div class="form-group">
                  <label for="twitter">Twitter:</label>
                  <input type="text" name="twitter" class="form-control" vlue="{{$profile->twitter}}">
               </div>
               <div class="form-group">
                  <label for="picture">Picture:</label><br>
                  <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) : $user->getGravatar() }}"
                       width="80px" height="80px" alt="">
                  <input type="file" name="picture" class="form-control mt-2">
              </div>

               <div class="form-group">
                  <button class="btn btn-success">Update Profile</button>
               </div>
            </form>
        </div>
     </div>
@endsection
