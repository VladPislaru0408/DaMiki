<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Damiki Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Font (Bodoni Moda SC) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Bodoni+Moda+SC:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap"
      rel="stylesheet"
    >

    <!-- Shared Custom CSS (same as the presentation site) -->
    <link rel="stylesheet" href="{{ asset('css/damiki.css') }}">

    <!-- Admin-Specific Overrides -->
    <style>
        body {
            background-color: #121212; /* A dark background for admin */
            color: #fff; /* Light text */
            font-family: 'Bodoni Moda SC', sans-serif;
        }

        /* HEADER / NAVBAR */
        .admin-header {
            background-color: #000;
            padding: 1rem;
        }
        .admin-header h1 {
            margin: 0;
            color: #fff;
        }
        .admin-header nav a {
            color: #fff;
            margin-right: 1rem;
            text-decoration: none;
            font-weight: 600;
        }
        .admin-header nav a:hover {
            color: var(--accent-color); /* Use your accent color */
        }

        /* MAIN CONTAINER */
        .admin-container {
            padding: 2rem;
        }

        /* TABLE STYLES */
        .admin-table {
            background-color: #222;
            border: 1px solid #333;
        }
        .admin-table th {
            background-color: #333;
            color: #fff;
        }
        .admin-table td {
            color: #ccc;
        }

        /* BUTTONS */
        .btn-custom {
            background-color: var(--accent-color);
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #8d6736; /* Slightly darker accent */
        }

        .btn-link {
            text-decoration: none;
            border: none;
            background: none;
            padding: 0;
            font-weight: 600;
        }
        .btn-link:hover {
            color: var(--accent-color);
        }

        /* FOOTER */
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header class="admin-header d-flex justify-content-between align-items-center">
        <div>
            <h1>Damiki Admin Panel</h1>
        </div>
        <nav>
            <a href="{{ route('admin.photos.index') }}">Photos</a>
            <a href="{{ route('home') }}">View Site</a>

            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </nav>
    </header>

    <main class="admin-container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Damiki Custom Furniture. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
