@extends('layouts.app')
@section('content')
@foreach($posts as $post)
<div class="blog-post">
    @isset($post->image)
    <img src="{{ asset('storage/'.$post->image)}}" class="img-fluid"    >
    @endisset
    <h2 class="blog-post-title">
        <a href="post/{{$post->id}}">
            {{$post->title}}
        </a>
    </h2>
    <div class="row">
        <p class="blog-post-meta col-sm-10">{{$post->created_at->toFormattedDateString()}} </p>
        <div class="col-sm-2">
            <a class="badge badge-dark" href="{{url('/category/'.$post->category->id)}}">{{$post->category->title}}</a>
        </div>
    </div>
    <p>
        {{$post->content}}
    </p>
</div>
@endforeach
{{$posts->links()}}
@endsection