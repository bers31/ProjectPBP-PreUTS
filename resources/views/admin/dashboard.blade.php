{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ auth()->user()->email }}!</p>

        <a href="{{ route('users.index') }}" class="btn btn-primary">Manage Users</a>
    </div>
{{-- @endsection --}}
