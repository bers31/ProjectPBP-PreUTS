@include('header')
<div class="flex flex-col min-h-screen">
    <!--Navbar-->
    <x-navbar/>

    <div class="flex flex-col flex-grow">
        <div class="main-content flex flex-col flex-grow">
            <!--Header-->
            <div class="flex items-center justify-between py-3 p-8">
                <div class="font-bold sm:text-lg md:text-xl sm:pl-0 lg:pl-4">
                    Jadwal Kuliah
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
            <!-- Jadwal Section -->
            <div class="grid grid-cols-1 lg:grid-cols-1 px-6 md:px-12 gap-5">
                <div class="p-6 lg:p-8 border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                    <div class="font-bold text-lg lg:text-xl mb-4">
                        Jadwal Kuliah
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-200 text-left text-sm lg:text-base">
                            <thead class="bg-gray-100">
                                <tr>
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
                                @foreach ($jadwal as $item)
                                <tr class="border-b">
                                    <td class="border border-gray-300 p-3">{{ $item->hari }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jam_mulai }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->jam_selesai }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->mataKuliah->nama_mk }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->kode_kelas }}</td>
                                    <td class="border border-gray-300 p-3">{{ $item->ruang }}</td>
                                    <td class="border border-gray-300 p-3">{{ ucfirst($item->status) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
    
@include('footer')