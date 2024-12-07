@include('header')
<div class="flex flex-col min-h-screen">
    <x-navbar />

    <main class="flex-1 p-6">
        <div class="text-lg font-bold mb-4">Dashboard Dekan</div>
        <div class="flex items-center gap-3 pr-6">
                <!-- LogOut Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] px-3 py-1 hover:bg-[#f0f0f0]">
                        Log Out
                    </button>
                </form>
                <!-- Notification Button -->
                <button class="group hover:bg-[#DE2227] hover:rounded-xl p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" class="stroke-current text-black group-hover:text-white fill-none">
                        <path d="M2.52992 14.394C2.31727 15.7471 3.268 16.6862 4.43205 17.1542C8.89481 18.9486 15.1052 18.9486 19.5679 17.1542C20.732 16.6862 21.6827 15.7471 21.4701 14.394C21.3394 13.5625 20.6932 12.8701 20.2144 12.194C19.5873 11.2975 19.525 10.3197 19.5249 9.27941C19.5249 5.2591 16.1559 2 12 2C7.84413 2 4.47513 5.2591 4.47513 9.27941C4.47503 10.3197 4.41272 11.2975 3.78561 12.194C3.30684 12.8701 2.66061 13.5625 2.52992 14.394Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21C9.79613 21.6219 10.8475 22 12 22C13.1525 22 14.2039 21.6219 15 21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </m>

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
                <!-- Biodata -->
                <div class="ml-auto mt-4 lg:mt-0 flex justify-center lg:block">
                    <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-sm lg:text-lg hover:bg-[#f0f0f0]">
                        Biodata
                    </button>
                </div>
            </div>

            <!-- Tanggal Penting Section -->
            <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] items-center p-5 h-80 overflow-y-auto">
                <div class="font-bold text-lg text-center">
                    Tanggal Penting
                </div>
                <div class="flex-grow">
                    <ul class="list-disc space-y-2 text-center">
                    </ul>
                </div>
            </div>            
        </div>

        <!-- Notifikasi Pesan Sukses -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Penetapan Jadwal Kuliah Section -->
        <div class="border p-6 rounded-lg mb-6 shadow-md">
            <h2 class="font-semibold text-xl mb-4">Penetapan Jadwal Kuliah</h2>
            <!-- Dropdown Prodi -->
            <div class="mb-4">
                <label for="filterProdi" class="block text-sm font-medium text-gray-700">Pilih Prodi:</label>
                <select id="filterProdi" name="prodi" class="block w-full mt-1 rounded border-gray-300 shadow-sm">
                    <option value="">Pilih Prodi</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->kode_prodi }}" {{ $selectedProdi == $prodi->kode_prodi ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <script>
                // Submit form automatically on dropdown change
                document.getElementById('filterProdi').addEventListener('change', function () {
                    const form = document.createElement('form');
                    form.method = 'GET';
                    form.action = '{{ route("dekan.dashboard") }}';

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'prodi';
                    input.value = this.value;

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                });
            </script>


            <form id="jadwalForm" action="{{ route('dekan.setAllJadwal') }}" method="POST">
                @csrf
                <input type="hidden" name="prodi" value="{{ $selectedProdi }}">
                <table id="jadwalTable" class="w-full table-auto border-collapse">
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
                            <tr data-prodi="{{ $jadwal->mataKuliah->kode_prodi }}">
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
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Setujui Semua</button>
                </div>
            </form>
        </div>

        <!-- Penetapan Ketersediaan Ruang Kelas Section -->
        <div class="border p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-xl mb-4">Penetapan Ketersediaan Ruang Kelas</h2>
            <form id="ruangForm" action="{{ route('dekan.setAllRuang') }}" method="POST">
                @csrf
                <input type="hidden" name="prodi" value="{{ $selectedProdi }}">
                <table id="ruangTable" class="w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama/Kode Ruang</th>
                            <th class="px-4 py-2">Kapasitas</th>
                            <th class="px-4 py-2">Departemen</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruangs as $ruang)
                            @if($ruang->jadwal->count() > 0)
                                <tr>
                                    <td class="border px-4 py-2">{{ $ruang->kode_ruang }}</td>
                                    <td class="border px-4 py-2">{{ $ruang->kapasitas }}</td>
                                    <td class="border px-4 py-2">{{ $ruang->kode_departemen }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('dekan.setRuang') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="kode_ruang" value="{{ $ruang->kode_ruang }}">
                                            <select name="status_ketersediaan[{{ $ruang->kode_ruang }}]" class="border rounded p-1">
                                                <option value="Tersedia" {{ $ruang->status_ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                <option value="Penuh" {{ $ruang->status_ketersediaan == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                                            </select>
                                    </td>
                                    <td class="border px-4 py-2">
                                            <button type="submit" class="bg-blue-500 text-white px-3 py-1">Tetapkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2">Tetapkan Semua</button>
                </div>
            </form>
        </div>
    </main>
    <!-- Footer -->
    <footer class="mt-auto">
        @include('footer')
    </footer>
</div>

<script>
    $(document).ready(function () {
        // Filter Jadwal Berdasarkan Prodi
        $('#filterProdi').on('change', function () {
            const selectedProdi = $(this).val();
            $('#jadwalTable tbody tr').each(function () {
                const rowProdi = $(this).data('prodi');
                $(this).toggle(!selectedProdi || rowProdi === selectedProdi);
            });
        });
    });
</script>
