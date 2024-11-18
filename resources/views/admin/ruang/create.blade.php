{{-- @extends('layouts.app') --}}
@include('../header')
<x-navbar/>
{{-- @section('content') --}}
    <div class="flex flex-col flex-grow">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-semibold mb-6 text-gray-800">Create New Ruang</h1>
        
                <form action="{{ route('ruang.store') }}" method="POST">
                    @csrf

                    <!-- Kode Ruang Input -->
                    <div class="mb-4">
                        <label for="kode_ruang" class="block mb-2 text-sm font-medium text-gray-900">Kode Ruang</label>
                        <input 
                            type="text" 
                            name="kode_ruang" 
                            id="kode_ruang" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('kode_ruang') }}">
                        @error('kode_ruang')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Fakultas Input -->
                    <div class="mb-4">
                        <label for="fakultas" class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                        <select name="kode_fakultas" 
                                id="fakultas" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected disabled>PILIH FAKULTAS</option>
                            @foreach ($fakultas as $data)
                                <option value="{{ $data->kode_fakultas }}" {{ old('fakultas') == $data->kode_fakultas ? 'selected' : ' ' }}>Fakultas {{ $data->nama_fakultas }}</option>
                            @endforeach
                        </select>
                        @error('fakultas')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kapasitas Input -->
                    <div class="mb-4">
                        <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                        <input type="number" name="kapasitas" id="kapasitas" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            required>
                    </div>


                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="alert-create w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Create Ruang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        // Load saved selections from localStorage if they exist
        const savedFakultas = localStorage.getItem('oldFakultas');


        if (savedFakultas) {
            $('#fakultas').val(savedFakultas);
        }

        // Event listener for fakultas dropdown change
        $('#fakultas').on('change', function () {
            var idFakultas = this.value;
            localStorage.setItem('oldFakultas', idFakultas);
        });
    });
    </script>

@include('../footer')
{{-- @endsection --}}

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $(document).on('click', '.alert-create', function(e){
            e.preventDefault();
            // Confirm the delete action
            Swal.fire({
                title: 'Tambah ruang?',
                text: "Yakin ingin menambah ruang?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    $(this).closest("form").submit();
                }
            });
        });
    });
</script>
