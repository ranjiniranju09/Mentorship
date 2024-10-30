<!DOCTYPE html>
<html lang="en">

<head>
    <title>Real-time Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div id="message-container" class="border mt-3 p-2"></div>
                <div id="message-count" class="text-muted mt-3">Total messages: <span id="count">0</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <select id="name-input" class="form-control mb-2">
                    <option value="">Select your name</option>
                    <option value="John">John</option>
                    <option value="Alice">Alice</option>
                    <option value="Bob">Bob</option>
                    <option value="Emma">Emma</option>
                </select>
            </div>

            <div class="col-md-6">
                <input id="message-input" type="text" class="form-control mb-2"
                    placeholder="Type your message and press Enter">
            </div>
            <div class="col-md-2">
                <button id="send-button" class="btn btn-primary btn-block">Send</button>
            </div>
        </div>


    </div>

    <script src="{{ asset('build/assets/app-7a236485.js') }}"></script>

</body>

</html>