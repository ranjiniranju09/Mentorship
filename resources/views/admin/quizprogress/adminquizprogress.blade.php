@extends('layouts.admin')
@section('content')
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
            max-width: 1000px; /* Adjust as needed */
            margin: auto; /* Center the container */
            padding: 20px; /* Add padding for spacing */
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
            background:darkcyan;
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
        
        .summary-table {
            width: 100%;
            margin-top: 20px;
            max-width: 100%;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .summary-table th, .summary-table td {
            padding: 15px;
            text-align: center;
        }
        /* .summary-table th {
            background-color: #007bff;
            color: #fff;
        }
        .summary-table td {
            background-color: #f8f9fa;
        } */
        .summary-table .header {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .col-md-6 {
            padding: 0 10px; /* Adjust column padding */
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
            .col-md-6 {
                padding: 0;
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
         <h2 class="text-center mb-4">Overall Quiz Details</h2>
   
    <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <table class="table summary-table">
                        <thead class="table-dark">
                            <tr>
                                <th>Metric</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Quiz</td>
                                <td>{{ $totalQuizzes }}</td>
                            </tr>
                            <tr>
                                <td>Total Quiz Completed</td>
                                <td>{{ $completedQuizzes }}</td>
                            </tr>
                            <tr>
                                <td>Total Quiz Pending</td>
                                <td>{{ $totalPendingQuizzes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="canvas-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Content-->
    </div>

@endsection
@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Assuming the data is available as Blade variables
    const moduleNames = @json($modules['moduleNames']);
    const totalQuizzes = @json($modules['totalQuizzes']);
    const completedQuizzes = @json($modules['completedQuizzes']);
    const pendingQuizzes = @json($modules['pendingQuizzes']);

    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: moduleNames,
            datasets: [{
                label: 'Module Quiz Count',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: totalQuizzes
            }, {
                label: 'Completed Quizzes',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: completedQuizzes
            }, {
                label: 'Pending Quizzes',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: pendingQuizzes
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    });
</script>
@endsection
