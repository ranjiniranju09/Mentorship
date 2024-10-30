<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chapters</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    
    <style>
        body {
            font-family: "Ubuntu", sans-serif;
            background-color: #f4f7f6;
        }
        .sidebar {
            position: fixed;
            width: 250px;
            height: 100%;
            background: linear-gradient(to bottom, #000000, #4ca1af);
            transition: 0.5s;
            overflow: hidden;
        }
        .sidebar a {
            position: relative;
            display: block;
            width: 100%;
            text-decoration: none;
            color: white;
            padding: 15px 10px;
            margin-bottom: 10px;
            align-content: center;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            color: #cc66ff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar .hovered a {
            color: blue;
        }
        .sidebar a i {
            margin-right: 15px;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .icon-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .icon-title i {
            margin-right: 10px;
        }
        .breadcrumb-container {
            margin-left: 270px;
            padding: 20px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .breadcrumb-container a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .breadcrumb-container a:hover {
            color: #0056b3;
        }
        .accordion .chapter {
            display: none;
        }
        .accordion .chapter.active {
            display: block;
        }
        .chapter-title {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }
        .chapter-description {
            color: #6c757d;
            margin-bottom: 10px;
        }
        .chapter-objectives {
            margin-bottom: 10px;
        }
        .chapter-objectives h5 {
            color: #17a2b8;
        }
        .chapter-resources {
            margin-bottom: 10px;
        }
        .chapter-resources h5 {
            color: #28a745;
        }
        .chapter-link {
            display: inline-block;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #007bff;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            margin-right: 10px;
        }
        .chapter-link:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <a href="{{route('dashboardmentee')}}">
        <span class="icon">
            <i class="fa-solid fa-circle-user fa-2xl"></i> &nbsp;
        </span> 
        <span class="title"> Mentee </span>
    </a>
    <div class="icon-title">
        <i class="fa-brands fa-js fa-2xl" style="color: #FFD43B;"></i> &nbsp;
        <h4 class="text" style="color: #fff; margin: 0;">JavaScript</h4>
    </div>
    <a href="#chapter1">Chapter 1.1 : Introduction </a>
    <a href="#chapter2">Chapter 1.2 : JavaScript Functions and Events </a>
    <a href="#chapter3">Chapter 1.3: Advanced Topics</a>
    <a href="#chapter4">Chapter 1.4: Summary</a>
</div>

<div class="breadcrumb-container">
    <a href="{{route('chapters')}}" onclick="history.back()">Back</a>
    <a href="#" id="nextChapter">Next</a>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-1">
                <div> 
                    <h2>Introduction</h2>
                    <hr>
                </div>
                <div class="accordion" id="chapterAccordion">
                    <!-- Chapter 1 -->
                    <div class="card" id="chapter1">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Chapter 1.1: JavaScript Introduction
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#chapterAccordion">
                            <div class="card-body">
                                <h3 class="chapter-title">Chapter 1: Introduction</h3>
                                <p class="chapter-description">Learn about the basics of our course.</p>
                                <div class="chapter-objectives">
                                    <h5>Learning Objectives:</h5>
                                    <ul>
                                        <h6>JavaScript is one of the 3 languages all web developers must learn: </h6> 
                                        <li>1. HTML to define the content of web pages</li> 
                                        <li>2. CSS to specify the layout of web pages</li>    
                                        <li>3. JavaScript to program the behavior of web pages</li>
                                    </ul>
                                </div>
                                <a href="https://www.tutorialspoint.com/javascript/index.htm" target="_blank" class="btn btn-info">Related Link</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chapter 2 -->
                    <div class="card" id="chapter2">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Chapter 1.2 : JavaScript Functions and Events                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#chapterAccordion">
                            <div class="card-body">
                                <h3 class="chapter-title">Chapter 2: Basics</h3>
                                <p class="chapter-description">Dive into the basic concepts.</p>
                                <div class="chapter-objectives">
                                    <ul>
                                        A JavaScript function is a block of JavaScript code, that can be executed when "called" for.
                                        For example, a function can be called when an event occurs, like when the user clicks a button.
                                    </ul>
                                    <ul>
                                        Example:
                                    </ul>
                                </div>
                                <div class="chapter-resources">
                                    <ul>
                                        <li><a href="resource3.pdf" class="chapter-link">Related PDF</a></li><br>
                                        <li><a href="video3.mp4" class="chapter-link">Related video Video</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chapter 3 -->
                    <div class="card" id="chapter3">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Chapter 3: Javascript Loops
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#chapterAccordion">
                            <div class="card-body">
                                <h3 class="chapter-title">Chapter 3: JavaScript Loops</h3>
                                <p class="chapter-description">Explore Loops and else statements .</p>
                                <div class="chapter-objectives">
                                    <h5>Learning Objectives:</h5>
                                    <ul>
                                        <li>1. For Loops</li>
                                        <li>2. While Loops</li>
                                        <li>3. do - while loops</li>
                                        <li>4. If statements</li>
                                        <li>5. if-else statements</li>
                                        <li>6. Nested if's</li>
                                    </ul>
                                </div>
                                <div class="chapter-resources">
                                    <ul>
                                        <li><a href="resource3.pdf" class="chapter-link">Related PDF</a></li><br>
                                        <li><a href="video3.mp4" class="chapter-link">Related video Video</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="chapter-link" target="_blank">Read more</a>
                                <!-- <button type="button" class="chapter-link btn btn-warning">Quiz</button> -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chapter 4 -->
                    <div class="card" id="chapter4">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Chapter 4: Summary
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#chapterAccordion">
                            <div class="card-body">
                                <h3 class="chapter-title">Chapter 4: Example Programs</h3>
                                <p class="chapter-description">Summary of the course.</p>
                                <div class="chapter-objectives">
                                    <h5>Learning Objectives:</h5>
                                    <ul>
                                        <li>Recap of main topics</li>
                                        <li>Review key concepts</li>
                                        <li>Prepare for assessments</li>
                                    </ul>
                                </div>
                                <div class="chapter-resources">
                                    <ul>
                                        <li><a href="resource3.pdf" class="chapter-link">Related PDF</a></li><br>
                                        <li><a href="video3.mp4" class="chapter-link">Related video Video</a></li>
                                    </ul>
                                </div>
                                <a href="{{route('quiz')}}" target="_blank" class="chapter-link btn-warning"><i class="fas fa-question-circle"></i> Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.16/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- FullCalendar JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const chapters = document.querySelectorAll(".card");
    const nextChapterButton = document.getElementById("nextChapter");

    let currentChapterIndex = 0;

    nextChapterButton.addEventListener("click", function(event) {
        event.preventDefault();
        currentChapterIndex++;

        if (currentChapterIndex >= chapters.length) {
            currentChapterIndex = 0;  // Reset to the first chapter if it's the last one
        }

        const nextChapter = chapters[currentChapterIndex];
        nextChapter.scrollIntoView({ behavior: 'smooth' });

        // Optionally, you can also expand the chapter if it's collapsed
        const collapse = nextChapter.querySelector('.collapse');
        if (collapse) {
            $(collapse).collapse('show');
        }
    });
});
</script>
</body>
</html>
