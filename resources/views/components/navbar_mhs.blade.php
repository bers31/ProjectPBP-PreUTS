<div class="flex flex-col lg:flex-row items-center justify-between bg-[#DE2227] p-6">
    <div class="text-white font-bold sm:pl-0 lg:pl-6 sm:text-lg md:text-3xl lg:text-4xl sm:mb-3 sm:mt-2 mb-8"> <!-- Added mb-8 for more space -->
        <a href="{{ route('mahasiswa.dashboard') }}">SI-MAS</a>
    </div>
    <ul class="flex flex-col lg:flex-row items-center lg:space-x-8 text-white text-sm md:text-base lg:pr-6 gap-6">
        <li><a href="{{ route('mahasiswa.status_akademik') }}" class="hover:bg-white hover:text-[#DE2227] hover:rounded-2xl px-4 py-2">Status Akademik</a></li>
        <li><a href="{{ route('mahasiswa.irs_mhs') }}" class="hover:bg-white hover:text-[#DE2227] hover:rounded-2xl px-4 py-2">IRS</a></li>
        <li><a href="{{ route('mahasiswa.khs_mhs') }}" class="hover:bg-white hover:text-[#DE2227] hover:rounded-2xl px-4 py-2">KHS</a></li>
        <li><a href="{{ route('mahasiswa.transkrip_mhs') }}" class="hover:bg-white hover:text-[#DE2227] hover:rounded-2xl px-4 py-2">Transkrip</a></li>
    </ul>
</div>