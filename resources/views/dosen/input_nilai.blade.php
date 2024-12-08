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
    <style>
        .nilai-input{
            width: 6rem;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable dengan pencarian di tiap kolom
            var table = $('#mahasiswaTable').DataTable({
                "dom": '<"top"<"flex items-center justify-between gap-4"<"flex items-center"f><"flex items-center gap-2"B><"ml-auto"l>>>rt<"bottom"p><"clear">',
                "paging": true,
                "info": false,
                "searching": true,
                "ordering": true,
                "sensitivity": "accent",
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "CARI MAHASISWA",
                    lengthMenu: "Tampilkan _MENU_ data"
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

                                // Iterate through each student
                                $.each(result, function (index, row) {
                                    // Check KHS for this student and course using student's semester
                                    checkKHS(row.nim, mk, row.semester_pengambilan, function(khsData) {
                                        // Determine content for 'nilai' and 'aksi' columns based on KHS check
                                        let nilaiContent, aksiContent;

                                        if (khsData.exists) {
                                            // KHS exists - display value with edit button
                                            nilaiContent = `<span class="nilai-display">${khsData.data.nilai}</span>
                                                        <input type="number" class="form-control nilai-input hidden" 
                                                        data-nim="${row.nim}" value="${khsData.data.nilai}">`;
                                            
                                            aksiContent = `<button class="btn btn-primary btn-edit" data-nim="${row.nim}">Edit</button>`;
                                        } else {
                                            // No KHS - input field for entry
                                            nilaiContent = `<input type="number" class="form-control nilai-input" 
                                                        data-nim="${row.nim}" placeholder="Masukkan nilai">`;
                                            
                                            aksiContent = `<button id="btn-submit" class="btn btn-success btn-submit" data-nim="${row.nim}">Submit</button>
                                                        `;
                                        }
                                        // <button class="btn btn-danger btn-batalkan" data-nim="${row.nim}">Batalkan</button>
                                        // Add rows to the table
                                        table.row.add([
                                            row.nim,
                                            row.nama,
                                            row.semester_pengambilan,
                                            row.kelas,
                                            row.status_pengambilan,
                                            nilaiContent,
                                            aksiContent
                                        ]).draw(false);
                                    });
                                });

                                // Event listener for 'Edit' button
                                $(document).on('click', '.btn-edit', function() {
                                    const nim = $(this).data('nim');
                                    // Hide display, show input
                                    $(this).closest('tr').find('.nilai-display').addClass('hidden');
                                    $(this).closest('tr').find('.nilai-input').removeClass('hidden');
                                    
                                    // Replace edit button with submit/cancel
                                    $(this).replaceWith(`
                                        <button class="btn btn-success btn-update" data-nim="${nim}">Update</button>
                                        <button class="btn btn-danger btn-cancel-edit" data-nim="${nim}">Batal</button>
                                    `);
                                });

                                // Event listener for 'Update' button
                                $(document).on('click', '.btn-submit','.btn-update', function() {
                                    const nim = $(this).data('nim');
                                    const tr = $(this).closest('tr');
                                    const nilaiInput = tr.find('.nilai-input').val();
                                    const mk = $('#mata_kuliah').val();
                                    // const semester = tr.find('td:nth-child(3)').text(); // Get semester from table row

                                    if (nilaiInput) {
                                        $.ajax({
                                            url: "{{ url('api/update-khs') }}", 
                                            type: "POST",
                                            data: {
                                                nim: nim,
                                                kode_mk: mk,
                                                nilai: nilaiInput,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function (response) {
                                                if (response.success) {
                                                    // Refresh the display
                                                    tr.find('.nilai-input').addClass('hidden');
                                                    tr.find('.nilai-display').text(nilaiInput).removeClass('hidden');
                                                    
                                                    // Replace buttons
                                                    tr.find('.btn-update, .btn-cancel-edit').remove();
                                                    tr.find('.aksi-column').append(`
                                                        <button class="btn btn-primary btn-edit" data-nim="${nim}">Edit</button>
                                                    `);

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
                                            error: function () {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Gagal',
                                                    text: 'Terjadi kesalahan saat memperbarui nilai.'
                                                });
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Nilai kosong',
                                            text: 'Mohon masukkan nilai terlebih dahulu.'
                                        });
                                    }
                                });

                                // Event listener for 'Cancel Edit' button
                                $(document).on('click', '.btn-cancel-edit', function() {
                                    const tr = $(this).closest('tr');
                                    // Hide input, show display
                                    tr.find('.nilai-input').addClass('hidden');
                                    tr.find('.nilai-display').removeClass('hidden');
                                    
                                    // Replace buttons
                                    tr.find('.btn-update, .btn-cancel-edit').remove();
                                    tr.find('.aksi-column').append(`
                                        <button class="btn btn-primary btn-edit" data-nim="${$(this).data('nim')}">Edit</button>
                                    `);
                                });

                                // Submit button logic remains the same as previous implementation
                                // Batalkan button logic remains the same as previous implementation

                            } else {
                                $('#tableWrapper').removeClass('hidden');
                                $('#mahasiswaTable').removeClass('hidden');
                                table.row.add(['', '', 'Tidak ada data mahasiswa', '', '', '', '', '','','']).draw(false);
                            }
                        },
                        error: function () {
                            alert("Gagal mengambil data mahasiswa.");
                        }
                    });
                } else {
                    alert("Mohon pilih Mata Kuliah.");
                }
            });

            // Helper function to check KHS
            function checkKHS(nim, kode_mk, semester, callback) {
                $.ajax({
                    url: "{{ url('api/check-khs') }}",
                    type: "POST",
                    data: {
                        nim: nim,
                        kode_mk: kode_mk,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        callback(response);
                    },
                    error: function() {
                        // If check fails, treat as non-existent KHS
                        callback({ exists: false });
                    }
                });
            }
        });
    
    </script>

@include('footer')