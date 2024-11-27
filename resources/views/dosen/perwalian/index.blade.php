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
                    <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900">Prodi</label>
                    <select id="prodi" name="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled value="-">---- Pilih Prodi ----</option>
                        <option value="">Semua</option>
                        <option value="IFS1">S1 - Informatika</option>
                        <option value="SIS2">S2 - Sistem Informasi</option>
                        <option value="SIS3">S3 - Sistem Informasi</option>
                    </select>
                </div>
                <div>
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun Angkatan</label>
                    <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled value="-">---- Pilih Tahun Angkatan ----</option>
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
                <table id="statusTable" class="table-auto w-full border-collapse border border-gray-300">
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
                            <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="belum_irs">0</td>
                            <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="belum_disetujui">0</td>
                            <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="sudah_disetujui">0</td>
                            <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="non_aktif">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

            <!-- Tombol Setujui IRS -->
        {{-- <div class="flex justify-start mt-5 px-2">
            <button type="button" id="approveIRS" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 hidden">Setujui IRS</button>
            <button type="button" id="cancelIRS" class="px-4 ml-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 hidden">Batalkan IRS</button>
        </div> --}}
        

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
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Batas SKS</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS Diajukan</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Masuk</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status IRS</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
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
        
        <!-- jQuery, DataTables, dan AJAX Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

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
                columnDefs: [
                    {
                        targets: 8,
                        orderable: false,
                    }
                ],
                // Optional: Customize the appearance
                language: {
                    search: "_INPUT_", // Remove the 'Search' label
                    searchPlaceholder: "CARI MAHASISWA", // Add placeholder
                    lengthMenu: "Tampilkan _MENU_ data" // Customize length menu text
                },
                initComplete: function() {
                    // Add custom buttons to the designated spot
                    $('.dataTables_filter input').addClass('px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
            
                    // Add custom buttons next to search
                    $('.dataTables_filter').addClass('flex items-center gap-4');
                    const buttonsHtml = `
                        <div class="flex items-center gap-2">
                            <button type="button" id="approveIRS" 
                                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Setujui IRS
                            </button>
                            <button type="button" id="cancelIRS" 
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Batalkan IRS
                            </button>
                        </div>
                    `;
                    
                    $('.dataTables_filter').append(buttonsHtml);
                    
                    // Style the length menu
                    $('.dataTables_length select').addClass('px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
                }
            });

            // Initialize status counts object
            let status_counts = {
                belum_irs: 0,
                belum_disetujui: 0,
                sudah_disetujui: 0,
                non_aktif: 0
            };

            // Function to fetch and update status counts
            function fetchMahasiswaStatus(prodi = '', tahun = '') {
                $.ajax({
                    url: "{{ url('api/fetch-mahasiswa') }}",
                    type: "POST",
                    data: {
                        prodi: prodi,
                        tahun: tahun,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (response) {
                        updateStatusTable(response.status_counts);    
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                        alert("Terjadi kesalahan saat mengambil data status mahasiswa.");
                    }
                });
            }

        // Update the status counts table
        function updateStatusTable(status_counts) {
            $('#statusTable tbody tr').html(`
                <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="belum_irs">
                    ${status_counts.belum_irs}
                </td>
                <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="belum_disetujui">
                    ${status_counts.belum_disetujui}
                </td>
                <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="sudah_disetujui">
                    ${status_counts.sudah_disetujui}
                </td>
                <td class="border border-gray-300 px-4 py-2 cursor-pointer hover:bg-gray-100" data-status="non_aktif">
                    ${status_counts.non_aktif}
                </td>
            `);
        }
        fetchMahasiswaStatus();

        // Add click handlers for status table cells
        $('#statusTable').on('click', 'td', function() {
        const status = $(this).data('status');
        
        // If no filters are selected, set default values
        if (!$('#prodi').val() || $('#prodi').val() === '-') {
            $('#prodi').val(""); // Set a default value instead of blank
        }
        
        if (!$('#tahun').val() || $('#tahun').val() === '-') {
            // Trigger prodi change to load tahun options if needed
            $('#prodi').trigger('change');
            // Set default tahun after options are loaded
            setTimeout(() => {
                $('#tahun').val($('#tahun option:eq(1)').val());
            }, 500);
        }

        function handleMahasiswaTableUpdate(result) {
            table.clear().draw();

            if (result.mahasiswa && result.mahasiswa.length > 0) {
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

                    console.log(result);
                    // For non-aktif status, show status mahasiswa instead of IRS status
                    if (result.is_status_mahasiswa) {
                        $('#approveIRS').addClass('hidden');
                        $('#cancelIRS').addClass('hidden');
                        irsStatus = "Tidak ada data IRS"; // Assuming status is stored in mahasiswa record
                    }

                    table.row.add([
                        '<input type="checkbox" class="studentCheckbox" value="' + mahasiswa.nim + '">',
                        mahasiswa.nim,
                        mahasiswa.nama,
                        mahasiswa.prodi.nama,
                        mahasiswa.status,
                        "",
                        "",
                        mahasiswa.tahun_masuk,
                        irsStatus,
                        '<div class="flex space-x-2">' +
                            // '<button class="btn-approve bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600" data-nim="' + mahasiswa.nim + '">Approve</button>' +
                            '<button class="btn-view bg-blue-500 text-white px-1 py-1 rounded hover:bg-blue-600" data-nim="' + mahasiswa.nim + '">View</button>' +
                        '</div>'
                    ]).draw(false);
                });
                
                // Add event listeners for approve and view buttons
                $('.btn-approve').on('click', function() {
                    var nim = $(this).data('nim');
                    console.log('Approve clicked for NIM: ' + nim);
                });

                $('.btn-view').on('click', function() {
                    const nim = $(this).data('nim');
                    window.location.href = `/dosen/perwalian/${nim}`;
                });
            } else {
                $('#mahasiswaTable').removeClass('hidden');
                $('#approveIRS').addClass('hidden');
                $('#cancelIRS').addClass('hidden');
                table.row.add(['', 'Tidak ada data mahasiswa', '', '', '', '', '', '']).draw(false);
            }
        }
        // Handle non-aktif status differently
        if (status === 'non_aktif') {
            $.ajax({
                url: "{{ url('api/fetch-mahasiswa') }}",
                type: "POST",
                data: {
                    prodi: $('#prodi').val(),
                    tahun: $('#tahun').val(),
                    status: status,
                    is_status_mahasiswa: true, // New flag to indicate this is mahasiswa status
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    handleMahasiswaTableUpdate(result);
                },
                error: function() {
                    alert("Gagal mengambil data mahasiswa.");
                }
            });
        } else {
            // For IRS status, update the status dropdown and submit
            $('#status').val(status);
            $('#submitFilter').click();
        }
    });

        // Fetch tahun when prodi changes
        $('#prodi').on('change', function () {
            var idprodi = this.value;
            $("#tahun").html('<option selected disabled>Loading...</option>');
            fetchMahasiswaStatus(idprodi, $('#tahun').val());
            $.ajax({
                url: "{{ url('api/fetch-tahun') }}",
                type: "POST",
                data: {
                    prodi: idprodi,
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
        $('#tahun').on('change', function() {
            fetchMahasiswaStatus($('#prodi').val(), this.value);
        });

        // Show mahasiswa based on selected filters
        $('#submitFilter').on('click', function () {
            var prodi = $('#prodi').val();
            var tahun = $('#tahun').val();
            var status = $('#status').val();

            // Update status counts when filter is submitted
            fetchMahasiswaStatus(prodi, tahun);

            if (status != null) {
                $.ajax({
                    url: "{{ url('api/fetch-mahasiswa') }}",
                    type: "POST",
                    data: {
                        prodi: prodi,
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
                                    mahasiswa.status,
                                    "",
                                    "",
                                    mahasiswa.tahun_masuk,
                                    irsStatus,
                                    '<div class="flex space-x-2">' +
                                        '<button class="btn-approve bg-green-500 text-white px-1 py-1 rounded hover:bg-green-600" data-nim="' + mahasiswa.nim + '">Approve</button>' +
                                        '<button class="btn-view bg-blue-500 text-white px-1 py-1 rounded hover:bg-blue-600" data-nim="' + mahasiswa.nim + '">View</button>' +
                                    '</div>'
                                ]).draw(false);
                            });
                            
                            // Add event listeners for approve and view buttons
                            $('.btn-approve').on('click', function() {
                                var nim = $(this).data('nim');
                                console.log('Approve clicked for NIM: ' + nim);
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
                            console.log("masuk");
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
