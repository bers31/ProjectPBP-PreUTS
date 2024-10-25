@include('header')
<div class="flex flex-col">
    <!--Navbar-->
    <nav class="bg-white shadow-lg">
        <div class="max-w-8xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-12 w-auto" href="https://www.academicindonesia.com/wp-content/uploads/2016/09/Logo-undip-Universitas-Diponegoro.png" alt="Logo">
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden md:flex md:items-center md:ml-6 space-x-8">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="{{ route('users.index') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Users</a>
                        <a href="{{ route('mahasiswa.index') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Mahasiswa</a>
                        <a href="{{ route('dosen.index') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Dosen</a>
                    </div>
                </div>
                <!-- Right Side - User Menu -->
                <div class="flex items-center">
                    <div class="ml-3 relative">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-900">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!--Header-->
    <div class="flex items-center justify-between py-3">
        <div class="font-bold text-xl pl-12">
            Dashboard Admin
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
        <div class="pr-10">
            <button class="group hover:bg-[#DE2227] hover:rounded-xl p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" class="stroke-current text-black group-hover:text-white fill-none">
                    <path d="M2.52992 14.394C2.31727 15.7471 3.268 16.6862 4.43205 17.1542C8.89481 18.9486 15.1052 18.9486 19.5679 17.1542C20.732 16.6862 21.6827 15.7471 21.4701 14.394C21.3394 13.5625 20.6932 12.8701 20.2144 12.194C19.5873 11.2975 19.525 10.3197 19.5249 9.27941C19.5249 5.2591 16.1559 2 12 2C7.84413 2 4.47513 5.2591 4.47513 9.27941C4.47503 10.3197 4.41272 11.2975 3.78561 12.194C3.30684 12.8701 2.66061 13.5625 2.52992 14.394Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9 21C9.79613 21.6219 10.8475 22 12 22C13.1525 22 14.2039 21.6219 15 21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Profile // System Status Section -->
    <div class="grid grid-cols-4 px-12 gap-5">    
        <div class="col-span-3 flex p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <!-- Foto Profile -->
            <div class="p-5">
                <img class="rounded-full w-52 h-52 object-cover" src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" alt="admin-profile">
            </div>
            <!-- Info Profile -->
            <div class="flex flex-col justify-center gap-2">
                <h2 class="text-5xl font-bold">Administrator</h2>
                <p class="text-lg text-gray-600">Role: {{ auth()->user()->role }}</p>
                <p class="text-lg text-blue-500">{{ auth()->user()->email }}</p>
            </div>
            <!-- Settings -->
            <div class="ml-auto">
                <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-lg hover:bg-[#f0f0f0]">
                    Settings
                </button>
            </div>
        </div>

        <!-- System Status Section -->
        <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] items-center p-5 self-stretch">
            <div class="font-bold text-lg">
                System Status
            </div>
            <div class="">
                <ul>
                    @if (session('success'))
                    <li class="text-green-600">{{ session('success') }}</li>
                    @endif
                    <li>System running normally</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-6 gap-5 px-12 py-6">
        <!-- Quick Actions Section -->
        <div class="grid grid-rows-2 col-span-1 gap-5">
            <!-- User Management -->
            <div class="flex items-center justify-center p-8 border-2 border-[#80747475] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <a href="{{ route('users.index') }}" class="flex items-center gap-5 p-1 hover:text-blue-500">  
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <p class="font-semibold text-lg">Manage Users</p>
                </a>
            </div>
            <!-- Create Users -->
            <div class="flex items-center justify-center p-8 border-2 border-[#80747475] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <form action="{{ route('admin.createUsers') }}" method="POST" class="w-full" onsubmit="return confirm('Are you sure you want to create user accounts for all lecturers and students?');">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-5 p-1 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <p class="font-semibold text-lg">Create Users</p>
                    </button>
                </form>
            </div>
        </div>

        <!-- Management Section -->
        <div class="flex flex-col col-span-3 p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <div class="font-bold text-xl mb-2">
                Management Panel
            </div>
            <!-- Management Links -->
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('mahasiswa.index') }}" class="p-4 border-2 rounded-lg hover:bg-blue-50">
                    <h3 class="font-semibold text-lg">Mahasiswa Management</h3>
                    <p class="text-gray-600">Manage student data and records</p>
                </a>
                <a href="{{ route('dosen.index') }}" class="p-4 border-2 rounded-lg hover:bg-blue-50">
                    <h3 class="font-semibold text-lg">Dosen Management</h3>
                    <p class="text-gray-600">Manage lecturer data and assignments</p>
                </a>
            </div>
            <!-- Additional Info -->
            <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                <p class="text-gray-600">Use the management panel to maintain and update system data.</p>
            </div>
        </div>

        <!-- System Info & Notifications Section -->
        <div class="grid col-span-2 gap-5">
            <!-- System Info -->
            <div class="p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <div class="font-bold text-xl mb-2 items-center text-center">
                    System Information
                </div>
                <div class="flex justify-center gap-10">
                    <div class="text-center">
                        <p class="font-semibold">Total Users</p>
                        <p></p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">Active Sessions</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <!-- Notifications -->
            <div class="p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <div class="font-bold text-xl mb-2">Notifications</div>
                <ul class="list-disc ml-4">
                    <li>System maintenance scheduled for next weekend</li>
                    <li>5 new user registrations pending approval</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('footer')