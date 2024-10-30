<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXGEL0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
            width: 50px;
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
        .card-icon {
            font-size: 36px;
            margin-bottom: 20px;
            transition: transform 0.3s;
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
        .smiley-rating {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .smiley-rating input {
            display: none;
        }

        .smiley-rating label {
            font-size: 2rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .smiley-rating label:hover,
        .smiley-rating input:checked + label {
            transform: scale(1.3);
        }
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
            <div class="user">
            <a href="#"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>Sign Out</a>
            </div>
        </div>
        

        <div class="container">
            <h2>Current Sessions</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Topic</th>
                            <th>Host</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>June 5, 2024</td>
                            <td>10:00 AM</td>
                            <td>Web Development</td>
                            <td>Mentor</td>
                            <td>
                                <a href="https://meet.google.com/hnq-unax-qwn" target="_blank"><button class="btn btn-success">Join</button></a> 
                            </td>
                            
                        </tr>
                        <tr>
                            <td>June 6, 2024</td>
                            <td>2:00 PM</td>
                            <td>Machine Learning</td>
                            <td>Guest Lecturer</td>
                            <td>
                                <a href="https://meet.google.com/hnq-unax-qwn" target="_blank"><button class="btn btn-success">Join</button></a>
                            </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <h2>Completed Sessions</h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Topic</th>
                            <th>Host</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>June 1, 2024</td>
                            <td>10:00 AM</td>
                            <td>Data Science</td>
                            <td>Guest Lecturer</td>
                            <td>
                            <a href="https://drive.google.com/file/d/1hRGMS7cuVAYw5DucRg43LoqpNYDwFBKv/view?usp=drive_link" target="_blank"><button class="btn btn-primary rounded">Recording</button></a>
                            <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#feedbackModal">Feedback</a>

                        </tr>
                        <tr>
                            <td>June 3, 2024</td>
                            <td>3:00 PM</td>
                            <td>AI Ethics</td>
                            <td>Mentor</td>
                            <td><button class="btn btn-primary rounded">Recording</button>
                            <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#feedbackModal">Feedback</a>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Provide Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="feedbackRating">Rating</label>
                            <div class="smiley-rating">
                                <input type="radio" id="smile5" name="rating" value="5" />
                                <label for="smile5" class="fa fa-smile" data-rating="5"></label>
                                <input type="radio" id="smile4" name="rating" value="4" />
                                <label for="smile4" class="fa fa-smile" data-rating="4"></label>
                                <input type="radio" id="smile3" name="rating" value="3" />
                                <label for="smile3" class="fa fa-meh" data-rating="3"></label>
                                <input type="radio" id="smile2" name="rating" value="2" />
                                <label for="smile2" class="fa fa-frown" data-rating="2"></label>
                                <input type="radio" id="smile1" name="rating" value="1" />
                                <label for="smile1" class="fa fa-frown" data-rating="1"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feedbackMessage">Your Feedback</label>
                            <textarea class="form-control" id="feedbackMessage" rows="3" placeholder="Share your thoughts and suggestions"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            $('.toggle').on('click', function() {
                $('.sidebar').toggleClass('active');
                $('.content').toggleClass('active');
            });

            // Open modal on feedback button click
            $('.btn-warning').click(function() {
                $('#feedbackModal').modal('show');
            });

            // Smiley rating logic
            var $smiley_rating = $('.smiley-rating label');

            var SetRatingSmiley = function() {
                var rating = parseInt($('input[name="rating"]:checked').val());
                $smiley_rating.each(function() {
                    var currentRating = parseInt($(this).data('rating'));
                    if (currentRating <= rating) {
                        $(this).addClass('selected');
                    } else {
                        $(this).removeClass('selected');
                    }
                });
            };

            $smiley_rating.on('click', function() {
                var rating = $(this).data('rating');
                $('input[name="rating"][value="' + rating + '"]').prop('checked', true);
                SetRatingSmiley();
            });

            SetRatingSmiley();
        });
    </script>
    <style>
        .smiley-rating label.selected {
            transform: scale(1.3);
        }
    </style>
</body>
</html>
