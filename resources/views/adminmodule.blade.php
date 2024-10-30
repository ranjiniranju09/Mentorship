<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= FontAwesome and Bootstrap ======= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> <!-- Update path to your font-awesome -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa1uMRHI8mK4K6pi/4jllnjt6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            width: 50px;
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
            background-color: darkcyan;
           
        }
        .navigation ul li.active a {
            background: darkcyan;
            color: black;
        }

        .navigation ul li.active a:hover {
            background: darkcyan;
            color: black;
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
            padding: 0 5px;
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

        .academic-record
        {
            align-items: center;
            margin-left: 400px;


        }
        .chartContainer 
        {
            margin-top: 15px;
            width: 500px;
        }
        .tableContainer
        {
            margin-top: 30px;
            width: 900px;
            margin-left: 200px;
        }

        .panel-default {
            margin-top: 30px;
            width: 900px;
            margin-left: 200px;
            text-align: center;
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
            <a href="{{ route('dashboardadmin') }}">
                    <span class="icon"><i class="fas fa-circle-user fa-2xl"></i></span>
                    <h5><span class="title">Admin</span></h5>
                </a>
            </li>
            <li class="active">
                <a href="">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="title" >Dashboard</span>
                </a>
            </li>
            <li>

                <a href="{{ route('mentorprofile')}}">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{route('adminsession')}}">
                    <span class="icon"><i class="fa-solid fa-users"></i></span>
                    <span class="title">Session</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminresource') }}">
                    <span class="icon"><i class="fa-solid fa-link"></i></ion-icon></span>
                    <span class="title">Resources</span>
                </a>
            </li>
            <li>
                <a href="{{route('opportunity')}}">
                    <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                    <span class="title">Opportunity</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-ticket"></i></span>
                    <span class="title">Tickets</span>
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

        <!-- ======================= content ================== -->
        <div class="academic-record">
            <h4>Overall Module Progress</h4>
            <div class="toggle-buttons">
                <button class="btn btn-secondary" id="overallmoduleBtn">Overall Module Progress</button>
                <button class="btn btn-success" id="tableViewBtn">Table View</button> <!-- New Button -->
                <button class="btn btn-primary" id="moduleViewBtn">Module OverView</button> <!-- New Button -->
            </div>
            <div class="chartContainer" id="chartContainer">
                <canvas id="progressChart" class="chart-size"></canvas>
            </div>
        </div>

        <div class="tableContainer" id="tableContainer" style="display: none;">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Assigned Mentor</th>
                        <th>Module Completed</th>
                        <th>Modules Pending</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Jane Smith</td>
                        <td>3</td>
                        <td>2</td>
                        <td><a href="#" class="btn btn-primary">View</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mary Johnson</td>
                        <td>Chris Lee</td>
                        <td>4</td>
                        <td>1</td>
                        <td><a href="#" class="btn btn-primary">View</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>James Brown</td>
                        <td>Patricia Green</td>
                        <td>2</td>
                        <td>3</td>
                        <td><a href="#" class="btn btn-primary">View</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Modal HTML code -->
        <div class="modal fade" id="studentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Dynamic content goes here -->
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Name:</div>
                                <div class="col-sm-8" id="studentName"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Assigned Mentor:</div>
                                <div class="col-sm-8" id="assignedMentor"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Pending Tasks:</div>
                                <div class="col-sm-8" id="pendingTasks"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Completed Tasks:</div>
                                <div class="col-sm-8" id="completedTasks"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Sessions Attended:</div>
                                <div class="col-sm-8" id="sessionsAttended"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Total Modules:</div>
                                <div class="col-sm-8" id="totalModules"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Completed Modules:</div>
                                <div class="col-sm-8" id="completedModules"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Total Chapters:</div>
                                <div class="col-sm-8" id="totalChapters"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Completed Chapters:</div>
                                <div class="col-sm-8" id="completedChapters"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Total Quizzes:</div>
                                <div class="col-sm-8" id="totalQuizzes"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Completed Quizzes:</div>
                                <div class="col-sm-8" id="completedQuizzes"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Pending Quizzes:</div>
                                <div class="col-sm-8" id="pendingQuizzes"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default" id="moduleProgressContainer" style="display: none;">
            <div class="panel-heading">
                <h4>Modulewise Progress</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Module</th>
                            <th>Total Mentee Completed</th>
                            <th>Total Mentee Pending</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-toggle="collapse" data-target=".demo1-1" class="accordion-toggle">
                            <td><button class="btn btn-default btn-xs" onclick="toggleCollapse('.demo1-1')"><span><i class="fa-solid fa-eye"></i></span></button></td>
                            <td>Module 1</td>
                            <td>5</td>
                            <td>0</td>
                            <td>86%</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="hiddenRow">
                                <div class="accordian-body collapse demo1-1">
                                    <table class="table table-striped">
                                        <thead class="thead-light">
                                            <tr class="info">
                                                <th>Chapter</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Total Mentee Completed</th>
                                                <th>Total Mentee Pending</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>chapter 1</td>
                                                <td>Completed</td>
                                                <td>80%</td>
                                                <td>10</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 2</td>
                                                <td>Completed</td>
                                                <td>75%</td>
                                                <td>9</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 3</td>
                                                <td>Completed</td>
                                                <td>85%</td>
                                                <td>8</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 4</td>
                                                <td>Completed</td>
                                                <td>80%</td>
                                                <td>9</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 5</td>
                                                <td>Completed</td>
                                                <td>90%</td>
                                                <td>7</td>
                                                <td>3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr data-toggle="collapse" data-target=".demo1-2" class="accordion-toggle">
                            <td><button class="btn btn-default btn-xs" onclick="toggleCollapse('.demo1-2')"><span><i class="fa-solid fa-eye"></i></span></button></td>
                            <td>Module 2</td>
                            <td>4</td>
                            <td>1</td>
                            <td>80%</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="hiddenRow">
                                <div class="accordian-body collapse demo1-2">
                                    <table class="table table-striped">
                                        <thead class="thead-light">
                                            <tr class="info">
                                                <th>Chapter</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Total Mentee Completed</th>
                                                <th>Total Mentee Pending</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>chapter 1</td>
                                                <td>Completed</td>
                                                <td>80%</td>
                                                <td>8</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 2</td>
                                                <td>Completed</td>
                                                <td>85%</td>
                                                <td>7</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 3</td>
                                                <td>Completed</td>
                                                <td>75%</td>
                                                <td>9</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 4</td>
                                                <td>Completed</td>
                                                <td>90%</td>
                                                <td>6</td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>chapter 5</td>
                                                <td>Pending</td>
                                                <td>0%</td>
                                                <td>0</td>
                                                <td>10</td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Content-->
    </div>

    <script>
        // Menu toggle
        const menuToggle = document.querySelector('.toggle');
        const navigation = document.querySelector('.navigation');
        const main = document.querySelector('.main');

        menuToggle.addEventListener('click', () => {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        });

        function toggleCollapse(target) {
            const allCollapses = document.querySelectorAll('.accordian-body');
            allCollapses.forEach(collapse => {
                if (collapse.classList.contains(target.substring(1))) {
                    $(collapse).collapse('toggle');
                } else {
                    $(collapse).collapse('hide');
                }
            });
        }
    </script>
        <script>
            document.getElementById('overallmoduleBtn').addEventListener('click', function() {
            document.getElementById('chartContainer').style.display = 'block';
            document.getElementById('tableContainer').style.display = 'none';
            document.getElementById('moduleProgressContainer').style.display = 'none';
        });

        document.getElementById('tableViewBtn').addEventListener('click', function() {
            document.getElementById('chartContainer').style.display = 'none';
            document.getElementById('tableContainer').style.display = 'block';
            document.getElementById('moduleProgressContainer').style.display = 'none';
        });

        document.getElementById('moduleViewBtn').addEventListener('click', function() {
            document.getElementById('chartContainer').style.display = 'none';
            document.getElementById('tableContainer').style.display = 'none';
            document.getElementById('moduleProgressContainer').style.display = 'block';
        });

            // Data for the chart
            const totalModules = 10; // Replace with the total number of modules
            const completedModules = 7; // Replace with the number of completed modules
            const remainingModules = totalModules - completedModules;

            const moduleData = {
                labels: ['Students Completed All Modules', 'Students Pending Modules'],
                datasets: [{
                    label: 'Modules Count',
                    data: [completedModules, remainingModules],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Configuration options
            const config = {
                type: 'doughnut',
                data: moduleData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Overall Module Count'
                        }
                    }
                }
            };

            // Render the chart
            const progressChart = new Chart(
                document.getElementById('progressChart'),
                config
            );
        
        
            // Dummy data for students - this would come from your backend in a real application
            const students = {
                1: {
                    name: "John Doe",
                    mentor: "Jane Smith",
                    pendingTasks: 2,
                    completedTasks: 3,
                    sessionsAttended: 5,
                    totalModules: 10,
                    completedModules: 3,
                    totalChapters: 20,
                    completedChapters: 12,
                    totalQuizzes: 15,
                    completedQuizzes: 10,
                    pendingQuizzes: 5
                },
                2: {
                    name: "Mary Johnson",
                    mentor: "Chris Lee",
                    pendingTasks: 1,
                    completedTasks: 4,
                    sessionsAttended: 6,
                    totalModules: 10,
                    completedModules: 4,
                    totalChapters: 20,
                    completedChapters: 16,
                    totalQuizzes: 15,
                    completedQuizzes: 14,
                    pendingQuizzes: 1
                },
                3: {
                    name: "James Brown",
                    mentor: "Patricia Green",
                    pendingTasks: 3,
                    completedTasks: 2,
                    sessionsAttended: 4,
                    totalModules: 10,
                    completedModules: 2,
                    totalChapters: 20,
                    completedChapters: 8,
                    totalQuizzes: 15,
                    completedQuizzes: 6,
                    pendingQuizzes: 9
                }
            };

            // Function to populate modal with student details
            function populateModal(studentId) {
                const student = students[studentId];

                if (student) {
                    document.getElementById('studentName').textContent = student.name;
                    document.getElementById('assignedMentor').textContent = student.mentor;
                    document.getElementById('pendingTasks').textContent = student.pendingTasks;
                    document.getElementById('completedTasks').textContent = student.completedTasks;
                    document.getElementById('sessionsAttended').textContent = student.sessionsAttended;
                    document.getElementById('totalModules').textContent = student.totalModules;
                    document.getElementById('completedModules').textContent = student.completedModules;
                    document.getElementById('totalChapters').textContent = student.totalChapters;
                    document.getElementById('completedChapters').textContent = student.completedChapters;
                    document.getElementById('totalQuizzes').textContent = student.totalQuizzes;
                    document.getElementById('completedQuizzes').textContent = student.completedQuizzes;
                    document.getElementById('pendingQuizzes').textContent = student.pendingQuizzes;

                    $('#studentDetailsModal').modal('show');
                }
            }

            // Event listener for view buttons
            document.querySelectorAll('.btn-primary').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const studentId = event.target.closest('tr').children[0].textContent;
                    populateModal(studentId);
                });
            });
        </script>
        <script>
            function toggleCollapse(selector) {
                $(selector).collapse('toggle');
            }
        </script>


</body>

</html>
