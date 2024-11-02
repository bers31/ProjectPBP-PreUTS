@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Status Akademik
            </div>
        </div>
        
        <!-- Perintah -->
        <div class="text-center p-7 md:p-4">
            <p class="font-bold text-lg">
                Silakan pilih salah satu status akademik berikut untuk semester ini:
            </p>
        </div>
        
        <!-- Status Container -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 m-5 justify-center">  
                <div class="col-span-1">
                    <!-- Registrasi/Aktif Container -->
                    <div class="flex flex-col m-10 border-2 p-5 max-w-xl border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                        <div class="text-xl font-bold text-center">
                            <p>Aktif</p>
                        </div>
                        <div class="grid grid-cols-3">
                            <!-- Image -->
                            <div class="col-span-1 flex justify-center pr-5">
                                <!-- SVG Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120" color="#000000" fill="none">
                                    <path d="M19 14H20.2389C21.3498 14 22.1831 15.0805 21.9652 16.2386L21.7003 17.6466C21.4429 19.015 20.3127 20 19 20" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M5 14H3.76113C2.65015 14 1.81691 15.0805 2.03479 16.2386L2.29967 17.6466C2.55711 19.015 3.68731 20 5 20" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M18.2696 10.5L18.7911 15.1967C19.071 18.379 19.211 19.9701 18.2696 20.985C17.3283 22 15.7125 22 12.481 22H11.519C8.2875 22 6.67174 22 5.73038 20.985C4.78901 19.9701 4.92899 18.379 5.20893 15.1967L5.73038 10.4999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M15 5C15 3.34315 13.6569 2 12 2C10.3431 2 9 3.34315 9 5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M5.2617 8.86971C5.01152 7.45403 4.88643 6.74619 5.13559 6.20431C5.30195 5.84248 5.57803 5.53512 5.9291 5.32087C6.45489 5 7.21577 5 8.73753 5H15.2625C16.7842 5 17.5451 5 18.0709 5.32087C18.422 5.53512 18.698 5.84248 18.8644 6.20431C19.1136 6.74619 18.9885 7.45403 18.7383 8.86971L18.6872 9.15901C18.5902 9.70796 18.5417 9.98243 18.446 10.2349C18.2806 10.671 18.0104 11.0651 17.6565 11.3863C17.4517 11.5722 17.2062 11.7266 16.7153 12.0353C16.2537 12.3255 16.0229 12.4706 15.779 12.5845C15.3579 12.7812 14.905 12.9105 14.439 12.9672C14.169 13 13.8916 13 13.3369 13H10.6631C10.1084 13 9.831 13 9.56102 12.9672C9.09497 12.9105 8.64214 12.7812 8.22104 12.5845C7.9771 12.4706 7.74632 12.3255 7.28474 12.0353C6.79376 11.7266 6.54827 11.5722 6.34346 11.3863C5.98959 11.0651 5.7194 10.671 5.55404 10.2349C5.45833 9.98243 5.40983 9.70796 5.31282 9.15901L5.2617 8.86971Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12 10.0024L12.0087 10.0001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <!-- Pilih Status Aktif -->
                            <div class="col-span-2 p-3">
                                <p>Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                                <div class="flex justify-end mt-3">
                                    @if (Str::upper(Auth::user()->mahasiswa->status) == 'NON-AKTIF')
                                        <form action="{{ route('mahasiswa.registrasi_mhs') }}" method="GET">
                                            <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-[#0089DE] hover:bg-[#f0f0f0]">
                                                Registrasi
                                            </button>
                                        </form>
                                    @else
                                        <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0]">
                                            <svg width="25" height="23" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M28 14C28 7.37258 22.1796 2 15 2C7.82029 2 2 7.37258 2 14C2 20.6274 7.82029 26 15 26C22.1796 26 28 20.6274 28 14Z" stroke="black" stroke-width="3"/>
                                                <path d="M9.80005 14.5999L13.05 17.5999L20.2 10.3999" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                
                <!-- Cuti Container -->
                <div class="col-span-1">    
                    <div class="flex flex-col m-10 border-2 p-5 max-w-xl border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                        <div class="text-xl font-bold text-center">
                            <p>Cuti</p>
                        </div>
                        <div class="grid grid-cols-3">
                            <!-- Image -->
                            <div class="col-span-1 flex justify-center pr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120" color="#000000" fill="none">
                                    <path d="M7 12V21M17 12V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.5 13.75C2.5 10.0966 2.5 8.26992 3.61299 7.13496C4.72599 6 6.51733 6 10.1 6H13.9C17.4827 6 19.274 6 20.387 7.13496C21.5 8.26992 21.5 10.0966 21.5 13.75C21.5 17.4034 21.5 19.2301 20.387 20.365C19.274 21.5 17.4827 21.5 13.9 21.5H10.1C6.51733 21.5 4.72599 21.5 3.61299 20.365C2.5 19.2301 2.5 17.4034 2.5 13.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M16.5 6L16.4007 5.69094C15.9056 4.15089 15.6581 3.38087 15.0689 2.94043C14.4796 2.5 13.697 2.5 12.1316 2.5H11.8684C10.303 2.5 9.52036 2.5 8.93111 2.94043C8.34186 3.38087 8.09436 4.15089 7.59934 5.69094L7.5 6" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </div>
                            <!-- Pilih Status Cuti -->
                            <div class="col-span-2 p-3">
                                <p>Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</p>
                                <div class="flex justify-end mt-3">
                                    <form>
                                        <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-[#FF4A6B] hover:bg-[#f0f0f0]">
                                            Cuti
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Terkini Section --> 
        <div class="mx-auto w-fit border-2 p-5 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] m-3">
            <p class="text-lg font-bold">
                Status Akademik: 
                <span class="font-semibold rounded-lg my-4 px-3 py-1
                    @if (Str::upper(Auth::user()->mahasiswa->status) == 'AKTIF')
                        bg-green-500
                    @elseif (Str::upper(Auth::user()->mahasiswa->status) == 'NON AKTIF')
                        bg-red-500
                    @elseif (Str::upper(Auth::user()->mahasiswa->status) == 'CUTI')
                        bg-[#FF4A6B]
                    @else
                        bg-gray-500
                    @endif
                ">
                    {{ Str::upper(Auth::user()->mahasiswa->status) }}
                </span>
            </p>
        </div>
    </div>
@include('footer')
