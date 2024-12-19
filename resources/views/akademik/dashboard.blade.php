@include('header')
<div class="flex flex-col h-full">
    <x-navbar/>
    <main class="flex-1 p-6">
        <div class="text-lg font-bold mb-4">Dashboard Akademik  
        </div>
        <div class="flex items-center gap-3 ml-auto pr-6">
                <!-- LogOut Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] px-3 py-1 hover:bg-[#f0f0f0]">
                        Log Out
                    </button>
                </form>
                <!-- Notification Button -->
                <button class="group hover:bg-[#DE2227] hover:rounded-xl p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" class="stroke-current text-black group-hover:text-white fill-none">
                        <path d="M2.52992 14.394C2.31727 15.7471 3.268 16.6862 4.43205 17.1542C8.89481 18.9486 15.1052 18.9486 19.5679 17.1542C20.732 16.6862 21.6827 15.7471 21.4701 14.394C21.3394 13.5625 20.6932 12.8701 20.2144 12.194C19.5873 11.2975 19.525 10.3197 19.5249 9.27941C19.5249 5.2591 16.1559 2 12 2C7.84413 2 4.47513 5.2591 4.47513 9.27941C4.47503 10.3197 4.41272 11.2975 3.78561 12.194C3.30684 12.8701 2.66061 13.5625 2.52992 14.394Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21C9.79613 21.6219 10.8475 22 12 22C13.1525 22 14.2039 21.6219 15 21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

        <!-- Profile Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5 mb-6">
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-md">
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
                </div>
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold">Akademik</h2>
                    <p class="text-lg text-gray-600">Fakultas {{ Auth::user()->akademik->kode_fakultas }}</p>
                    <p class="text-lg text-gray-600">Bagian Akademik</p>
                    <p class="text-lg text-blue-500">{{ Auth::user()->akademik->email }}</p>
                </div>
                <div class="ml-auto mt-4 lg:mt-0 flex justify-center lg:block">
                    <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-sm lg:text-lg hover:bg-[#f0f0f0]">
                        Biodata
                    </button>
                </div>
            </div>
            <!-- Tanggal Penting Section -->
            <div class="col-span-1 flex flex-col border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)] items-center p-5 h-80 overflow-y-auto">
                <div class="font-bold text-lg text-center">
                    Tanggal Penting
                </div>
                <div class="flex-grow">
                    <ul class="list-disc space-y-2 text-center">
                    </ul>
                </div>
            </div>  
        </div>

        <!-- Notifikasi Pesan Sukses -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Penetapan Kapasitas Ruang Kelas Section -->
        <div class="border p-6 rounded-lg shadow-md mb-6">
            <h2 class="font-semibold text-xl mb-4">Penetapan Kapasitas Ruang Kelas</h2>
            <!-- Strata Dropdown -->
            <div class="mb-4">
                <label for="strata" class="block text-sm font-medium text-gray-700 mb-2">Pilih Strata:</label>
                <select id="strataFilter" class="border-2 border-[#80747475] rounded-lg p-2 w-48">
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>

            <!-- Form Penetapan -->
            <form action="{{ route('akademik.updateAllRuang') }}" method="POST" id="ruangForm">
                @csrf
                <table id="ruangTable" class="table-auto w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama/Kode Ruang</th>
                            <th class="px-4 py-2">Kapasitas</th>
                            <th class="px-4 py-2">Prodi</th>
                            <th class="px-4 py-2">Kode Departemen</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruangs as $ruang)
                            <tr>
                                <td class="border px-4 py-2">{{ $ruang->kode_ruang }}</td>
                                <td class="border px-4 py-2">
                                    <input 
                                        type="number" 
                                        name="kapasitas[{{ $ruang->kode_ruang }}]" 
                                        value="{{ $ruang->kapasitas }}" 
                                        class="border rounded p-2 w-full">
                                </td>
                                <td class="border px-4 py-2">
                                    <select 
                                        name="prodi[{{ $ruang->kode_ruang }}]" 
                                        class="border rounded p-2 w-full prodi-select"
                                        data-ruang="{{ $ruang->kode_ruang }}">
                                        <option value="">Pilih Prodi</option>
                                        @foreach($prodis as $prodi)
                                            <option 
                                                value="{{ $prodi->kode_prodi }}" 
                                                data-departemen="{{ $prodi->kode_departemen }}"
                                                data-strata="{{ $prodi->strata }}" 
                                                class="prodi-option"
                                                {{ $prodi->kode_prodi == $ruang->kode_prodi ? 'selected' : '' }}>
                                                {{ $prodi->nama }} ({{ $prodi->strata }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="border px-4 py-2">
                                    <input 
                                        type="text" 
                                        class="border rounded p-2 w-full kode-departemen"
                                        data-ruang="{{ $ruang->kode_ruang }}"
                                        value="{{ $ruang->departemen ? $ruang->departemen->kode_departemen : '' }}"
                                        readonly>
                                </td>
                                <td class="border px-4 py-2">
                                    <button 
                                        type="button" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 tetapkan-btn"
                                        data-ruang="{{ $ruang->kode_ruang }}">
                                        Tetapkan
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <div class="mb-4">
                <button type="submit" form="ruangForm" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                    Tetapkan Semua
                </button>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="mt-auto">
        @include('footer')
    </footer>
</div>

<!-- DataTables JS dan Inisialisasi -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
    $(document).ready(function () {
        // Event handler untuk tombol tetapkan individual
        $('.tetapkan-btn').on('click', function(e) {
            e.preventDefault();
            const ruangId = $(this).data('ruang');
            const formData = new FormData();
            
            formData.append('_token', $('input[name="_token"]').val());
            formData.append('ruang', ruangId);
            formData.append(`kapasitas[${ruangId}]`, $(`input[name="kapasitas[${ruangId}]"]`).val());
            formData.append(`prodi[${ruangId}]`, $(`select[name="prodi[${ruangId}]"]`).val());

            $.ajax({
                url: '{{ route("akademik.updateRuang") }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Ruang berhasil diperbarui!');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat memperbarui ruang.');
                }
            });
        });

        // Form submit handler untuk tetapkan semua
        $('#ruangForm').on('submit', function(e) {
            e.preventDefault();
            
            // Create FormData object
            const formData = new FormData();
            formData.append('_token', $('input[name="_token"]').val());

            // Collect all kapasitas and prodi values
            $('#ruangTable tbody tr').each(function() {
                const kodeRuang = $(this).find('.tetapkan-btn').data('ruang');
                const kapasitas = $(this).find(`input[name="kapasitas[${kodeRuang}]"]`).val();
                const prodi = $(this).find(`select[name="prodi[${kodeRuang}]"]`).val();
                
                formData.append(`kapasitas[${kodeRuang}]`, kapasitas);
                formData.append(`prodi[${kodeRuang}]`, prodi);
            });

            // Submit the form using AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Semua ruang berhasil diperbarui!');
                    // Optional: Reload the page to show updated values
                    window.location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat memperbarui ruang.');
                    console.error(xhr.responseText);
                }
            });
        });

        // Update kode_departemen saat prodi berubah
        $('.prodi-select').on('change', function () {
            const selectedProdi = $(this).find('option:selected');
            const kodeDepartemen = selectedProdi.data('departemen');
            const ruangId = $(this).data('ruang');

            $(`.kode-departemen[data-ruang="${ruangId}"]`).val(kodeDepartemen);
        });

        // Add click handler for Tetapkan Semua button
        $('.bg-green-500').on('click', function(e) {
            e.preventDefault();
            $('#ruangForm').submit();
        });
    });
</script>