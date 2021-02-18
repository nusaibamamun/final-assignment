<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{url('/')}}">Groovin</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @if(Auth::check())
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('user.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('user.cashout') }}">Cashout</a></li>
                    <li><a class="nav-link scrollto" href="{{route('logout')}}">Logout</a></li>
                @elseif(Auth::guard('admin')->check())
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.showCashouts') }}">Cashouts</a></li>
                    <li><a href="{{ route('admin.selling.show') }}">selling</a></li>
                    <li><a href="{{ route('admin.logout') }}">Admin Logout</a></li>

                @else
                <li><a class="nav-link scrollto" href="{{route('login.show')}}">Login</a></li>
                <li><a class="nav-link scrollto" href="{{route('register')}}">Register</a></li>
                @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
