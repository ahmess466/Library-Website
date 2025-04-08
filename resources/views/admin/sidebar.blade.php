<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5" >{{ Auth::user()->name }}</h1>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
                    <li class="active"><a href="{{route('home.index')}}"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="{{route('category.index')}}"> <i class="icon-grid"></i>Categories </a></li>
                    {{-- <li><a href="{{route('book.index')}}"> <i class="icon-grid"></i>Books </a></li> --}}

                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books </a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <li><a href="{{route('book.index')}}"> <i class="icon-grid"></i>Books </a></li>
                            <li><a href="{{route('book.add')}}">Add Book</a></li>
                            <li><a href="{{route('book.request')}}">Borrow Requests</a></li>
                        </ul>
                    </li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">

        <li> <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: inherit; text-decoration: none; font-family: inherit; font-size: inherit;">
                Logout
            </button> </li>
        </form>
    </ul>
</nav>
