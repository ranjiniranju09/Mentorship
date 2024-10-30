<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules</title>
    <!-- Bootstrap CSS -->
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
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                text-align: center;
                float: none;
            }
            .content {
                margin-left: 0;
            }
        }
        .academic-record, .assigned-tasks, .calendar, .mentor-details, .notifications, .resources, .meetings {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .academic-record:hover, .assigned-tasks:hover, .mentor-details:hover, .notifications:hover, .resources:hover {
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
        /* FullCalendar overrides */
        #calendar {
            max-width: 100%;
            margin: 0 auto;
        }
        .resource-item {
            padding: 10px;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .resource-item:hover {
            background-color: #f0f0f0;
            transform: translateY(-3px);
        }
        .resource-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .resource-description {
            font-size: 14px;
            color: #666;
        }
        .resource-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .resource-link:hover {
            text-decoration: underline;
        }
        /* Ticket Table */
        .ticket-table th, .ticket-table td {
            text-align: center;
            vertical-align: middle;
        }
        .ticket-table .btn {
            margin: 0 2px;
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
            <a href="{{route('dashboardmentee')}}"><i class="fa-solid fa-house"></i>&nbsp; Home</a>
            <a href="{{route('menteeprofile')}}"><i class="fa-solid fa-user"></i>&nbsp; Profile</a>
            <a href="{{route('modules')}}"><i class="fa-solid fa-book"></i>&nbsp; Modules</a>
            <a href="{{route('taskmentee')}}"><i class="fa-solid fa-list-check"></i>&nbsp; Task</a>
            <a href="{{route('calender')}}"><i class="fa-solid fa-calendar-days"></i>&nbsp; Calendar</a>
            <a href="{{route('tickets')}}"><i class="fa-solid fa-ticket"></i>&nbsp; Ticket</a></a>
            <a href="{{route('sessionmentee')}}"><i class="fa-solid fa-user-group"></i>&nbsp; Sessions</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>&nbsp; Sign Out</a>
        </div>
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-header-wrapper">
                        <div class="topbar">
                            <div class="dashboard-header">
                                <i class="fa-solid fa-graduation-cap fa-beat fa-2xl"></i>
                                <span class="greeting">Hi, Rahul</span>
                            </div>
                            <div class="toggle">
                                <ion-icon name="menu-outline"></ion-icon>
                            </div>
                            <div class="search">
                                <label>
                                    <input type="text" placeholder="Search here">
                                    <ion-icon name="search-outline"></ion-icon>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Ticket Table Section -->
                    <div class="ticket-table-section">
                        <h4>Ticket Details</h4><a href="#" class="btn btn-success" data-toggle="modal" data-target="#newTicketModal">New Ticket</a>
                        </br>
                        </br>
                       
                    </div>
                    
                    <!-- Resolved Ticket Table Section -->
                    <div class="resolved-ticket-table-section">
                        <h4>Resolved Ticket Details</h4>
                        <table class="table table-bordered ticket-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ticket No</th>
                                    <th>User ID</th>
                                    <th>Category</th>
                                    <th>Query</th>
                                    <th>Status</th>
                                    <!-- <th>Response</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>54321</td>
                                    <td>09876</td>
                                    <td>Billing</td>
                                    <td>Incorrect invoice</td>
                                    <td>Closed</td>
                                    <!-- <td>Issue resolved.</td> -->
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#resolvedTicketModal">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Resolved Ticket Modal -->
                    <div class="modal fade" id="resolvedTicketModal" tabindex="-1" role="dialog" aria-labelledby="resolvedTicketModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="resolvedTicketModalLabel">Resolved Ticket Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Ticket No:</strong> 54321</p>
                                    <p><strong>User ID:</strong> 09876</p>
                                    <p><strong>Category:</strong> Billing</p>
                                    <p><strong>Query:</strong> Incorrect invoice</p>
                                    <p><strong>Status:</strong> Closed</p>
                                    <p><strong>Response:</strong> We are looking into if . once we clear it we will get back to you </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Ticket Modal -->
                    <div class="modal fade" id="newTicketModal" tabindex="-1" role="dialog" aria-labelledby="newTicketModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newTicketModalLabel">New Ticket</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="newTicketForm">
                                        <div class="form-group">
                                            <label for="userid">User ID</label>
                                            <input type="text" class="form-control" id="userid" value="09876" disabled>
                                        </div>
                                        <div class="form-group">   
                                            <label for="category">Category</label>
                                            <select class="form-control" id="category">
                                                <option>---Select---</option>
                                                <option>Technical</option>
                                                <option>Profile related</option>
                                                <option>General</option>
                                                <option>Password related</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="query">Query</label>
                                            <textarea class="form-control" id="query" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="query">Attachment</label>
                                            <input type="file" class="form-control" id="attachment" rows="3"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Bootstrap JS, jQuery, and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- FullCalendar JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            $('#newTicketForm').on('submit', function(event) {
                event.preventDefault();
                var userid = $('#userid').val;
                var category = $('#category').val();
                var query = $('#query').val();
                var attachment = $('#attachment').val();
                
                if (userid && category && query && attachment) {
                    alert('Ticket Submitted: '+ userid + ' - ' + category + ' - ' + query + ' - ');
                    $('#newTicketModal').modal('hide');
                } else {
                    alert('Please fill in all fields.');
                }
            });
        });
    </script>
</body>
</html>
