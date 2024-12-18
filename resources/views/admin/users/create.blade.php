{{-- @extends('layouts.app') --}}
@include('../header')
<x-navbar/>
{{-- @section('content') --}}
<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Buat user baru</h1>
    
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email"  class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input 
                        type="email"
                        name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password"  class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input 
                        type="password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                        name="password" 
                        id="password">
                    @error('password')
                        <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select 
                    name="role"
                    id="role"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                    required>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="dosen">Dosen</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                @error('role')
                    <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                @enderror

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="alert-create w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Create Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('../footer')
{{-- @endsection --}}

<!-- SWEET ALERT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $(document).on('click', '.alert-create', function(e){
            e.preventDefault();
            // Confirm the delete action
            Swal.fire({
                title: 'Tambah user?',
                text: "Yakin ingin menambah user?",
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
