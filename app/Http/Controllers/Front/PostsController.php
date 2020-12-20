<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Profile;
use App\User;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    } // End Of Construct

    public function index()
    {
        return view('front.posts.index')->with('posts' , Post::all());
    } // End Of Index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.posts.create')->with('categories', Category::all())->with('tags' , Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {

        $post = Post::create([
            'title'       => $request->title,
            'description' => $request->description,
            'content'     => $request->content,
            'category_id' => $request->category_id,
            'user_id'     => $request->user_id
        ]);
        // dd($post);
        if ($request->hasFile('image')) {
            $image    = $request['image'];
            $img_name = rand(0, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts/'), $img_name);
            $post->image   = $img_name;
        }
        $post->save();

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        session()->flash('success' , 'Posts Created Successfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user     = $post->user;
        $profile  = $user->profile;
        return view('front.posts.show')->with('post', $post)->with('categories', Category::all())->with('profile' , $profile)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('front.posts.edit' , ['post'=>$post , 'categories'=> Category::all() , 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only('title' , 'description' , 'content');

        $old_img = Post::find($request->id)->image;
        // dd($old_img);

        if ($request->hasFile('image'))
        {
           Storage::disk('uploads')->delete('posts/' . $old_img);
           $img = $request['image'];
           $img_name = rand(0, 999) . '.' . $img->getClientOriginalExtension();
           $img->move(public_path('images/posts/'), $img_name);
           $post->image   = $img_name;
        }

        if($request->tags)
        {
          $post->tags()->sync($request->tags);
        }
        $post->update($data);
         session()->flash('success' , 'Posts Updated Successfuly');
         return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post->delete();
        // session()->flash('success' , 'Post Trushed Successfuly');
        // return redirect(route('posts.index'));
        $post = Post::withTrashed()->where('id', $id)->first();

        if($post->trashed()){
            Storage::disk('uploads')->delete('posts/' . $post->image);
            $post->forceDelete();
            session()->flash('success' , 'Post Deleted Successfuly');
            return redirect(route('posts.index'));
        }
        else
        {
            $post->delete();
            session()->flash('success' , 'Post Trushed Successfuly');
            return redirect(route('posts.index'));
        }



    }
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('front.posts.index')->with('posts' , $trashed);
    }

    public function restore($id)
    {
       Post::withTrashed()->where('id' , $id)->restore();
       session()->flash('success' , 'Post Restored Successfuly');
       return redirect(route('posts.index'));
    }

}
