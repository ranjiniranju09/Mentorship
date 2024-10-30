<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .navbar {
            width: 100%;
            background-color: white;
            padding: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            margin-left: 25px;
        }

        .navbar .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .navbar .nav-buttons {
            display: flex;
            margin-right: 15px;
            gap: 10px;
        }

        .navbar .nav-buttons a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            background-color: #5cb85c;
            border-radius: 4px;
        }

        .navbar .nav-buttons a:hover {
            background-color: #4cae4c;
            color: #fff;
        }

        .additional-logos {
            margin-top: 1%; /* Adjust margin to place logos above the form */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .additional-logos img {
            height: 40px; /* Adjust size as needed */
        }

        .registration-form {
            margin-top: 1%;
            background-color: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            max-width: 600px;
            margin-bottom: 1%;
        }
        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group label {
            margin-bottom: 5px;
            display: block;
        }
        .form-group .invalid-feedback {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 35px;
            cursor: pointer;
            color: #aaa;
        }
        .toggle-password:hover {
            color: #333;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4cae4c;
        }

        footer {
            background-color: white;
            color: black;
            text-align: center;
            padding: 3px;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo forstu.png') }}" alt="Your Logo">
        </div>

        <div class="nav-buttons">
            <a href="#">Login</a>
            <a href="#">Sign Up</a>
        </div>
    </nav>

    <div class="additional-logos">
    <p><sup>Powered by</sup></p>
        <img src="{{ asset('images/logo tu.png') }}" alt="Additional Logo 1">
        <img src="{{ asset('images/egghead logo.png') }}" alt="Additional Logo 2">
    </div>

    <div class="registration-form">
        <h2>Register</h2>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Form Fields -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile number" value="{{ old('mobile') }}" required>
                @error('mobile')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="state" id="state" placeholder="Enter your state" value="{{ old('state') }}" required>
                @error('state')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="course">Course of Study</label>
                <input type="text" name="course" id="course" placeholder="Enter your course" value="{{ old('course') }}" required>
                @error('course')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password_confirmation')"></i>
                @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <footer>
        <p>© 2024 Scholarship Program. All rights reserved.</p>
    </footer>

    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const icon = document.querySelector(`#${id} + .toggle-password`);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
