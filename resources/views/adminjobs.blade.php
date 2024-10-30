<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Provided CSS styles */
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
           <a href="#" class="nav-link">Dashboard</a> 
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
            <a href="{{route('session')}}" class="nav-link " aria-current="page"> 
              Add session
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ShowTask') }}" class="nav-link active" aria-current="page">
              Assign Task
            </a>
        </li>
        <li class="nav-item">
           <a href="{{ route('adminjobs') }}" class="nav-link">Add Job</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('viewjobs') }}" class="nav-link">Job List</a> 
        </li>
        </ul>
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{route('login')}}">Sign out</a>
      </div>
    </div>


    <!-- Content (Right side) -->
    
    <div class="col-md-9">
      <div class="content">
            <!-- Success and Error message alerts -->
        <h2>Add Job</h2>
        @if(!empty($success))
            <div class="alert alert-success">{{ $success }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('adminjobstore')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" id="company" name="company" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
        </div>
    </div>
        </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
