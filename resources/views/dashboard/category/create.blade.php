@extends('dashboard.layout.app')
@section('title')
{{__('category.Create New Category')}}
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{__('category.Create New Category')}}</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard/category') }}">{{ __('common.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{__('category.Create New Category')}}
                        </li>
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
                    <form class="form" method="post" action="{{ url('dashboard/category') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-text-input"
                                class="col-2 col-form-label">{{__('category.Category Title')}}</label>
                            <div class="col-10">
                                <input name="title" class="form-control" type="text" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('category.Category Image')}}</label>
                            <div class="col-10">
                                <input name="image" class="form-control" type="file" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('image') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-actions float-right">
                            <a href="{{ url('dashboard/category') }}" type="button"
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