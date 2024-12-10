<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">To-Do App</h1>
            <nav>
                <a href="/tasks" class="text-white me-3">Tasks</a>
                <a href="/register" class="text-white me-3">Register</a>
                <a href="/login" class="text-white">Login</a>
            </nav>
        </div>
    </header>

    <!-- Contents goes here -->
     @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 text-center">
        <p class="mb-0">&copy; 2024 To-Do App. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
