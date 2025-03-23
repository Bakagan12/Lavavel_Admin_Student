<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sta Cruz Enrollment Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
    .dashboard, .student {
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }
    .dashboard:hover, .student:hover {
        background-color: #909991; /* Custom Green */
}
    .dashboard {
    margin-right: 15px; /* Space between the dashboard and student elements */
}
</style>
<body>
    <nav class="navbar navbar-expand-lg d-flex flex-end navbar-dark bg-dark" style="display: flex; justify-content: space-between;">
        <div>
            <h1 class="navbar-brand" style="font-sized: 16px; ">Sta Cruz Enrollment Portal</h1>
            <p class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </p>
        </div>


        <div class="collapse navbar-collapse custom-navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="dashboard nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="student nav-link text-white" href="{{ route('students.index') }}">Students</a>
                </li>
            </ul>
        </div>

        <div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-VN4l6Rhn/93etjqkpzmU9Rm5E4VZl3/pP4cBtfujloQ8VE0pfnIRt4TosE07zuFT" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+q/dWJ63YZ1G16FwoD80BI5Rx/sLZ9vL4xZ" crossorigin="anonymous"></script>
      <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
