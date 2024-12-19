@include('header')
<div class="flex flex-col min-h-screen">
    <x-navbar />

    <main class="flex-1 p-6">
        <div class="text-lg font-bold mb-4">Dashboard Dekan</div>
        <div class="flex items-center gap-3 pr-6">
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

        <!-- Profile // Tanggal Penting Section -->
        <div class="grid grid-cols-1 lg:grid-cols-4 px-6 md:px-12 gap-5">    
            <div class="col-span-1 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <!-- Foto Profile -->
                <div class="p-5 flex justify-center lg:justify-start">
                    <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
                </div>
                <!-- Info Profile -->
                <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
                    <h2 class="text-5xl font-bold">{{ Auth::user()->dosen->nama }}</h2>
                    <p class="text-lg text-gray-600">{{ Auth::user()->dosen->nidn }}</p>
                    <p class="text-lg text-gray-600">Fakultas {{Auth::user()->dosen->departemen->fakultas->nama_fakultas}}</p>
                    <p class="text-lg text-gray-600">Departemen {{Auth::user()->dosen->departemen->nama}}</p>
                    <p class="text-lg text-blue-500">{{ Auth::user()->dosen->email }}</p>
                </div>
                <!-- Biodata -->
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

        <!-- Shared Prodi Filter -->
        <div class="mb-6 p-4 border rounded-lg shadow-md">
            <form method="GET" action="{{ route('dekan.dashboard') }}" class="flex flex-col lg:flex-row gap-4">
                <!-- Dropdown Strata -->
                <div class="flex-grow">
                    <label for="strataFilter" class="block font-semibold mb-2">Pilih Strata:</label>
                    <select id="strataFilter" name="strata" class="border rounded-lg p-2 w-full">
                        <option value="">-- Pilih Strata --</option>
                        @foreach($stratas as $strata)
                            <option value="{{ $strata }}" {{ request('strata') == $strata ? 'selected' : '' }}>
                                {{ $strata }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown Prodi -->
                <div class="flex-grow">
                    <label for="prodiFilter" class="block font-semibold mb-2">Pilih Program Studi:</label>
                    <select id="prodiFilter" name="prodi" class="border rounded-lg p-2 w-full">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach($prodis as $prodi)
                            @if(!request('strata') || $prodi->strata == request('strata'))
                                <option value="{{ $prodi->kode_prodi }}" {{ request('prodi') == $prodi->kode_prodi ? 'selected' : '' }}>
                                    {{ $prodi->nama }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Terapkan Filter -->
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Penetapan Jadwal Kuliah Section -->
        <div class="border p-6 rounded-lg mb-6 shadow-md">
            <h2 class="font-semibold text-xl mb-4">Penetapan Jadwal Kuliah</h2>
            
            <!-- Jadwal Table -->
            <table id="jadwalTable" class="w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Mata Kuliah</th>
                        <th class="px-4 py-2">Hari</th>
                        <th class="px-4 py-2">Jam</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                        @if(!request('prodi') || $jadwal->mataKuliah->kode_prodi == request('prodi'))
                        <tr>
                            <td class="border px-4 py-2">{{ $jadwal->mataKuliah->nama_mk }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->hari }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                            <td class="border px-4 py-2">{{ $jadwal->status }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('dekan.setJadwal') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                    <button type="button" class="btn-setujui bg-blue-500 text-white px-3 py-1 rounded">
                                        Setujui
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <!-- Approve all form -->
            <form action="{{ route('dekan.setAllJadwal') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="prodi" value="{{ request('prodi') }}">
                <button type="button" class="btn-setujui-semua bg-green-500 text-white px-4 py-2 rounded">
                    Setujui Semua
                </button>
            </form>
        </div>

        <!-- Penetapan Ketersediaan Ruang Kelas Section -->
        <div class="border p-6 rounded-lg shadow-md mt-6">
            <h2 class="font-semibold text-xl mb-4">Persetujuan Perubahan Ruang</h2>

            @if($pendingRoomChanges && count($pendingRoomChanges) > 0)
                <table id="roomChangesTable" class="table-auto w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Kode Ruang</th>
                            <th class="px-4 py-2">Tipe Perubahan</th>
                            <th class="px-4 py-2">Detail Perubahan</th>
                            <th class="px-4 py-2">Diajukan Oleh</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingRoomChanges as $change)
                            <tr>
                                <td class="border px-4 py-2">{{ $change->kode_ruang }}</td>
                                <td class="border px-4 py-2">
                                    @if($change->action_type == 'create')
                                        <span class="text-green-600">Pembuatan Baru</span>
                                    @elseif($change->action_type == 'update')
                                        <span class="text-blue-600">Perubahan</span>
                                    @else
                                        <span class="text-red-600">Penghapusan</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @if($change->action_type == 'update')
                                        @php
                                            $oldData = json_decode($change->old_data, true);
                                            $newData = json_decode($change->new_data, true);
                                        @endphp
                                        <ul class="list-disc list-inside">
                                            @foreach($newData as $key => $value)
                                                @if(isset($oldData[$key]) && $oldData[$key] != $value)
                                                    <li>{{ ucfirst($key) }}: {{ $oldData[$key] }} → {{ $value }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @elseif($change->action_type == 'create')
                                        @php
                                            $newData = json_decode($change->new_data, true);
                                        @endphp
                                        <ul class="list-disc list-inside">
                                            <li>Kapasitas: {{ $newData['kapasitas'] }}</li>
                                            <li>Status: {{ $newData['status_ketersediaan'] }}</li>
                                        </ul>
                                    @else
                                        <span class="text-red-600">Penghapusan ruang</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $change->creator->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex space-x-2">
                                        <form action="{{ route('dekan.approveRoomChange', $change->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="button" class="btn-approve-room bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('dekan.rejectRoomChange', $change->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="button" class="btn-reject-room bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tambahkan tombol Setujui Semua dan Tolak Semua -->
                <div class="mt-4 flex gap-4">
                    <form action="{{ route('dekan.approveAllRoomChanges') }}" method="POST">
                        @csrf
                        <button type="button" class="btn-approve-all bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Setujui Semua
                        </button>
                    </form>
                    <form action="{{ route('dekan.rejectAllRoomChanges') }}" method="POST">
                        @csrf
                        <button type="button" class="btn-reject-all bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Tolak Semua
                        </button>
                    </form>
                </div>
            @else
                <div class="text-center py-4 text-gray-600">
                    Tidak ada perubahan ruang yang menunggu persetujuan.
                </div>
            @endif
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    /* SweetAlert Confirm Button */
    .swal2-confirm {
        background-color: #3085d6 !important; /* Warna biru */
        color: white !important; /* Warna teks putih */
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
    }

    /* Hover untuk tombol Confirm */
    .swal2-confirm:hover {
        background-color: #2874c7 !important; /* Biru lebih gelap */
        cursor: pointer;
    }

    /* SweetAlert Cancel Button */
    .swal2-cancel {
        background-color: #d33 !important; /* Warna merah */
        color: white !important; /* Warna teks putih */
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
    }

    /* Hover untuk tombol Cancel */
    .swal2-cancel:hover {
        background-color: #c12f2f !important; /* Merah lebih gelap */
        cursor: pointer;
    }


</style>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables untuk tabel ruang
        $('#roomChangesTable').DataTable({
            "dom": '<"top"<"flex items-center justify-between"<"flex items-center gap-2"f><"ml-auto"l>>>rt<"bottom"p><"clear">',
            "paging": true,
            "info": false,
            "searching": true,
            "ordering": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Perubahan",
                "lengthMenu": "Tampilkan _MENU_ data",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
        $('#jadwalTable').DataTable({
            "dom": '<"top"<"flex items-center justify-between"<"flex items-center gap-2"f><"ml-auto"l>>>rt<"bottom"p><"clear">',
            "paging": true,
            "info": false, // Sembunyikan informasi jumlah data
            "searching": true, // Aktifkan pencarian
            "ordering": true, // Aktifkan pengurutan
            "language": {
                "search": "_INPUT_", // Menghapus label 'Search'
                "searchPlaceholder": "Cari Jadwal", // Placeholder untuk pencarian
                "lengthMenu": "Tampilkan _MENU_ data", // Ubah teks dropdown
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });

        // Filter dropdown Prodi berdasarkan Strata
        $('#strataFilter').on('change', function() {
            const selectedStrata = $(this).val(); // Ambil strata yang dipilih
            $('.prodi-select').each(function() {
                const $dropdown = $(this);
                $dropdown.find('.prodi-option').each(function() {
                    const $option = $(this);
                    if (selectedStrata === "" || $option.data('strata') === selectedStrata) {
                        $option.show(); // Tampilkan opsi jika strata cocok
                    } else {
                        $option.hide(); // Sembunyikan opsi jika strata tidak cocok
                    }
                });
                // Reset dropdown jika opsi terpilih tidak cocok
                if ($dropdown.find('.prodi-option:selected').is(':hidden')) {
                    $dropdown.val(''); // Reset ke default
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // Konfirmasi untuk tombol "Setujui"
        document.querySelectorAll('.btn-setujui').forEach(button => {
            button.addEventListener('click', function () {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyetujui jadwal ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setujui!',
                    cancelButtonText: 'Batal'
                }).then(result => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                });
            });
        });

        // Konfirmasi untuk tombol "Setujui Semua"
        document.querySelector('.btn-setujui-semua')?.addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui semua jadwal.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui Semua!',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });

        document.querySelector('.btn-approve-all')?.addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui semua perubahan ruang.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui Semua!',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });

        // Konfirmasi untuk tombol "Tolak Semua"
        document.querySelector('.btn-reject-all')?.addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menolak semua perubahan ruang.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tolak Semua!',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });

</script>