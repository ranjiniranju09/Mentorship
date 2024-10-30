<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard</title>
    <!-- ======= FontAwesome and Bootstrap ======= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 10px 20px;
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
        .content {
          margin-top: 20px;
        }

        .cardBox {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .card:hover {
            background: var(--blue);
        }

        .card:hover .numbers,
        .card:hover .cardName,
        .card:hover .iconBx {
            color: var(--white);
        }

        .numbers {
            font-size: 2rem;
            font-weight: 500;
            color: var(--black1);
        }

        .cardName {
            font-size: 1rem;
            color: var(--black2);
        }

        .iconBx {
            font-size: 2.5rem;
            color: var(--black2);
        }

        .display-session{
          margin-left: 40px;
          width:max-content;
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
                  /* ====================== Display Session table ========================== */

        .session-table {
            margin-top: 20px;
        }
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .completed {
            background-color: #666666;
            color: #fff;
        }

        .inProgress {
            background-color: #ffc107;
            color: #000;
        }

        .pending {
            background-color: #17a2b8;
            color: #fff;
        }

        .canceled {
            background-color: #dc3545;
            color: #fff;
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
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentorsessionadd') }}">
                    <span class="icon"><i class="fa-solid fa-users"></i></span>
                    <span class="title">Session</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentortaskadd') }}">
                    <span class="icon"><i class="fa-solid fa-list"></i></ion-icon></span>
                    <span class="title">Task</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentorresourceadd') }}">
                    <span class="icon"><i class="fa-solid fa-list"></i></ion-icon></span>
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
            <!-- <li>
                <a href="#">
                    <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                    <span class="title">Mentee</span>
                </a>
            </li> -->
            <li>
                <a href="#">
                    <span class="icon"><i class="fa-solid fa-gear"></i></span>
                    <span class="title">Settings</span>
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

          <div class="content">

          <!-- Display Sessions Table -->
              <div class="display-session">
                    <h2>Sessions Details</h2>
                    <span>
                      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSessionModal">
                        Add Session
                      </button>
                      <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#uploadrecording">
                        Upload Recording
                      </button>
                      <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#editSessionModal">
                        Edit Session
                      </button>
                    </span>
                    <table class="table table-bordered session-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Session ID</th>
                                <th>Title</th>
                                <th>Instructor</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Introduction to Python</td>
                                <td>Guest Lecturer</td>
                                <td>2024-06-01</td>
                                <td><span class="status completed">Completed</span></td>
                                <td><a href="https://drive.google.com/file/d/1hRGMS7cuVAYw5DucRg43LoqpNYDwFBKv/view?usp=drive_link" class="btn btn-success">View Recording</a></td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Data Science Basics</td>
                                <td>Mentor</td>
                                <td>2024-06-02</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                <td><a href="#" class="btn btn-success">Join</a></td>
                            </tr>
                            <tr>
                                <td>003</td>
                                <td>Web Development</td>
                                <td>Guest Lecturer</td>
                                <td>2024-06-03</td>
                                <td><span class="status pending">Pending</span></td>
                                <td><a href="#" class="btn btn-success">Join</a></td>
                            </tr>
                            <tr>
                                <td>004</td>
                                <td>Advanced Python</td>
                                <td>Mentor</td>
                                <td>2024-06-04</td>
                                <td><span class="status canceled">Canceled</span></td>
                            </tr>
                            <tr>
                                <td>005</td>
                                <td>Machine Learning</td>
                                <td>Mentor</td>
                                <td>2024-06-05</td>
                                <td><span class="status completed">Completed</span></td>
                                <td><a href="https://drive.google.com/file/d/1hRGMS7cuVAYw5DucRg43LoqpNYDwFBKv/view?usp=drive_link" class="btn btn-success">View Recording</a></td>
                            </tr>
                        </tbody>
                    </table>
              </div>
              <!-- Add Session Button
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSessionModal">
                  Add Session
              </button> -->
                <!-- Edit Session Button -->
                

            <div class="row">
                <!-- Add Session Modal -->
                <div class="modal fade" id="addSessionModal" tabindex="-1" role="dialog" aria-labelledby="addSessionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSessionModalLabel">Add New Session</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="sessionName">Session Name:</label>
                                        <input type="text" class="form-control" id="sessionName" name="sessionName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingDate">Meeting Date:</label>
                                        <input type="date" class="form-control" id="meetingDate" name="meetingDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingTime">Meeting Time:</label>
                                        <input type="time" class="form-control" id="meetingTime" name="meetingTime" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sessioncategory">Modules</label>
                                        <select class="form-control" id="sessioncategory" name="sessioncategory">
                                            <option>---Select Modules---</option>
                                            <option>Modules 1</option>
                                            <option>Modules 2</option>
                                            <option>Modules 3</option>
                                            <option>Modules 4</option>
                                            <option>General</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sessionlink">Session Link:</label>
                                        <input type="text" class="form-control" id="sessionlink" name="sessionlink" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Session</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Recording Modal -->
                <div class="modal fade" id="uploadrecording" tabindex="-1" role="dialog" aria-labelledby="uploadrecordingLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadrecordingLabel">Edit Session</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="sessionSelect">Select Session:</label>
                                        <select class="form-control" id="sessionSelect" name="sessionSelect">
                                            <option>----- Select here -----</option>
                                            <option>Introduction to Python</option>
                                            <option>Data Science Basics</option>
                                            <option>Web Development</option>
                                            <option>Advanced Python</option>
                                            <option>Machine Learning</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sessionVideo">Upload Recorded Video:</label>
                                        <input type="file" class="form-control" id="sessionVideo" name="sessionVideo">
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Session Modal -->
                <div class="modal fade" id="editSessionModal" tabindex="-1" role="dialog" aria-labelledby="editSessionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editSessionModalLabel">Edit Session</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="sessionName">Session Name:</label>
                                        <input type="text" class="form-control" id="sessionName" name="sessionName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingDate">Meeting Date:</label>
                                        <input type="date" class="form-control" id="meetingDate" name="meetingDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="meetingTime">Meeting Time:</label>
                                        <input type="time" class="form-control" id="meetingTime" name="meetingTime" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sessionSelect">Select Session:</label>
                                        <select class="form-control" id="sessionSelect" name="sessionSelect">
                                            <option>----- Select here -----</option>
                                            <option>Introduction to Python</option>
                                            <option>Data Science Basics</option>
                                            <option>Web Development</option>
                                            <option>Advanced Python</option>
                                            <option>Machine Learning</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
          </div>
        </div>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Menu toggle
        const menuToggle = document.querySelector('.toggle');
        const navigation = document.querySelector('.navigation');
        const main = document.querySelector('.main');

        menuToggle.addEventListener('click', () => {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        });
    </script>
</body>

</html>
