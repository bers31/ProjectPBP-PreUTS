@include('header')
<div class="flex flex-col h-full">
    <!--Navbar-->
    <x-navbar/>

    <div class="main-content flex flex-col flex-grow">
        <!--Header-->
        <div class="flex items-center justify-between py-3 p-6">
            <div class="font-bold text-lg md:text-xl pl-6">
                Dashboard Dosen
            </div>
            <div class="flex items-center gap-3 pr-6">
                <!-- LogOut Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] px-3 py-1 hover:bg-[#f0f0f0]">
                        Log Out
                    </button>
                </form>
            </div>
        </div>

        <!-- Profile // Tanggal Penting Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5">    
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <!-- Foto Profile -->
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="\img\Pasfoto.png" alt="pasfoto">
                </div>
                <!-- Info Profile -->
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold"> {{ Auth::user()->dosen->nama }}</h2>              <!-- Nama -->
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->nidn }}</p>             <!-- NIM -->
                    <p class="text-lg text-gray-600">Fakultas {{Auth::user()->dosen->departemen->fakultas->nama_fakultas}}</p>              <!-- Fakultas -->
                    <p class="text-lg text-gray-600">Departemen {{Auth::user()->dosen->departemen->nama}}</p>                                <!-- Prodi -->
                    <p class="text-lg text-blue-500">{{ Auth::user()->dosen->email }}</p>           <!-- Email -->
                </div>

            </div>

            <!-- Tanggal Penting Section -->
            <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] items-center p-5 h-80 overflow-y-auto">
                <div class="font-bold text-lg text-center">
                    Tanggal Penting
                </div>
                <div class="flex-grow">
                    <ul class="list-disc space-y-2 text-center">
                        <li>Terakhir pengisian IRS: 10-juni-2024</li>   <!--List Tanggal Penting-->
                    </ul>
                </div>
            </div>            
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-6 gap-5 px-6 md:px-12 py-6">
            <!-- Jadwal Kuliah & Registrasi Section -->
            <div class="grid grid-cols-1 grid-rows-2 col-span-1 gap-5">
                <!-- Jadwal Kuliah -->
                <div class="flex items-center justify-center p-8 md:p-4 lg:p-8 border-2 border-[#80747475] hover:bg-[#f0f0f0] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <a href="{{ route('dosen.jadwal') }}" class="flex items-center gap-5 text-center md:flex-col lg:flex-row no-underline">
                        <img src="\img\jadwalkuliah-logo.svg" alt="jadwal_kuliah" class="w-10 md:w-8 lg:w-10">
                        <p class="font-semibold text-lg md:text-sm lg:text-lg">
                            Jadwal Kuliah
                        </p>
                    </a>
                </div>
                <!-- Registrasi -->
                <div class="flex items-center justify-center p-8 md:p-4 lg:p-8 border-2 border-[#80747475] hover:bg-[#f0f0f0] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <a href="{{ url('https://kulon2.undip.ac.id/') }}" class="flex items-center gap-5 text-center md:flex-col lg:flex-row no-underline" target="_blank">
                        <div class="flex items-center gap-5 p-1 text-center md:flex-co lg:flex-row">
                            <img src="\img\registrasi.svg" alt="registrasi" class="w-10 md:w-8 lg:w-10">
                            <p class="font-semibold text-lg md:text-sm lg:text-lg">
                                Kulon
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        
            <!-- Informasi Akademik Section -->
            <div class="flex flex-col col-span-1 lg:col-span-3 p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] h-full">
                <div class="font-bold text-lg lg:text-xl">
                    Jadwal Mengajar Hari ini
                </div>
    
                    <table class="jadwal-table">
                        <thead>
                            <tr>
                                <th>Nama MK</th>
                                <th>Ruangan</th>
                                <th>Kelas</th>
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody id="jadwal-body">
                            <!-- Data diisi dengan AJAX atau PHP -->
                        </tbody>
                    </table>
            </div>
        
            <!-- Prestasi Akademik & Informasi Section -->
            <div class="grid grid-cols-1 col-span-1 lg:col-span-2 gap-5">
                <!-- Prestasi Akademik -->
                <div class="p-5 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="font-bold text-lg lg:text-xl mb-2 items-center text-center pb-2">
                        Informasi Singkat
                    </div>
                    <div class="flex-grow">
                        <p>Jumlah Mahasiswa Perwalian :</p>
                        <p>{{Auth::user()->dosen->mahasiswa()->count()}}</p>
                        <br><p>IRS menunggu :</p>
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <style>
        .jadwal-container {
            width: 100%;
            max-width: 400px; /* Ukuran tabel kecil */
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
        }

        .jadwal-header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .jadwal-table {
            width: 100%;
            border-collapse: collapse;
        }

        .jadwal-table th, .jadwal-table td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .jadwal-table tbody {
            display: block;
            max-height: 200px; /* Scroll vertikal */
            overflow-y: auto;
        }

        .jadwal-table thead, .jadwal-table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .jadwal-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/jadwal') // API untuk mengambil jadwal
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('jadwal-body');
                data.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.nama_mk}</td>
                        <td>${item.ruang}</td>
                        <td>${item.kode_kelas}</td>
                        <td>${item.hari}</td>
                        <td>${item.jam_mulai} - ${item.jam_selesai} </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching jadwal:', error));
    });</script>
@include('footer')