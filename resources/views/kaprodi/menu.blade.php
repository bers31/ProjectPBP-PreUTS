@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Menu Kaprodi 
            </div>
        </div>

        <!-- Styled Buttons -->
        <div class="flex items-center justify-center p-8 md:p-4 lg:p-8 border-2 border-[#80747475] hover:bg-[#f0f0f0] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <a href="{{ route('matkul.index') }}">
                <p class="font-semibold text-lg md:text-sm lg:text-lg">
                    Buat Mata Kuliah
                </p>
            </a>
        </div>
        <div class="flex items-center justify-center p-8 md:p-4 lg:p-8 border-2 border-[#80747475] hover:bg-[#f0f0f0] rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <a href="{{ route('matkul.index') }}">
                <p class="font-semibold text-lg md:text-sm lg:text-lg">
                    Susun Jadwal
                </p>
            </a>
        </div>
    </div>
</div>
@include('footer')
