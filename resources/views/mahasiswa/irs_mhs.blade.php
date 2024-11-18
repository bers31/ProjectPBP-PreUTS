@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                IRS
            </div>
        </div>

        <!-- Content -->
        <div class="flex py-3 p-8">
            <!-- SideBar Information -->
            <div class="flex flex-col pl-4 w-1/4">
                <!-- Info Mahasiswa -->
                <div class="p-5 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <p class="font-bold">Nama : </p>
                    <p>{{ Auth::user()->mahasiswa->nama }}</p>
                    <p class="font-bold">NIM : </p>
                    <p>{{ Auth::user()->mahasiswa->nim }}</p>
                    <p class="font-bold">Tahun Akademik : </p>
                    <p>{{ Auth::user()->mahasiswa->tahun_akademik }} ({{Auth::user()->mahasiswa->semester % 2 != 0 ? 'Ganjil' : 'Genap'}})</p>
                    <p class="font-bold">Semester : </p>
                    <p>{{ Auth::user()->mahasiswa->semester }}</p>
                    <p class="font-bold">IPK : </p>
                    <p>{{ Auth::user()->mahasiswa->ipk }}</p>
                </div>
            </div>
            <!-- IRS Calendar -->
            <div class="mx-5">
                <section class="relative border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="w-full max-w-7xl mx-auto px-6 lg:px-8 overflow-x-auto">
                        <!-- Row Hari -->
                        <div class=" relative">
                            <div class="grid grid-cols-6 border-t border-gray-200 sticky top-0 left-0 w-full">
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900"></div>
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900">Senin</div>
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900">Selasa</div>
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900">Rabu</div>
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900">kamis</div>
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium  text-gray-900">Jum'at</div>
                            </div>
                        <!-- Jadwal -->
                        <div class="hidden grid-cols-6 sm:grid w-full overflow-x-auto">
                            <!-- Row Jam 06.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5 border-t border-r border-gray-200 flex items-center justify-center transition-all">
                                <span class="text-xs font-semibold text-gray-400">06:00 am</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '06:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '06:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '06:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '06:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '06:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>

                            <!-- Row Jam 07.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5 border-t border-r border-gray-200 flex items-center justify-center transition-all">
                                <span class="text-xs font-semibold text-gray-400">07:00 am</span>
                            </div>
                                    <!-- Senin -->
                                    <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                        @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '07:00:00') as $jadwal)
                                        <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                            <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                            <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                            <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Selasa -->
                                    <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                        @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '07:00:00') as $jadwal)
                                        <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                            <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                            <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                            <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Rabu -->
                                    <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                        @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '07:00:00') as $jadwal)
                                        <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                            <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                            <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                            <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Kamis -->
                                    <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                        @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '07:00:00') as $jadwal)
                                        <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                            <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                            <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                            <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Jumat -->
                                    <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                        @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '07:00:00') as $jadwal)
                                        <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                            <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                            <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                            <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                            
                            
                            <!-- Row Jam 08.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">08:00 am</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '08:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '08:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '08:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '08:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '08:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            
                            <!-- Row Jam 09.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">09:00 am</span>
                            </div>
                                    <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '09:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '09:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '09:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '09:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '09:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                        
                            
                            <!-- Row Jam 10.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">10:00 am</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '10:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '10:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '10:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '10:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '10:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            
                            <!-- Row Jam 11.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">11:00 am</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '11:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '11:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '11:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '11:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '11:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                
                            
                            <!-- Row Jam 12.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">12:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '12:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '12:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '12:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '12:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '12:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>

                            <!-- Row Jam 13.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">13:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '13:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '13:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '13:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '13:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '13:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>

                            <!-- Row Jam 14.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">14:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '14:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '14:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '14:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '14:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '14:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            <!-- Row Jam 15.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">15:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '15:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '15:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '15:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '15:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '15:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>

                            <!-- Row Jam 16.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">16:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '16:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '16:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '16:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '16:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '16:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            <!-- Row Jam 17.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">17:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '17:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '17:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '17:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '17:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '17:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            <!-- Row Jam 18.00 -->
                            <div class="h-auto min-h-32 p-0.5 md:p-3.5 border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                <span class="text-xs font-semibold text-gray-400">18:00 pm</span>
                            </div>
                                <!-- Senin -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Senin')->where('jam_mulai', '18:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Selasa -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'selasa')->where('jam_mulai', '18:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Rabu -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Rabu')->where('jam_mulai', '18:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Kamis -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 transition-all ">
                                    @foreach ($jadwals->where('hari', 'Kamis')->where('jam_mulai', '18:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Jumat -->
                                <div class="h-auto min-h-32 p-0.5 md:p-3.5   border-t border-r border-gray-200 flex items-center justify-center transition-all ">
                                    @foreach ($jadwals->where('hari', 'Jumat')->where('jam_mulai', '18:00:00') as $jadwal)
                                    <div class="rounded m-2 p-2 border-l-2 border-purple-600 bg-purple-50">
                                        <p class="text-xs font-normal text-gray-900 mb-px">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kode_kelas }})</p>
                                        <p class="text-xs font-semibold text-purple-600">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                                        <p class="text-xs font-normal text-gray-600">Ruang: {{ $jadwal->ruang }}</p>
                                    </div>
                                    @endforeach
                                </div>
                        </div>  
                </section>                                
            </div>
        </div>
    </div>


@include('footer')