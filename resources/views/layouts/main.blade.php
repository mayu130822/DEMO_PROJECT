<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    <!-- Bootstrap CSS (or any other CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @yield('styles') <!-- Placeholder for additional styles -->
</head>
<body>
    <div class="container">
        <!-- Navigation (if any) -->
        @include('partials.navbar')

        <!-- Main content of the page -->
        @yield('content') <!-- This is where content from child views will go -->
    </div>

    <!-- Footer (if any) -->
    <footer>
        <p>&copy; 2024 My Laravel App</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts') <!-- Placeholder for additional scripts -->
</body>
</html>
