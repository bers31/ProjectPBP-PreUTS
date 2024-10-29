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
        
        <!-- Dropdown Departemen -->
        <div class="flex mt-5 p-8">
            <form id="filterForm" class="max-w-sm mx-start pl-4">
                @csrf
                <label for="departemen" class="block mb-2 text-sm font-medium text-gray-900 ">Departemen</label>
                <select id="departemen" name="departemen" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5
                {{-- dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}">
                    
                    <option selected disabled>---- Pilih Departemen ----</option>
                    <option value="Informatika">S1 - Informatika</option>
                    <option value="S2-Sistem Informasi">S2 - Sistem Informasi</option>
                    <option value="S3-Sistem Informasi">S3 - Sistem Informasi</option>
                </select>
                
                <label for="tahun" class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Tahun Angkatan</label>
                <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 
                {{-- dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 --}}">
                    <option selected disabled>---- Pilih Tahun Angkatan ----</option>
                </select>
                
                <!-- Tombol Submit -->
                <button type="button" id="submitFilter" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Tampilkan Mahasiswa</button>
            </form>
        </div>
        
        <!-- Tabel Mahasiswa -->
        <div class="flex mt-5 p-8 px-10">
            <table id="mahasiswaTable" class="min-w-full border border-gray-300 hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">NIM</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Departemen</th>
                        <th class="px-4 py-2 border">Tahun Masuk</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        

        <!-- jQuery dan AJAX Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
            // Mengisi dropdown tahun berdasarkan departemen
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
                        $('#tahun').html('<option selected disabled>---- Pilih Tahun Angkatan ----</option>');
                        $.each(result.tahun, function (key, value) {
                            $("#tahun").append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Menampilkan tabel mahasiswa berdasarkan filter
            $('#submitFilter').on('click', function () {
                var departemen = $('#departemen').val();
                var tahun = $('#tahun').val();
                if (departemen && tahun) {
                    $.ajax({
                        url: "{{ url('api/fetch-mahasiswa') }}",
                        type: "POST",
                        data: {
                            departemen: departemen,
                            tahun: tahun,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function (result) {
                            // Tampilkan tabel mahasiswa
                            var tableBody = $('#mahasiswaTable tbody');
                            tableBody.empty(); // Kosongkan isi tabel
                            if (result.mahasiswa.length > 0) {
                                $('#mahasiswaTable').removeClass('hidden');
                                $.each(result.mahasiswa, function (index, mahasiswa) {
                                    tableBody.append(
                                        '<tr>' +
                                            '<td class="px-4 py-2 border">' + mahasiswa.nim + '</td>' +
                                            '<td class="px-4 py-2 border">' + mahasiswa.nama + '</td>' +
                                            '<td class="px-4 py-2 border">' + mahasiswa.departemen + '</td>' +
                                            '<td class="px-4 py-2 border">' + mahasiswa.tahun_masuk + '</td>' +
                                        '</tr>'
                                    );
                                });
                            } else {
                                tableBody.append('<tr><td colspan="4" class="text-center py-2">Tidak ada data mahasiswa</td></tr>');
                                $('#mahasiswaTable').removeClass('hidden');
                            }
                        },
                        error: function () {
                            alert("Gagal mengambil data mahasiswa.");
                        }
                    });
                } else {
                    alert("Mohon pilih Departemen dan Tahun Angkatan.");
                }
            });
        });

        </script>
    </div>
</div>

@include('footer')
