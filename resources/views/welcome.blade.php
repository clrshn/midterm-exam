<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8faff; /* pastel blue background */
            color: #1a2a44; /* navy text */
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
        .hero {
            padding: 80px 20px;
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
        .features {
            margin-top: 50px;
        }
        .feature-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            padding: 25px;
            transition: transform 0.2s;
        }
        .feature-card:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #1a2a44;
            color: #f8faff;
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🐾 PetCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('pets.index') }}">Pets</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('appointments.index') }}">Appointments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container text-center hero">
        <h1 class="fw-bold">Welcome to PetCare System 🐶🐱</h1>
        <p class="lead">Manage pets, schedule appointments, and track records — all in one place.</p>
        <div class="mt-4">
            <a href="{{ route('pets.index') }}" class="btn btn-custom-blue btn-lg me-2">Manage Pets</a>
            <a href="{{ route('appointments.index') }}" class="btn btn-custom-yellow btn-lg">Manage Appointments</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container features">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>🐾 Pet Records</h3>
                    <p>Easily add, view, and update pet information like name, type, and age.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>📅 Appointments</h3>
                    <p>Book, track, and manage appointments with just a few clicks.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <h3>💡 Simple & Elegant</h3>
                    <p>User-friendly design with smooth navigation and clean interface.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Motivational Pet Quote -->
    <div class="container text-center mt-5">
        <blockquote class="fst-italic">“A pet is the only thing on earth that loves you more than it loves itself.” 🐕</blockquote>
    </div>

    <footer class="text-center mt-5 p-3">
        <p>&copy; {{ date('Y') }} PetCare System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
