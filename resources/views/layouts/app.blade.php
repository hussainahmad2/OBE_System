<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Foundation University - School of Science and Technology')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #E2ECF2;
        }
        .main-container {
            background-color: #e3edf7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }
        .card-header {
            background: linear-gradient(to bottom, #033649, #005f73);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 40px;
        }
        .btn-primary {
            background-color: #005f73;
            border: none;
            padding: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #003f4d;
        }
        .form-control {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px;
        }
        .form-control:focus {
            border-color: #005f73;
            box-shadow: 0 0 0 0.2rem rgba(0, 95, 115, 0.25);
        }
        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #005f73;
            text-decoration: none;
            font-size: 16px;
        }
        .back-link:hover {
            color: #003f4d;
        }
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            .card-header {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <a href="{{ route('home') }}" class="back-link">
            <i class="bi bi-arrow-left"></i> Back to Home
        </a>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>