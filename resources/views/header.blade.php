<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') SI - MAS</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        html, body {
        height: 100%;
        margin: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex: 1;
    }        
    </style>
</head>
<body>