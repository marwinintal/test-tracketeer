<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/." class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page">Home</a></li>
        @auth
            <li class="nav-item">
                <a href="{{ route('subject.index') }}" class="nav-link {{ request()->routeIs('subject') ? 'active' : '' }}">My Subjects</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit(); return false;">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            </li>
        @endauth
    </ul>
</header>
