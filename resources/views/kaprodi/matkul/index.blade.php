@include('../header')
<x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Manage MataKuliah
            </div>
        </div>


        @if (session('success'))
            <div class="flex items-center justify-between py-3 p-8">
                <div class="text-md md:text-xl pl-4 py-1">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        
        <div class="flex  mr-7">
            <div class="flex flex-col m-5 border-2 p-5 w-full border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <table class="table-auto w-full border-collapse border border-gray-400">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2">Nomor.</th>
                            <th class="border border-gray-400 px-4 py-2">Kode MK.</th>
                            <th class="border border-gray-400 px-4 py-2">Nama MK</th>
                            <th class="border border-gray-400 px-4 py-2">Semester</th>
                            <th class="border border-gray-400 px-4 py-2">SKS</th>
                            <th class="border border-gray-400 px-4 py-2">Kurikulum</th>
                            <th class="border border-gray-400 px-4 py-2">Kode Prodi</th>
                            <th class="border border-gray-400 px-4 py-2">Sifat</th>
                            <th class="border border-gray-400 px-4 py-2">Wwkwk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mk as $no=>$row)
                            <tr class="text-center">
                                <td class="border border-gray-400 px-4 py-2">{{ $no+1 }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->kode_mk }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->nama_mk }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->semester }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->sks }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->kurikulum }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->kode_prodi }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->sifat }}</td>
                                <td class="border border-gray-400 px-4 py-5">
                                <form action = "{{ route('mahasiswa.edit', $row) }}">
                                    <button class="font-semibold border-1 border-[#80747475] rounded-lg px-6 py-1 bg-gray-200 hover:bg-[#707070]">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('mahasiswa.destroy',$row) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-semibold border-1 border-[#80747475] rounded-lg my-3 px-3 py-1 bg-gray-200 hover:bg-[#707070]" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('matkul.create') }}" method="GET">
            <button class="font-semibold border-1 border-[#80747475] rounded-lg my-2 px-6 py-1 bg-gray-200 hover:bg-[#707070] mx-auto block -translate-y-2.5">
                Tambah Matkul
            </button>
        </form>
    </div>
@include('../footer')