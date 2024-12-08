@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow w-full">
    <!-- Header -->
    <div class="flex items-center justify-between py-3 p-8 w-full">
        <div class="font-bold text-lg md:text-xl pl-4 py-1">
            Manage Ruang
        </div>
        <form action="{{ route('ruang.create') }}" method="GET">
            <button class="bg-blue-500 text-white font-semibold px-3 py-1 rounded hover:bg-blue-600 ml-12">
                Create New Ruang
            </button>
        </form>
    </div>

    <div class="flex mr-7 w-full">
        <div class="flex flex-col m-5 border-2 p-5 w-full border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <div class="overflow-x-auto">
                <table id="ruangTable" class="table-auto w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No.</th>
                            <th class="px-4 py-2">Kode Ruang</th>
                            <th class="px-4 py-2">Departemen</th>
                            <th class="px-4 py-2">Kapasitas</th>
                            <th class="px-4 py-2">Status Ketersediaan</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruang as $no => $data)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $no + 1 }}</td>
                                <td class="border px-4 py-2">{{ $data->kode_ruang }}</td>
                                <td class="border px-4 py-2">{{ $data->departemen->kode_departemen }}</td>
                                <td class="border px-4 py-2">{{ $data->kapasitas }}</td>
                                <td class="border px-4 py-2">{{ $data->status_ketersediaan }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex flex-col items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('ruang.edit', $data) }}" class="btn-edit bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('ruang.destroy', $data) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus ruang ini?')" class="btn-delete bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('../footer')

<!-- Include DataTables and SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#ruangTable').DataTable({
            "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
            "paging": true,
            "info": true,
            "searching": true,
            "ordering": true,
            language: {
                search: "_INPUT_", // Remove the 'Search' label
                searchPlaceholder: "CARI RUANG", // Add placeholder for search
                lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
            }
        });
    });
</script>

<!-- Custom Styling for DataTables -->
<style>
    .dataTables_length select {
        width: 3rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 6px;
        margin: 0 4px;
    }
    .dataTables_filter input {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 10px;
        margin-left: 8px;
        margin-bottom: 5px;
    }
    .top {
        padding: 8px 0;
        margin-bottom: 8px;
    }
</style>

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
