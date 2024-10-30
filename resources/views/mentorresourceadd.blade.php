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

        .search {
            width: 400px;
            margin: 0 10px;
            position: relative;
        }
        .search label {
            width: 100%;
        }
        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .search label ion-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            font-size: 1.2rem;
            transform: translateY(-50%);
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
        .content {
          margin-top: 20px;
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

        .display-resources{
          margin-left: 40px;
          width:max-content;
        }
        .btn-close {
            float: right;
            background: none;
            border: none;
            font-size: 1.5rem;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }
        .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75;
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
                  /* ====================== Display Session table ========================== */

        .session-table {
            margin-top: 20px;
        }
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
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

            <div class="display-resources">
                <h2>Knowledge Bank Details</h2>
                <span>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addResourceModal">
                        Add Resource
                    </button>
                    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#editResourceModal">
                        Edit Resource
                    </button>
                </span>
                <table class="table table-bordered resource-table">
                    <thead class="thead-light">
                        <tr>
                            <th>Resource ID</th>
                            <th>Resource Name</th>
                            <th>Upload Date</th>
                            <th>Related Link</th>
                            <th>Category</th>
                            <th>Download Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Project Proposal</td>
                            <td>2024-06-10</td>
                            <td><a href="https://example.com" target="_blank">Link</a></td>
                            <td><span class="status public">Public</span></td>
                            <td><a href="https://example.com/file1.zip" class="btn btn-success">Open Link</a></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewResourceModal" data-resource-id="001">Expand</button>
                                <span>
                                    <a href="#" class="btn btn-danger delete-resources" data-resources-id="001"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Chapter 1 Review</td>
                            <td>2024-06-15</td>
                            <td><a href="https://example.com" target="_blank">Link</a></td>
                            <td><span class="status private">Private</span></td>
                            <td><a href="https://example.com/file2.zip" class="btn btn-success">Open Link</a></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewResourceModal" data-resource-id="002">Expand</button>
                                <span>
                                    <a href="#" class="btn btn-danger delete-resources" data-resources-id="002"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                        </tr>
                        <!-- Additional resource rows as needed -->
                    </tbody>
                </table>
            </div>

            <div class="row">
                <!-- Add Resource Modal -->
                <div class="modal fade" id="addResourceModal" tabindex="-1" role="dialog" aria-labelledby="addResourceModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addResourceModalLabel">Add New Resource</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addResourceForm">
                                    <div class="form-group">
                                        <label for="resourceName">Resource Name:</label>
                                        <input type="text" class="form-control" id="resourceName" name="resourceName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadDate">Upload Date:</label>
                                        <input type="date" class="form-control" id="uploadDate" name="uploadDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you want to add a resource link?</label><br>
                                        <input type="radio" id="addLinkYes" name="addLink" value="yes" required> Yes<br>
                                        <input type="radio" id="addLinkNo" name="addLink" value="no" required> No
                                    </div>
                                    <div class="form-group" id="relatedLinkField" style="display: none;">
                                        <label for="relatedLink">Related Link:</label>
                                        <input type="url" class="form-control" id="relatedLink" name="relatedLink">
                                    </div>
                                    <div class="form-group" id="topicDescriptionField" style="display: none;">
                                        <label for="topicDescription">Topic Description:</label>
                                        <textarea class="form-control" id="topicDescription" name="topicDescription" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="resourceStatus">Category:</label>
                                        <select class="form-control" id="resourceStatus" name="resourceStatus">
                                            <option>Public</option>
                                            <option>Private</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Resource</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Edit Resource Modal -->
                <div class="modal fade" id="editResourceModal" tabindex="-1" role="dialog" aria-labelledby="editResourceModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editResourceModalLabel">Edit Resource</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editResourceForm">
                                    <div class="form-group">
                                        <label for="editResourceName">Resource Name:</label>
                                        <input type="text" class="form-control" id="editResourceName" name="editResourceName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editUploadDate">Upload Date:</label>
                                        <input type="date" class="form-control" id="editUploadDate" name="editUploadDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editRelatedLink">Related Link:</label>
                                        <input type="url" class="form-control" id="editRelatedLink" name="editRelatedLink" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editResourceStatus">Category:</label>
                                        <select class="form-control" id="editResourceStatus" name="editResourceStatus">
                                            <option>Public</option>
                                            <option>Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editTopicDescription">Topic Description:</label>
                                        <textarea class="form-control" id="editTopicDescription" name="editTopicDescription" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Resource Modal -->
                <div class="modal fade" id="viewResourceModal" tabindex="-1" role="dialog" aria-labelledby="viewResourceModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewResourceModalLabel">Knowledge Bank Details</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Details will be filled dynamically using JavaScript based on the resource opened -->
                                <div class="form-group">
                                    <label for="viewResourceName">Resource Name:</label>
                                    <input type="text" class="form-control" id="viewResourceName" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewUploadDate">Upload Date:</label>
                                    <input type="date" class="form-control" id="viewUploadDate" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewRelatedLink">Related Link:</label>
                                    <input type="url" class="form-control" id="viewRelatedLink" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewStatus">Status:</label>
                                    <input type="text" class="form-control" id="viewStatus" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewCategory">Category:</label>
                                    <input type="text" class="form-control" id="viewCategory" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viewTopicDescription">Topic Description:</label>
                                    <textarea class="form-control" id="viewTopicDescription" rows="3" readonly></textarea>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle opening the View Task modal and populate it with data
            $('#viewResourceModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var taskId = button.data('task-id'); // Extract info from data-* attributes

                // Fetch the data based on task ID (this should be replaced with actual data fetching logic)
                var taskData = {
                    '001': {
                        name: 'Project Proposal',
                        date: '2024-06-10',
                        link: 'https://example.com',
                        status: 'Completed',
                        downloadLink: 'https://example.com/download'
                    },
                    '002': {
                        name: 'Chapter 1 Review',
                        date: '2024-06-15',
                        link: 'https://example.com',
                        status: 'In Progress',
                        downloadLink: ''
                    }
                    // Add more data as needed
                };

                var task = taskData[taskId];

                var modal = $(this);
                modal.find('#viewTaskName').val(task.name);
                modal.find('#viewDueDate').val(task.date);
                modal.find('#viewRelatedLink').val(task.link);
                modal.find('#viewTaskStatus').val(task.status);
                modal.find('#viewDownloadLink').val(task.downloadLink);
            });

            // Show alert and hide modal when adding a task
            $('#addResourceForm').submit(function(event) {
                event.preventDefault();
                alert("Approval request has been sent to the admin.");
                $('#addResourceModal').modal('hide');
                // Add your form submission logic here (e.g., AJAX call to submit the form data)
            });

            // Handle opening the Edit Task modal and populate it with data
            $('#editTaskModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var taskId = button.data('task-id'); // Extract info from data-* attributes

                // Fetch the data based on task ID (this should be replaced with actual data fetching logic)
                var taskData = {
                    '001': {
                        name: 'Project Proposal',
                        date: '2024-06-10',
                        link: 'https://example.com',
                        status: 'Completed',
                        downloadLink: 'https://example.com/download'
                    },
                    '002': {
                        name: 'Chapter 1 Review',
                        date: '2024-06-15',
                        link: 'https://example.com',
                        status: 'In Progress',
                        downloadLink: ''
                    }
                    // Add more data as needed
                };

                var task = taskData[taskId];

                var modal = $(this);
                modal.find('#editTaskName').val(task.name);
                modal.find('#editDueDate').val(task.date);
                modal.find('#editRelatedLink').val(task.link);
                modal.find('#editTaskStatus').val(task.status);
                modal.find('#editDownloadLink').val(task.downloadLink);
            });

            // Handle Add Task form submission
            $('#addResourceModal form').on('submit', function (e) {
                e.preventDefault();
                // Add your form submission logic here
                console.log('Adding task:', $(this).serializeArray());
                $('#addResourceModal').modal('hide');
            });

            // Handle Edit Task form submission
            $('#editTaskModal form').on('submit', function (e) {
                e.preventDefault();
                // Add your form submission logic here
                console.log('Editing task:', $(this).serializeArray());
                $('#editTaskModal').modal('hide');
            });

            // Show/hide fields based on radio button selection
            $('input[name="addLink"]').on('change', function () {
                if ($('#addLinkYes').is(':checked')) {
                    $('#relatedLinkField').show();
                    $('#relatedLink').attr('required', true);
                    $('#topicDescriptionField').hide();
                    $('#topicDescription').attr('required', false);
                } else if ($('#addLinkNo').is(':checked')) {
                    $('#relatedLinkField').hide();
                    $('#relatedLink').attr('required', false);
                    $('#topicDescriptionField').show();
                    $('#topicDescription').attr('required', true);
                }
            });
            // Delete session action
            $('.delete-resources').click(function(event) {
                    event.preventDefault();
                    var resourcesId = $(this).data('resources-id');
                    if(confirm("Are you sure you want to delete this Resources?")) {
                        alert("Reasource " + resourcesId + " has been deleted.");
                        // Add your delete logic here (e.g., AJAX call to delete the session)
                    }
                });

        });
    </script>


</body>

</html>
