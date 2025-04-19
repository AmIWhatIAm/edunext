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
                    <a class="dropdown-item" href="/edit">Edit</a>
                </div>
            </div>

            <div class="user-rectangle">
                <div class="dropdown-toggle d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="username">
                        @if(Auth::guard('student')->check())
                            {{ Auth::guard('student')->user()->name }}
                        @elseif(Auth::guard('lecturer')->check())
                            {{ Auth::guard('lecturer')->user()->name }}
                        @else
                            Guest
                        @endif
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if(Auth::guard('student')->check() || Auth::guard('lecturer')->check())
                        <!-- Add View Profile link -->
                        <li><a class="dropdown-item" href="{{ route('profile') }}">View Profile</a></li>
            
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>            
        </div>
    </div>
</header>