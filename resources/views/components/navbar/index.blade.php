<div class="flex flex-col lg:flex-row items-center justify-between bg-[#DE2227] p-6">
  
  <!-- Logo and Dashboard Link -->
  <div class="text-white font-bold text-4xl pl-6">
    <a href="{{ route(Auth::user()->role . '.dashboard', 'dashboard') }}">SI-MAS</a>
  </div>

  <!-- Desktop Navbar Links -->
  <ul class="hidden lg:flex space-x-8 ml-20 text-white text-base pr-6 gap-14">
    @if(Auth::user()->role === "dosen")
      <x-navbar.list href="{{ route('dosen.perwalian') }}">Perwalian</x-navbar.list>
      <x-navbar.list href="{{ route('dosen.input_nilai') }}">Input Nilai</x-navbar.list>
      @isset(Auth::user()->dosen->dekan)
        @if (Route::is('dekan.dashboard'))
          <x-navbar.list href="{{ route('dosen.dashboard') }}">Mode Dosen</x-navbar.list>
        @else<x-navbar.list href="{{ route('dekan.dashboard') }}">Mode Dekan</x-navbar.list>
        @endif
      @endisset
      
      @isset(Auth::user()->dosen->kaprodi)
        @if (Route::is('kaprodi.menu'))
          <x-navbar.list href="{{ route('dosen.dashboard') }}">Mode Dosen</x-navbar.list>
        @else<x-navbar.list href="{{ route('kaprodi.menu') }}">Menu Kaprodi</x-navbar.list>
        @endif  
        @endisset
    @endif

    @if(Auth::user()->role === "mahasiswa")
      <x-navbar.list href="{{ route('mahasiswa.status_akademik') }}">Status Akademik</x-navbar.list>
      <div class="relative group">
        <!-- Trigger Dropdown -->
        <x-navbar.list id="navbar-irs" href='#' class="cursor-pointer">IRS</x-navbar.list>
    
        <!-- Dropdown Menu -->
        <div id="irs-dropdown" 
            class="absolute hidden group-hover:block mt-2 bg-white rounded-lg shadow-lg w-48 z-10 border border-gray-200">
            <a href="{{ route('mahasiswa.irs_mhs') }}" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                Buat IRS
            </a>
            <a href="{{ route('mahasiswa.history_irs') }}" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                IRS
            </a>
        </div>
      </div>    
      <x-navbar.list href="{{ route('mahasiswa.khs_mhs') }}">KHS</x-navbar.list>
      <x-navbar.list href="{{ route('mahasiswa.transkrip_mhs') }}">Transkrip</x-navbar.list>
    @endif

    @if (Auth::user()->role === "admin")
      <x-navbar.list href="{{ route('users.index') }}" >Users</x-navbar.list>
      <x-navbar.list href="{{ route('mahasiswa.index') }}" >Mahasiswa</x-navbar.list>
      <x-navbar.list href="{{ route('dosen.index') }}" >Dosen</x-navbar.list>
      <x-navbar.list href="{{ route('ruang.index') }}" >Ruang</x-navbar.list>
    @endif
  </ul>

  <!-- Mobile Navbar Links -->
  <div class="lg:hidden flex flex-col items-center justify-center space-y-4 mt-4 w-full text-white text-base">
    @if(Auth::user()->role === "mahasiswa")
      <x-navbar.m-list href="{{ route('mahasiswa.status_akademik') }}">Status Akademik</x-navbar.m-list>
      <x-navbar.m-list href="{{ route('mahasiswa.irs_mhs') }}">IRS</x-navbar.m-list>
      <x-navbar.m-list href="{{ route('mahasiswa.khs_mhs') }}">KHS</x-navbar.m-list>
      <x-navbar.m-list href="{{ route('mahasiswa.transkrip_mhs') }}">Transkrip</x-navbar.m-list>
    @endif

    @if(Auth::user()->role === "dosen")
      <x-navbar.m-list href="{{ route('dosen.perwalian') }}">Perwalian</x-navbar.m-list>
      <x-navbar.m-list href="{{ route('dosen.input_nilai') }}">Input Nilai</x-navbar.m-list>
    @endif

    @if (Auth::user()->role === "admin")
      <x-navbar.list href="{{ route('users.index') }}" >Users</x-navbar.list>
      <x-navbar.list href="{{ route('mahasiswa.index') }}" >Mahasiswa</x-navbar.list>
      <x-navbar.list href="{{ route('dosen.index') }}" >Dosen</x-navbar.list>
      <x-navbar.list href="{{ route('ruang.index') }}" >Ruang</x-navbar.list>
    @endif
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      const irsMenu = document.getElementById('navbar-irs');
      const irsDropdown = document.getElementById('irs-dropdown');

      // Toggle dropdown saat diklik
      irsMenu.addEventListener('click', function (e) {
          e.preventDefault();
          if (irsDropdown.classList.contains('hidden')) {
              irsDropdown.classList.remove('hidden');
          } else {
              irsDropdown.classList.add('hidden');
          }
      });

      // Menutup dropdown jika klik di luar
      document.addEventListener('click', function (e) {
          if (!irsMenu.contains(e.target) && !irsDropdown.contains(e.target)) {
              irsDropdown.classList.add('hidden');
          }
      });
  });
</script>
