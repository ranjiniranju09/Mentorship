<!DOCTYPE html>
<html>
<head>
    <title>JavaScript Basics Quiz</title>
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
        <h1>JavaScript Basics Quiz</h1>
        <form id="quizForm">
            <!-- Question 1 -->
            <div class="question">
                <label for="q1">1. What is the correct syntax to refer to an external script called "script.js"?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="<script src='script.js'>">
                    <label class="form-check-label">&lt;script src='script.js'&gt;</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="<script href='script.js'>">
                    <label class="form-check-label">&lt;script href='script.js'&gt;</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="<script ref='script.js'>">
                    <label class="form-check-label">&lt;script ref='script.js'&gt;</label>
                </div>
            </div>
            <!-- Question 2 -->
            <div class="question">
                <label for="q2">2. How do you create a function in JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="function = myFunction()">
                    <label class="form-check-label">function = myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="function myFunction()">
                    <label class="form-check-label">function myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="function:myFunction()">
                    <label class="form-check-label">function:myFunction()</label>
                </div>
            </div>
            <!-- Question 3 -->
            <div class="question">
                <label for="q3">3. How do you call a function named "myFunction"?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="call myFunction()">
                    <label class="form-check-label">call myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="call function myFunction()">
                    <label class="form-check-label">call function myFunction()</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="myFunction()">
                    <label class="form-check-label">myFunction()</label>
                </div>
            </div>
            <!-- Question 4 -->
            <div class="question">
                <label for="q4">4. How to write an IF statement in JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="if i == 5 then">
                    <label class="form-check-label">if i == 5 then</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="if (i == 5)">
                    <label class="form-check-label">if (i == 5)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="if i = 5">
                    <label class="form-check-label">if i = 5</label>
                </div>
            </div>
            <!-- Question 5 -->
            <div class="question">
                <label for="q5">5. How does a WHILE loop start?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="while (i <= 10; i++)">
                    <label class="form-check-label">while (i <= 10; i++)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="while (i <= 10)">
                    <label class="form-check-label">while (i <= 10)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="while i = 1 to 10">
                    <label class="form-check-label">while i = 1 to 10</label>
                </div>
            </div>
            <!-- Question 6 -->
            <div class="question">
                <label for="q6">6. How can you add a comment in JavaScript?</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="<!-- This is a comment -->">
                    <label class="form-check-label">&lt;!-- This is a comment --&gt;</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="// This is a comment">
                    <label class="form-check-label">// This is a comment</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="* This is a comment *">
                    <label class="form-check-label">* This is a comment *</label>
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
