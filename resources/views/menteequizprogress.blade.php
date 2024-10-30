<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard</title>
    <!-- ======= FontAwesome and Bootstrap ======= -->
     
    <!-- Bootstrap JS, Popper.js, and jQuery (needed for Bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa1uMRHI8mK4K6pi/4jllnjt6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #2a2185;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--gray);
        }
        
        .container {
            position: relative;
            width: 100%;
        }

        .navigation {
            position: fixed;
            width: 270px;
            height: 100%;
            background: var(--black1);
            transition: 0.5s;
            overflow: hidden;
        }
        .navigation.active {
            width: 80px;
        }

        .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
        }

        .navigation ul li a {
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
            padding: 8px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navigation ul li a:hover {
            color: var(--black1);
            background-color: #ffffff;

        }

        .navigation ul li a .icon {
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
        }

        .navigation ul li a .title {
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }

        .main {
            margin-left: 270px;
            transition: 0.5s;
        }

        .main.active {
            margin-left: 80px;
        }

        .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background: var(--white);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .toggle {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .search {
            width: 400px;
            position: relative;
        }

        .search input {
            width: 100%;
            height: 40px;
            border-radius: 20px;
            padding: 0 20px;
            padding-left: 40px;
            font-size: 16px;
            border: 1px solid var(--black2);
            outline: none;
        }

        .search ion-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1.2rem;
        }

        .user {
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .user img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        a {
            text-decoration: none;
        }
        .chart-size {
            width: 80% !important;
            height: 400px !important;
        }
        .academic-record, .quiz-progress {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
        }
        .toggle-buttons {
            margin-bottom: 20px;
        }
        .panel-default {
            margin: 20px 0;
            padding: 20px;
            width: 1000px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: none; /* Hide the table by default */


        }

        .panel-default h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .table thead {
            background-color: #343a40;
            color: #fff;
        }

        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }

        .table td[rowspan] {
            vertical-align: middle !important;
        }
        
        @media (max-width: 768px) {
            .navigation {
                left: -300px;
            }

            .navigation.active {
                left: 0;
            }

            .main {
                margin-left: 0;
            }

            .main.active {
                margin-left: 300px;
            }
        }

        @media (max-width: 480px) {
            .navigation.active {
                width: 100%;
                left: 0;
            }

            .main.active .toggle {
                color: #fff;
                position: fixed;
                right: 0;
                left: initial;
            }
        }
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="navigation">
        <ul>
            <li>
            <a href="{{ route('dashboardmentor') }}">
                    <span class="icon"><i class="fas fa-circle-user fa-2xl"></i></span>
                    <h4><span class="title">Mentor</span></h4>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboardmentor') }}">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentorprofile')}}">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menteesessionprogress') }}">
                    <span class="icon"><i class="fa-solid fa-users"></i></span>
                    <span class="title">Session</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menteetaskprogress') }}">
                    <span class="icon"><i class="fa-solid fa-list"></i></ion-icon></span>
                    <span class="title">Task</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentorresourceadd') }}">
                    <span class="icon"><i class="fa-solid fa-link"></i></ion-icon></span>
                    <span class="title">Resources</span>
                </a>
            </li>
            <li>
                <a href="{{route('mentorjobs')}}">
                    <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                    <span class="title">Jobs</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-certificate"></i></span>
                    <span class="title">Certificate</span>
                </a>
            </li>
           
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <!-- ================ Top Bar ================= -->
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- Search -->
            <div class="search">
                <label>
                    <ion-icon name="search-outline"></ion-icon>
                    <input type="text" placeholder="Search Here">
                </label>
            </div>

            <!-- User Image -->
            <div class="user">
                <a href="#"><i class="fa-solid fa-user fa-beat fa-2xl"></i></a>
            </div>
        </div>

        <!-- ======================= pie chart for module progress ================== -->
        <div class="academic-record">
            <h4>Quiz Progress</h4>
            <div class="toggle-buttons">
                <button class="btn btn-primary" id="overallBtn">Overall Progress</button>
                <button class="btn btn-secondary" id="chapterwiseBtn">Modulewise Progress</button>
                <button class="btn btn-success" id="tableViewBtn">Table View</button> <!-- New Button -->
            </div>
            <canvas id="quizChart" class="chart-size"></canvas>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Chapterwise Quiz Progress</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Module</th>
                                <th>Completed</th>
                                <th>Pending</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-toggle="collapse" data-target=".demo1" class="accordion-toggle">
                                <td><button class="btn btn-default btn-xs"><span><i class="fa-solid fa-eye"></i></span></button></td>
                                <td>Module 1</td>
                                <td>4</td>
                                <td>1</td>
                                <td>80%</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="hiddenRow">
                                    <div class="accordian-body collapse demo1">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr class="info">
                                                    <th>Chapter</th>
                                                    <th>Status</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>chapter 1</td>
                                                    <td>Completed</td>
                                                    <td>80%</td>
                                                </tr>
                                                <tr>
                                                    <td>chapter 2</td>
                                                    <td>Completed</td>
                                                    <td>75%</td>
                                                </tr>
                                                <tr>
                                                    <td>chapter 3</td>
                                                    <td>Completed</td>
                                                    <td>85%</td>
                                                </tr>
                                                <tr>
                                                    <td>chapter 4</td>
                                                    <td>Completed</td>
                                                    <td>80%</td>
                                                </tr>
                                                <tr>
                                                    <td>chapter 5</td>
                                                    <td>pending</td>
                                                    <td>0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Menu toggle script
        const menuToggle = document.querySelector('.toggle');
        const navigation = document.querySelector('.navigation');
        const main = document.querySelector('.main');

        menuToggle.addEventListener('click', () => {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        });

        // Function to show the panel default (table view)
        function showTable() {
            if (quizChart) quizChart.destroy(); // Destroy any existing chart
            document.getElementById('quizChart').style.display = 'none'; // Hide the chart canvas
            var panels = document.getElementsByClassName('panel-default'); // Get all elements with class 'panel-default'
            if (panels.length > 0) {
                panels[0].style.display = 'block'; // Display the first element with class 'panel-default'
            }
        }

        // Event listener for the table view button
        document.getElementById('tableViewBtn').addEventListener('click', showTable);

        // Chart.js initialization and chart creation functions
        var ctx = document.getElementById('quizChart').getContext('2d');
        var quizChart;

        function createOverallChart() {
            if (quizChart) quizChart.destroy();
            document.getElementById('quizChart').style.display = 'block';
            var panels = document.getElementsByClassName('panel-default');
            if (panels.length > 0) {
                panels[0].style.display = 'none';
            }
            quizChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Completed', 'Pending'],
                    datasets: [{
                        label: 'Quizzes',
                        data: [5, 21],
                        backgroundColor: ['rgba(40, 167, 69, 0.7)', 'rgba(220, 53, 69, 0.7)'],
                        borderColor: ['rgba(40, 167, 69, 1)', 'rgba(220, 53, 69, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function createpaneldefaultChart() {
            if (quizChart) quizChart.destroy();
            document.getElementById('quizChart').style.display = 'block';
            var panels = document.getElementsByClassName('panel-default');
            if (panels.length > 0) {
                panels[0].style.display = 'none';
            }
            quizChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Module 1', 'Module 2', 'Module 3', 'Module 4', 'Module 5', 'Module 6'],
                    datasets: [{
                            label: 'Completed',
                            data: [3, 1, 2, 4, 1, 0],
                            backgroundColor: 'rgba(40, 167, 69, 0.7)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Pending',
                            data: [0, 2, 1, 1, 3, 4],
                            backgroundColor: 'rgba(220, 53, 69, 0.7)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        }

        document.getElementById('overallBtn').addEventListener('click', createOverallChart);
        document.getElementById('chapterwiseBtn').addEventListener('click', createpaneldefaultChart);
        document.getElementById('tableViewBtn').addEventListener('click', showTable);

        // Initialize with overall chart
        createOverallChart();

        // Delete session action
        $('.delete-session').click(function(event) {
                event.preventDefault();
                var sessionId = $(this).data('session-id');
                if(confirm("Are you sure you want to delete this session?")) {
                    alert("Session " + sessionId + " has been deleted.");
                    // Add your delete logic here (e.g., AJAX call to delete the session)
                }
            });
    </script>
   
</body>

</html>
