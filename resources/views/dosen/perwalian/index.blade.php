@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Perwalian
            </div>
        </div>
        
        <!-- Dropdown Departemen dan Status IRS -->
        <div class="flex mt-5 p-8">
            <form id="filterForm" class="max-w-sm mx-start pl-4">
                @csrf
                <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900">Departemen</label>
                <select id="departemen" name="departemen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
                    <option selected disabled>---- Pilih Departemen ----</option>
                    <option value="IF">S1 - Informatika</option>
                    <option value="S2-Sistem Informasi">S2 - Sistem Informasi</option>
                    <option value="S3-Sistem Informasi">S3 - Sistem Informasi</option>
                </select>
                
                <label for="tahun" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Tahun Angkatan</label>
                <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
                    <option selected disabled>---- Pilih Tahun Angkatan ----</option>
                    
                </select>

                <label for="status" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Status IRS</label>
                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
                    <option selected disabled>---- Pilih Status IRS ----</option>
                    <option value="">Semua</option>
                    <option value="sudah_disetujui">Disetujui</option>
                    <option value="belum_irs">Belum IRS</option>
                    <option value="belum_disetujui">Belum Disetujui</option>
                </select>
                
                <!-- Tombol Submit -->
                <button type="button" id="submitFilter" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Tampilkan Mahasiswa</button>
            </form>
        </div>
        
         <!-- Tombol Setujui IRS -->
         <div class="flex justify-end mt-5 px-10">
            <button type="button" id="approveIRS" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 hidden">Setujui IRS</button>
        </div>

        <!-- Tabel Mahasiswa -->
        <div id="tableWrapper" class="overflow-x-auto p-8 hidden">
            <table id="mahasiswaTable" class="min-w-full bg-white divide-y divide-gray-200 table-fixed hidden w-full cell-border">
                <thead class="bg-gray-200">
                    <tr>
                        <th id="check" class="w-10 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th class="w-32 ml-10 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 0">NIM</th>
                        <th class="w-48 ml-10 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 0">Nama</th>
                        <th class="w-40 ml-10 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 0">Departemen</th>
                        <th class="w-32 ml-10 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 0">Tahun Masuk</th>
                        <th class="w-48 ml-10 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 0">Status IRS</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th style="padding-left: 0"><input type="text" class="form-control column-search w-full" placeholder="Cari NIM" ></th>
                        <th style="padding-left: 0"><input type="text" class="form-control column-search w-full" placeholder="Cari Nama" ></th>
                        <th style="padding-left: 0"><input type="text" class="form-control column-search w-full" placeholder="Cari Departemen" ></th>
                        <th style="padding-left: 0"><input type="text" class="form-control column-search w-full" placeholder="Cari Tahun Masuk" ></th>
                        <th style="padding-left: 0"><input type="text" class="form-control column-search w-full" placeholder="Cari Status" ></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
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
                    initComplete: function () {
                        // Apply search function for each column
                        this.api().columns().every(function () {
                            var that = this;
                            $('input', this.header()).on('keyup change clear', function () {
                                if (that.search() !== this.value ) {
                                    console.log(that);
                                    that.search(this.value).draw();
                                }
                            });
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
                                            irsStatus
                                        ]).draw(false);
                                    });
                                } else {
                                    $('#mahasiswaTable').removeClass('hidden');
                                    $('#approveIRS').addClass('hidden');
                                    table.row.add(['', 'Tidak ada data mahasiswa', '', '', '', '']).draw(false);
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
