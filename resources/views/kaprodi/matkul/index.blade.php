@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow">
    <!-- Header -->
    <div class="flex items-center justify-between py-3 p-8">
        <div class="font-bold text-lg md:text-xl pl-4 py-1">
            Manage MataKuliah
        </div>
        <!-- Add Button -->
        <form action="{{ route('matkul.create') }}" method="GET">
            <button class="bg-blue-500 text-white font-semibold px-3 py-1 rounded hover:bg-blue-600 ml-12">
                Tambah Matkul
            </button>
        </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="flex justify-center my-4">
            <div class="text-md md:text-xl py-1 text-green-600">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Content Section -->
    <div class="flex mx-7">
        <div class="flex flex-col w-full border-2 p-5 border-gray-300 rounded-lg shadow-md bg-white">
            <table id="matakuliahTable" class="table-auto w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nomor</th>
                        <th class="px-4 py-2">Kode MK</th>
                        <th class="px-4 py-2">Nama MK</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">SKS</th>
                        <th class="px-4 py-2">Kurikulum</th>
                        <th class="px-4 py-2">Kode Prodi</th>
                        <th class="px-4 py-2">Sifat</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matkul as $no => $row)
                        <tr class="hover:bg-gray-50 text-center">
                            <td class="border px-4 py-2">{{ $no + 1 }}</td>
                            <td class="border px-4 py-2">{{ $row->kode_mk }}</td>
                            <td class="border px-4 py-2">{{ $row->nama_mk }}</td>
                            <td class="border px-4 py-2">{{ $row->semester }}</td>
                            <td class="border px-4 py-2">{{ $row->sks }}</td>
                            <td class="border px-4 py-2">{{ $row->kurikulum }}</td>
                            <td class="border px-4 py-2">{{ $row->kode_prodi }}</td>
                            <td class="border px-4 py-2">{{ $row->sifat }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex flex-col items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('matkul.edit', $row->kode_mk) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('matkul.destroy', $row) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full">
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


<!-- Include DataTables and SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<script>
$(document).ready(function() {
    $('#matakuliahTable').DataTable({
        "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
        "paging": true,
        "info": false, // Set to false if table info is not needed
        "searching": true,
        "ordering": true,
        language: {
            search: "_INPUT_", // Remove the 'Search' label
            searchPlaceholder: "CARI MATAKULIAH", // Add placeholder for search
            lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
        }
    });
});

</script>


<script>
    $(document).on('click', '#edit-btn', function (e) {
        e.preventDefault();
        let url = $(this).data('url'); // Get the URL
        console.log(url); // Debug if undefined
        Swal.fire({
            title: 'Edit Matakuliah',
            text: "Yakin ingin melakukan perubahan pada mata kuliah?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
@include('../footer')
