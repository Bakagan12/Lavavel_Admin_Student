<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('src/img/background.jpg')}}">
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


        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-container {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button{
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
        .checkbox{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login form -->
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-container">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <!-- Password -->
            <div class="input-container">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <!-- Remember Me Checkbox -->
            <div class="checkbox input-container">
                <label>
                    <input type="checkbox" name="remember">
                </label> <span style="margin-left: 10px; "> Remember me</span>
            </div>

            <!-- Submit Button -->
            <button type="submit">Login</button>
            <center>
                <div style="background-color: #45a049; margin-top: 20px; border-radius: 10px;">
                    <button>
                        <a href="{{URL::to('user/create')}}" type="submit" style="text-decoration: none; color: white;">Register</a>
                    </button>
                </div>
            </center>



            <!-- Forgot Password Link -->
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
            </div>
        </form>
    </div>
</body>
</html>
