@include('header')
<div class="flex flex-col h-full">
    <!--Navbar-->
    <x-navbar_dosen></x-navbar_dosen>

    <div class="main-content flex flex-col flex-grow">
        <!--Header-->
        <div class="flex items-center justify-between py-3 p-6">
            <div class="font-bold text-lg md:text-xl pl-6">
                Dashboard Dosen
            </div>
            <div class="pr-10 flex items-center gap-4">
        <!-- Notification Button -->
        <button class="group hover:bg-[#DE2227] hover:rounded-xl p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" class="stroke-current text-black group-hover:text-white fill-none">
                <path d="M2.52992 14.394C2.31727 15.7471 3.268 16.6862 4.43205 17.1542C8.89481 18.9486 15.1052 18.9486 19.5679 17.1542C20.732 16.6862 21.6827 15.7471 21.4701 14.394C21.3394 13.5625 20.6932 12.8701 20.2144 12.194C19.5873 11.2975 19.525 10.3197 19.5249 9.27941C19.5249 5.2591 16.1559 2 12 2C7.84413 2 4.47513 5.2591 4.47513 9.27941C4.47503 10.3197 4.41272 11.2975 3.78561 12.194C3.30684 12.8701 2.66061 13.5625 2.52992 14.394Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 21C9.79613 21.6219 10.8475 22 12 22C13.1525 22 14.2039 21.6219 15 21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <!-- Logout Button -->
        <form id="logout-form-dosen" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <button onclick="event.preventDefault(); document.getElementById('logout-form-dosen').submit();" 
                class="group hover:bg-[#DE2227] hover:rounded-xl p-2 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" 
                 class="stroke-current text-black group-hover:text-white">
                <path d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h8.25" 
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-black group-hover:text-white font-medium">Logout</span>
        </button>
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

        <!-- Profile // Tanggal Penting Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5">    
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <!-- Foto Profile -->
                <div class="p-5">
                    <img class="rounded-full w-52 h-52 object-cover" src="img/Pasfoto.png">
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="\img\Pasfoto.png" alt="pasfoto">
                </div>
                <!-- Info Profile -->
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold"> {{ Auth::user()->dosen->nama }}</h2>              <!-- Nama -->
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->nip }}</p>             <!-- NIM -->
                    <p class="text-lg text-gray-600">Fakultas Sains dan Matematika</p>              <!-- Fakultas -->
                    <p class="text-lg text-gray-600">Informatika</p>                                <!-- Prodi -->
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
                    <div class="flex items-center gap-5 p-1 text-center">  
                        <img src="\img\jadwalkuliah-logo.svg" alt="jadwal_kuliah" class="w-10 md:w-8 lg:w-10">
                        <p class="font-semibold text-lg md:text-sm lg:text-lg">
                            Jadwal Mengajar
                        </p>
                    </div>
                </div>
                <!-- Registrasi -->
                <div class="flex items-center justify-center p-8 md:p-4 lg:p-8 border-2 border-[#80747475] hover:bg-[#f0f0f0] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="flex items-center gap-5 p-1 text-center md:flex-co lg:flex-row">
                        <img src="\img\registrasi.svg" alt="registrasi" class="w-10 md:w-8 lg:w-10">
                        <p class="font-semibold text-lg md:text-sm lg:text-lg">
                            Kulon
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Informasi Akademik Section -->
            <div class="flex flex-col col-span-1 lg:col-span-3 p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] h-full">
                <div class="font-bold text-lg lg:text-xl">
                    Jadwal Mengajar Hari ini
                </div>
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
                        <p>45</p>
                        <br><p>IRS menunggu :</p>
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>      
@include('footer')