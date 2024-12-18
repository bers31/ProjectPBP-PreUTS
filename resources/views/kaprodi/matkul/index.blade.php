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
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full delete-button">
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

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Mata Kuliah Berhasil Ditambahkan!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6' // Change this to your desired color (hex, rgb, etc.)
                });
            });
        </script>
    @endif

    @if(session('success_update'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Mata Kuliah Berhasil Diubah!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            });
        </script>
    @endif

    @if(session('success_delete'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Jadwal Berhasil Dihapus!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            });
        </script>
    @endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach event listener to all delete buttons
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const form = this.closest('form'); // Get the parent form of the clicked button

                Swal.fire({
                    title: 'Hapus Mata Kuliah',
                    text: 'Yakin Menghapus Mata Kuliah?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', // Red color for the confirm button
                    cancelButtonColor: '#3085d6', // Blue color for the cancel button
                    confirmButtonText: 'Yessir!',
                    cancelButtonText: 'Naahhh.',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    });
</script>

<!-- Include DataTables and SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
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
@include('../footer')
