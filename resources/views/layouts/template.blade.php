<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('template/assets/css/style.bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/style.bundle.css') }}" rel="stylesheet">

    <!-- أي CSS إضافي -->
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Library</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; {{ date('Y') }} Library Management System</p>
    </footer>

    <!-- JS (Metronic Bundle) -->
    <script src="{{ asset('template/assets/js/scripts.bundle.min.js') }}"></script>

    <!-- أي سكربتات إضافية -->
    @stack('scripts')
</body>
</html>
