<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::select('id' , 'name')->orderBy('id' , 'DESC')->paginate(5);
        return view('front.categories.index')->with($data);
    }// End Of Index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.categories.create');
    }// End Of Create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
       Category::create([
           'name' => $request->name,
       ]);
       session()->flash('success' , 'Category Created Successfuly');
       return redirect(route('categories.index'));
    } // End If Store

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
    public function edit(Category $category)
    {
        return view('front.categories.edit')->with('category' , $category);
    }// End OF Edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {


          $category -> update([
              'name' => $request -> name,
          ]) ;
         session()->flash('success' , 'Category Updated Successfuly');
         return redirect(route('categories.index'));
    }// End Of Update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id' , $id)->first();
        if($category->trashed()){
            $category->forceDelete();
            session()->flash('success' , 'Category Deleted Successfuly');
            return redirect(route('categories.index'));
        }
        else
        {
            $category -> delete();
            session()->flash('success' , 'Category Trashed Successfuly');
            return redirect(route('categories.index'));

        }
    }
    public function trashed()
    {
        $trashed = Category::onlyTrashed()->get();
        return view('front.categories.index')->with('categories' , $trashed);

    }
    public function restore($id)
    {
       Category::withTrashed()->where('id' , $id)->restore();
       session()->flash('success' , 'Category Restore Successfuly');
        return redirect(route('categories.index'));
    }
}
