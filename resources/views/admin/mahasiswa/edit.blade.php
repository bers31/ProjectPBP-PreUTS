@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow">
    <!-- Global Error Message -->
    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Update Mahasiswa</h1>
    
            <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
                @csrf
                @method('PUT') <!-- Tambahkan ini untuk method PUT -->
    
                <!-- NIM Input -->
                <div class="mb-4">
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                    <input 
                        type="text" 
                        name="nim" 
                        id="nim" 
                        class="bg-gray-50 border @error('nim') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('nim', $mahasiswa->nim) }}">
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
                        class="bg-gray-50 border @error('nama') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('nama', $mahasiswa->nama) }}">
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
                        class="bg-gray-50 border @error('email') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('email', $mahasiswa->email) }}">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Prodi Input -->
                <div class="mb-4">
                    <label for="kode_prodi" class="block mb-2 text-sm font-medium text-gray-900">Prodi</label>
                    <select 
                        name="kode_prodi" 
                        id="kode_prodi" 
                        class="bg-gray-50 border @error('kode_prodi') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>PILIH PRODI</option>
                    </select>
                    @error('kode_prodi')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Dosen Wali Input -->
                <div class="mb-4">
                    <label for="doswal" class="block mb-2 text-sm font-medium text-gray-900">Dosen Wali</label>
                    <select 
                        name="doswal" 
                        id="doswal" 
                        class="bg-gray-50 border @error('doswal') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>PILIH DOSEN WALI</option>
                    </select>
                    @error('doswal')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="alert-edit w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Update Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    // Simpan nilai default dari mahasiswa
    const defaultFakultas = "{{ $mahasiswa->prodi->departemen->fakultas->kode_fakultas }}";
    const defaultDepartemen = "{{ $mahasiswa->prodi->departemen->kode_departemen }}";
    const defaultProdi = "{{ $mahasiswa->prodi->kode_prodi }}";
    const defaultNIDN = "{{ $mahasiswa->doswal }}";

    // Initial setup
    $('#departemen').prop('disabled', true);
    $('#kode_prodi').prop('disabled', true);
    $('#doswal').prop('disabled', true);

    // Load departemen berdasarkan fakultas default
    if (defaultFakultas) {
        $('#fakultas').val(defaultFakultas);
        loadDepartemen(defaultFakultas, function() {
            if (defaultDepartemen) {
                $('#departemen').val(defaultDepartemen).prop('disabled', false);
                // Load prodi setelah departemen terisi
                loadProdi(defaultDepartemen, function() {
                    if (defaultProdi) {
                        $('#kode_prodi').val(defaultProdi).prop('disabled', false);
                    }
                });
                // Load NIDN setelah departemen terisi
                loadNIDN(defaultDepartemen, function() {
                    if (defaultNIDN) {
                        $('#doswal').val(defaultNIDN).prop('disabled', false);
                    }
                });
            }
        });
    }

    // Function untuk load departemen
    function loadDepartemen(idFakultas, callback) {
        $.ajax({
            url: "{{ url('api/fetch-departemen') }}",
            type: "POST",
            data: {
                id_fakultas: idFakultas,
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
            }
        });
    }

    // Function untuk load prodi
    function loadProdi(idDepartemen, callback) {
        $.ajax({
            url: "{{ url('api/fetch-prodi') }}",
            type: "POST",
            data: {
                id_departemen: idDepartemen,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#kode_prodi').html('<option selected disabled>PILIH PRODI</option>');
                $.each(result.prodi, function (key, value) {
                    $("#kode_prodi").append('<option value="' + value.kode_prodi + '">' + value.strata + ' ' + value.nama + '</option>');
                });
                $('#kode_prodi').prop('disabled', false);
                if (callback) callback();
            }
        });
    }

    // Function untuk load dosen wali
    function loadNIDN(idDepartemen, callback) {
        $.ajax({
            url: "{{ url('api/fetch-doswal') }}",
            type: "POST",
            data: {
                id_departemen: idDepartemen,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#doswal').html('<option selected disabled>NIDN - NAMA</option>');
                $.each(result.dosen, function (key, value) {
                    $("#doswal").append('<option value="' + value.nidn + '">' + value.nidn + ' - ' + value.nama + '</option>');
                });
                $('#doswal').prop('disabled', false);
                if (callback) callback();
            }
        });
    }

    // Event handlers untuk perubahan dropdown
    $('#fakultas').on('change', function() {
        var idFakultas = this.value;
        $('#departemen').html('<option selected disabled>Loading...</option>').prop('disabled', !idFakultas);
        $('#kode_prodi').html('<option selected disabled>PILIH PRODI</option>').prop('disabled', true);
        $('#doswal').html('<option selected disabled>PILIH NIDN</option>').prop('disabled', true);

        if (idFakultas) {
            loadDepartemen(idFakultas);
        }
    });

    $('#departemen').on('change', function() {
        var idDepartemen = this.value;
        if (idDepartemen) {
            loadProdi(idDepartemen);
            loadNIDN(idDepartemen);
        }
    });
});
</script>
@include('../footer')

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $(document).on('click', '.alert-edit', function(e){
            e.preventDefault();
            // Confirm the delete action
            Swal.fire({
                title: 'Ubah data mahasiswa?',
                text: "Yakin ingin mengubah data mahasiswa?",
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