<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembimbing Akademik</title>

    <!--CSS-->
    <link rel = "stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Sama seperti yang sebelumnya, styling tetap digunakan */
        * {
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-container {
            height: 90px;
            background-color: #DE2227;
        }

        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: space-between; 
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;    
        }

        .nav-bar ul{
            display: flex;
            justify-content: space-between;
            gap: 70px;
            color: white;
        }

        .nav-bar h2 {
            font-size: 35px;
            color: white;
        }

        .nav-bar ul li {
            list-style: none;
        }

        .nav-bar ul li a {
            font-size: 16px;
            text-decoration: none;
            color: #EEEEEE;
            padding: 8px 16px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 20px;
        }

        .nav-bar ul li a:hover {
            background-color: white;
            color: #DE2227;
        }

        .dashboard-header {
            height: 80px;
            display: flex;
            justify-content: space-between;
            padding-bottom: 10px;
        }

        .description {
            margin: 30px;
            margin-left: 50px;
        }

        .notification-icon {
            margin: 30px;
            margin-right: 60px;
        }

        .identity-container {
            padding: 50px;
            padding-top: 0;
            padding-bottom: 0;
        }

        .identity-content {
            display: flex;
            border: 2px solid #80747475;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
            background-color: white;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            flex-shrink: 0;
            margin-right: 30px;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        .info h2 {
            font-size: 50px;
        }

        .info p {
            margin: 5px 0;
            color: #555;
        }

        .button-container {
            margin-left: auto;
        }

        button {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: white;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 1em;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        button img {
            margin-left: 10px; 
        }

        button:hover {
            background-color: #f0f0f0;
        }

        .main-container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin: 30px 50px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex-grow: 1;
        }

        .jadwalkuliah, 
        .registrasi {
            display: flex;
            align-items: center;
            text-align: center;
            gap: 10px;
            padding: 45px;
            border: 2px solid #80747475;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            font-size: 20px;
        }

        /* Tambahkan untuk daftar mahasiswa bimbingan */
        .student-list {
            flex-grow: 2;
            width: 100%;
            padding: 20px;
            border: 2px solid #80747475;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .student-list h4 {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .student-list .student {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .student-list .student:last-child {
            border-bottom: none;
        }

        .student-list .student p {
            margin: 0;
            font-size: 16px;
        }

        .student-actions {
            display: flex;
            gap: 10px;
        }

        button.approve-irs {
            background-color: #28a745;
            color: white;
        }

        button.approve-irs:hover {
            background-color: #218838;
        }

        button.consultation {
            background-color: #007bff;
            color: white;
        }

        button.consultation:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <div class="nav-bar">
            <h2>SI-MAS (Pembimbing Akademik)</h2>
            <ul>
                <li><a href="#">Daftar Mahasiswa</a></li>
                <li><a href="#">IRS</a></li>
                <li><a href="#">Konsultasi</a></li>
                <li><a href="#">Status Akademik</a></li>
            </ul>
        </div>
    </div>

    <div class="dashboard-header">
        <div class="description">
            <h3>Dashboard Pembimbing Akademik</h3>
        </div>
        <div class="notification-icon">
            <img src="img/notification.svg" alt="Notifikasi">
        </div>
    </div>

    <!-- Informasi Pembimbing Akademik -->
    <div class="identity-container">
        <div class="identity-content">
            <div class="profile">
                <div class="profile-pic">
                    <img src="img/Pasfoto.png" alt="pas-foto">
                </div>
                <div class="info">
                    <div class="name">
                        <h2>Dr. John Doe, M.Kom</h2>
                    </div>
                    <div class="nip">
                        <p>NIP: 12345678901234</p>
                    </div>
                    <div class="faculty">
                        <p>Fakultas Sains dan Matematika</p>
                    </div>
                    <div class="department">
                        <p>Program Studi Informatika</p>
                    </div>
                    <div class="email">
                    <p>Email: john.doe@undip.ac.id</p>
                </div>
            </div>
        </div>
        <div class="button-container">
            <button>Edit Profile</button>
        </div>
    </div>
</div>

<!-- Konten Utama -->
<div class="main-container">
    <div class="menu">
        <div class="jadwalkuliah">
            <p>Jadwal Kuliah</p>
        </div>
        <div class="registrasi">
            <p>Registrasi Mata Kuliah</p>
        </div>
    </div>
    <div class="student-list">
        <h4>Daftar Mahasiswa Bimbingan</h4>
        <!-- Daftar mahasiswa -->
        <div class="student">
            <p>1. Ahmad Fauzi - IPK: 3.50</p>
            <div class="student-actions">
                <button class="approve-irs">Verifikasi IRS</button>
                <button class="consultation">Konsultasi</button>
            </div>
        </div>
        <div class="student">
            <p>2. Budi Santoso - IPK: 3.20</p>
            <div class="student-actions">
                <button class="approve-irs">Verifikasi IRS</button>
                <button class="consultation">Konsultasi</button>
            </div>
        </div>
        <div class="student">
            <p>3. Siti Aisyah - IPK: 3.70</p>
            <div class="student-actions">
                <button class="approve-irs">Verifikasi IRS</button>
                <button class="consultation">Konsultasi</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>