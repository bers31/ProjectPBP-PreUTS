{{-- @extends('layouts.app') --}}
@include('../header')
{{-- @section('content') --}}
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->email }}!</p>
    
    {{-- Display success message if any --}}
    @if (session('success'))
    <div class="mt-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('admin.createUsers') }}" method="POST" onsubmit="return confirm('Are you sure you want to create user accounts for all lecturers and students?');">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create User Accounts for All Lecturers and Students
        </button>
    </form>

    <div class="mt-4">    
        <a href="{{ route('users.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Manage Users</a>
        <a href="{{ route('mahasiswa.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Manage Mahasiswa</a>
        <a href="{{ route('dosen.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Manage Dosen</a>
        <a href="{{ route('logout') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Logout</a>
    </div>
    
    
</div>
@include('../footer')
{{-- @endsection --}}
