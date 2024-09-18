<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-MAS</title>

    <!--CSS-->
    <link rel = "stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">


    <style>
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
        

        .info-akademik-container {
            flex-grow: 2;
            width: 100%;
            padding: 20px;
            border: 2px solid #80747475;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dosen-pembimbing {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
        }

        .informasi-tambahan-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex-grow: 1;
            width: 50%;
        }

        h4 {
            font-size: 25px;
        }

        h5 {
            font-size: 18px;
        }

        .informasi-dosen h5 {
            font-style: normal;
            font-weight: normal;
        }

        .informasi-status-akademik {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            margin-top: 80px;
        }

        .prestasi-akademik, 
        .informasi-mahasiswa {
            font-size: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 0px;
            padding: 20px;
            border: 2px solid #80747475;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            font-size: 16px;
        }

        .informasi-mahasiswa {
            text-align: left;
        }

        .content-prestasi {
            display: flex;
            align-items: center;
            justify-items: space-between;
            gap: 30px;
            margin-top: 15px;
        }

        .jadwalkuliah:hover,
        .registrasi:hover {
            transform: translateY(-5px);
        }

        .content-informasi{
            height: 100px;
            overflow-y: auto;
            font-size: 16px;
        }

        @media (max-width: 1200px) {
            .main-container {
                flex-direction: column;
            }

            .info-akademik-container {
                margin-top: 20px;
            }

            .menu, .informasi-tambahan-container {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .nav-bar ul {
                gap: 30px;
            }

            .nav-bar {
                flex-direction: column;
                align-items: flex-start;
                padding-left: 20px;
                padding-right: 20px;
            }

            .nav-bar ul {
                flex-direction: column;
                gap: 10px;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                margin-left: 20px;
            }

            .identity-content {
                flex-direction: column;
                align-items: center;
            }

            .profile-pic {
                width: 150px;
                height: 150px;
                margin-bottom: 20px;
            }

            .info h2 {
                font-size: 30px;
            }

            .info p {
                font-size: 14px;
            }

            button {
                font-size: 0.9em;
                padding: 8px;
            }

            .jadwalkuliah, .registrasi {
                padding: 30px;
                font-size: 16px;
            }

            .informasi-status-akademik {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                height: auto;
            }

            .nav-bar h2 {
                font-size: 24px;
            }

            .dashboard-header {
                margin-left: 10px;
            }

            .identity-container {
                padding: 20px;
            }

            .profile-pic {
                width: 120px;
                height: 120px;
            }

            .info h2 {
                font-size: 24px;
            }

            .main-container {
                margin: 10px;
            }

            .jadwalkuliah, .registrasi {
                padding: 20px;
                font-size: 14px;
            }

            h4 {
                font-size: 20px;
            }

            h5 {
                font-size: 16px;
            }
        }

    </style>
</head>
<body>
    <div class="navbar-container">
        <div class="nav-bar">
            <h2>SI-MAS</h2>
            <ul>
                <li><a href="#">Status Akademik</a></li>
                <li><a href="#">IRS</a></li>
                <li><a href="#">KHS</a></li>
                <li><a href="#">Transkrip</a></li>
            </ul>
        </div>
    </div>

    <div class="dashboard-header">
        <div class="description">
            <h3>Dashboard Mahasiswa</h3>
        </div>
        <div class="notification-icon">
            <img src="img/notification.svg">
        </div>
    </div>

    <div class="identity-container">
        <div class="identity-content">
            <div class="profile">
                <div class="profile-pic">
                    <img src="img/Pasfoto.png" alt="pas-foto">
                </div>
                <div class="info">
                    <div class="name">
                        <h2>John Doe</h2>
                    </div>
                    <div class="nim">
                        <p>24060122130190</p>
                    </div>
                    <div class="faculty">
                        <p>Fakultas Sains dan Matematika</p>
                    </div>
                    <div class="prodi">
                        <p>Informatika</p>
                    </div>
                    <div class="email">
                        <p>JohnDoe@Students.undip.ac.id</p>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button>Biodata</button>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="menu">
            <div class="jadwalkuliah">
                <img src="img/jadwalkuliah-logo.svg">
                <p>Jadwal Kuliah</p>
            </div>
            <div class="registrasi">
                <img src="img/registrasi.svg">
                <p>Registrasi</p>
            </div>
        </div>

        <div class="info-akademik-container">
            <div class="content-info-akademik">
                <h4>Informasi Akademik</h4>
                <div class="dosen-pembimbing">
                    <div class="informasi-dosen">
                        <div class="nama-dosen">
                            <h5>Dosen Wali: Dr. John Doe M.Kom</h5>
                        </div>
                        <div class="nip-dosen">
                            <h5>NIP: 1234566777777</h5>
                        </div>
                    </div>
                    <div class="hubungi-dosen">
                        <button>Hubungi<img src='img/message-icon.svg'></button>
                    </div>
                </div>
                <div class="informasi-status-akademik">
                    <div class="tahun-akademik">
                        <h5>Tahun Akademik</h5>
                        <p>2022/2023(Ganjil)</p>
                    </div>
                    <div class="semester-studi">
                        <h5>Semester Studi</h5>
                        <p>1</p>
                    </div>
                    <div class="status-akademik">
                        <h5>Status Akademik</h5>
                        <p>AKTIF</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="informasi-tambahan-container">
            <div class="prestasi-akademik">
                <h4>Prestasi Akademik</h4>
                <div class="content-prestasi">
                    <div class="ipk">
                        <h5>IPk</h5>
                        <p>value</p>
                    </div>
                    <div class="sks">
                        <h5>SKSk</h5>
                        <p>value</p>
                    </div>
                </div>
            </div>
            <div class="informasi-mahasiswa">
                <h4>Informasi</h4>
                <div class="content-informasi">
                    <ul>
                        <li>Pilihan Mata kuliah tambahan “Kewirausahaan” anda  
                        telah dibatalkan karena kuota kelas diperlukan untuk semester prioritas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>