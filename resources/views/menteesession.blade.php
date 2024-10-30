<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    /* Provided CSS styles */
    .sidebar {
      position: fixed; /* Fixed position to ensure full height */
      top: 0; /* Align to the top of the viewport */
      bottom: 0; /* Align to the bottom of the viewport */
      left: 0; /* Align to the left of the viewport */
      width: 280px; /* Fixed width */
      background-color: #343a40; /* Dark background color */
      overflow-y: auto; /* Enable vertical scrolling if content exceeds height */
    }
    .nav-link {
      color: #fff; /* White text color for navbar links */
    }
    .dropdown-item {
      color: #212529; /* Dark text color for dropdown items */
    }
    .dropdown-item:hover {
      background-color: #f8f9fa; /* Light background color on hover for dropdown items */
    }
    h2 {
      color: #212529; /* Dark text color for headings */
      margin-top: 20px; /* Add some space at the top */
    }
    .card {
      border: none; /* Remove border from the cards */
      height: 200px;
      text-align: center;
      border-radius: 15px; /* Rounded corners for the cards */
      background-color: #f8f9fa; /* Light gray background color */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow to the cards */
      transition: all 0.3s ease; /* Smooth transition for hover effect */
    }
    .card:hover {
      transform: translateY(-5px); /* Move the card up slightly on hover */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Add a stronger shadow on hover */
    }
    .card-title {
      color: #212529; /* Dark text color for card title */
      font-weight: bold; /* Bold font weight for card title */
      margin-top: 20px; /* Add space at the top of the card title */
    }
    .card-text {
      color: #6c757d; /* Dark gray text color for card content */
    }
    .btn {
      background-color: #007bff; /* Blue button color */
      border: none; /* Remove button border */
      border-radius: 5px; /* Rounded button corners */
    }
    .btn:hover {
      background-color: #0056b3; /* Darker blue color on hover */
    }
    .notice-board {
        margin-top: 20px;
    }

    .notice {
        background-color: #f0f0f0;
        padding: 10px;
        margin-bottom: 10px;
    }
    /* Additional styles for responsiveness */
    @media (max-width: 768px) {
      .sidebar {
        position: static; /* Change to static position on smaller screens */
        width: 100%; /* Occupy full width */
        overflow-y: visible; /* Disable vertical scrolling */
      }
      .content {
        margin-left: 0; /* Reset margin for content */
      }
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Navbar (Left side) -->
    <div class="col-md-3">
      <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white">
        <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
          <span class="fs-4">Mentee</span>
        </a>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a href="{{route('mentees')}}" class="nav-link" aria-current="page">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('menteesession',id)}}" class="nav-link active" aria-current="page">
              session
            </a>
          </li>
        </ul>
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{route('login')}}">Sign out</a>
      </div>
    </div>

    <!-- Success and Error message alerts -->
    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
    <!-- Content (Right side) -->
    <div class="col-md-9">
      <div class="content">
        <div id="add" class="container tab-pane"><br>

          <!-- Table to display sessions -->
          <h4>Session Details </h4>
          <table class="table mt-4">
            <thead>
              <tr>
                <th>Session Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Iterate through sessions -->
              @foreach($sessions as $session)
              <tr>
                <td>{{ $session->name }}</td>
                <td>{{ $session->date }}</td>
                <td>{{ $session->start_time }}</td>
                <td>{{ $session->end_time }}</td>
                <td>
                    <!-- Join button --> 
                    @if(now()->format('Y-m-d H:i') >= $session->date . ' ' . $session->end_time)
                    <!-- Disable the join button for past sessions -->
                    <button class="btn btn-dark btn-sm me-2" disabled>Join</button>

                    <a href="#" target="_blank" class="btn btn-success btn-sm">View Recording</a>


                    @if(isset($session->feedback))
                    <!-- Disable the feedback button if feedback already exists -->
                    <button class="btn btn-primary btn-sm me-2" disabled>Feedback</button>
                @else
                    <!-- Enable the feedback button if feedback doesn't exist -->
                    <a href="{{ route('feedbackshow', ['id' => $session->id]) }}" class="btn btn-primary btn-sm">Feedback</a>
                @endif

                @else
                    <!-- Enable the join button for upcoming sessions -->
                    <a href="{{ $session->slink }}" class="btn btn-primary btn-sm me-2" target="_blank">Join</a>

                    <!-- Disable the feedback button for upcoming sessions -->
                    <button class="btn btn-dark btn-sm" disabled>Feedback</button>
                @endif

                   
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
