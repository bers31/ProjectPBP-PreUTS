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
                        <select name="fakultas" 
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

                    <!-- Departemen Input -->
                    <div class="mb-4">
                        <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900">Departemen</label>
                        <select name="kode_departemen" 
                                id="departemen" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected disabled>PILIH DEPARTEMEN</option>
                        </select>
                        @error('departemen')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        // Initial setup: disable departemen, prodi, and nidn if fakultas is not selected
        $('#departemen').prop('disabled', true);

        // Clear localStorage only after successful form submission
        $('form').on('submit', function() {
            // Store the form data temporarily
            const formData = new FormData(this);
            
            // Intercept the form submission
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Clear localStorage only after successful submission
                    localStorage.removeItem('oldFakultas');
                    localStorage.removeItem('oldDepartemen');

                    // Redirect or handle success response
                    window.location.href = response.redirect || '/admin/dashboard';
                },
                error: function(xhr) {
                    // Don't clear localStorage on error
                    // The form will be re-rendered with validation errors
                    // and the stored values will be preserved
                }
            });

            // Prevent default form submission
            return false;
        });

        // Load saved selections from localStorage if they exist
        const savedFakultas = localStorage.getItem('oldFakultas');
        const savedDepartemen = localStorage.getItem('oldDepartemen');

        if (savedFakultas) {
            $('#fakultas').val(savedFakultas);
            loadDepartemen(savedFakultas, function() {
                // Only load the saved departemen if it matches the current fakultas selection
                if (savedDepartemen && $('#departemen').find(`option[value="${savedDepartemen}"]`).length) {
                    $('#departemen').val(savedDepartemen).prop('disabled', false);
                }
            });
        }

        // Event listener for fakultas dropdown change
        $('#fakultas').on('change', function () {
            var idFakultas = this.value;
            localStorage.setItem('oldFakultas', idFakultas);

            // Clear saved departemen, prodi, and nidn if fakultas is changed
            localStorage.removeItem('oldDepartemen');

            $('#departemen').html('<option selected disabled>Loading...</option>').prop('disabled', !idFakultas);

            if (idFakultas) {
                loadDepartemen(idFakultas);
            }
        });

        // Function to load departemen options based on fakultas ID
        function loadDepartemen(idDepartemen, callback) {
            $.ajax({
                url: "{{ url('api/fetch-departemen') }}",
                type: "POST",
                data: {
                    id_fakultas: idDepartemen,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#departemen').html('<option selected disabled>PILIH DEPARTEMEN</option>');
                    $.each(result.departemen, function (key, value) {
                        $("#departemen").append('<option value="' + value.kode_departemen + '">' + value.nama + '</option>');
                    });

                    $('#departemen').prop('disabled', false);
                    if (callback) callback();
                },
                error: function() {
                    $("#departemen").html('<option selected disabled>Error loading options</option>');
                }
            });
        }
    });
    </script>
@include('../footer')
{{-- @endsection --}}
