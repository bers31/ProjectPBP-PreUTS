@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow w-full">
    <!-- Header -->
    <div class="flex items-center justify-between py-3 p-8 w-full">
        <div class="font-bold text-lg md:text-xl pl-4 py-1">
            Manage Dosen
        </div>
        <!-- Create New Dosen Button -->
        <form action="{{ route('dosen.create') }}" method="GET">
            <button class="bg-blue-500 text-white font-semibold px-3 py-1 rounded hover:bg-blue-600 ml-12">
                Tambah Dosen
            </button>
        </form>
    </div>
    
    <div class="flex mx-7">
        <div class="flex flex-col w-full border-2 p-5 border-gray-300 rounded-lg shadow-md bg-white">
            <table id="dosenTable" class="table-auto w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">No.</th>
                        <th class="px-4 py-2">NIDN</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Jumlah Mahasiswa Perwalian</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $no => $row)
                        <tr class="hover:bg-gray-50 text-center">
                            <td class="border px-4 py-2">{{ $no + 1 }}</td>
                            <td class="border px-4 py-2">{{ $row->nidn }}</td>
                            <td class="border px-4 py-2">{{ $row->nama }}</td>
                            <td class="border px-4 py-2">{{ $row->email }}</td>
                            <td class="border px-4 py-2">{{ $row->mahasiswa()->count() ?? 0 }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex flex-col items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('dosen.edit', $row) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('dosen.destroy', $row) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full">
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

@include('../footer')

<!-- Include DataTables and SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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

<!-- Initialize DataTable -->
<script>
$('#dosenTable').DataTable({
    "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
    "paging": true,
    "info": false, // Set to false if table info is not needed
    "searching": true,
    "ordering": true,
    language: {
        search: "_INPUT_", // Remove the 'Search' label
        searchPlaceholder: "CARI DOSEN", // Add placeholder for search
        lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
    }
});
</script>


<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '.alert-delete', function(e){
            e.preventDefault();
            
            // Confirm the delete action
            Swal.fire({
                title: "Hapus dosen?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
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