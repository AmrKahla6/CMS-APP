<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index')->with('users' , User::all());
    }// End OF Index

    public function makeAdmin(User $user)
    {
      $user ->role ="admin";
      $user-> save();
      session()->flash('success' , 'Now You Are Admin Successfuly');
      return redirect('users.index');
    }// End Of makeAdmin
    public function makeWeiter(User $user)
    {
      $user ->role ="writer";
      $user-> save();
      session()->flash('success' , 'You Make Him Writer Successfuly');
      return redirect('users.index');
    }// End Of makeAdmin

    public function edit(User $user)
    {
        $profile = $user->profile;
        return view('admin.users.edit' , ['user'=> $user , 'profile'=>$profile]);
    }// End Of Edit

    public function update(User $user , Request $request)
    {
       $profile = $user->profile;
       $data = $request->all();
       if($request->hasFile('picture'))
       {
           $picture = $request->picture->store('profilePicture', 'public');
           $data['picture'] = $picture;
       }
       $profile->update($data);
       return redirect('home');
    }

}
