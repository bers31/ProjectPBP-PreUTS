@include('header')
<div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <x-navbar/>

    <div class="flex flex-col flex-grow">
        <div class="main-content flex flex-col flex-grow">
            <!-- Header -->
            <div class="flex items-center justify-between py-3 p-8">
                <div class="font-bold sm:text-lg md:text-xl sm:pl-0 lg:pl-4">
                    Jadwal Mengajar Dosen
                </div>
            </div>
            <!-- Jadwal Section -->
            <div class="grid grid-cols-1 lg:grid-cols-1 px-6 md:px-12 gap-5">
                <div class="p-6 lg:p-8 border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="font-bold text-lg lg:text-xl mb-4">
                        Jadwal Mengajar Dosen
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200 text-left text-sm lg:text-base">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 p-3">Nama Dosen</th>
                                    <th class="border border-gray-300 p-3">Hari</th>
                                    <th class="border border-gray-300 p-3">Jam Mulai</th>
                                    <th class="border border-gray-300 p-3">Jam Selesai</th>
                                    <th class="border border-gray-300 p-3">Mata Kuliah</th>
                                    <th class="border border-gray-300 p-3">Kode Kelas</th>
                                    <th class="border border-gray-300 p-3">Ruang</th>
                                    <th class="border border-gray-300 p-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwalMengajar as $item)
                                <tr class="border-b">
                                    <td class="border border-gray-300 p-3">{{ $item->dosen->nama }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->hari }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->jam_mulai }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->jam_selesai }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->mataKuliah->nama_mk }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->kode_kelas }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jadwal->ruang }}</td>
                                    <td class="border border-gray-300 p-3">{{ ucfirst($item->jadwal->status) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
@include('footer')