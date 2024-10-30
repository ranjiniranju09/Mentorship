<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
  <title>Forstu Mentorship login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<title></title>
    <style>
        input {
            width:100%;
            padding: 15px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: none;
            outline: none;
            border:1px;
            border-radius: 5px;
            background-color: transparent;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #e50914;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            margin-top: 5%;
        }
        body{
            font-family: arial, sans-serif;
            /* background-image: url('/Downloads/bg1.jpg'); */
            background-color: burlywood;
            background-size: cover;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container{
            background-color: black;
            padding: 5%;
            border-radius: 8px;
            text-align: center;           
            max-width: 400px;
            height: 55%;
            width: 100%;
            border: 0.5px solid white;
            box-shadow: #000;
        }
        .input-group {
            position: relative;
        }
        .input-group .form-control {
            padding-right: 2.5rem;
        }
        .input-group-append {
            position: absolute;
            right: 5px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            background: transparent;
            border: none;
        }
        .input-group-text {
            background: transparent;
            border: none;
        }
        .input-group-text i {
            font-size: 1.2rem; /* Adjust icon size as needed */
            color: #6c757d; /* Adjust icon color as needed */
        }
    </style>
<body>
<div class="login-container mt-3">
        <form action="{{route('logged')}}" id="loginform" method="post">
            @csrf
            <span><h2>Login In</h2></span>

            <input type="text" id="username" class="form-control" placeholder="Enter email" name="username" required>

            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                <div class="input-group-append">
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="{{route('register2')}}" class="text-decoration-none">Mentor</a> ---------
        <a href="{{route('register1')}}" class="text-decoration-none">Mentee</a>
        <br>
        <a href="{{route('admin')}}" class="text-decoration-none">Admin</a>
    </div>

     <!-- Bootstrap Icons JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- JavaScript to toggle password visibility -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>


</body>
</html>
=======
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for social icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: white;
            padding: 0 20px;
        }

        .navbar {
            background-color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            width: 120px;
        }

        /* .oval-text {
            position: absolute;
            margin-left: 5%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #6c63ff;
            background-color: rgba(0, 0, 255, 0.1);
            color: blue;
            padding: 10px 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            white-space: nowrap;           
             font-size: 1.5rem;
            font-family: 'Oswald', sans-serif;
        } */

        .container {
            display: flex;
            align-items: center;
            justify-content:center; /* Aligns container to the right */
            height:100vh;
            max-width: 900px;
            width: 100%;
            padding: 20px;
            margin-top: auto;
        }

        .logo-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 70%;
            /* height: fit-content; */
            /* margin-top: 2px; */
            /* background-color: rgba(0, 0, 255, 0.1); */
            background-color: rgba(255, 255, 255, 0.5);

            padding: 30px;
            border-radius: 15px;
            /* box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); */
        }
        /* .name {
            color:darkblue;
            font-weight: bold;
            font-size: 1.5rem;
            font-family: 'Oswald', sans-serif;
        } */
        .name {
            color: #003366; /* Dark blue color */
            font-weight: bold;
            font-size: 1.75rem; /* Slightly larger font size */
            font-family: 'Oswald', sans-serif;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3); /* Subtle text shadow for better contrast */
            border-bottom: 3px solid #0066cc; /* Underline effect */
            padding-bottom: 10px; /* Adds space between text and underline */
            margin-bottom: 20px; /* Adds space below the element */
            background: linear-gradient(90deg, #003366, #0066cc); /* Gradient background */
            -webkit-background-clip: text; /*Clips the gradient to the text */
            color: transparent; /* Hides text color to show gradient */
        }



        .logo-section img {
            width: 70%;
            opacity: 0.9;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.2));
            /* margin-bottom: 20px; */
        }

        .login-container {
            /* background-color: rgba(130, 113, 227, 0.9); */
            background-color: rgba(0, 0, 255, 0.1);
            color: black;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 400px;
            text-align: center;
            /* animation: slideIn 0.5s forwards, pulse 1.5s infinite; */
        }

        .login-container h2 {
            color: black;
            font-weight: bold;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }

        .form-control {
            border: 1px solid #e3e3e3;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c63ff;
        }

        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #00bcd4;
            border-color: #00bcd4;
        }

        .footer {
            margin-top: 15px;
            text-align: center;
        }

        .footer img {
            width: 80px;
            height: auto;
            margin: 0 10px;
            opacity: 0.85;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.2));
        }

        footer {
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: right;
            color: white;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            height: 5%;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-100px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            }
            50% {
                box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3);
            }
            100% {
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            }
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                width: 90px;
            }

            .container {
                flex-direction: column;
                padding: 10px;
                width: 90%;
                justify-content: center;
                align-items: center;
            }

            .login-container,
            .logo-section {
                width: 90%;
                max-width: 300px;
                margin-bottom: 20px;
            }

            .login-container {
                padding: 2rem;
            }

            .oval-text {
                position: relative;
                transform: translateY(0);
                margin-top: 10px;
                left: 0;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                width: 70px;
            }

            .login-container h2 {
                font-size: 1.5rem;
            }

            .btn-primary, .btn-dark {
                font-size: 0.9rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Oval Box with Text -->
    <!-- <div class="oval-text">
        Mentorship Management Portal
    </div> -->

    <div class="container">

    @if(session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
    @endif
        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('images/logo tu.png') }}" class="brandlogotu" alt="Brand Logo">
            <div class="name">
                <h2>Mentorship Management Portal</h2>

            </div>
            <!-- Login Section -->
            <div class="login-container">
                <h2 class="text-center mb-4">Login</h2>
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                <span class="text-muted">Remember Me</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Login</button>
                </form>
                <br>
                <div>
                    <a href="#" style="color: black;">Forgot Password</a>
                </div>
                
                @if ($errors->any())
                    <div class="text-danger mt-3 text-center">
                        {{ $errors->first() }}
                    </div>
                @endif
                <hr>
                <div>
                    <p>New Member ?</p>
                    <a href="{{ route('login') }}" class="btn btn-dark">Register Here</a>
                </div>
            </div>

            <div class="footer">
                <p>Powered By</p>
                <span><img src="{{ asset('images/egghead logo.png') }}" id="logo" alt="Egghead Logo"></span>
                <span><img src="{{ asset('images/logo forstu.png') }}" id="logo" alt="Logo TU"></span>
            </div>
        </div> 
    </div>

    <!-- Bootstrap JS (Optional, for interactive components like dropdowns) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> 0c87cc8 (mentor2)
