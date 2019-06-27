<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Traits\RemoveImage;
use App\{Post,Category};

class PostController extends Controller
{
    use RemoveImage;

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = Post::with('category:id,title')->paginate(10);
    return view('dashboard.post.index', compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::all();
    return view('dashboard.post.create', compact('categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PostRequest $request)
  {
    Post::create($request->all());
    return redirect('dashboard/post')->with('msg', 'Post added successfully.');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Int $id)
  {
    $post               = Post::findOrFail($id);
    $categories         = Category::all();

    return view('dashboard.post.edit',compact('post','categories'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(PostRequest $request, Int $id)
  {
    $post   =  Post::findOrFail($id);
    $request->has('image')?$this->RemoveLogoIfExist($post):'';
    $post->update($request->all());
    return redirect('dashboard/post')->with('msg', 'Post updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Int $id)
  {
    $post   =  Post::findOrFail($id);
    $this->RemoveLogoIfExist($post);
    $post->delete();

    return ['status'=>1, 'msg'=>'Post deleted successfully.'];

  }
}
