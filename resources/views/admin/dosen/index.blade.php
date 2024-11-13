@include('../header')
<x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Manage Dosen
            </div>
        </div>
        <form action="{{ route('dosen.create') }}" method="GET">
            <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-2 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0] ml-12">
                Create New Dosen
            </button>
        </form>

        @if (session('success'))
            <div class="flex items-center justify-between py-3 p-8">
                <div class="text-md md:text-xl pl-4 py-1">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        
        <div class="flex ml-7 mr-7">
            <div class="flex flex-col m-5 border-2 p-5 w-full border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <table class="table-auto w-full border-collapse border border-gray-400">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2">No.</th>
                            <th class="border border-gray-400 px-4 py-2">NIDN</th>
                            <th class="border border-gray-400 px-4 py-2">Nama</th>
                            <th class="border border-gray-400 px-4 py-2">Email</th>
                            <th class="border border-gray-400 px-4 py-2">Jumlah Mahasiswa Perwalian</th>
                            <th class="border border-gray-400 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $no=>$row)
                            <tr class="text-center">
                                <td class="border border-gray-400 px-4 py-2">{{ $no+1 }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->nidn }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->nama }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->email }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $row->mahasiswa()->count() ?? 0 }}</td>
                                <td class="border border-gray-400 px-4 py-2">
                                    <a href="{{ route('dosen.edit', $row) }}" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0]">Edit</a>

                                    <form action="{{ route('dosen.destroy', $row) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0]" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('../footer')