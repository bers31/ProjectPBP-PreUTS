{{-- @extends('layouts.app') --}}
@include('../header')
{{-- @section('content') --}}
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-semibold mb-6 text-gray-800">Create New Mahasiswa</h1>

            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                <!-- NIP Input -->
                <div class="mb-4">
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                    <input 
                        type="text" 
                        name="nim" 
                        id="nim" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('nim') }}">
                    @error('nim')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Input -->
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fakultas Input -->
                <div class="mb-4">
                    <label for="fakultas" class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                    <select name="fakultas" 
                            id="fakultas" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="updateDepartments()
                    ">
                        <option selected disabled>PILIH FAKULTAS</option>
                        <option value="Sains dan Matematika" @selected(old('fakultas') == "Sains dan Matematika" )>Fakultas Sains dan Matematika</option>
                        <option value="Teknik" @selected(old('fakultas') == "Teknik")>Fakultas Teknik</option>
                        <option value="Kedokteran" @selected(old('fakultas') == "Kedokteran")>Fakultas Kedokteran</option>
                    </select>
                    @error('fakultas')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fakultas Input -->
                <div class="mb-4">
                    <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                    <select name="departemen" 
                            id="departemen" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    ">
                        <option selected disabled>PILIH DEPARTEMEN</option>
                    </select>
                    @error('departemen')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Doswal Input -->
                <div class="mb-4">
                    <label for="nip_doswal" class="block mb-2 text-sm font-medium text-gray-900">Pilih Dosen Wali</label>
                    <select name="nip_doswal" 
                            id="nip_doswal" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    ">
                        <option selected disabled>NIP - NAMA</option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->nip }}">{{ $item->nip }} - {{ $item->nama }}</option>
                        @endforeach

                            
                        @endforeach
                    </select>
                    @error('nip_doswal')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Departments data (hardcoded, linked to faculties)
        const departmentsByFaculty = {
            "Sains dan Matematika": ['Informatika', 'Biologi', 'Kimia'],
            "Teknik": ['Teknik Mesin', 'Teknik Sipil', 'Teknik Elektro'],
            "Kedokteran": ['Ilmu Kedokteran Dasar', 'Gizi', 'Keperawatan']
        };
        
        // Function to update the departments dropdown based on selected faculty
        function updateDepartments() {
            const facultyDropdown = document.getElementById('fakultas');
            const departmentDropdown = document.getElementById('departemen');
            const selectedFaculty = facultyDropdown.value;
        
            // Clear current department options
            departmentDropdown.innerHTML = '<option selected disabled>PILIH DEPARTEMEN</option>';
        
            // Populate the department dropdown based on selected faculty
            if (selectedFaculty && departmentsByFaculty[selectedFaculty]) {
                departmentsByFaculty[selectedFaculty].forEach(departemen => {
                    const option = document.createElement('option');
                    option.value = departemen;
                    option.textContent = departemen;
                    departmentDropdown.appendChild(option);
                });
            }
        }
        </script>

@include('../footer')
{{-- @endsection --}}
