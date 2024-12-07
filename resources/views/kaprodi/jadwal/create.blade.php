@include('../header')
<x-navbar/>




<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Buat Jadwal</h1>
            
            <form id="jadwalForm" action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                <input type="hidden" id="selectedDosenInput" name="dosen_pengampu">
                <!-- Kode Mata Kuliah Input -->
                <div class="mb-4">
                    <label for="kode_mk" class="block mb-2 text-sm font-medium text-gray-900">Kode Mata Kuliah</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="kode_mk" name="kode_mk" required>
                        <option value="" selected disabled>Pilih Kode Mata Kuliah</option>
                        @foreach ($matkul as $mk)
                            <option value="{{ $mk->kode_mk }}" data-sks="{{ $mk->sks }}" data-kode-prodi="{{ $mk->kode_prodi }}">
                                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                    <div class="mt-2 bg-gray-100 border border-gray-200 rounded-lg p-4">
                        <p class="text-gray-700">SKS: <span id="sksDisplayValue" class="font-medium">N/A</span></p>
                    </div>
                </div>

                <!-- Dosen Pengampu Input -->
                <div id="selectedDosenContainer">
                    <div class="mb-4">
                        <label for="dosen_pengampu" class="block mb-2 text-sm font-medium text-gray-900">Dosen Pengampu</label>
                        <input type="text" id="dosenSearch" placeholder="Cari Dosen..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2 focus:ring-blue-500 focus:border-blue-500">
                        <div id="dosenList" class="max-h-40 overflow-y-auto border border-gray-300 rounded-lg bg-white p-2">
                            <!-- Dynamically populated -->
                        </div>
                    </div>
                </div>
                <div class="mb-4 bg-gray-100 border border-gray-200 rounded-lg p-4">
                    <p class="text-gray-700">Dosen Terpilih:</p>
                    <ul id="selectedDosenDisplay" class="list-disc pl-5 text-gray-700 font-medium">
                        <!-- Selected dosen -->
                    </ul>
                </div>

                <!-- Other Inputs -->
                <div class="mb-4">
                    <label for="kode_kelas" class="block mb-2 text-sm font-medium text-gray-900">Kode Kelas</label>
                    <input type="text" id="kode_kelas" name="kode_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
                </div>
                <div class="mb-4">
                    <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>
                <div class="mb-4">
                    <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
                </div>
                <div class="mb-4">
                    <label for="hari" class="block mb-2 text-sm font-medium text-gray-900">Hari</label>
                    <select id="hari" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ruang" class="block mb-2 text-sm font-medium text-gray-900">Ruang</label>
                    <select id="ruang" name="ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                        @foreach ($ruang as $r)
                            <option value="{{ $r->kode_ruang }}" data-kapasitas="{{ $r->kapasitas }}">{{ $r->kode_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900">Kuota</label>
                    <input type="number" id="kuota" name="kuota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="kode_tahun" class="block mb-2 text-sm font-medium text-gray-900">Kode Tahun</label>
                    <input 
                        type="text" 
                        id="kode_tahun" 
                        name="kode_tahun" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                        value="{{$kodeTahun->first()->kode_tahun}}" 
                        readonly>
                </div>


                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-5 py-2.5 rounded-lg focus:ring-4 focus:ring-blue-300">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Element References
    const kodeMkSelect = document.getElementById('kode_mk');
    const sksDisplayValue = document.getElementById('sksDisplayValue');
    const jamMulai = document.getElementById('jam_mulai');
    const jamSelesai = document.getElementById('jam_selesai');
    const dosenSearch = document.getElementById('dosenSearch');
    const dosenList = document.getElementById('dosenList');
    const selectedDosenDisplay = document.getElementById('selectedDosenDisplay');
    const kodeKelasInput = document.getElementById('kode_kelas');

    const form = document.getElementById('jadwalForm');
    const ruang = document.getElementById('ruang');
    const hari = document.getElementById('hari');

    // console.log(selectedDosenDisplay.querySelectorAll('li[data-nidn]'));

    const existingSchedules = @json($jadwals); // Includes dosen_pengampu details

    let dosenData = []; // Store fetched Dosen for filtering

    // ==========================
    // SKS-related Functions
    // ==========================

    // Update SKS Display and Trigger Related Updates
    // Listener for SKS and Jam Selesai
    kodeMkSelect.addEventListener('change', function () {
        const selectedOption = kodeMkSelect.options[kodeMkSelect.selectedIndex];
        handleSKSAndJamSelesai(selectedOption);
    });

    function handleSKSAndJamSelesai(selectedOption) {
        const sks = selectedOption.dataset.sks || "N/A";
        sksDisplayValue.textContent = sks;

        if (jamMulai.value) {
            updateJamSelesai(jamMulai.value, parseInt(sks));
        }
    }

    // Update Jam Selesai Based on SKS and Jam Mulai
    jamMulai.addEventListener('input', () => {
        const sks = parseInt(kodeMkSelect.options[kodeMkSelect.selectedIndex].dataset.sks);
        updateJamSelesai(jamMulai.value, sks);
    });

    // Calculate Jam Selesai
    function updateJamSelesai(jamMulai, sks) {
        if (jamMulai && !isNaN(sks)) {
            const [hours, minutes] = jamMulai.split(':').map(Number);
            const totalMinutes = hours * 60 + minutes + sks * 50; // 50 minutes per SKS
            const selesaiHours = Math.floor(totalMinutes / 60);
            const selesaiMinutes = totalMinutes % 60;
            jamSelesai.value = `${selesaiHours.toString().padStart(2, '0')}:${selesaiMinutes.toString().padStart(2, '0')}`;
        }
    }

    // Listener for fetching Dosen based on Kode Prodi
    kodeMkSelect.addEventListener('change', function () {
        const selectedOption = kodeMkSelect.options[kodeMkSelect.selectedIndex];
        const kodeProdi = selectedOption.dataset.kodeProdi;
        if (kodeProdi) {
            fetchDosenByKodeProdi(kodeProdi);
        }
    });


    // Handle Mata Kuliah selection
    kodeMkSelect.addEventListener('change', function () {
        const selectedKodeMk = kodeMkSelect.value;

        // Find related schedules with the selected `kode_mk`
        const relatedSchedules = existingSchedules.filter(schedule => schedule.kode_mk === selectedKodeMk);

        if (relatedSchedules.length > 0) {
            automateDosenSelection(relatedSchedules);
            suggestKodeKelas(relatedSchedules); // Suggest next `kode_kelas`
        } else {
            clearDosenSelection();
            kodeKelasInput.value = 'A';
        }
    });

    function getSelectedDosenNidns(selectedDosenDisplay) {

        const nidnArray = [];

        // Get all list items from selectedDosenDisplay
        const items = selectedDosenDisplay.querySelectorAll('li[data-nidn]');
        items.forEach(item => {
            const nidn = item.getAttribute('data-nidn'); // Get the value of data-nidn
            if (nidn) {
                nidnArray.push(nidn); // Add it to the array
            }
        });

        return nidnArray; // Return the array of data-nidn values
    }

    // ==========================
    // Tentang Kode Kelas
    // ==========================
    // Suggest Kode Kelas
    function suggestKodeKelas(relatedSchedules) {
        const existingKelas = relatedSchedules.map(schedule => schedule.kode_kelas);
        const nextKodeKelas = getNextKodeKelas(existingKelas);
        kodeKelasInput.value = nextKodeKelas;
    }

    // Generate the next `kode_kelas` not in use
    function getNextKodeKelas(existingKelas) {
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for (let char of alphabet) {
            if (!existingKelas.includes(char)) {
                return char;
            }
        }
        return ''; // Return empty if all A-Z are taken
    }


    // ==========================
    // Dosen-related Functions
    // ==========================

    // Fetch Dosen Based on Kode Prodi
    function fetchDosenByKodeProdi(kodeProdi) {
        $.ajax({
            url: "{{ url('api/fetch-dosen') }}",
            type: "POST",
            data: {
                kode_prodi: kodeProdi,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (data) {
                dosenData = data.dosen || [];
                updateDosenList(dosenData);
            },
            error: function () {
                dosenList.innerHTML = '<p class="text-red-500">Error loading options</p>';
            }
        });
    }

    // Populate Dosen List with Checkboxes
    function updateDosenList(dosen) {
        dosenList.innerHTML = '';
        dosen.forEach(dosen => {
            const dosenItem = document.createElement('div');
            dosenItem.classList.add('flex', 'items-center', 'mb-2');
            dosenItem.innerHTML = `
                <input type="checkbox" id="dosen-${dosen.nidn}" value="${dosen.nidn}" 
                       data-name="${dosen.nama}" class="mr-2">
                <label for="dosen-${dosen.nidn}" class="text-gray-700">${dosen.nama} (${dosen.nidn})</label>
            `;
            dosenList.appendChild(dosenItem);
        });
    }

    // Filter Dosen List Based on Search Query
    dosenSearch.addEventListener('input', function () {
        const query = dosenSearch.value.toLowerCase();
        const filteredDosen = dosenData.filter(dosen => dosen.nama.toLowerCase().includes(query));
        updateDosenList(filteredDosen);
    });

    // Handle Dosen Selection (Add/Remove)
    dosenList.addEventListener('change', function (event) {
        if (event.target.type === 'checkbox') {
            const nidn = event.target.value;
            const nama = event.target.dataset.name;

            if (event.target.checked) {
                addSelectedDosen(nidn, nama);
            } else {
                removeSelectedDosen(nidn);
            }
        }
    });

    // Add Selected Dosen to Display
    // function addSelectedDosen(nidn, nama) {
    //     if (isDosenInSelectedList(nidn)) {
    //         return; // Prevent duplicates
    //     }

    //     const dosenItem = document.createElement('li');
    //     dosenItem.classList.add('flex', 'justify-between', 'items-center', 'mb-1');
    //     dosenItem.setAttribute('data-nidn', nidn);
    //     dosenItem.innerHTML = `
    //         <span>${nama}</span>
    //         <button type="button" class="text-red-500 hover:underline text-sm" onclick="removeSelectedDosen('${nidn}')">
    //             Hapus
    //         </button>
    //     `;
    //     selectedDosenDisplay.appendChild(dosenItem);
    // }

    // Remove Selected Dosen
    window.removeSelectedDosen = function (nidn) {
        const dosenItem = selectedDosenDisplay.querySelector(`li[data-nidn="${nidn}"]`);
        if (dosenItem) {
            dosenItem.remove();
        }

        // Uncheck corresponding checkbox
        const checkbox = dosenList.querySelector(`input[value="${nidn}"]`);
        if (checkbox) {
            checkbox.checked = false;
        }
    };

    // Check if Dosen is Already in Selected List
    function isDosenInSelectedList(nidn) {
        
        return !!selectedDosenDisplay.querySelector(`li[data-nidn="${nidn}"]`);
    }


    // Automate Dosen Selection
    function automateDosenSelection(relatedSchedules) {
        clearDosenSelection();

        // Collect unique dosen NIDNs from related schedules
        const uniqueDosenNidn = [
            ...new Set(
                relatedSchedules.flatMap(schedule =>
                    schedule.dosen_pengampu.map(dp => dp.dosen.nidn)
                )
            ),
        ];

        // Loop through the unique NIDNs and add them to the selected list
        uniqueDosenNidn.forEach(nidn => {
            const dosen = @json($dosen).find(d => d.nidn === nidn);
            if (dosen) {
                // Add the dosen to the selected list
                addSelectedDosen(dosen.nidn, dosen.nama);

                // Check if the dosen is already in the selected list and automatically check the checkbox
                const checkbox = dosenList.querySelector(`input[value="${nidn}"]`);

                if (checkbox) {
                    checkbox.checked = true; // Check the box automatically
                }
            }
        });
    }


    // Add Dosen to Display
    function addSelectedDosen(nidn, nama) {

        if (isDosenInSelectedList(nidn)) {
            return; // Prevent duplicates
        }

        const dosenItem = document.createElement('li');
        dosenItem.classList.add('flex', 'justify-between', 'items-center', 'mb-1');
        dosenItem.setAttribute('data-nidn', nidn);
        dosenItem.innerHTML = `
            <div>
                <span class="font-medium">${nama}</span>
            </div>
            <button type="button" class="text-red-500 hover:underline text-sm" onclick="removeSelectedDosen('${nidn}')">
                Hapus
            </button>
        `;
        selectedDosenDisplay.appendChild(dosenItem);

        // Automatically check corresponding checkbox
        const checkbox = dosenList.querySelector(`input[value="${nidn}"]`);
        if (checkbox) {
            checkbox.checked = true;
        }
    }

    // Clear Dosen Selection
    function clearDosenSelection() {
        selectedDosenDisplay.innerHTML = '';
        dosenList.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    // ==========================
    // Tentang Cek Tidak Tabrakan
    // ==========================


    form.addEventListener('submit', function (event) {
        const ruangValue = ruang.value;
        const hariValue = hari.value;
        const jamMulaiValue = jamMulai.value;
        const jamSelesaiValue = jamSelesai.value;
        const kuotaValue = kuota.value; // Get the kuota value
        const selectedRuangOption = ruang.options[ruang.selectedIndex];
        const kapasitas = selectedRuangOption ? parseInt(selectedRuangOption.getAttribute('data-kapasitas'), 10) : 0;

        console.log(selectedRuangOption);
        console.log(kapasitas);


        // Validate the schedule

        if (parseInt(kuotaValue, 10) > kapasitas) {
            event.preventDefault();
            alert("Kuota tidak boleh melebihi kapasitas ruang.");
            return; // Stop form submission
        }

        const conflict = existingSchedules.some(schedule => {
            return (
                schedule.ruang === ruangValue && // Check same room
                schedule.hari === hariValue && // Check same day
                isTimeOverlap(schedule.jam_mulai, schedule.jam_selesai, jamMulaiValue, jamSelesaiValue) // Check time overlap
            );
        });

        if (conflict) {
            event.preventDefault();
            alert("Jadwal bentrok! Ruang sudah digunakan pada waktu tersebut.");
        }
    });

    // Helper function to check if two time ranges overlap
    function isTimeOverlap(startA, endA, startB, endB) {
        return (startA < endB && startB < endA);
    }

    // console.log(getSelectedDosenNidns(selectedDosenDisplay));

    // kodeMkSelect.addEventListener('change', function(){
    //     console.log(getSelectedDosenNidns(selectedDosenDisplay));
    // })

});

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jadwalForm = document.getElementById('jadwalForm');
    const selectedDosenInput = document.getElementById('selectedDosenInput');
    const selectedDosenDisplay = document.getElementById('selectedDosenDisplay');

    // Collect selected dosen NIDN values and populate the hidden input
    function updateSelectedDosenInput() {
        const selectedDosen = [];
        selectedDosenDisplay.querySelectorAll('li[data-nidn]').forEach(dosenItem => {
            selectedDosen.push(dosenItem.getAttribute('data-nidn')); // Push only the NIDN
        });
        selectedDosenInput.value = JSON.stringify(selectedDosen); // Convert to JSON array
    }

    // Update the hidden input before form submission
    jadwalForm.addEventListener('submit', function () {
        updateSelectedDosenInput();
    });
});
</script>



@include('../footer')
