{{-- @extends('layouts.app') --}}
@include('../header')
<x-navbar/>
{{-- @section('content') --}}
<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Create New Mahasiswa</h1>
    

            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                <!-- NIM Input -->
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
                    <select name="departemen" 
                            id="departemen" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>PILIH DEPARTEMEN</option>
                    </select>
                    @error('departemen')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Prodi Input -->
                <div class="mb-4">
                    <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900">Prodi</label>
                    <select name="kode_prodi" 
                            id="prodi" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>PILIH PRODI</option>
                    </select>
                    @error('prodi')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dosen Wali Input -->
                <div class="mb-4">
                    <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900">Pilih Dosen Wali</label>
                    <select name="doswal" 
                            id="nidn" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>NIDN - NAMA</option>
                    </select>
                    @error('nidn')
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    // Initial setup: disable departemen, prodi, and nidn if fakultas is not selected
    $('#departemen').prop('disabled', true);
    $('#prodi').prop('disabled', true);
    $('#nidn').prop('disabled', true);

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
                localStorage.removeItem('oldProdi');
                localStorage.removeItem('oldNIDN');
                
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
    const savedProdi = localStorage.getItem('oldProdi');
    const savedNIDN = localStorage.getItem('oldNIDN');

    // If there's a saved fakultas, select it and load the corresponding departemen
    if (savedFakultas) {
        $('#fakultas').val(savedFakultas);
        loadDepartemen(savedFakultas, function() {
            // Only load the saved departemen if it matches the current fakultas selection
            if (savedDepartemen && $('#departemen').find(`option[value="${savedDepartemen}"]`).length) {
                $('#departemen').val(savedDepartemen).prop('disabled', false);
                loadProdi(savedDepartemen, function() {
                    // Only load the saved prodi if it matches the current departemen selection
                    if (savedProdi && $('#prodi').find(`option[value="${savedProdi}"]`).length) {
                        $('#prodi').val(savedProdi).prop('disabled', false);
                    }
                });
                loadNIDN(savedDepartemen, function() {
                    // Only load the saved nidn if it matches the current departemen selection
                    if (savedNIDN && $('#nidn').find(`option[value="${savedNIDN}"]`).length) {
                        $('#nidn').val(savedNIDN).prop('disabled', false);
                    }
                });
            }
        });
    }

    // Event listener for fakultas dropdown change
    $('#fakultas').on('change', function () {
        var idFakultas = this.value;
        localStorage.setItem('oldFakultas', idFakultas);

        // Clear saved departemen, prodi, and nidn if fakultas is changed
        localStorage.removeItem('oldDepartemen');
        localStorage.removeItem('oldProdi');
        localStorage.removeItem('oldNIDN');
        $('#departemen').html('<option selected disabled>Loading...</option>').prop('disabled', !idFakultas);
        $('#prodi').html('<option selected disabled>PILIH PRODI</option>').prop('disabled', true);
        $('#nidn').html('<option selected disabled>PILIH NIDN</option>').prop('disabled', true);

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

    // Event listener for departemen change
    $('#departemen').on('change', function () {
        var idDepartemen = this.value;
        localStorage.setItem('oldDepartemen', idDepartemen);
        $('#prodi').prop('disabled', !idDepartemen);
        $('#nidn').prop('disabled', !idDepartemen);

        if (idDepartemen) {
            loadProdi(idDepartemen);
            loadNIDN(idDepartemen);
        } else {
            $('#prodi').prop('disabled', true).html('<option selected disabled>PILIH PRODI</option>');
            $('#nidn').prop('disabled', true).html('<option selected disabled>PILIH NIDN</option>');
        }
    });

    // Function to load prodi options
    function loadProdi(idDepartemen, callback) {
        $("#prodi").html('<option selected disabled>Loading...</option>');
        $.ajax({
            url: "{{ url('api/fetch-prodi') }}",
            type: "POST",
            data: {
                id_departemen: idDepartemen,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#prodi').html('<option selected disabled>PILIH PRODI</option>');
                $.each(result.prodi, function (key, value) {
                    $("#prodi").append('<option value="' + value.kode_prodi + '">' + value.strata + ' ' + value.nama + '</option>');
                });

                $('#prodi').prop('disabled', false);
                if (callback) callback();
            },
            error: function() {
                $("#prodi").html('<option selected disabled>Error loading options</option>');
            }
        });
    }

    // Function to load NIDN options
    function loadNIDN(idDepartemen, callback) {
        $("#nidn").html('<option selected disabled>Loading...</option>');
        $.ajax({
            url: "{{ url('api/fetch-doswal') }}",
            type: "POST",
            data: {
                id_departemen: idDepartemen,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#nidn').html('<option selected disabled>NIDN - NAMA</option>');
                $.each(result.dosen, function (key, value) {
                    $("#nidn").append('<option value="' + value.nidn + '">' + value.nidn + ' - '+ value.nama + '</option>');
                });

                $('#nidn').prop('disabled', false);
                if (callback) callback();
            },
            error: function() {
                $("#nidn").html('<option selected disabled>Error loading options</option>');
            }
        });
    }

    // Save selected prodi to localStorage on change
    $('#prodi').on('change', function () {
        var selectedProdi = this.value;
        localStorage.setItem('oldProdi', selectedProdi);
    });

    // Save selected nidn to localStorage on change
    $('#nidn').on('change', function () {
        var selectedNIDN = this.value;
        localStorage.setItem('oldNIDN', selectedNIDN);
    });
});
</script>




    
@include('../footer')
{{-- @endsection --}}
