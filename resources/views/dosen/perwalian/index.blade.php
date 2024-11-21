@include('header')
<div class="flex flex-col h-full">
    <!-- NavBar -->
    <x-navbar />
    <div class="flex flex-col flex-grow p-8">
        <!-- Header -->
        <div class="flex items-center justify-between py-3">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Perwalian
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex flex-row justify-between mt-5">
            <!-- Dropdown Section -->
            <form id="filterForm" class="flex flex-col max-w-sm space-y-4">
                @csrf
                <div>
                    <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900">Departemen</label>
                    <select id="departemen" name="departemen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>---- Pilih Departemen ----</option>
                        <option value="IF">S1 - Informatika</option>
                        <option value="S2-Sistem Informasi">S2 - Sistem Informasi</option>
                        <option value="S3-Sistem Informasi">S3 - Sistem Informasi</option>
                    </select>
                </div>
                <div>
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun Angkatan</label>
                    <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>---- Pilih Tahun Angkatan ----</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status IRS</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>---- Pilih Status IRS ----</option>
                        <option value="">Semua</option>
                        <option value="sudah_disetujui">Disetujui</option>
                        <option value="belum_irs">Belum IRS</option>
                        <option value="belum_disetujui">Belum Disetujui</option>
                    </select>
                </div>
                <button type="button" id="submitFilter" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                    Tampilkan Mahasiswa
                </button>
            </form>

            <!-- Status Selection Table -->
            <div class="flex-grow max-w-3xl ml-8">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Belum IRS</th>
                            <th class="border border-gray-300 px-4 py-2">Belum Disetujui</th>
                            <th class="border border-gray-300 px-4 py-2">Sudah Disetujui</th>
                            <th class="border border-gray-300 px-4 py-2">Non-Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

            <!-- Tombol Setujui IRS -->
        <div class="flex justify-start mt-5 px-2">
            <button type="button" id="approveIRS" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 hidden">Setujui IRS</button>
            <button type="button" id="cancelIRS" class="px-4 ml-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 hidden">Batalkan IRS</button>
        </div>
        

        <!-- Student Table -->
        <div id="tableWrapper" class="overflow-x-auto mt-8 hidden">
            <table id="mahasiswaTable" class="min-w-full bg-white divide-y divide-gray-200 table-fixed w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th id="check" class="w-10 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departemen</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Masuk</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status IRS</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        
                    </tr>
                    <tr>
                        <th></th>
                        <th><input type="text" class="form-control column-search w-full" style="padding-left:0; "placeholder="Cari NIM"></th>
                        <th><input type="text" class="form-control column-search w-full" style="padding-left:0; "placeholder="Cari Nama"></th>
                        <th><input type="text" class="form-control column-search w-full" style="padding-left:0; "placeholder="Cari Departemen"></th>
                        <th><input type="text" class="form-control column-search w-full" style="padding-left:0; "placeholder="Cari Tahun Masuk"></th>
                        <th>
                            <select class="form-control column-search w-full" style="padding: .5rem .75rem;padding-left:0">
                                <option selected disabled>Pilih Status IRS</option>
                                <option value="">Semua</option>
                                <option value="sudah_disetujui">Disetujui</option>
                                <option value="belum_irs">Belum IRS</option>
                                <option value="belum_disetujui">Belum Disetujui</option>
                            </select>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>



       
        
        <!-- jQuery, DataTables, dan AJAX Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

        <script>
            $(document).ready(function () {
                // Inisialisasi DataTable dengan pencarian di tiap kolom
                var table = $('#mahasiswaTable').DataTable({
                    "dom": 't',
                    "paging": true,
                    "info": false,
                    "searching": true,
                    "searchPanes": false,
                    "ordering": true,
                    "sensitivity": "accent",
                    columnDefs: [
                        { 
                            targets: 6, 
                            orderable: false,
                            searchable: false
                        }
                    ],
                    initComplete: function () {
                        // Apply search function for each column
                        this.api().columns().every(function (index) {
                            var column = this;
                            if (index === 5) {  // Status IRS column
                                $('select', this.header()).on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
                            } else if (index !== 6) {  // Exclude Action column
                                $('input', this.header()).on('keyup change clear', function () {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                            }
                        });
                    }
                });

                // Fetch tahun when departemen changes
                $('#departemen').on('change', function () {
                    var idDepartemen = this.value;
                    $("#tahun").html('<option selected disabled>Loading...</option>');
                    $.ajax({
                        url: "{{ url('api/fetch-tahun') }}",
                        type: "POST",
                        data: {
                            departemen_id: idDepartemen,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (result) {
                            $('#tahun').html('<option selected disabled>---- Pilih Tahun Angkatan ----</option> <option value="">Semua</option>');
                            // $('#tahun').html('');
                            $.each(result.tahun, function (key, value) {
                                $("#tahun").append('<option value="' + value + '">' + value + '</option>');
                            });
                        }
                    });
                });

                // Show mahasiswa based on selected filters
                $('#submitFilter').on('click', function () {
                    var departemen = $('#departemen').val();
                    var tahun = $('#tahun').val();
                    var status = $('#status').val();

                    if (departemen && tahun != null && status != null) {
                        $.ajax({
                            url: "{{ url('api/fetch-mahasiswa') }}",
                            type: "POST",
                            data: {
                                departemen: departemen,
                                tahun: tahun,
                                status: status,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function (result) {
                                table.clear().draw();

                                if (result.mahasiswa.length > 0) {
                                    $('#tableWrapper').removeClass('hidden');
                                    $('#mahasiswaTable').removeClass('hidden');
                                    $('#approveIRS').removeClass('hidden');
                                    $('#cancelIRS').removeClass('hidden');

                                    $.each(result.mahasiswa, function (index, mahasiswa) {
                                        let irsStatus = "Tidak ada data IRS";
                                        if (mahasiswa.irs && mahasiswa.irs.length > 0) {
                                            let irsAktif = mahasiswa.irs.find(irs => irs.tahun_akademik === result.tahun_ajaran_aktif.kode_tahun);
                                            if (irsAktif) {
                                                irsStatus = irsAktif.status;
                                            }
                                        }

                                        table.row.add([
                                            '<input type="checkbox" class="studentCheckbox" value="' + mahasiswa.nim + '">',
                                            mahasiswa.nim,
                                            mahasiswa.nama,
                                            mahasiswa.prodi.nama,
                                            mahasiswa.tahun_masuk,
                                            irsStatus,
                                            '<div class="flex space-x-2">' +
                                                '<button class="btn-approve bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600" data-nim="' + mahasiswa.nim + '">Approve</button>' +
                                                '<button class="btn-view bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600" data-nim="' + mahasiswa.nim + '">View</button>' +
                                            '</div>'
                                        ]).draw(false);
                                    });
                                    
                                    // Add event listeners for approve and view buttons
                                    $('.btn-approve').on('click', function() {
                                        var nim = $(this).data('nim');
                                        // Implement approve logic here
                                        console.log('Approve clicked for NIM: ' + nim);
                                    });

                                    $('.btn-view').on('click', function() {
                                        const nim = $(this).data('nim');
                                        window.location.href = `/dosen/perwalian/${nim}`;
                                    });
                                } else {
                                    $('#mahasiswaTable').removeClass('hidden');
                                    $('#approveIRS').addClass('hidden');
                                    table.row.add(['', 'Tidak ada data mahasiswa', '', '', '', '', '']).draw(false);
                                }
                            },
                            error: function () {
                                alert("Gagal mengambil data mahasiswa.");
                            }
                        });
                    } else {
                        alert("Mohon pilih Departemen, Tahun Angkatan, dan Status IRS.");
                    }
                });


                // Select all checkboxes
                $('#selectAll').on('click', function () {
                    $('.studentCheckbox').prop('checked', this.checked);
                });

                // Approve IRS for selected students
                // $('#approveIRS').on('click', function () {
                //     var selectedStudents = [];
                //     $('.studentCheckbox:checked').each(function () {
                //         selectedStudents.push($(this).val());
                //     });

                //     if (selectedStudents.length > 0) {
                //         $.ajax({
                //             url: "{{ url('api/approve-irs') }}",
                //             type: "POST",
                //             data: {
                //                 nim: selectedStudents,
                //                 _token: '{{ csrf_token() }}'
                //             },
                //             success: function () {
                //                 alert("IRS mahasiswa yang dipilih telah disetujui.");
                //             },
                //             error: function () {
                //                 alert("Gagal menyetujui IRS.");
                //             }
                //         });
                //     } else {
                //         alert("Tidak ada mahasiswa yang dipilih.");
                //     }
                // });
            });
        </script>
    </div>
</div>

@include('footer')
