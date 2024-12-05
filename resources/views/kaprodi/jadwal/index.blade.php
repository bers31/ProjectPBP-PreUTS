@include('../header')
<x-navbar/>

<div class="flex flex-col flex-grow">
    <!-- Header -->
    <div class="flex items-center justify-between py-3 p-8">
        <div class="font-bold text-lg md:text-xl pl-4 py-1">
            Daftar Jadwal
        </div>
        <!-- Add Button -->
        <form action="{{ route('jadwal.create') }}" method="GET">
            <button class="bg-blue-500 text-white font-semibold px-3 py-1 rounded hover:bg-blue-600 ml-12">
                Tambah Jadwal
            </button>
        </form>
    </div>

    <div class="flex mx-7">
        <div class="flex flex-col w-full border-2 p-5 border-gray-300 rounded-lg shadow-md bg-white">
            <table id="jadwalTable" class="table-auto w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Mata Kuliah</th>
                        <th class="px-4 py-2">Kode Mata Kuliah</th>
                        <th class="px-4 py-2">Dosen Pengampu</th>
                        <th class="px-4 py-2">Kode Kelas</th>
                        <th class="px-4 py-2">Jam Mulai</th>
                        <th class="px-4 py-2">Jam Selesai</th>
                        <th class="px-4 py-2">Hari</th>
                        <th class="px-4 py-2">Kode Ruang</th>
                        <th class="px-4 py-2">Kuota</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $index => $jadwal)
                        <tr class="hover:bg-gray-50 text-center">
                            <td class="border px-4 py-2">{{ $jadwal->id_jadwal ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->mataKuliah->nama_mk ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->mataKuliah->kode_mk ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                @foreach ($jadwal->dosen_pengampu as $dosenPengampu)
                                    {{ $dosenPengampu->dosen->nama ?? '-' }} - {{ $dosenPengampu->dosen->nidn }}<br>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">{{ $jadwal->kode_kelas }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->jam_mulai }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->jam_selesai }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($jadwal->hari) }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->ruangan->kode_ruang ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->kuota }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex flex-col items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('jadwal.edit', $jadwal) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this schedule?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 w-full">
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

<!-- jQuery, DataTables, and AJAX Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<script>
    $(document).ready(function () {
        // Initialize DataTable with search, filter, and sort
        $('#jadwalTable').DataTable({
            "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
            "paging": true,
            "info": false,
            "searching": true,
            "ordering": true,
            language: {
                search: "_INPUT_", // Remove the 'Search' label
                searchPlaceholder: "CARI JADWAL", // Add placeholder
                lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
            }
        });

        // Action button handlers
        $('#jadwalTable').on('click', '.btn-edit', function() {
            const row = $(this).closest('tr');
            const index = row.index(); // Get the row index
            const jadwalData = $('#jadwalTable').DataTable().row(index).data();
            console.log('Edit clicked for:', jadwalData); // Handle edit action
            // Add your edit logic here, e.g., redirect to edit page
        });

        $('#jadwalTable').on('click', '.btn-delete', function() {
            const row = $(this).closest('tr');
            const index = row.index(); // Get the row index
            const jadwalData = $('#jadwalTable').DataTable().row(index).data();
            console.log('Delete clicked for:', jadwalData); // Handle delete action
            // Add your delete logic here, e.g., show confirmation dialog
        });
    });
</script>

@include('../footer')