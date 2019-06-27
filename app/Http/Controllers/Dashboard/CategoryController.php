<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Traits\RemoveImage;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  use RemoveImage;

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::paginate(10);
    
    return view('dashboard.category.index',compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('dashboard.category.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CategoryRequest $request)
  {
    $category  = Category::create($request->all());
    return back()->with('msg', 'category added successfully.');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Int $id)
  {
    $category = Category::findOrFail($id);
    return view('dashboard.category.edit', compact('category'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(CategoryRequest $request, Int $id)
  {
    $category  = category::findOrFail($id);
    $this->RemoveLogoIfExist($category);
    $category->update($request->all());

    return redirect()->back()->with('msg', 'category updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Int $id)
  {
    $category =  category::findOrFail($id);
    $this->RemoveLogoIfExist($category);
    $category->posts()->delete();
    $category->delete();

    return ['status'=>1];
  }
}
