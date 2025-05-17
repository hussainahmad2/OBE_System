<!DOCTYPE html>
<html lang="en">
<head>
    <title>QEC Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/FUSSTLogo.jpg') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .login-container {
            background: white;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .left-panel {
            background: linear-gradient(to bottom, #033649, #005f73);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex: 1;
        }
        .left-panel img {
            max-width: 180px;
            margin-top: 20px;
            opacity: 0.8;
            max-width: 60%;
            border-radius: 10px;
            mix-blend-mode: color-burn;
        }
        .right-panel {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
            width: 50%;
            position: relative;
        }
        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #e3edf7;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
        }
        .back-arrow i {
            font-size: 20px;
            color: #23546B;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #035f73;
            color: white;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #033649;
        }
        .forgot-link {
            display: block;
            margin-top: 15px;
            text-align: left;
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .left-panel {
                padding: 5px;
            }
            .right-panel {
                padding: 2px;
                width: 100%;
            }
            .back-arrow {
                top: 10px;
                left: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <div class="col-md-6 left-panel">
                <h2 class="title">Foundation University<br>School of Science and Technology</h2>
                <img src="{{ asset('img/FUSSTLogo.jpg') }}" alt="University Logo">
            </div>
            <div class="col-md-6 right-panel">
                <a href="{{ url('/') }}" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
                <h2 class="mb-4 text-center">QEC Login</h2>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('qec.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-login">Login</button>
                </form>
                {{-- <a href="#" class="forgot-link">Forgot your User ID or Password?</a> --}}
            </div>
        </div>
    </div>
</body>
</html> 