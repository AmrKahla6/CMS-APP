<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\TagsRequest;
class tagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.tags.index')->with('tags' , Tag::all());
    }//End Of Index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.tags.create');
    }//End Of Create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        Tag::create([
            'name' => $request->name
        ]);
        session()->flash('success' , 'Tag Created Successfuly');
       return redirect(route('tags.index'));
    }// End Of Store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('front.tags.edit')->with('tag' , $tag);

    }// End Of Edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, Tag $tag)
    {
        $tag -> update([
            'name' => $request->name
        ]);
        session()->flash('success' , 'Tag Updated Successfuly');
       return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::withTrashed()->where('id' , $id)->first();
        if($tag->trashed())
        {
            $tag->forceDelete();
            session()->flash('success' , 'Tag Deleted Successfuly');
            return redirect(route('tags.index'));
        }
        else
        {
            $tag->delete();
            session()->flash('success' , 'Category Trashed Successfuly');
            return redirect(route('tags.index'));
        }
    }

    public function trashed()
    {
        $trashed = Tag::onlyTrashed()->get();
        return view('front.tags.index')->with('tags' , $trashed);

    }
    public function restore($id)
    {
       Tag::withTrashed()->where('id' , $id)->restore();
       session()->flash('success' , 'Tag Restore Successfuly');
        return redirect(route('tags.index'));
    }
}
