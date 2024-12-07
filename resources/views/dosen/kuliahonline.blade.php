@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                Perkuliahan Online
            </div>
        </div>

        <!-- Informasi Perkuliahan Container -->
        <div class="flex justify-center">
            <div class="flex flex-col m-10 border-2 p-5 w-1/3 border-gray-300 rounded-xl gap-3 shadow-[0_2px_4px_rgba(0,0,0,0.1)]">
                <div class="text-xl font-bold">
                    <p>Informasi Perkuliahan</p>
                </div>
                <div class="text-lg">
                    <p class="my-1">Nama Dosen : {{ Auth::user()->dosen->nama }}</p>
                    <p class="my-1">Status Perkuliahan: 
                        <span id="status">
                            @if (Auth::user()->dosen->status_perkuliahan == 'aktif')
                                Perkuliahan sedang berlangsung
                            @else
                                Perkuliahan belum dimulai
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Tombol Mulai Kuliah Online -->
        @if (Auth::user()->dosen->status_perkuliahan == 'aktif')
            <div class="flex justify-center text-xl">
                <button id="start-class-btn" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 hover:bg-[#f0f0f0]">
                    Mulai Kuliah Online
                </button>
            </div>
        @else
            <div class="flex justify-center text-xl">
                <button id="start-class-btn" class="font-semibold border-2 border-[#80747475] rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.1)] my-4 px-3 py-1 hover:bg-[#f0f0f0]" disabled>
                    Mulai Kuliah Online
                </button>
            </div>
        @endif
    </div>
</div>

@include('footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#start-class-btn').click(function () {
        console.log("Button clicked!");  // Log untuk memastikan tombol diklik
        $.ajax({
            url: "{{ route('dosen.startOnlineClass') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log("Response received:", response);
                $('#status').text('Perkuliahan sedang berlangsung');
                $('#start-class-btn').hide();
            },
            error: function(xhr) {
                console.error("An error occurred:", xhr.responseText);
            }
        });
    });
</script>