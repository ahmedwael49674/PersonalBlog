@extends('dashboard.layout.app')
@section('title')
{{__('post.Update Post')}}
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{__('post.Update Post')}}</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ url('dashboard/post') }}">{{ __('common.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('post.Update New Post')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h5 class="card-subtitle"></h5>
                    <form class="form" method="post" action="{{ url('dashboard/post/'.$post->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('post.Title')}}</label>
                            <div class="col-10">
                                <input name="title" class="form-control" type="text"
                                    value="{{ old('title', $post->title) }}">
                                @isset($errors->title)
                                <div class="alert alert-danger">
                                    {{ $errors->first('title') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('post.Content')}}</label>
                            <div class="col-10">
                                <textarea name="content" class="form-control" cols="15" rows="5"
                                    required>{{ old('content', $post->content) }}</textarea>
                                @isset($errors->content)
                                <div class="alert alert-danger">
                                    {{ $errors->first('content') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input"
                                class="col-2 col-form-label">{{__('post.Post Image')}}</label>
                            <div class="col-10">
                                <input name="image" class="form-control" type="file">
                                @isset($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('image') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-month-input2"
                                class="col-2 col-form-label">{{__('post.Category')}}</label>
                            <div class="col-10">
                                <select class="custom-select category-select col-12" id="example-month-input2"
                                    name="category_id">
                                    @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-actions float-right">
                            <a href="{{ url('dashboard/post') }}" type="button"
                                class="btn btn-dark">{{__('common.Cancel')}}</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                {{__('common.Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.category-select option[value="{{ $post->category_id }}"]').prop('selected', true);
    @if(old('category_id'))
    $('.category-select option[value="{{ old('
        category_id ') }}"]').prop('selected', true);
    @endif
</script>
@endsection