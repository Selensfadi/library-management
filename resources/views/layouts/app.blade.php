<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management')</title>
    <!-- Bootstrap CSS -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library')</title>

    <!-- Template CSS -->
    <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/responsive.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Library</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p class="mb-0">© {{ date('Y') }} Library Management System</p>
    </footer>

    <!-- Template JS -->
    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
