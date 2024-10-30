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

         <!-- Success and Error message alerts -->
    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
          <h3>Add Session</h3>
          <form action="{{route('sessionstore')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Session Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Session Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Enter Session Date">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="start_time" class="form-label">Start Time</label>
                  <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Enter Start Time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="end_time" class="form-label">End Time</label>
                  <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Enter End Time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="slink" class="form-label">Session Link</label>
                  <input type="text" class="form-control" id="slink" name="slink" placeholder="Enter Session Link">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Session</button>
          </form>
    <br>
          <hr> 

          <!-- Table to display sessions -->
         <!-- Table to display sessions -->
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
                <!-- Check if the session belongs to the logged-in mentor -->
                @if($session->mentorId == $loggedInMentorId)
                <tr>
                  <td>{{ $session->name }}</td>
                  <td>{{ $session->date }}</td>
                  <td>{{ $session->start_time }}</td>
                  <td>{{ $session->end_time }}</td>
                  <td>
                    <!-- Edit button -->
                    <a href="{{route('sessionedit',$session->id)}}" onclick="return confirm('Are you sure you want to edit this session ?');"> 
                      <i class="fa-solid fa-pencil"></i> 
                    </a> 
                    <!-- Delete button -->
                    <a href="#" onclick="return confirm('Are you sure you want to delete this session?');" style="padding-left: 5%;"> 
                      <i class="fa-solid fa-xmark"></i>
                    </a>
                    <!-- Join button -->
                    <br> 
                    @if(now()->format('Y-m-d H:i') >= $session->date . ' ' . $session->end_time)
                      <!-- Disable the join button for past sessions -->
                      <button class="btn btn-dark btn-sm me-2" disabled>Join</button>
                      <a href="#" target="_blank" class="btn btn-success btn-sm">View Recording</a>
                      <!-- Mark Attendance button -->
                      @if($session->attendance == true)
                        <a href="{{ route('MarkAttendance', $session->id) }}" class="btn btn-dark btn-sm me-2 disabled" disabled>Marked Attendance</a>
                    @else
                        <a href="{{ route('MarkAttendance', $session->id) }}" class="btn btn-primary btn-sm me-2">Mark Attendance</a>
                    @endif

                    @else
                      <!-- Enable the join button for upcoming sessions -->
                      <a href="{{ $session->slink }}" class="btn btn-primary btn-sm me-2" target="_blank">Join</a>
                    @endif
                  </td>
                </tr>
                @endif
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
