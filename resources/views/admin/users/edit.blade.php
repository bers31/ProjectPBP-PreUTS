@include('../header')
<x-navbar/>
{{-- @section('content') --}}
<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Ubah user</h1>
    
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input 
                        type="email" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                        name="email" 
                        value="{{ $user->email }}" 
                        required>
                </div>

                <div class="mb-4">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select name="role" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                        required>
                        <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn.btn-primary').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Ubah data user?',
                text: "Yakin ingin mengubah data user?",
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

{{-- @endsection --}}

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn.btn-primary').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        const form = this.closest('form');
        Swal.fire({
            title: 'Ubah data user?',
            text: "Yakin ingin mengubah data user?",
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
