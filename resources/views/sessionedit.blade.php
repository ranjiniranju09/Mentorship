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
          <span class="fs-4">Student</span>
        </a>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" aria-current="page">
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
            <a href="#" class="nav-link">
              Scholarships
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              Mentorship
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('session')}}" class="nav-link active" aria-current="page">
              Add session
            </a>
          </li>
        </ul>
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{route('login')}}">Sign out</a>
      </div>
    </div>
    
    <!-- Content (Right side) -->
    <div class="col-md-9">
      <div class="content">
        <div id="add" class="container tab-pane"><br>
          <h3>Add Session</h3>
          <form action="{{ route('sessionupdate', $sessions->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Session Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$sessions->name}}" placeholder="Enter Session Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{$sessions->date}}" placeholder="Enter Session Date">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="start_time" class="form-label">Start Time</label>
                  <input type="time" class="form-control" id="start_time" name="start_time" value="{{$sessions->start_time}}" placeholder="Enter Start Time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="end_time" class="form-label">End Time</label>
                  <input type="time" class="form-control" id="end_time" name="end_time" value="{{$sessions->end_time}}" placeholder="Enter End Time">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status">
                    <option value="">Select Status</option>
                    @foreach($statuses as $status)
                      <option value="{{$status->id}}" >{{$status->status}}</option>
                    @endforeach
                  </select> 
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Session</button>
          </form>
    <br>
          <hr> 

            </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
