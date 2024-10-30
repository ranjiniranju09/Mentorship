@extends('layouts.admin')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

        .session-details {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
        }

        .chart-container {
            width: 70%;
            max-width: 700px;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
        .summary-table {
            margin: 50px auto;
            max-width: 60%;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .summary-table th, .summary-table td {
            padding: 15px;
            text-align: center;
        }
        .summary-table th {
            color: #fff;
        }
        .summary-table td {
            background-color: #f8f9fa;
        }
        .summary-table .header {
            font-size: 1.25rem;
            font-weight: bold;
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
        <!-- <div class="session-details">
            <div class="chart-container">
                <canvas id="sessionChart"></canvas>
            </div>
        </div> -->

        <div class="container mt-5">
            <h2 class="text-center mb-4">Overall Session Details</h2>
            <table class="table summary-table">
                <thead class="table-dark">
                    <tr>
                        <th>Metric</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total Sessions</td>
                        <td>{{ $totalSessions }}</td>
                    </tr>
                    <tr>
                        <td>Past Sessions</td>
                        <td>{{ $pastSessions }}</td>
                    </tr>
                    <tr>
                        <td>Upcoming Sessions</td>
                        <td>{{ $upcomingSessions }}</td>
                    </tr>
                    <tr>
                        <td>Total Guest Sessions</td>
                        <td>{{ $totalGuestSessions }}</td>
                    </tr>
                    <tr>
                        <td>Past Guest Sessions</td>
                        <td>{{ $pastGuestSessions }}</td>
                    </tr>
                    <tr>
                        <td>Upcoming Guest Sessions</td>
                        <td>{{ $upcomingGuestSessions }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('sessionChart').getContext('2d');
        const sessionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['General', 'Guest Lectures', 'Module Related', 'Chapterwise Count'],
                datasets: [{
                    label: 'Session Details',
                    data: [20, 15, 10, 12], // Data for General, Guest Lectures, Module Related, and Chapterwise Count
                    backgroundColor: [
                        '#FF6384', // Color for General
                        '#36A2EB', // Color for Guest Lectures
                        '#FFCE56', // Color for Module Related
                        '#4BC0C0'  // Color for Chapterwise Count
                    ],
                    borderColor: [
                        '#FF6384', // Border color for General
                        '#36A2EB', // Border color for Guest Lectures
                        '#FFCE56', // Border color for Module Related
                        '#4BC0C0'  // Border color for Chapterwise Count
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: '#333'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#333'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#333'
                        }
                    }
                }
            }
        });
    });
</script>

@endpush

