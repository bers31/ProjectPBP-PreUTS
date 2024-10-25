@section('title', 'Login')
@include('header')
<div class="flex flex-col justify-center items-center h-screen ">
    {{-- Header --}}
    <div class="w-full text-center text-6xl font-bold h-28 bg-[#DE2227] text-white flex justify-center items-center">
        <h2>SI-MAS</h2>
    </div>

    {{-- Box --}}
    <div class="flex flex-1 flex-col items-center justify-center bg-cyan-100 w-full" >
        <div class="flex flex-col bg-white rounded-2xl p-20 shadow-md w-full max-w-2xl">
            <h3 class="text-5xl font-bold text-gray-800 mb-8">Selamat Datang!</h3>
            
            <form action="{{ route('login') }}" method="POST" >
                @csrf  <!-- Cross-Site Request Forgery token required in Laravel forms -->
                
                <!-- Username -->
                <div class="mb-5">
                    <input type="text" id="identifier" name="identifier"  placeholder="Email/NIM/NIP" value="{{ old('identifier') }}" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600" autocomplete="identifier">  
                    @error('identifier')
                    <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-5">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600">
                    @error('password')
                    <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                
                @if(session('loginError'))
                <div class="error text-red-500">
                    {{ session('loginError') }}
                </div>
                @endif

                @error('comb-identifier')
                    <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                @enderror

                <button type="submit" class="w-full p-4 rounded-lg text-lg cursor-pointer border-none bg-red-600 text-white transition duration-300 hover:bg-red-500">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

@include('footer')