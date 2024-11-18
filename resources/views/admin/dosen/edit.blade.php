{{-- @extends('layouts.app') --}}
@include('../header')
<x-navbar/>
{{-- @section('content') --}}
    <div class="flex flex-col flex-grow">

        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-semibold mb-6 text-gray-800">Update Dosen</h1>

                <form action="{{ route('dosen.update', $dosen->nidn ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- nidn Input -->
                    <div class="mb-4">
                        <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900">nidn</label>
                        <input 
                            type="text" 
                            name="nidn" 
                            id="nidn" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{  $dosen->nidn  }}">
                        @error('nidn')
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
                            value="{{ $dosen->nama }}">
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
                            value="{{ $dosen->email }}">
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="edit-btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Ubah data dosen?',
                text: "Yakin ingin mengubah data dosen?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@include('../footer')
{{-- @endsection --}}
