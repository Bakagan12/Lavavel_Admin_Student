<!-- resources/views/createUser.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Optional, if you have CSS setup -->
    <link href="{{ asset('src/img/background.jpg') }}" rel="stylesheet"> <!-- Optional, if you have CSS setup -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('{{ asset('src/img/background.jpg')}}');
    background-size: cover; /* Ensures the image covers the entire viewport */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
</style>
<body>
    <div class="container">
        <h2>Create User</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
