<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SI-MAS</title>

    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>
<body>
    <div class="flex flex-col justify-center items-center h-screen ">
        <div class="w-full text-center text-6xl font-bold h-28 bg-[#DE2227] text-white flex justify-center items-center">
            <h2>SI-MAS</h2>
        </div>
        <div class="flex flex-1 flex-col items-center justify-center bg-cyan-100 w-full" >
            <div class="flex flex-col bg-white rounded-2xl p-20 shadow-md w-full max-w-2xl">
                <h3 class="text-5xl font-bold text-gray-800 mb-8">Selamat Datang!</h3>
                
                <!-- Display validation errors if any -->
                @if(session('loginError'))
                    <div class="error">
                        {{ session('loginError') }}
                    </div>
                @endif

                <form action="" method="POST" autocomplete="on">
                    @csrf  <!-- Cross-Site Request Forgery token required in Laravel forms -->

                    <!-- Username -->
                    <div class="mb-5">
                        <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600">  
                    </div>
                    <!-- Password -->
                    <div class="mb-5">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600">
                    </div>

                    <button type="submit" class="w-full p-4 rounded-lg text-lg cursor-pointer border-none bg-red-600 text-white transition duration-300 hover:bg-red-500">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
