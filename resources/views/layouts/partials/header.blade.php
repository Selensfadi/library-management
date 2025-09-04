<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Library</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#topnav" aria-controls="topnav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="topnav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('books*') ? 'active' : '' }}" href="{{ route('books.index') }}">Books</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="{{ route('orders.index') }}">Orders</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a></li>
            </ul>
        </div>
    </div>
</nav>
