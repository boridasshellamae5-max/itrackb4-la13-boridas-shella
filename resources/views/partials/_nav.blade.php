<nav class="navbar navbar-expand-lg bg-light border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Movie Collection</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('movies.*') ? 'active' : '' }}"
                       href="{{ route('movies.index') }}">All Movies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

