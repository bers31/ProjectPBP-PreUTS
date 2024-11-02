@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar_mhs></x-navbar_mhs>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Registrasi Akademik
            </div>
        </div>

        <!-- Informasi Registrasi Container -->
        <div class="flex justify-center">
            <div class="flex flex-col m-10 border-2 p-5 w-1/3 border-gray-300 rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <div class="text-xl font-bold">
                    <p>Informasi Registrasi</p>
                </div>
                <div class="text-lg">
                    <p class="my-1">BillKey : {{ Auth::user()->mahasiswa->nim }}</p>
                    <p class="my-1">Nama : {{ Auth::user()->mahasiswa->nama }}</p>
                    <p class="my-1">Semester : {{ Auth::user()->mahasiswa->semester }}</p>
                    <p class="my-1">Status : 
                        <span id="status">
                            @if (Auth::user()->mahasiswa->status == 'aktif')
                                Sudah bayar
                            @else
                                Belum bayar
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="flex justify-center">
            <div class="flex flex-col m-5 border-2 p-5 w-2/3 border-gray-300 rounded-lg gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <table class="table-auto w-full border-collapse border border-gray-400">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2">Semester</th>
                            <th class="border border-gray-400 px-4 py-2">Tagihan</th>
                            <th class="border border-gray-400 px-4 py-2">Tanggal Bayar</th>
                        </tr>
                    </thead>

                    @php
                        $historyRegistrasi = \App\Models\HistoryRegistrasi::where('nim', Auth::user()->mahasiswa->nim)->get();
                    @endphp

                    <tbody id="payment-details">
                        @foreach($historyRegistrasi as $history)
                            <tr class="text-center">
                                <td class="border border-gray-400 px-4 py-2">{{ $history->semester }}</td>
                                <td class="border border-gray-400 px-4 py-2">Rp{{ number_format($history->tagihan, 0, ',', '.') }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $history->tanggal_bayar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Registrasi -->
        @if (Auth::user()->mahasiswa->status == 'non-aktif')
            <div class="flex justify-center text-xl">
                <button id="fetch-data-btn" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 hover:bg-[#f0f0f0]">
                    Registrasi
                </button>
            </div>
        @else
            <div class="flex justify-center text-xl" style="display: none;">
                <button id="fetch-data-btn" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 hover:bg-[#f0f0f0]">
                    Registrasi
                </button>
            </div>
        @endif

    </div>

@include('footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#fetch-data-btn').click(function () {
        $.ajax({
            url: "{{ route('getRegistrasiData') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                $('#status').text('Sudah bayar');
                let paymentRow = `
                    <tr class="text-center">
                        <td class="border border-gray-400 px-4 py-2">${response.semester}</td>
                        <td class="border border-gray-400 px-4 py-2">Rp${response.tagihan.toLocaleString()}</td>
                        <td class="border border-gray-400 px-4 py-2">${response.tanggal_bayar}</td>
                    </tr>
                `;
                $('#payment-details').html(paymentRow);
            },
            error: function(xhr) {
                console.error("An error occurred:", xhr.responseText);
            }
        });
    });
</script>
