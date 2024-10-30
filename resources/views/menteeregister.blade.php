
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            width: 450px;
           
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"], 
        input[type="number"],
        input[type="tel"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Registration Form for Mentee</h2>
        <form id="registrationForm" action="{{route('registermentee')}}" method="POST">
            @csrf

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
            
         
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required pattern="[A-Z a-z.]{3,25}" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" pattern="[6789][0-9]{9}"  required>
                </div>
              

                <div class="form-group">
                    <label for="skills">Skills</label>
                    <input type="text" id="skills" name="skills"  required>
                </div>
                <div class="form-group">
                    <label for="interested_skills">Interested skills</label>
                    <input type="text" id="interested_skills" name="interested_skills"  required>
                </div>
                <div class="form-group">
                    <label for="role">Role </label>
                    <input type="text" id="role" name="role" value="MENTEE" disabled>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required> 
                </div>
                
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" id="password" name="password" required> 
                </div>
            
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // You can add JavaScript code here for form validation or other functionalities
        // });
    </script>
</body>
</html>
