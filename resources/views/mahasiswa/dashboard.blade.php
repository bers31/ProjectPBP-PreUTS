@include('header')
    <div class="flex flex-col">
        <!--Navbar-->
        <x-navbar_mhs></x-navbar_mhs>
        
        <!--Header-->
        <div class="flex items-center justify-between py-3">
            <div class="font-bold text-xl pl-12">
                Dashboard Mahasiswa
            </div>
            <div class="pr-10">
                <button class="group hover:bg-[#DE2227] hover:rounded-xl p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" class="stroke-current text-black group-hover:text-white fill-none">
                        <path d="M2.52992 14.394C2.31727 15.7471 3.268 16.6862 4.43205 17.1542C8.89481 18.9486 15.1052 18.9486 19.5679 17.1542C20.732 16.6862 21.6827 15.7471 21.4701 14.394C21.3394 13.5625 20.6932 12.8701 20.2144 12.194C19.5873 11.2975 19.525 10.3197 19.5249 9.27941C19.5249 5.2591 16.1559 2 12 2C7.84413 2 4.47513 5.2591 4.47513 9.27941C4.47503 10.3197 4.41272 11.2975 3.78561 12.194C3.30684 12.8701 2.66061 13.5625 2.52992 14.394Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21C9.79613 21.6219 10.8475 22 12 22C13.1525 22 14.2039 21.6219 15 21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <!-- Logout Button -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="group hover:bg-[#DE2227] hover:rounded-xl p-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" 
                         class="stroke-current text-black group-hover:text-white">
                        <path d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h8.25" 
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-black group-hover:text-white font-medium">Logout</span>
                </button>
            </div>
        </div>


        <!-- Profile // Tanggal Penting Section -->
        <div class="grid grid-cols-4 px-12 gap-5">    
            <div class="col-span-3 flex p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <!-- Foto Profile -->
                <div class="p-5">
                    <img class="rounded-full w-52 h-52 object-cover" src="\img\Pasfoto.png" alt="pasfoto">
                </div>
                <!-- Info Profile -->
                <div class="flex flex-col justify-center gap-2">
                    <h2 class="text-5xl font-bold"> {{ Auth::user()->mahasiswa->nama }}</h2>                          <!-- Nama -->
                    <p class="text-lg text-gray-600">NIM: {{ Auth::user()->mahasiswa->nim }}</p>                 <!-- NIM -->
                    <p class="text-lg text-gray-600">Fakultas {{ Auth::user()->mahasiswa->fakultas }}</p>  <!-- Fakultas -->
                    <p class="text-lg text-gray-600">Departemen {{ Auth::user()->mahasiswa->departemen }}</p>                    <!-- Prodi -->
                    <p class="text-lg text-blue-500">{{ Auth::user()->mahasiswa->email }}</p>   <!-- Email -->
                </div>
                <!-- Biodata -->
                <div class="ml-auto">
                    <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-lg hover:bg-[#f0f0f0]">
                        Biodata
                    </button>
                </div>
            </div>

            <!-- Tanggal Penting Section -->
            <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] items-center p-5 self-stretch ">
                <div class="font-bold text-lg">
                    Tanggal Penting
                </div>
                <div class="">
                    <ul>
                        <li>Terakhir pengisian IRS: 10-juni-2024</li>       <!--List Tanggal Penting-->
                    </ul>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-6 gap-5 px-12 py-6">
            <!-- Jadwal Kuliah & Registrasi Section -->
            <div class="grid grid-rows-2 col-span-1 gap-5">
                <!-- Jadwal Kuliah -->
                <div class="flex items-center justify-center p-8 border-2 border-[#80747475] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="flex items-center gap-5 p-1">  
                        <img src="\img\jadwalkuliah-logo.svg" alt="jadwal_kuliah">
                        <p class="font-semibold text-lg">Jadwal Kuliah</p>
                    </div>
                </div>
                <!-- Registrasi -->
                <div class="flex items-center justify-center p-8 border-2 border-[#80747475] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="flex items-center gap-5 p-1">
                        <img src="\img\registrasi.svg" alt="jadwal_kuliah">
                        <p class="font-semibold text-lg">Registrasi</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Akademik Section -->
            <div class="flex flex-col col-span-3 p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <div class="font-bold text-xl mb-2">
                    Informasi Akademik
                </div>
                <!-- Informasi Dosen -->
                <div class="flex justify-between mb-4">
                    <div class="flex flex-col text-lg">
                        <p>Dosen Wali: {{Auth::user()->mahasiswa->dosen->nama}}</p>
                        <p>NIP: {{Auth::user()->mahasiswa->dosen->nip}}</p>
                    </div>
                    <div class="">
                        <button class="mt-2 p-2 flex items-center border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:bg-[#f0f0f0] align-top">
                        <img src="\img\message-icon.svg" alt="">
                        Hubungi
                        </button>
                    </div>
                </div>
                <!-- Informasi Akademik Mahasiswa -->
                <div class="flex justify-between font-bold pt-14">
                    <div class="text-center">
                        <p>Tahun Akademik</p>
                        <p>{{Auth::user()->mahasiswa->tahun_akademik}} ({{Auth::user()->mahasiswa->semester % 2 != 0 ? 'Ganjil' : 'Genap'}})</p>
                    </div>
                    <div class="text-center">
                        <p>Semester Studi</p>
                        <p>{{Auth::user()->mahasiswa->semester}}</p>
                    </div>
                    <div class="text-center">
                        <p>Status Akademik</p>
                        <p>{{Str::upper(Auth::user()->mahasiswa->status)}}</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi Akademik & Informasi Section -->
            <div class="grid col-span-2 gap-5">
                <!-- Prestasi Akademik -->
                <div class="p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="font-bold text-xl mb-2 items-center text-center">
                        Prestasi Akademik
                    </div>
                    <div class="flex justify-center gap-10">
                        <div class="text-center">
                            <p class="font-semibold">IPK</p>
                            <p>{{Auth::user()->mahasiswa->ipk}}</p>
                        </div>
                        <div class="text-center">
                            <p class="font-semibold">SKS</p>
                            <p>{{Auth::user()->mahasiswa->sks}}</p>
                        </div>
                    </div>
                </div>
                <!-- Informasi -->
                <div class="p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="font-bold text-xl mb-2">Informasi</div>
                    <ul class="list-disc ml-4">
                        <li>Pilihan Mata kuliah tambahan "Kewirausahaan" anda telah dibatalkan karena kuota kelas diperlukan untuk semester.</li>   <!--List Informasi-->
                    </ul>
                </div>
            </div>
        </div>

    </div>

    @include('footer')