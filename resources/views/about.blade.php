<!-- resources/views/about.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang SI-MAS</title>

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
            background-color: #E0F7FA;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #DE2227;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        #about {
            padding: 40px;
            background-color: #FFFFFF;
            color: #333;
            text-align: center;
        }

        #about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #DE2227;
        }

        #about p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 20px;
            text-align: left;
        }

        footer {
            text-align: center;
            background-color: #DE2227;
            color: white;
            padding: 20px;
            font-size: 1rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            #about h2 {
                font-size: 2rem;
            }

            #about p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        Tentang SI-MAS
    </header>

    <!-- About Section -->
    <section id="about">
        <p>
            SI-MAS (Sistem Informasi Akademik Mahasiswa) adalah platform yang dirancang untuk memfasilitasi mahasiswa, dosen pembimbing akademik, Ketua Program Studi, Dekan, dan bagian akademik dalam mengelola rencana studi serta memonitor perkembangan studi mahasiswa. 
            Aplikasi ini menyediakan fitur-fitur utama berikut:
        </p>
        <p>
            1. Login dan Authentication: Setiap pengguna harus melakukan login untuk mengakses aplikasi. Role-based authentication membatasi akses fitur berdasarkan peran pengguna <br>
            2. Pengisian IRS oleh Mahasiswa: Mahasiswa dapat memilih mata kuliah sesuai jadwal dan mengisi Kartu Rencana Studi (IRS) secara mandiri, sesuai dengan jumlah SKS yang diperbolehkan. <br>
            3. Konsultasi Mahasiswa dengan Pembimbing Akademik: Mahasiswa dapat menghubungi Pembimbing Akademik jika ada kendala dalam pengisian IRS melalui fitur chat.<br>
            4. Persetujuan oleh Pembimbing Akademik: Pembimbing akademik bisa melihat dan mengevaluasi IRS yang diisi oleh mahasiswa.<br>
            5. Verifikasi oleh Ketua Program Studi: Ketua Program Studi dapat memastikan bahwa semua mahasiswa telah mengisi IRS.<br>
            6. Reset IRS oleh Ketua Program Studi: Ketua Program Studi memiliki hak untuk me-reset IRS mahasiswa apabila mata kuliah yang wajib diambil sudah penuh. <br>
            7. Fitur Grafik Pengambilan Mata Kuliah: Dekan dapat melihat grafik pengambilan mata kuliah untuk memantau kapasitas kelas.<br> 
            8. Manajemen Data Akademik oleh Bagian Akademik: Bagian Akademik dapat mengelola data-data penting seperti mata kuliah yang tersedia.<br>
            9. Validasi Syarat Kelulusan oleh Pembimbing Akademik: Pembimbing memeriksa apakah semua mata kuliah yang diambil sudah sesuai dengan kurikulum.<br>
            10. Monitoring Ketersediaan Mata Kuliah oleh Dekan: Dekan memastikan bahwa mata kuliah wajib tersedia untuk semua mahasiswa.<br>
        </p>
        <p>
            Sistem ini memastikan bahwa seluruh proses pengisian IRS, konsultasi akademik, serta pengelolaan rencana studi dapat dilakukan secara terintegrasi dan efisien.
        </p>
    </section>

    <!-- Footer -->
    <footer>
        © 2024 SI-MAS - Semua Hak Cipta Dilindungi
    </footer>
</body>
</html>