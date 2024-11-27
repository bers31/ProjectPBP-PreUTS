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

    <div class="flex mr-7">
        <div class="flex flex-col m-5 border-2 p-5 w-full border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
            <table id="matakuliah-table" class="table-auto w-full border-collapse border border-gray-400">
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
                        <th class="border border-gray-400 px-4 py-2">Aksi</th>
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
                                <a href="{{ route('matkul.edit', $row) }}" class="edit-btn font-semibold border-1 border-[#80747475] rounded-lg px-6 py-1 bg-gray-200 hover:bg-[#707070]">
                                    Edit                                
                                </a>
                                <form action="{{ route('matkul.destroy', $row) }}" method="POST" class="delete-form" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-btn font-semibold border-1 border-[#80747475] rounded-lg my-3 px-3 py-1 bg-gray-200 hover:bg-[#707070]">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('matkul.create') }}" class="create-btn font-semibold border-1 border-[#80747475] rounded-lg my-2 px-6 py-1 bg-gray-200 hover:bg-[#707070] mx-auto block -translate-y-2.5">
        Tambah Matkul
    </a>
</div>

<!-- Include DataTables and SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#matakuliah-table').DataTable({
            responsive: true,
            autoWidth: false,
        });

        // Handle Delete Button
        $('.delete-btn').on('click', function (e) {
            e.preventDefault();
            const form = $(this).closest('.delete-form');

            Swal.fire({
                title: 'Hapus Mata kuliah',
                text: "Yakin ingin menghapus mata kuliah?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Handle Edit Button
        $('.edit-btn').on('click', function (e) {
            e.preventDefault();
            const url = "{{ route('matkul.edit', $row) }}"
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
    });
</script>
@include('../footer')
