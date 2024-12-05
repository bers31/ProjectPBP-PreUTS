@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow p-8">
        <!-- Header -->
        <div class="flex items-center justify-between py-3">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Input Nilai
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex flex-row justify-between mt-5">
            <!-- Dropdown Section -->
            <form id="filterForm" class="flex flex-col max-w-sm space-y-4">
                @csrf
                <div>
                    <label for="mata_kuliah" class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah</label>
                    <select id="mata_kuliah" name="mata_kuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled value="-">---- Pilih Mata Kuliah ----</option>
                        @foreach ($mataKuliahDiampu as $mk)
                            <option value="{{$mk->kode_mk}}">{{$mk->nama_mk}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" id="submitFilter" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                    Tampilkan Mahasiswa
                </button>
            </form>
        </div>

        <div id="tableWrapper" class="overflow-x-auto mt-8 hidden">
            <table id="mahasiswaTable" class="min-w-full bg-white divide-y divide-gray-200 table-fixed w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable dengan pencarian di tiap kolom
            var table = $('#mahasiswaTable').DataTable({
            // DOM layout: l (length), f (filtering/search), r (processing), t (table), (info), p (pagination)
            "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
            "paging": true,
            "info": false,
            "searching": true,
            "ordering": true,
            "sensitivity": "accent",
            // Optional: Customize the appearance
            language: {
                search: "_INPUT_", // Remove the 'Search' label
                searchPlaceholder: "CARI MAHASISWA", // Add placeholder
                lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
            }
        });

        $('#submitFilter').on('click', function () {
            var mk = $('#mata_kuliah').val();
                if (mk != null) {
                    $.ajax({
                        url: "{{ url('api/fetch-mhs-mk') }}",
                        type: "POST",
                        data: {
                            kode_mk: mk,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (result) {
                            table.clear().draw();
                            if (result.length > 0) {
                                $('#tableWrapper').removeClass('hidden');
                                $('#mahasiswaTable').removeClass('hidden');
                                $.each(result, function (index, row) {
                                    table.row.add([
                                        row.nim,
                                        row.nama,
                                        row.semester_pengambilan,
                                        row.kelas,
                                        row.status_pengambilan,
                                        '',
                                        '',
                                        // renderActionButtons(mahasiswa, result.tahun_ajaran_aktif.kode_tahun)
                                    ]).draw(false);
                                });
                            
                                // Add event listeners for approve, cancel, and view buttons
                                $(document).on('click', '.btn-approve, .btn-cancel', function() {
                                    var nim = $(this).data('nim');
                                    var action = $(this).data('action');
                                    var actionText = action === 'approve' ? 'menyetujui' : 'membatalkan';
                                        Swal.fire({
                                            title: `Apakah Anda yakin ingin ${actionText} IRS ini?`,
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, lanjutkan!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Jika pengguna menekan tombol "Ya, lanjutkan!"
                                                $.ajax({
                                                    url: "{{ url('api/approve-irs') }}",
                                                    type: "POST",
                                                    data: {
                                                        nim: [nim],
                                                        action: action,
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    success: function(response) {
                                                        if (response.success) {
                                                            // Refresh the table to reflect the new status*
                                                            $('#submitFilter').click();
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Berhasil',
                                                                text: response.message
                                                            });
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Gagal',
                                                                text: response.message
                                                            });
                                                        }
                                                    },
                                                    error: function() {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Gagal',
                                                            text: 'Terjadi kesalahan saat memproses IRS'
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    });

                                $('.btn-view').on('click', function() {
                                    const nim = $(this).data('nim');
                                    window.location.href = `/dosen/perwalian/${nim}`;
                                });
                            } else {
                                $('#tableWrapper').removeClass('hidden');
                                $('#mahasiswaTable').removeClass('hidden');
                                $('#approveIRS').addClass('hidden');
                                $('#cancelIRS').addClass('hidden');
                                table.row.add(['', '', 'Tidak ada data mahasiswa', '', '', '', '', '','','']).draw(false);
                            }
                        },
                        error: function () {
                            alert("Gagal mengambil data mahasiswa.");
                        }
                    });
                } else {
                    alert("Mohon pilih Status IRS.");
                }
        });
    });
    
    </script>

@include('footer')