<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard')</title>
    <!-- Add your stylesheets or link to CDN here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
    <style></style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white" id="sidebar">
            <h2 class="p-3 text-center">Dashboard</h2>
            <ul class="list-group">
                <li class="list-group-item bg-dark text-white"><a href="#" class="text-white">Home</a></li>
                <li class="list-group-item bg-dark text-white"><a href="#" class="text-white">Courses</a></li>
                <li class="list-group-item bg-dark text-white"><a href="#" class="text-white">Assignments</a></li>
                <li class="list-group-item bg-dark text-white"><a href="#" class="text-white">Profile</a></li>

                <li class="list-group-item bg-dark text-white">
                    <a href="#" class="text-white">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn text-white">Logout</button>
                        </form>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <span class="navbar-text">Welcome, {{ Auth::user()->name }}</span>
            </nav>

            <div class="container-fluid">
                @yield('content') <!-- This is where the content of the student dashboard will go -->
            </div>
        </div>
    </div>

    <!-- Add JavaScript or Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
