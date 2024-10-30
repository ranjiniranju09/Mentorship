<!DOCTYPE html>
<html>
<head>
    <title>JavaScript Introduction Quiz</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }
        .quiz-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .quiz-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        .question {
            margin-bottom: 20px;
        }
        .question label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #495057;
        }
        .question input[type="radio"] {
            margin-right: 10px;
        }
        .buttons {
            margin-top: 20px;
            text-align: center;
        }
        .buttons button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .buttons .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .buttons .btn-primary:hover {
            background-color: #0056b3;
        }
        .buttons .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .buttons .btn-secondary:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>JavaScript Introduction Quiz</h1>
        <form id="quizForm">
            <!-- Question 1 -->
            <div class="question">
                <label for="q1">1. What is JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="A programming language for web development">
                    <label class="form-check-label">A programming language for web development</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="A style sheet language">
                    <label class="form-check-label">A style sheet language</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="A database management system">
                    <label class="form-check-label">A database management system</label>
                </div>
            </div>
            <!-- Question 2 -->
            <div class="question">
                <label for="q2">2. Which company developed JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="Microsoft">
                    <label class="form-check-label">Microsoft</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="Netscape">
                    <label class="form-check-label">Netscape</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="Google">
                    <label class="form-check-label">Google</label>
                </div>
            </div>
            <!-- Question 3 -->
            <div class="question">
                <label for="q3">3. Which of the following is a JavaScript framework?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="Laravel">
                    <label class="form-check-label">Laravel</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="Angular">
                    <label class="form-check-label">Angular</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="Django">
                    <label class="form-check-label">Django</label>
                </div>
            </div>
            <!-- Question 4 -->
            <div class="question">
                <label for="q4">4. How do you write "Hello World" in an alert box?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="msg('Hello World')">
                    <label class="form-check-label">msg('Hello World')</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="alert('Hello World')">
                    <label class="form-check-label">alert('Hello World')</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="msgBox('Hello World')">
                    <label class="form-check-label">msgBox('Hello World')</label>
                </div>
            </div>
            <!-- Question 5 -->
            <div class="question">
                <label for="q5">5. How do you create a function in JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="function = myFunction()">
                    <label class="form-check-label">function = myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="function myFunction()">
                    <label class="form-check-label">function myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="function:myFunction()">
                    <label class="form-check-label">function:myFunction()</label>
                </div>
            </div>
            <!-- Question 6 -->
            <div class="question">
                <label for="q6">6. How do you call a function named "myFunction"?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="call myFunction()">
                    <label class="form-check-label">call myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="call function myFunction()">
                    <label class="form-check-label">call function myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="myFunction()">
                    <label class="form-check-label">myFunction()</label>
                </div>
            </div>
            <!-- Buttons -->
            <div class="buttons">
                <button type="button" class="btn btn-primary" onclick="submitQuiz()">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="clearQuiz()">Clear</button>
            </div>
        </form>
    </div>

    <script>
        function submitQuiz() {
            alert('Quiz submitted!');
        }

        function clearQuiz() {
            document.getElementById('quizForm').reset();
        }
    </script>
</body>
</html>
