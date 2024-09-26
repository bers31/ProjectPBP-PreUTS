<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-MAS - Sistem Informasi Akademik</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #E0F7FA;
        }

        .header {
            background-color: #DE2227;
            color: #FFF9F9;
            text-align: center;
            padding: 20px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .main-content {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
            text-align: center;
        }

        .main-content h1 {
            font-size: 4rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.5rem;
            color: #555;
            max-width: 800px;
            margin-bottom: 40px;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .buttons a {
            text-decoration: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 8px;
            color: white;
            background-color: #D54E3F;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #BF3A2E;
        }

        .image-container {
            margin-top: 40px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        footer {
            text-align: center;
            background-color: #DE2227;
            color: white;
            padding: 20px;
            margin-top: auto;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .main-content h1 {
                font-size: 3rem;
            }

            .main-content p {
                font-size: 1.2rem;
            }

            .buttons a {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        SI-MAS - Sistem Informasi Akademik
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Selamat Datang di SI-MAS</h1>
        <p>
            Sistem Informasi Akademik Mahasiswa (SI-MAS) memudahkan mahasiswa, dosen, dan staf akademik dalam pengelolaan rencana studi, komunikasi akademik, dan pemantauan perkembangan studi. Login untuk melanjutkan.
        </p>
        
        <!-- Buttons to Login or Learn More -->
        <div class="buttons">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('about') }}">Pelajari Lebih Lanjut</a>
        </div>

        <!-- Optional Image -->
        <div class="image-container">
            <img src="https://www.undip.ac.id/wp-content/uploads/2023/10/web-undip-logo.png" alt="Ilustrasi SI-MAS">
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 SI-MAS - Semua Hak Cipta Dilindungi
    </footer>
</body>
</html>