{{-- @extends('layouts.app') --}}
@include('../header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-navbar/>
{{-- @section('content') --}}
<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Tambah Mata Kuliah</h1>
            <form action="{{ route('matkul.store') }}" method="POST">
                @csrf

                <!-- NIM Input -->
                <div class="mb-4">
                    <label for="kodemk" class="block mb-2 text-sm font-medium text-gray-900">Kode Matakuliah</label>
                    <input 
                        type="text" 
                        name="kode_mk" 
                        id="kodemk" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('kodemk') }}">
                    @error('kode_mk')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Input -->
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Matakuliah</label>
                    <input 
                        type="text" 
                        name="nama_mk" 
                        id="nama" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="semester" class="block mb-2 text-sm font-medium text-gray-900">Semester</label>
                    <input 
                        type="number" 
                        name="semester" 
                        id="semester" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('semester') }}">
                    @error('semester')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sks" class="block mb-2 text-sm font-medium text-gray-900">SKS</label>
                    <input 
                        type="number" 
                        name="sks" 
                        id="sks" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('sks') }}">
                    @error('sks')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kurikulum" class="block mb-2 text-sm font-medium text-gray-900">Kurikulum</label>
                    <input 
                        type="text" 
                        name="kurikulum" 
                        id="kurikulum" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('kurikulum') }}">
                    @error('kurikulum')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kodeprodi" class="block mb-2 text-sm font-medium text-gray-900">Kode Prodi</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="kode_prodi" name="kode_prodi" required>
                        <option value="" selected disabled>Pilih Kode Prodi</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="sifat" class="block mb-2 text-sm font-medium text-gray-900">Sifat</label>
                    <select 
                        name="sifat" 
                        id="sifat" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="" selected disabled>Pilih Sifat</option>
                        <option value="wajib" {{ old('sifat') == 'wajib' ? 'selected' : '' }}>Wajib</option>
                        <option value="pilihan" {{ old('sifat') == 'pilihan' ? 'selected' : '' }}>Pilihan</option>
                    </select>
                    @error('sifat')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Create Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
        // Fetch the prodi data passed from the server
        const prodiList = @json($prodi);

        // Get the Prodi dropdown element
        const prodiSelect = document.getElementById('kode_prodi');

        // Populate the dropdown with options
        prodiList.forEach(prodi => {
            const option = document.createElement('option');
            option.value = prodi.kode_prodi;
            option.textContent = `${prodi.nama} (${prodi.strata})`;
            prodiSelect.appendChild(option);
        });
</script>

@include('../footer')
{{-- @endsection --}}
