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
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <!-- Show the Tasks link -->
                        <a href="/tasks" class="text-white me-3">Tasks</a>

                        <!-- Dropdown for logged-in user -->
                        <div class="dropdown">
                            <a class="text-white me-3 dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} <!-- Display the username -->
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <!-- Show these if the user is not logged in -->
                        <a href="/register" class="text-white me-3">Register</a>
                        <a href="/login" class="text-white">Login</a>
                    @endif
                </div>


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
