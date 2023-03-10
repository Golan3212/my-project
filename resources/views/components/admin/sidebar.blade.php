<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{route('admin.index')}}">
                            <span data-feather="home"></span>
                            Main <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{route('admin.news.index')}}">
                            <span data-feather="file"></span>
                            News
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.user.*')) active @endif" href="{{route('admin.user.index')}}">
                            <span data-feather="users"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.category.index')) active @endif" href="{{route('admin.category.index')}}">
                            <span data-feather="layers"></span>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.source.*')) active @endif" href="{{route('admin.source.index')}}">
                            <span data-feather="arrow-down-circle"></span>
                            Sources
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


    </div>
</div>
