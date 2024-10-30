<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunities</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <!-- Custom CSS -->
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
            display: block;
            width: 100%;
            text-decoration: none;
            color: white;
            padding: 15px 10px;
            margin-bottom: 10px;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            color: #cc66ff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar a i {
            margin-right: 15px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 60px;
            padding: 0 10px;
        }
        .toggle {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
        }
        .search {
            width: 400px;
            position: relative;
            flex: 1;
            text-align: right;
        }
        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .search label ion-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            font-size: 1.2rem;
            transform: translateY(-50%);
        }
        .greeting {
            font-size: 24px;
            color: green;
            font-weight: bold;
        }
        .jobs {
            display: flex;
            color: #0400ff;
            justify-content: space-between;
        }
        .jobs h2 {
            margin: 0;
            flex: 1;
        }
        .start-btn {
            background-color: #5cb85c;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .start-btn:hover {
            background-color: #4cae4c;
        }
        .custom-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .custom-card:hover {
            transform: translateY(-5px);
        }
        .custom-card .card-icon {
            font-size: 36px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .custom-card.project {
            border-left: 5px solid #007bff;
        }
        .custom-card.project .card-icon {
            color: #007bff;
        }
        .filter-btns {
          text-align: center;
          margin-bottom: 20px;
          display: flex;
          justify-content: center;
          gap: 10px;
        }
        .btn-group {
          display: flex;
          gap: 5px;
        }
        .filter-btn {
          padding: 10px 10px;
          background-color: white;
          color: black;
          border: none;
          border-radius: 30%;
          width: 10%;
          cursor: pointer;
          transition: background-color 0.3s;
        }
        .filter-btn:hover {
          background-color: #2196f3;
        }
        .filter-btn.active {
          background-color: #2196f3;
        }
        .tech-stack {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
                height: 100%;
                position: fixed;
                left: -250px;
                z-index: 1000;
            }
            .sidebar.active {
                left: 0;
            }
            .content {
                margin-left: 0;
            }
            .toggle {
                display: block;
            }
           
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="sidebar">
            <a href="#">
                <span class="icon">
                    <i class="fa-solid fa-circle-user fa-2xl"></i> &nbsp;
                </span> 
                <span class="title"> Mentee </span>
            </a>
            <a href="{{route('dashboardmentee')}}"><i class="fa-solid fa-house"></i>&nbsp; Home</a>
            <a href="#"><i class="fa-solid fa-user"></i>&nbsp; Profile</a>
            <a href="{{route('modules')}}"><i class="fa-solid fa-book"></i>&nbsp; Modules</a>
            <a href="{{route('taskmentee')}}"><i class="fa-solid fa-list"></i>&nbsp; Task</a>
            <a href="{{route('calender')}}"><i class="fa-solid fa-calendar-days"></i>&nbsp; Calendar</a>
            <a href="{{route('tickets')}}"><i class="fa-solid fa-ticket"></i>&nbsp; Ticket</a>
            <a href="#"><i class="fa-solid fa-bell"></i>&nbsp; Notifications</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>&nbsp; Sign Out</a>
        </div>
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-header-wrapper">
                        <div class="topbar">
                            <div class="dashboard-header">
                                <i class="fa-solid fa-graduation-cap fa-beat fa-2xl"></i>
                                <span class="greeting">Hi, Chisom</span>
                            </div>
                            <div class="toggle">
                                <ion-icon name="menu-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="jobs">
                        <h2>Opportunities for you</h2>
                        <div class="search">
                            <label>
                                <input type="text" placeholder="Search here">
                                <ion-icon name="search-outline"></ion-icon>
                            </label>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="display-4 mb-4">Software Development Engineer - Full Stack (Delhi)</h1>

                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="font-weight-bold mb-2">Location:</h5>
                                    <p>Delhi</p>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="font-weight-bold mb-2">Experience:</h5>
                                    <p>2 - 5 years</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="font-weight-bold mb-2">Openings:</h5>
                                    <p>1</p>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="font-weight-bold mb-2">Company:</h5>
                                    <p>Unstop (formerly Dare2Compete)</p>
                                </div>
                            </div>

                            <hr>

                            <h2 class="h3 mb-4">Interview Process</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="fas fa-code mr-2"></span>
                                    Coding Round: Candidates will be given problems to solve in a fixed time.
                                </li>
                                <li class="list-group-item">
                                    <span class="fas fa-laptop-code mr-2"></span>
                                    Technical Interview I: Assessing data structures, algorithms, problem-solving, and critical thinking.
                                </li>
                                <li class="list-group-item">
                                    <span class="fas fa-user-cog mr-2"></span>
                                    Technical Interview II: Deep dive into logical reasoning, technical skills, and soft skills.
                                </li>
                            </ul>

                            <hr>

                            <h2 class="h3 mb-4">About Unstop</h2>
                            <p>Unstop is looking for Software Development Engineers- Fullstack. You will be responsible for developing applications and functionalities for our existing and new products. This involves end-to-end conceptualization and building alongside a team.</p>

                            <hr>

                            <h2 class="h3 mb-4">Responsibilities</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Write well-designed, testable, and efficient code using best practices.</li>
                                <li class="list-group-item">Integrate data from various backend services and databases.</li>
                                <li class="list-group-item">Gather and refine specifications based on technical needs.</li>
                                <li class="list-group-item">Maintain, expand, and scale existing products.</li>
                                <li class="list-group-item">Stay updated on emerging technologies and apply them in operations.</li>
                                <li class="list-group-item">Manage and code all products and services.</li>
                                <li class="list-group-item">Make products modular, flexible, scalable, and robust.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="tech-stack">
                                <h2 class="h3 mb-4">Tech Stack</h2>
                                <div class="d-flex flex-wrap">
                                    <span class="badge badge-primary mr-2 mb-2">Angular 10 or later</span>
                                    <span class="badge badge-info mr-2 mb-2">PHP Laravel</span>
                                    <span class="badge badge-success mr-2 mb-2">NodeJS</span>
                                    <span class="badge badge-warning mr-2 mb-2">MySQL 8</span>
                                    <span class="badge badge-dark mr-2 mb-2">NoSQL DB</span>
                                    <span class="badge badge-secondary mr-2 mb-2">Postgres</span>
                                    <span class="badge badge-primary mr-2 mb-2">Amazon AWS services</span>
                                </div>
                            </div>
                            <div class="tech-stack">
                                <h2 class="h3 mb-4">Additional Info</h2>
                                <div class="d-flex flex-wrap">
                                    <h4>Location(s)</h4> Delhi
                                    <h4>Experience</h4>
                                        <p>2 years 
                                        Maximum: 5 years</p>

                                    <h4>Salary</h4>    
                                    <p>    Salary : Not Disclosed </p>
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
    <!-- Custom JavaScript -->
    <script>
    $(document).ready(function() {
        // Toggle sidebar on hamburger menu click
        $('#toggle-btn').click(function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>
