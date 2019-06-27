<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{url('dashboard_assets/default.png')}}" alt="users"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{auth()->user()->name}}</h5>
                            <a title="Logout" class="btn btn-circle btn-sm" href="#"  onclick="logout()">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="nav-small-cap">
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">{{__('category.Categories')}}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{url('dashboard/category')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> {{__('sidebar.List All Categories')}}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('dashboard/category/create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> {{__('sidebar.Add New Category')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">{{__('post.Posts')}}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{url('dashboard/post')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> {{__('sidebar.List All Posts')}}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('dashboard/post/create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> {{__('sidebar.Add New Post')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar navigation-->