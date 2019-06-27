<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="text-muted" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Blog</a>
        </div>
        <div class="dropdown col-4 d-flex justify-content-end align-items-center">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($categories as $category)
                <a class="dropdown-item" href="{{url('/category/'.$category->id)}}">{{$category->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
</header>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="/">Home</a>
        @foreach ($categories as $category)
        <a class="p-2 text-muted" href="{{url('/category/'.$category->id)}}">{{$category->title}}</a>
        @endforeach
    </nav>
</div>