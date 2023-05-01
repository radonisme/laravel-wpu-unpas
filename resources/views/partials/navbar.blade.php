<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        {{-- <a class="navbar-brand" href="/">EA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- NAVBAR --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'Home' ? 'active' : '' }} " href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'About' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'Posts' ? 'active' : '' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'Categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-target="dropdown" aria-expanded="false">Welcome back, {{ auth()->user()->name }} </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/dashboard">Logout</a></li>
                        </ul>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard <i
                                        class="bi bi-layout-text-sidebar"></i>
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout <i
                                            class="bi bi-box-arrow-right"></i></button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'Login' ? 'active' : '' }} "><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>

            {{-- LOGIN --}}
        </div>
    </div>
</nav>
