<?php

namespace App\Http\Controllers\Front;

use App\Post;
use App\Contact;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $data['posts']      = Post::orderBy('id' , 'DESC')->paginate(10);
        $data['categories'] = Category::all();

        return view('front.index')->with($data);
    }

    public function contact()
    {
        $data['setting'] = Setting::first();
       return view('front.contacts.contact')->with($data);
    }

    public function storeContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'subj' => 'required|max:50|min:4',
            'message' => 'required|min:4',
        ]);

        Contact::create($data);
        session()->flash('success' , 'Message Sent Successfuly');
        return back();
    }
}
