@include('../header')
<x-navbar/>

    {{-- @section('content') --}}
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
                <h1 class="text-3xl font-semibold mb-6 text-gray-800">Update Ruang</h1>
        
                <form action="{{ route('ruang.update', $ruang->kode_ruang) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Tambahkan ini untuk method PUT -->
        
                    <!-- kode ruang Input -->
                    <div class="mb-4">
                        <label for="kode_ruang" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                        <input 
                            type="text" 
                            name="kode_ruang" 
                            id="kode_ruang" 
                            class="bg-gray-50 border @error('nim') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('kode_ruang', $ruang->kode_ruang) }}">
                        @error('nim')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <!-- departemen Input -->
                    <div class="mb-4">
                        <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900">departemen</label>
                        <select name="kode_departemen" 
                                id="departemen" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected disabled>PILIH departemen</option>
                            @foreach ($departemen as $data)
                                <option value="{{ $data->kode_departemen }}" {{ old('departemen') == $data->kode_departemen ? 'selected' : ' ' }}>{{ $data->kode_departemen }}</option>
                            @endforeach
                        </select>
                        @error('departemen')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kapasitas Input -->
                    <div class="mb-4">
                        <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                        <input type="number" name="kapasitas" id="kapasitas" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ old('kapasitas', $ruang->kapasitas) }}"
                            required>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="alert-edit w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Update Ruang
                        </button>
                    </div>
                </form>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        // Load saved selections from localStorage if they exist
        const saveddepartemen = localStorage.getItem('olddepartemen');

        if (saveddepartemen) {
            $('#departemen').val(saveddepartemen);
        }

        // Event listener for departemen dropdown change
        $('#departemen').on('change', function () {
            var iddepartemen = this.value;
            localStorage.setItem('olddepartemen', iddepartemen);
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
                title: 'Ubah data ruang?',
                text: "Yakin ingin mengubah data ruang?",
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