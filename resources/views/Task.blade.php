<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        .topbar, .dashboard-header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar {
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
            margin: 0 10px;
            position: relative;
        }
        .search label {
            width: 100%;
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
        .user {
            width: 100px;
            height: 50px;
            cursor: pointer;
        }
        .user img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .greeting {
            font-size: 24px;
            color: green;
            font-weight: bold;
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
        .dashboard-header-wrapper {
            margin-bottom: 30px;
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
        .academic-record, .assigned-tasks, .calendar, .mentor-details, .notifications, .recent-activities, .meetings {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .academic-record:hover, .assigned-tasks:hover, .mentor-details:hover, .notifications:hover, .recent-activities:hover, .meetings:hover {
            transform: translateY(-5px);
        }
        .progress {
            height: 20px;
            border-radius: 10px;
        }
        .module-name {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }
        .calendar-item, .notification-item, .mentor-detailsitems, .activity-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease-in-out;
        }
        .calendar-item:last-child, .notification-item:last-child, .activity-item:last-child {
            border-bottom: none;
        }
        .calendar-item:hover, .notification-item:hover, .activity-item:hover {
            background-color: #f0f0f0;
            transform: scale(1.02);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .calendar-time, .notification-time, .activity-time {
            font-size: 18px;
            color: #333;
            display: block;
            font-weight: bold;
        }
        .calendar-event, .notification-event, .activity-event {
            font-size: 16px;
            color: #666;
            display: block;
        }
        .top-performer {
            text-align: center;
            margin-top: 30px;
        }
        .top-performer img {
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .top-performer h3 {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
        .top-performer p {
            color: #666;
        }
        .card-icon {
            font-size: 36px;
            margin-bottom: 20px;
            transition: transform 0.3s;
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
        .custom-card.project {
            border-left: 5px solid #007bff;
        }
        .custom-card.task {
            border-left: 5px solid #28a745;
        }
        .custom-card.quizzes {
            border-left: 5px solid #ffc107;
        }
        .custom-card.project .card-icon {
            color: #007bff;
        }
        .custom-card.task .card-icon {
            color: #28a745;
        }
        .custom-card.quizzes .card-icon {
            color: #ffc107;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9f7fe;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .table-container {
            padding: 10px;
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .modal-header {
            background-color: #f8f9fa;
        }

        .modal-footer {
            background-color: #f8f9fa;
        }

        /* .table-container {
            margin-top: 20px;
        } */

    </style>
</head>
<body>
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
            <a href="{{route('taskmentee')}}"><i class="fa-solid fa-list-check"></i>&nbsp; Task</a>
            <a href="{{route('calender')}}"><i class="fa-solid fa-calendar-days"></i>&nbsp; Calendar</a>
            <a href="{{route('tickets')}}"><i class="fa-solid fa-ticket"></i>&nbsp; Ticket</a></a>
            <a href="{{route('sessionmentee')}}"><i class="fa-solid fa-user-group"></i>&nbsp; Sessions</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>&nbsp; Sign Out</a>
        </div>
    <div class="content">
        <div class="topbar">
            <div class="toggle"><i class="fa-solid fa-bars"></i></div>
            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
            <!-- <div class="user">
            <a href="#"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>Sign Out</a>
            </div> -->
        </div>
        
        <div class="container">
            <h2>Assigned Tasks</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Task</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>June 1, 2024</td>
                            <td>Complete Project Proposal</td>
                            <td>June 10, 2024</td>
                            <td>In Progress</td>
                            <td>
                                <button class="btn btn-success" onclick="openModal('Complete Project Proposal', 'June 10, 2024', 'In Progress')">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>June 2, 2024</td>
                            <td>Submit Report</td>
                            <td>June 15, 2024</td>
                            <td>Not Started</td>
                            <td>
                                <button class="btn btn-success" onclick="openModal('Submit Report', 'June 15, 2024', 'Not Started')">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskModalLabel">Task Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="taskForm">
                            <div class="mb-3">
                                <label for="taskTopic" class="form-label">Topic</label>
                                <input type="text" class="form-control" id="taskTopic" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="taskDueDate" class="form-label">Due Date</label>
                                <input type="text" class="form-control" id="taskDueDate" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="taskStatus" class="form-label">Status</label>
                                <input type="text" class="form-control" id="taskStatus" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="taskReply" class="form-label">Reply</label>
                                <textarea class="form-control" id="taskReply" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="taskFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="taskFile">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submitTask()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Completed Tasks</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Task</th>
                            <th>Completion Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>May 20, 2024</td>
                            <td>Finalize Topic</td>
                            <td>May 25, 2024</td>
                            <td>Completed</td>
                            <td>
                            <button class="btn btn-info" onclick="openReviewModal('Complete Project Proposal', 'June 10, 2024', 'Submitted')">Review</button>
                            </td>
                        </tr>
                        <tr>
                            <td>May 22, 2024</td>
                            <td>Draft Outline</td>
                            <td>May 28, 2024</td>
                            <td>Completed</td>
                            <td>                            
                                <button class="btn btn-info" onclick="openReviewModal('Submit Report', 'June 15, 2024', 'Submitted')">Review</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Review Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Review Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="reviewForm">
                            <div class="mb-3">
                                <label for="reviewTopic" class="form-label">Topic</label>
                                <input type="text" class="form-control" id="reviewTopic" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="reviewDueDate" class="form-label">Due Date</label>
                                <input type="text" class="form-control" id="reviewDueDate" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="reviewStatus" class="form-label">Status</label>
                                <input type="text" class="form-control" id="reviewStatus" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FullCalendar JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            $('.toggle').on('click', function() {
                $('.sidebar').toggleClass('active');
                $('.content').toggleClass('active');
            });
        });

        function openModal(topic, dueDate, status) {
        document.getElementById('taskTopic').value = topic;
        document.getElementById('taskDueDate').value = dueDate;
        document.getElementById('taskStatus').value = status;
        var myModal = new bootstrap.Modal(document.getElementById('taskModal'));
        myModal.show();
        }

        function submitTask() {
            alert('Your task is successfully submitted');
            var myModal = bootstrap.Modal.getInstance(document.getElementById('taskModal'));
            myModal.hide();
        }

        function openReviewModal(topic, dueDate, status) {
            document.getElementById('reviewTopic').value = topic;
            document.getElementById('reviewDueDate').value = dueDate;
            document.getElementById('reviewStatus').value = status;
            var reviewModal = new bootstrap.Modal(document.getElementById('reviewModal'));
            reviewModal.show();
        }

        function submitReview() {
            alert('Your review is successfully submitted');
            var reviewModal = bootstrap.Modal.getInstance(document.getElementById('reviewModal'));
            reviewModal.hide();
        }


    </script>

</body>
</html>
