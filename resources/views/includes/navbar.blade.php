<nav class="navbar navbar-expand-lg navbar-light navbar-lg-dark navbar-rpl fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo-rpl-new.svg"  class="w-100 d-none d-lg-block" alt="logo-rpl">
            <img src="/images/logo-rpl-new.svg"  class="w-75 d-block d-lg-none" alt="logo-rpl">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('ebook*') ? ' active' : '' }}" href="{{ route('ebook') }}">E-BOOKS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('tutorial*') ? ' active' : '' }}" href="{{ route('tutorial') }}">TUTORIALS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('project*') ? ' active' : '' }}" href="{{ route('project') }}">PROJECTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/rplsmkn17" target="_blank">GITHUB</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <span class="nav-divider"></span>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-login px-4 py-2 d-block">LOGIN</a>
                </li>
                @else
            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav d-none d-lg-flex justify-content-between">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex align-items-center justify-content-between" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <div class="user-images">
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile" class="rounded-circle profile-pictur mr-2" style="max-height: 45px; width: 50px;">
                        </div>
                        <div class="name-user">
                            Hi, {{ Auth::user()->name }}
                        </div>
                    </a>
                    <div class="dropdown-menu">
                        @if (Auth::user()->roles_id == 1)
                            <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                        @else
                            <a href="{{ route('user-dashboard') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            <!-- mobile app -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex align-items-center justify-content-start" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <div class="user-images">
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile" class="rounded-circle profile-pictur mr-2" style="max-height: 45px; width: 50px;">
                        </div>
                        <div class="name-user">
                            Hi, {{ Auth::user()->name }}
                        </div>
                    </a>
                @auth
                <div class="dropdown-menu w-50">
                    @if (Auth::user()->roles_id == 1)
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @else
                        <a href="{{ route('user-dashboard') }}" class="dropdown-item">Dashboard</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
                @endauth
                </li>
            </ul>
            @endif
        </div>
        @endguest
    </div>
</nav>
