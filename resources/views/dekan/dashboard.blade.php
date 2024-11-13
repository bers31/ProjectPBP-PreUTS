@include('header')
<div class="flex flex-col h-full">
    <x-navbar/>

    <div class="main-content flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-6">
            <div class="font-bold text-lg md:text-xl pl-6">
                Dashboard Dekan
            </div>
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
        </div>

        <!-- Penetapan Jadwal Kuliah Section -->
        <div class="border p-6 rounded-lg mb-6 shadow-lg">
            <h2 class="font-semibold text-xl mb-4">Penetapan Jadwal Kuliah</h2>
            <table class="table-auto w-full">
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
                            <td class="border px-4 py-2">{{ $jadwal->mata_kuliah }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->hari }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->status }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('dekan.setJadwal') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Tetapkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Penetapan Ketersediaan Ruang Kelas Section -->
        <div class="border p-6 rounded-lg shadow-lg">
            <h2 class="font-semibold text-xl mb-4">Penetapan Ketersediaan Ruang Kelas</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nama Ruang</th>
                        <th class="px-4 py-2">Kapasitas</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangs as $ruang)
                        <tr>
                            <td class="border px-4 py-2">{{ $ruang->nama }}</td>
                            <td class="border px-4 py-2">{{ $ruang->kapasitas }}</td>
                            <td class="border px-4 py-2">{{ $ruang->status_ketersediaan }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('dekan.setRuang') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ruang_id" value="{{ $ruang->id }}">
                                    <select name="status_ketersediaan" class="border rounded p-1">
                                        <option value="Tersedia" {{ $ruang->status_ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Penuh" {{ $ruang->status_ketersediaan == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                                    </select>
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Tetapkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('footer')
</div>