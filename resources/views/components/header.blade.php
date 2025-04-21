<header class="header">
    <a href="/">
        <img src="{{ asset('image/logo_dark.svg') }}" alt="" class="header-logo">
    </a>

    <div class="header-nav">
        <div class="header-links">
            <a href="/">Home</a>
            <a href="/home/#about-us">About Us</a>
            @if (Auth::guard('student')->check() || Auth::guard('lecturer')->check())
                <a
                    href="@if (Auth::guard('lecturer')->check()) {{ route('lecturer.main') }}
            @elseif(Auth::guard('student')->check())
                {{ route('student.main') }}
            @else
                # @endif">Subjects</a>
            @endif

            @if (Auth::guard('lecturer')->check())
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-decoration-none" data-bs-toggle="dropdown"
                        aria-expanded="false">Manage Subjects</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('chapter.create') }}">Upload</a>
                        <a class="dropdown-item"href="/edit">Edit</a>
                    </div>
                </div>
            @endif

            <div class="user-rectangle">
                <div class="dropdown-toggle d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="username">
                        @if (Auth::guard('student')->check())
                            {{ Auth::guard('student')->user()->name }}
                        @elseif(Auth::guard('lecturer')->check())
                            {{ Auth::guard('lecturer')->user()->name }}
                        @else
                            Guest
                        @endif
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if (Auth::guard('student')->check() || Auth::guard('lecturer')->check())
                        <li><a class="dropdown-item" href="{{ route('profile') }}">View Profile</a></li>
                       @if (Auth::guard('student')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student.activities') }}">
                                    My Activities
                                </a>
                            </li>
                        @endif

                        @if(Auth::guard('lecturer')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('lecturer.activities') }}">
                                    My Activities
                                </a>
                            </li>
                        @endif

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
