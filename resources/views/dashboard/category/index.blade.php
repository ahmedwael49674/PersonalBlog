@extends('dashboard.layout.app')
@section('title')
{{__('category.Index Categories')}}
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                <th>{{ __('category.Categories')}}</th>
            </h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard/category') }}">{{ __('common.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Category.Categories')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- File export -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('category.Category Title')}}</th>
                                    <th>{{ __('common.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($category->image)
                                        <img src="{{ asset('storage/'.$category->image)}}" width="40"
                                            class="rounded-circle">
                                        @endif
                                        {{ $category->title }}
                                    </td>
                                    <td>
                                        <a href="{{ url('dashboard/category/'.$category->id.'/edit') }}"
                                            class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip"
                                            data-original-title="Update"><i class="ti-pencil-alt"
                                                aria-hidden="true"></i></a>
                                        <a href="#"
                                            class="warning-alert btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                            data-toggle="tooltip" data-original-title="Delete"
                                            data-url="{{ url('dashboard/category/'.$category->id) }}"
                                            data-method="DELETE" data-msg="Are you sure ?"
                                            data-csrf="{{csrf_token()}}"><i class="ti-close" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection