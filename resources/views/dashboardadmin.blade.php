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

        .card {
            border-radius: 1rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 150px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background-color 0.3s;
            background-color:darkcyan;
            color: black;
        }
        .card:hover {
            background-color: var(--white);
            color: black;
            transform: scale(1.05);
        }
        .numbers {
            font-size: 1.5rem;
            font-weight: 500;
        }
        .cardName {
            font-size: 1.1rem;
            /* margin-top: 2px; */
        }
        .iconBx {
            margin-top: 2px;
        }
        .table {
            width: 100%;
            margin-left: 30px;
            }

            .progress {
            height: 20px;
            }

            .badge {
            font-size: 1rem;
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
                <a href="{{ route('dashboardadmin') }}">
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
                <a href="#">
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
                <a href="{{route('showcertificate')}}">
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

        <!-- ======================= Cards ================== -->
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">2</div>
                            <div class="cardName">Total Mentor Mentee Pairs</div>
                            <div class="iconBx">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">3</div>
                            <div class="cardName">Registered Mentors</div>
                            <div class="iconBx">
                            <i class="fa-solid fa-chalkboard-user"></i></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">3</div>
                            <div class="cardName">Registered Mentees</div>
                            <div class="iconBx">
                            <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{route('adminmodule')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers"></div>
                            <div class="cardName">Module Overview</div>
                            <div class="iconBx">
                                <i class="fa-solid fa-diagram-project"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{route('adminsession')}}" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers"></div>
                            <div class="cardName">Sessions Overview</div>
                            <div class="iconBx">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#"  class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">1</div>
                            <div class="cardName">Total Guest Lectures</div>
                            <div class="iconBx">
                            <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{route('adminquizprogress')}}"  class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">1</div>
                            <div class="cardName">Total Quiz Progress</div>
                            <div class="iconBx">
                            <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="numbers">60</div>
                            <div class="cardName">Total Minutes Mentored</div>
                            <div class="iconBx">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <h3 style="margin-left: 40px;"> Top Mentor</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Mentor</th>
                        <th scope="col">Achievements</th>
                        <th scope="col">Progress</th>
                        <th scope="col">Badge</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Mentor 1</td>
                        <td>75%</td>
                        <td>
                            <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td><span class="badge badge-success">Expert</span></td>
                        </tr>
                        <tr>
                        <td>Mentor 2</td>
                        <td>50%</td>
                        <td>
                            <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td><span class="badge badge-warning">Intermediate</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4 mb-4">
            </div>
        </div> -->
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
    </script>
</body>

</html>
