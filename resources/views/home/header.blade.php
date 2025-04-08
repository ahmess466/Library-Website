 <!-- ***** Preloader Start ***** -->
 <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
            <div class="row">
                    <div class="col-12">
                            <nav class="main-nav">
                                    <!-- ***** Logo Start ***** -->
                                    <a href="{{route('home.index')}}" class="logo">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                                    </a>
                                    <!-- ***** Logo End ***** -->
                                    <!-- ***** Menu Start ***** -->
                                    <ul class="nav">
                                            <li><a href="{{route('home.index')}}" class="active">Home</a></li>
                                            <li><a href="{{route('explore.books')}}">Explore</a></li>

                                            @guest
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            @endguest
                                            @auth
                                                <li><a href="{{route('book.history')}}">My History</a></li>
                                                <li><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: inherit; text-decoration: none; font-family: inherit; font-size: inherit;">
                                                            Logout
                                                        </button>
                                                    </form>
                                                </li>
                                                @endauth

                                    </ul>
                                    <a class='menu-trigger'>
                                            <span>Menu</span>
                                    </a>
                                    <!-- ***** Menu End ***** -->
                            </nav>
                    </div>
            </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
