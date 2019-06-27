<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Int $category)
    {
        $category   =   Category::with(['posts'=> function($query){
                                                 $query->latest();
                                              }])->findOrFail($category);
        return view('category', compact('category'));
    }

}
