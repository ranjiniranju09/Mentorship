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
            padding: 8px 20px;
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
            align-items: center;
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
        .display-jobs {
            margin-left: 40px;
          width:max-content;
          margin-top: 15px;
        }
        /* .display-jobs h2 {
            text-align: center;
            margin-bottom: 20px;
        } */

        .job-table th, .job-table td {
            text-align: center;
            vertical-align: middle;
        }

        .job-table a {
            color: #007bff;
            text-decoration: none;
        }

        .job-table a:hover {
            text-decoration: underline;
        }

        .modal-content {
            padding: 20px;
        }

        .modal-header, .modal-footer {
            border: none;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        #moreOptionsFields {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
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
                <a href="{{ route('mentorprofile')}}">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menteesessionprogress') }}">
                    <span class="icon"><i class="fa-solid fa-users"></i></span>
                    <span class="title">Session</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menteetaskprogress') }}">
                    <span class="icon"><i class="fa-solid fa-list"></i></ion-icon></span>
                    <span class="title">Task</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mentorresourceadd') }}">
                    <span class="icon"><i class="fa-solid fa-link"></i></ion-icon></span>
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
            <!-- Display Jobs Table -->
            <div class="display-jobs">
                <h2>Jobs Details</h2>
                <span>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addJobModal">
                        Add Job
                    </button>
                    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#editJobModal">
                        Edit Job
                    </button>
                </span>
                <table class="table table-bordered job-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Job ID</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Related Link</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Internship</td>
                            <td>Software Development Internship</td>
                            <td>2024-07-01</td>
                            <td><a href="https://example.com" target="_blank">Link</a></td>
                            <td>Pending</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewJobModal" data-job-id="001">Explore</button>
                                <span>
                                    <a href="#" class="btn btn-danger delete-job" data-job-id="001"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Job</td>
                            <td>Junior Developer Position</td>
                            <td>2024-07-15</td>
                            <td><a href="https://example.com" target="_blank">Link</a></td>
                            <td>Approved</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewJobModal" data-job-id="002">Explore</button>
                                <span>
                                    <a href="#" class="btn btn-danger delete-job" data-job-id="002"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>
                        <!-- Additional job rows as needed -->
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                <!-- Add Job Modal -->
                <div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addJobModalLabel">Add New Job</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addJobForm">
                                    <div class="form-group">
                                        <label for="jobCategory">Category:</label>
                                        <select class="form-control" id="jobCategory" name="jobCategory">
                                            <option>======== Select Here ========</option>
                                            <option>Job</option>
                                            <option>Internships</option>
                                            <option>Fellowships</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jobDescription">Job Description:</label>
                                        <input type="text" class="form-control" id="jobDescription" name="jobDescription" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dueDate">Due Date:</label>
                                        <input type="date" class="form-control" id="dueDate" name="dueDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="relatedLink">Related Link:</label>
                                        <input type="url" class="form-control" id="relatedLink" name="relatedLink" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Do you want to add more options?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="moreOptions" id="moreOptionsYes" value="yes">
                                            <label class="form-check-label" for="moreOptionsYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="moreOptions" id="moreOptionsNo" value="no" checked>
                                            <label class="form-check-label" for="moreOptionsNo">No</label>
                                        </div>
                                    </div>

                                    <div id="moreOptionsFields" style="display: none;">
                                        <div class="form-group">
                                            <label for="location">Location:</label>
                                            <input type="text" class="form-control" id="location" name="location">
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience:</label>
                                            <input type="text" class="form-control" id="experience" name="experience">
                                        </div>
                                        <div class="form-group">
                                            <label for="openings">Openings:</label>
                                            <input type="number" class="form-control" id="openings" name="openings">
                                        </div>
                                        <div class="form-group">
                                            <label for="interviewProcess">Interview Process:</label>
                                            <textarea class="form-control" id="interviewProcess" name="interviewProcess"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyDescription">Company Description:</label>
                                            <textarea class="form-control" id="companyDescription" name="companyDescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobResponsibilities">Job Responsibilities:</label>
                                            <textarea class="form-control" id="jobResponsibilities" name="jobResponsibilities"></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Add Job</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Job Modal -->
                <div class="modal fade" id="editJobModal" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editJobForm">
                                    <div class="form-group">
                                        <label for="editJobCategory">Category:</label>
                                        <select class="form-control" id="editJobCategory" name="editJobCategory">
                                            <option>======== Select Here ========</option>
                                            <option>Job</option>
                                            <option>Internships</option>
                                            <option>Fellowships</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editJobDescription">Job Description:</label>
                                        <input type="text" class="form-control" id="editJobDescription" name="editJobDescription" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editDueDate">Due Date:</label>
                                        <input type="date" class="form-control" id="editDueDate" name="editDueDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editRelatedLink">Related Link:</label>
                                        <input type="url" class="form-control" id="editRelatedLink" name="editRelatedLink" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Do you want to add more options?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="editMoreOptions" id="editMoreOptionsYes" value="yes">
                                            <label class="form-check-label" for="editMoreOptionsYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="editMoreOptions" id="editMoreOptionsNo" value="no" checked>
                                            <label class="form-check-label" for="editMoreOptionsNo">No</label>
                                        </div>
                                    </div>

                                    <div id="editMoreOptionsFields" style="display: none;">
                                        <div class="form-group">
                                            <label for="editLocation">Location:</label>
                                            <input type="text" class="form-control" id="editLocation" name="editLocation">
                                        </div>
                                        <div class="form-group">
                                            <label for="editExperience">Experience:</label>
                                            <input type="text" class="form-control" id="editExperience" name="editExperience">
                                        </div>
                                        <div class="form-group">
                                            <label for="editOpenings">Openings:</label>
                                            <input type="number" class="form-control" id="editOpenings" name="editOpenings">
                                        </div>
                                        <div class="form-group">
                                            <label for="editInterviewProcess">Interview Process:</label>
                                            <textarea class="form-control" id="editInterviewProcess" name="editInterviewProcess"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editCompanyDescription">Company Description:</label>
                                            <textarea class="form-control" id="editCompanyDescription" name="editCompanyDescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editJobResponsibilities">Job Responsibilities:</label>
                                            <textarea class="form-control" id="editJobResponsibilities" name="editJobResponsibilities"></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Job Modal -->
                <div class="modal fade" id="viewJobModal" tabindex="-1" role="dialog" aria-labelledby="viewJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewJobModalLabel">Job Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Details will be filled dynamically using JavaScript based on the job opened -->
                                <div class="form-group">
                                    <label for="viewJobCategory">Category:</label>
                                    <input type="text" class="form-control" id="viewJobCategory" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewJobDescription">Job Description:</label>
                                    <input type="text" class="form-control" id="viewJobDescription" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewDueDate">Due Date:</label>
                                    <input type="date" class="form-control" id="viewDueDate" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewRelatedLink">Related Link:</label>
                                    <input type="url" class="form-control" id="viewRelatedLink" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
   <script>
        $(document).ready(function() {
    // Toggle visibility of more options fields in Add Job Modal
    $('input[name="moreOptions"]').change(function() {
        if ($('#moreOptionsYes').is(':checked')) {
            $('#moreOptionsFields').show();
        } else {
            $('#moreOptionsFields').hide();
        }
    });

    // Toggle visibility of more options fields in Edit Job Modal
    $('input[name="editMoreOptions"]').change(function() {
        if ($('#editMoreOptionsYes').is(':checked')) {
            $('#editMoreOptionsFields').show();
        } else {
            $('#editMoreOptionsFields').hide();
        }
    });

    // Populate job details in view modal
    $('#viewJobModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var jobId = button.data('job-id');
        
        // Get the job details based on jobId (for example, via an AJAX call or from an array)
        // For this example, we'll just use static data
        var jobDetails = {
            "001": {category: "Internship", description: "Software Development Internship", dueDate: "2024-07-01", link: "https://example.com"},
            "002": {category: "Job", description: "Junior Developer Position", dueDate: "2024-07-15", link: "https://example.com"}
        };

        var job = jobDetails[jobId];
        
        var modal = $(this);
        modal.find('#viewJobCategory').val(job.category);
        modal.find('#viewJobDescription').val(job.description);
        modal.find('#viewDueDate').val(job.dueDate);
        modal.find('#viewRelatedLink').val(job.link);
    });

    // Populate job details in edit modal
    $('#editJobModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var jobId = button.data('job-id');
        
        // Get the job details based on jobId (for example, via an AJAX call or from an array)
        // For this example, we'll just use static data
        var jobDetails = {
            "001": {
                category: "Internship", description: "Software Development Internship", dueDate: "2024-07-01", link: "https://example.com",
                moreOptions: true, location: "New York", experience: "0-1 year", openings: 5, interviewProcess: "Phone interview, onsite interview",
                companyDescription: "Tech Company", responsibilities: "Developing software solutions"
            },
            "002": {
                category: "Job", description: "Junior Developer Position", dueDate: "2024-07-15", link: "https://example.com",
                moreOptions: true, location: "San Francisco", experience: "1-2 years", openings: 2, interviewProcess: "Online assessment, technical interview",
                companyDescription: "Innovative Company", responsibilities: "Maintaining and developing features"
            }
        };

        var job = jobDetails[jobId];
        
        var modal = $(this);
        modal.find('#editJobCategory').val(job.category);
        modal.find('#editJobDescription').val(job.description);
        modal.find('#editDueDate').val(job.dueDate);
        modal.find('#editRelatedLink').val(job.link);

        if (job.moreOptions) {
            $('#editMoreOptionsYes').prop('checked', true);
            $('#editMoreOptionsFields').show();
            modal.find('#editLocation').val(job.location);
            modal.find('#editExperience').val(job.experience);
            modal.find('#editOpenings').val(job.openings);
            modal.find('#editInterviewProcess').val(job.interviewProcess);
            modal.find('#editCompanyDescription').val(job.companyDescription);
            modal.find('#editJobResponsibilities').val(job.responsibilities);
        } else {
            $('#editMoreOptionsNo').prop('checked', true);
            $('#editMoreOptionsFields').hide();
        }
    });

        // Show alert message when add job form is submitted
        $('#addJobForm').submit(function(event) {
            event.preventDefault();
            alert("Approval request has been sent to the admin.");
            $('#addJobModal').modal('hide');
            // Add your form submission logic here (e.g., AJAX call to submit the form data)
        });

        // Show alert message when edit job form is submitted
        $('#editJobForm').submit(function(event) {
            event.preventDefault();
            alert("Job details updated successfully.");
            $('#editJobModal').modal('hide');
            // Add your form submission logic here (e.g., AJAX call to submit the form data)
        });
    });

    </script>
    

</body>

</html>
