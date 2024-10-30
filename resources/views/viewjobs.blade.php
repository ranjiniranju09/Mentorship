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
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      width: 280px;
      background-color: #343a40;
      overflow-y: auto;
    }
    .nav-link {
      color: #fff;
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
          <span class="fs-4">Mentor</span>
        </a>
        <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Profile</a>
        </li>
        <li class="nav-item">
           <a href="{{route('mentor',['mentorId' => $mentorId])}}" class="nav-link">Dashboard</a> 
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Scholarships</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Mentorship</a>
        </li>
        <li class="nav-item">
            <a href="{{route('showchat')}}" class="nav-link">Chat Room</a>
        </li>
        <li class="nav-item">
            <a href="{{route('session',['mentorId' => $mentorId])}}" class="nav-link " aria-current="page"> 
              Add session
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ShowTask') }}" class="nav-link active" aria-current="page">
              Assign Task
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('resources',['mentorId' => $mentorId]) }}" class="nav-link active" aria-current="page"> 
              Add Resources
            </a>
        </li>
        <li class="nav-item">
           <a href="{{ route('jobs',['mentorId' => $mentorId]) }}" class="nav-link">Add Job</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('viewjobs',['mentorId' => $mentorId]) }}" class="nav-link">Job List</a> 
        </li>
        </ul>
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{route('login')}}">Sign out</a>
      </div>
    </div>


    <!-- Content (Right side) -->
    
    <div class="col-md-9">
      <div class="content">
        <h1>Job List</h1>

            @if(isset($success))
                <p style="color: green;">{{ $success }}</p>
            @endif

            <form method="GET" action="{{ route('viewjobs', ['mentorId' => $mentorId]) }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search job titles" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($jobs) && $jobs->count() > 0)
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->company }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->created_at }}</td>
                                <td>{{ $job->updated_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No jobs found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
