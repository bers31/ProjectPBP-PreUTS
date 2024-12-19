@include('header')
<div class="flex flex-col h-full">
    <x-navbar/>
    <main class="flex-1 p-6">
        <div class="text-lg font-bold mb-4">Dashboard Akademik  
        </div>
        <div class="flex items-center gap-3 ml-auto pr-6">
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

        <!-- Profile Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5 mb-6">
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-md">
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
                </div>
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold">Akademik</h2>
                    <p class="text-lg text-gray-600">Fakultas {{ Auth::user()->akademik->kode_fakultas }}</p>
                    <p class="text-lg text-gray-600">Bagian Akademik</p>
                    <p class="text-lg text-blue-500">{{ Auth::user()->akademik->email }}</p>
                </div>
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

        <!-- Penetapan Kapasitas Ruang Kelas Section -->
        <div class="p-6 space-y-6">
            <h2 class="text-2xl font-bold text-gray-800">Room Management</h2>
            <a href={{ route('ruang.index') }} class="group block">
                <div class="relative overflow-hidden bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-white group-hover:text-gray-100">Manage Rooms</h3>
                            <p class="text-gray-200 mt-1">View and edit room details, capacity, and assignments</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 group-hover:text-white" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-width="2" d="M12 7v10m5-5H7"/>
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-blue-300 to-blue-600 transform transition-all duration-300 scale-x-0 group-hover:scale-x-100"></div>
                </div>
            </a>
        </div>
    </main>
    <!-- Footer -->
    <footer class="mt-auto">
        @include('footer')
    </footer>
</div>

<!-- DataTables JS dan Inisialisasi -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style>
    .dataTables_length select {
        width: 3rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 6px;
        margin: 0 4px;
    }
    .dataTables_filter input {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 10px;
        margin-left: 8px;
        margin-bottom: 5px;
    }
    .top {
        padding: 8px 0;
        margin-bottom: 8px;
    }
</style>

<script>
    import React from 'react';
    import { Activity, DoorOpen, Users, Settings } from 'lucide-react';

    const RoomManagementCard = () => {
    return (
        <div className="p-6 space-y-6">
        <h2 className="text-2xl font-bold text-gray-800">Room Management</h2>

        {/* Stats Overview */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div className="bg-blue-50 p-4 rounded-lg border border-blue-100">
            <div className="flex items-center space-x-3">
                <DoorOpen className="text-blue-600" size={24} />
                <div>
                <p className="text-sm text-gray-600">Total Rooms</p>
                <p className="text-xl font-bold text-gray-800">24</p>
                </div>
            </div>
            </div>

            <div className="bg-green-50 p-4 rounded-lg border border-green-100">
            <div className="flex items-center space-x-3">
                <Users className="text-green-600" size={24} />
                <div>
                <p className="text-sm text-gray-600">Total Capacity</p>
                <p className="text-xl font-bold text-gray-800">1,250</p>
                </div>
            </div>
            </div>

            <div className="bg-purple-50 p-4 rounded-lg border border-purple-100">
            <div className="flex items-center space-x-3">
                <Activity className="text-purple-600" size={24} />
                <div>
                <p className="text-sm text-gray-600">Active Rooms</p>
                <p className="text-xl font-bold text-gray-800">18</p>
                </div>
            </div>
            </div>
        </div>

        {/* Quick Actions */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a
            href="/room-management"
            className="group relative overflow-hidden bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-2xl"
            >
            <div className="flex items-center justify-between">
                <div>
                <h3 className="text-lg font-semibold text-white group-hover:text-gray-100">Manage Rooms</h3>
                <p className="text-gray-200 mt-1">View and edit room details, capacity, and assignments</p>
                </div>
                <Settings className="text-gray-100 group-hover:text-white transition-colors" size={24} />
            </div>
            <div className="absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-blue-300 to-blue-600 transform transition-all duration-300 scale-x-0 group-hover:scale-x-100"></div>
            </a>

            <a
            href="/room-management/schedule"
            className="group relative overflow-hidden bg-gradient-to-r from-green-500 to-green-700 p-6 rounded-lg shadow-lg transform transition hover:scale-105 hover:shadow-2xl"
            >
            <div className="flex items-center justify-between">
                <div>
                <h3 className="text-lg font-semibold text-white group-hover:text-gray-100">Room Schedule</h3>
                <p className="text-gray-200 mt-1">View and manage room schedules and bookings</p>
                </div>
                <Activity className="text-gray-100 group-hover:text-white transition-colors" size={24} />
            </div>
            <div className="absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-green-300 to-green-600 transform transition-all duration-300 scale-x-0 group-hover:scale-x-100"></div>
            </a>
        </div>
        </div>
    );
    };

    export default RoomManagementCard;
</script>