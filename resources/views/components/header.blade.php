<header class="header">
    <a href="/">
        <img src="{{ asset('image/logo_dark.svg') }}" alt="" class="header-logo">
    </a>

    <div class="header-nav">
        <div class="header-links">
            <a href="/">Home</a>
            <a href="">Subjects</a>
            <a href="">About Us</a>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">Manage Subjects</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('chapter.create') }}">Upload</a>
                    <a class="dropdown-item"href="/edit">Edit</a>
                </div>
            </div>

            <div class="user-rectangle dropdown">
                <div class="dropdown-toggle d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="username">
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Guest
                        @endauth
                    </div>
                </div>

                <ul class="dropdown-menu dropdown-menu-end">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
