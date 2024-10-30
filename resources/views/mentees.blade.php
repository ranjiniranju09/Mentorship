<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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
    .notice {
        background-color: #f0f0f0;
        padding: 10px;
        margin-bottom: 10px;
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
          <span class="fs-4">Mentees</span>
        </a>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" aria-current="page">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Sessions</a>
          </li>
          <li class="nav-item">
            <a href="{{route('showchat')}}" class="nav-link">Chat Room</a>
          </li>
          <li class="nav-item">
            <a href="{{route('viewmenteeresources', ['menteeId' => $menteeId])}}" class="nav-link">Resources</a> 
          </li>
        </ul>
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{route('login')}}">Sign out</a>
      </div>
    </div>
    
    <!-- Content (Right side) --> 
    <div class="col-md-9">
      <div class="content">   
        <h2 class="mb-4">Assigned Mentor</h2>

         <!-- Success and Error message alerts -->
         @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($assignedMentor1)
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Mentor Name: {{ $assignedMentor1->name }}</h5>
              <!-- Add more details about the mentor as needed -->
            </div>
          </div>
        @else
          <p class="mb-4">No mentor assigned yet.</p>
        @endif 

        <h2 class="mb-4">Assigned Sessions</h2>
        @if($assignedSession->isNotEmpty())
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Session Name</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Session Link</th>
                </tr>
              </thead>
              <tbody>
                @foreach($assignedSession as $session)
                <tr>
                  <td>{{ $session->name }}</td>
                  <td>{{ $session->date }}</td>
                  <td>{{ $session->start_time }}</td>
                  <td>{{ $session->end_time }}</td>
                  <td> 
                     @if(now()->format('Y-m-d H:i') >= $session->date . ' ' . $session->end_time)
                          <!-- Disable the join button for past sessions -->
                          <button class="btn btn-dark btn-sm me-2" disabled>Join</button>
                          <a href="#" target="_blank" class="btn btn-success btn-sm">View Recording</a>
                      @else
                          <!-- Enable the join button for upcoming sessions -->
                          <a href="{{ $session->slink }}" class="btn btn-success btn-sm me-2" target="_blank">Join</a>
                      @endif
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p>No sessions assigned yet.</p>
        @endif

        <h2 class="mb-4">Notice Board</h2>
        <div class="notice-board">
        @if($pastSessions->isNotEmpty())
          <h4><u>Past Sessions</u></h4>
          @foreach ($pastSessions as $session)
              <div class="notice">
                  <p>{{ $session->name }} - {{ $session->date }}</p>
              </div>
          @endforeach
        @endif

        @if($upcomingSessions->isNotEmpty())
          <h5><u>Upcoming Sessions</u></h5>
          @foreach ($upcomingSessions as $session)
              <div class="notice">
                  <p>{{ $session->name }} - {{ $session->date }}</p>
              </div>
          @endforeach
        @endif
        </div>
      </div> 
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
