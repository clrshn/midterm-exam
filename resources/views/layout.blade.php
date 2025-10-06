<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8faff;
            color: #1a2a44;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #1a2a44;
        }
        .navbar-brand, .nav-link {
            color: #f8faff !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ffd95e !important;
        }
        .btn-custom-blue {
            background-color: #2d4d7a;
            color: white;
            border: none;
        }
        .btn-custom-blue:hover {
            background-color: #22395d;
        }
        .btn-custom-yellow {
            background-color: #ffd95e;
            color: #1a2a44;
            border: none;
        }
        .btn-custom-yellow:hover {
            background-color: #e6c84a;
            color: #0f1b30;
        }
        footer {
            background-color: #1a2a44;
            color: #f8faff;
            margin-top: 60px;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🐾 PetCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pets.index') }}">Pets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointments.index') }}">Appointments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container py-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p class="mb-0">© 2025 PetCare System | All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
