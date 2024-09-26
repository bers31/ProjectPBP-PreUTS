<!-- resources/views/login_page.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-MAS Login Page</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Custom styles for the login page */
        * {
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .login-page {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #DE2227;
            text-align: center;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFF9F9;
            font-size: 35px;
        }

        .login-container {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 20px;
            align-items: center;
            justify-content: center;
            background-color: #E0F7FA;
            width: 100%;
        }

        .login-container h3 {
            padding: 20px;
            font-size: 3rem;
            font-weight: bold;
            color: #333;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 10px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #DE2227;
            box-shadow: 0 0 8px rgba(222, 34, 39, 0.1);
        }

        button[type="submit"] {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            border: none;
            background-color: #D54E3F;
            color: white;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #BF3A2E;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            .login-container h3 {
                font-size: 2rem;
            }

            .login-form {
                padding: 20px;
            }

            input[type="text"],
            input[type="password"],
            button[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="header">
            <h2>SI-MAS</h2>
        </div>

        <div class="login-container">
            <div class="login-form">
                <h3>Selamat Datang!</h3>

                <!-- Display validation errors if any -->
                @if($errors->any())
                    <div class="error">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Login form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf  <!-- Cross-Site Request Forgery token required in Laravel forms -->

                    <!-- Username input -->
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>

                    <!-- Password input -->
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <!-- Submit button -->
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>