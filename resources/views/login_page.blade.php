@section('title', 'Login')
@include('header')
<div class="flex flex-col justify-center items-center h-screen relative">
    {{-- Header --}}
    <div class="w-full text-center text-6xl font-bold h-28 bg-[#DE2227] text-white flex justify-center items-center z-20">
        <h2>SI-MAS</h2>
    </div>

    {{-- Background and Blur Overlay --}}
    <div class="absolute inset-0 bg-[url('{{ asset('img/undips.png') }}')] bg-cover bg-center w-full h-full z-0">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div> <!-- Blur effect overlay -->
    </div>

    {{-- Login Box --}}
    <div class="relative z-10 flex flex-1 flex-col items-center justify-center w-full">
        <div class="flex flex-col bg-white rounded-2xl p-20 shadow-md w-full max-w-2xl">
            <h3 class="text-5xl font-bold text-gray-800 mb-8">Selamat Datang!</h3>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf  <!-- Cross-Site Request Forgery token required in Laravel forms -->
                
                <!-- Username -->
                <div class="mb-5">
                    <input type="text" id="identifier" name="identifier" placeholder="Email/NIM/NIP" value="{{ old('identifier') }}" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600" autocomplete="identifier">  
                    @error('identifier')
                    <div class="alert alert-danger mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="mb-5 relative">
                    <div class="relative w-full">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-red-600">
                        <span id="toggle-password" class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.733 1.933-2.014 3.658-3.686 4.9m-3.676-3.143c-.609.308-1.275.49-1.98.49-2.21 0-4-1.79-4-4 0-.705.182-1.371.49-1.98" />
                            </svg>
                        </span>
                    </div>
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

<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('svg');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.setAttribute('stroke', 'red'); // Change icon color if needed
        } else {
            passwordField.type = 'password';
            icon.setAttribute('stroke', 'currentColor'); // Revert icon color
        }
    });
</script>

@include('footer')
