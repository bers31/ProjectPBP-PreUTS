@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow">
    <!-- Header -->
    <div class="flex items-center justify-between py-3 p-8">
        <div class="font-bold text-lg md:text-xl pl-4 py-1">
            Manage Ruang
        </div>
    </div>
    <form action="{{ route('ruang.create') }}" method="GET">
        <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-2 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0] ml-12">
            Create New Ruang
        </button>
    </form>

    <div class="flex ml-7 mr-7">
        <div class="flex flex-col m-5 border-2 p-5 w-full border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">No.</th>
                        <th class="border border-gray-400 px-4 py-2">Kode Ruang</th>
                        <th class="border border-gray-400 px-4 py-2">Fakultas</th>
                        <th class="border border-gray-400 px-4 py-2">Kapasitas</th>
                        <th class="border border-gray-400 px-4 py-2">Status Ketersediaan</th>
                        <th class="border border-gray-400 px-4 py-2">Status Verifikasi</th>
                        <th class="border border-gray-400 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruang as $no=>$data)
                        <tr class="text-center">
                            <td class="border border-gray-400 px-4 py-2">{{ $no+1 }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $data->kode_ruang }}</td>
                            <td class="border border-gray-400 px-4 py-2">Fakultas {{ $data->fakultas->nama_fakultas }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $data->kapasitas }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $data->status_ketersediaan }}</td>
                            <td class="border border-gray-400 px-4 py-2">
                                <span class="font-semibold rounded-lg my-4 px-3 py-1
                                    @if ($data->status_verifikasi === 'Disetujui')
                                        bg-green-500
                                    @elseif ($data->status_verifikasi === 'Belum Disetujui')
                                        bg-yellow-300
                                    @endif
                                ">
                                    {{ $data->status_verifikasi }}
                                </span>
                            </td>
                            
                        
                            <td class="border border-gray-400 px-4 py-2">
                                <a href="{{ route('ruang.edit', $data) }}" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0]">Edit</a>

                                <form action="{{ route('ruang.destroy', $data) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="alert-delete font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 bg-green-500 hover:bg-[#f0f0f0]">Delete</button>
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

<!-- SWEETALERT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '.alert-delete', function(e){
            e.preventDefault();
            // Confirm the delete action
            Swal.fire({
                title: "Hapus Ruang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    $(this).closest("form").submit();
                }
            });
        });
    });
</script>

@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        });
    });
</script>
@endif