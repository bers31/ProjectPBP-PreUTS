@include('header')
<div class="flex flex-col h-full">
    <x-navbar/>

    <div class="main-content flex flex-col flex-grow p-6">
        <div class="text-lg font-bold mb-4">Dashboard Dekan</div>

        <!-- Notifikasi pesan sukses -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile dan Tanggal Penting Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5 mb-6">
            <!-- Profile Section -->
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-md">
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
                </div>
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold">{{ Auth::user()->dosen->nama }}</h2>
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->nidn }}</p>
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->departemen->fakultas->nama_fakultas }}</p>
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->departemen->nama }}</p>
                    <p class="text-lg text-blue-500">{{ Auth::user()->dosen->email }}</p>
                </div>
                <div class="ml-auto mt-4 lg:mt-0 flex justify-center lg:block">
                    <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-sm lg:text-lg hover:bg-[#f0f0f0]">
                        Biodata
                    </button>
                </div>
            </div>

            <!-- Tanggal Penting Section -->
            <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-md items-center p-5 h-80 overflow-y-auto">
                <div class="font-bold text-lg text-center">
                    Tanggal Penting
                </div>
                <div class="flex-grow">
                    <ul class="list-disc space-y-2 text-center">
                        <li>Terakhir pengisian IRS: 10-juni-2024</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Penetapan Jadwal Kuliah Section -->
        <div class="border p-6 rounded-lg mb-6 shadow-md">
            <h2 class="font-semibold text-xl mb-4">Penetapan Jadwal Kuliah</h2>
            <form id="jadwalForm" action="{{ route('dekan.setAllJadwal') }}" method="POST">
                @csrf
                <table id="jadwalTable" class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Mata Kuliah</th>
                            <th class="px-4 py-2">Hari</th>
                            <th class="px-4 py-2">Jam</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwals as $jadwal)
                            <tr>
                                <td class="border px-4 py-2">{{ $jadwal->mataKuliah->nama_mk }}</td>
                                <td class="border px-4 py-2">{{ $jadwal->hari }}</td>
                                <td class="border px-4 py-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                                <td class="border px-4 py-2">{{ $jadwal->status }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('dekan.setJadwal') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Setujui</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Setujui Semua
                    </button>
                </div>
            </form>

        </div>

        <!-- Penetapan Ketersediaan Ruang Kelas Section -->
        <div class="border p-6 rounded-lg shadow-md">
        <h2 class="font-semibold text-xl mb-4">Penetapan Ketersediaan Ruang Kelas</h2>
        <form id="ruangForm" action="{{ route('dekan.setAllRuang') }}" method="POST">
            @csrf
            <table id="ruangTable" class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nama/Kode Ruang</th>
                        <th class="px-4 py-2">Kapasitas</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangs as $ruang)
                        <tr>
                            <td class="border px-4 py-2">{{ $ruang->kode_ruang }}</td>
                            <td class="border px-4 py-2">{{ $ruang->kapasitas }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('dekan.setRuang') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="kode_ruang" value="{{ $ruang->kode_ruang }}">
                                    <select name="status_ketersediaan" class="border rounded p-1">
                                        <option value="Tersedia" {{ $ruang->status_ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Penuh" {{ $ruang->status_ketersediaan == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                                    </select>
                            </td>
                            <td class="border px-4 py-2">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1">Tetapkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2">
                    Tetapkan Semua
                </button>
            </div>
        </form>
    </div>
    @include('footer')
</div>

<!-- DataTables JS dan Inisialisasi -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#jadwalTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/Indonesian.json"
            }
            "autoWidth": false, // Mencegah DataTables mengatur lebar kolom secara otomatis
            "columnDefs": [
                { "orderable": false, "targets": [2, 3] } // Kolom Status dan Aksi tidak dapat diurutkan
            ]
        });

        $('#ruangTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/Indonesian.json"
            },
            "autoWidth": false, // Mencegah DataTables mengatur lebar kolom secara otomatis
            "columnDefs": [
                { "orderable": false, "targets": [2, 3] } // Kolom Status dan Aksi tidak dapat diurutkan
            ]
        });
    });
</script>