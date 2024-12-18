@include('../header')
<x-navbar/>


<div class="flex flex-col flex-grow">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Edit Jadwal</h1>
            
            <form id="jadwalForm" action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="selectedDosenInput" name="dosen_pengampu" value="{{ json_encode($jadwal->dosen_pengampu->pluck('nidn')) }}">
                <!-- Kode Mata Kuliah Input -->
                <div class="mb-4">
                    <label for="kode_mk_nama_mk" class="block mb-2 text-sm font-medium text-gray-900">Kode dan Nama Mata Kuliah</label>
                    <!-- Display the Kode and Nama Mata Kuliah as text -->
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        {{ $jadwal->mataKuliah->kode_mk }} - {{ $jadwal->mataKuliah->nama_mk }}
                    </div>

                    <!-- Hidden input for kode_mk -->
                    <input 
                        type="hidden" 
                        id="kode_mk" 
                        name="kode_mk" 
                        value="{{ $jadwal->mataKuliah->kode_mk }}" 
                    >
                    <div class="mt-2 bg-gray-100 border border-gray-200 rounded-lg p-4">
                        <p class="text-gray-700">SKS: <span id="sksDisplayValue" class="font-medium">{{ $jadwal->mataKuliah->sks ?? 'N/A' }}</span></p>
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
                        @error('dosen_pengampu')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 bg-gray-100 border border-gray-200 rounded-lg p-4">
                    <p class="text-gray-700">Dosen Terpilih:</p>
                    <ul id="selectedDosenDisplay" class="list-disc pl-5 text-gray-700 font-medium">
                    </ul>
                </div>

                <!-- Other Inputs -->
                <div class="mb-4">
                    <label for="kode_kelas" class="block mb-2 text-sm font-medium text-gray-900">Kode Kelas</label>
                    <input type="text" id="kode_kelas" name="kode_kelas" value="{{ $jadwal->kode_kelas }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" readonly>
                </div>
                <div class="mb-4">
                    <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900">Jam Mulai</label>
                    <input 
                        type="time" 
                        id="jam_mulai" 
                        name="jam_mulai" 
                        value="{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                        required>
                </div>

                <div class="mb-4">
                    <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900">Jam Selesai</label>
                    <input 
                        type="time" 
                        id="jam_selesai" 
                        name="jam_selesai" 
                        value="{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="hari" class="block mb-2 text-sm font-medium text-gray-900">Hari</label>
                    <select id="hari" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                        <option value="Senin" @if ($jadwal->hari === 'Senin') selected @endif>Senin</option>
                        <option value="Selasa" @if ($jadwal->hari === 'Selasa') selected @endif>Selasa</option>
                        <option value="Rabu" @if ($jadwal->hari === 'Rabu') selected @endif>Rabu</option>
                        <option value="Kamis" @if ($jadwal->hari === 'Kamis') selected @endif>Kamis</option>
                        <option value="Jumat" @if ($jadwal->hari === 'Jumat') selected @endif>Jumat</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ruang" class="block mb-2 text-sm font-medium text-gray-900">Ruang</label>
                    <select id="ruang" name="ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                        @foreach ($ruang as $r)
                            <option value="{{ $r->kode_ruang }}" 
                                @if ($jadwal->ruang === $r->kode_ruang) selected @endif 
                                data-kapasitas="{{ $r->kapasitas }}">
                                {{ $r->kode_ruang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900">Kuota</label>
                    <input type="number" id="kuota" name="kuota" value="{{ $jadwal->kuota }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="kode_tahun" class="block mb-2 text-sm font-medium text-gray-900">Kode Tahun</label>
                    <input 
                        type="text" 
                        id="kode_tahun" 
                        name="kode_tahun" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                        value="{{$jadwal->kode_tahun}}" 
                        readonly>
                </div>

                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-5 py-2.5 rounded-lg focus:ring-4 focus:ring-blue-300">
                    Perbarui
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Element References
    const kodeMkSelect = document.getElementById('kode_mk_nama_mk');
    const sksDisplayValue = document.getElementById('sksDisplayValue');
    const jamMulai = document.getElementById('jam_mulai');
    const jamSelesai = document.getElementById('jam_selesai');
    const dosenSearch = document.getElementById('dosenSearch');
    const dosenList = document.getElementById('dosenList');
    const selectedDosenDisplay = document.getElementById('selectedDosenDisplay');
    const kodeKelasInput = document.getElementById('kode_kelas');
    const sksValue = parseInt('{{ $jadwal->mataKuliah->sks ?? 0 }}');
    const kodeProdi = '{{ $jadwal->mataKuliah->kode_prodi ?? '' }}';
    const kodeMK = '{{ $jadwal->mataKuliah->kode_mk ?? '' }}';
    const currentScheduleId = '{{ $jadwal->id_jadwal }}'; // Replace with the actual way you get the current ID


    // console.log("Checking conflict for:", jamMulai);
    // console.log("Checking conflict for:", jamSelesai);
    // console.log(kodeProdi);

    const form = document.getElementById('jadwalForm');
    const ruang = document.getElementById('ruang');
    const hari = document.getElementById('hari');

    const existingSchedules = @json($jadwals); // Includes dosen_pengampu details
    // console.log(existingSchedules);

    let dosenData = []; // Store fetched Dosen for filtering

    // ==========================
    // SKS-related Functions
    // ==========================

    // Update SKS Display and Trigger Related Updates
    // Listener for SKS and Jam Selesai
    handleSKSAndJamSelesai(sksValue);

    function handleSKSAndJamSelesai(sks) {
        sksDisplayValue.textContent = sks || "N/A";

        if (jamMulai.value) {
            updateJamSelesai(jamMulai.value, sks);
        }
    }

    // Update Jam Selesai Based on SKS and Jam Mulai
    jamMulai.addEventListener('input', function () {
        if (jamMulai.value) {
            updateJamSelesai(jamMulai.value, sksValue);
        }
    });

    // Calculate Jam Selesai
    function updateJamSelesai(jamMulaiValue, sks) {
        if (!jamMulaiValue || !sks) return;

        const [hour, minute] = jamMulaiValue.split(':').map(Number);
        const totalMinutes = hour * 60 + minute + sks * 50; // SKS assumed to be 50 minutes each
        const updatedHour = Math.floor(totalMinutes / 60);
        const updatedMinute = totalMinutes % 60;

        // Format updated time
        const formattedTime = `${String(updatedHour).padStart(2, '0')}:${String(updatedMinute).padStart(2, '0')}`;
        jamSelesai.value = formattedTime;
    }

    // Listener for fetching Dosen based on Kode Prodi
    if (kodeProdi){
        fetchDosenByKodeProdi(kodeProdi);
    }


    // Handle Mata Kuliah selection
        // Assuming `existingSchedules` is available in your script

    // Find related schedules with the selected `kode_mk`
    //Kalau mau populate berdasar semua mk yang sama, maka
    // const relatedSchedules = existingSchedules.filter(schedule => schedule.id_jadwal === kodeMK); 
    // sama perubahan populateDosenSelection harusnya automateDosenSelection

    // console.log(currentScheduleId);
    const relatedSchedules = existingSchedules.filter(schedule => String(schedule.id_jadwal) === String(currentScheduleId));
    // console.log(relatedSchedules);

    if (relatedSchedules.length > 0) {
        populateDosenSelection(relatedSchedules[0]); // Pass only the current schedule
    } else {
        clearDosenSelection();
        kodeKelasInput.value = '';
    }



    // ==========================
    // Tentang Kode Kelas
    // ==========================
    // Suggest Kode Kelas
    // function suggestKodeKelas(relatedSchedules) {
    //     const existingKelas = relatedSchedules.map(schedule => schedule.kode_kelas);
    //     const nextKodeKelas = getNextKodeKelas(existingKelas);
    //     kodeKelasInput.value = nextKodeKelas;
    // }

    // function getNextKodeKelas(existingKelas) {
    //     const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     for (let char of alphabet) {
    //         if (!existingKelas.includes(char)) {
    //             return char;
    //         }
    //     }
    //     return ''; // Return empty if all A-Z are taken
    // }


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

    //     function automateDosenSelection(relatedSchedules) {
        //     clearDosenSelection();

        //     // Collect unique dosen NIDNs from related schedules
        //     const uniqueDosenNidn = [
        //         ...new Set(
        //             relatedSchedules.flatMap(schedule =>
        //                 schedule.dosen_pengampu.map(dp => dp.dosen.nidn)
        //             )
        //         ),
        //     ];

        //     // Loop through the unique NIDNs and add them to the selected list
        //     uniqueDosenNidn.forEach(nidn => {
        //         const dosen = @json($dosen).find(d => d.nidn === nidn);
        //         if (dosen) {
        //             // Add the dosen to the selected list
        //             addSelectedDosen(dosen.nidn, dosen.nama);

        //             // Check if the dosen is already in the selected list and automatically check the checkbox
        //             const checkbox = dosenList.querySelector(input[value="${nidn}"]);

        //             if (checkbox) {
        //                 checkbox.checked = true; // Check the box automatically
        //             }
        //         }
        //     });
        // }

    // Automate Dosen Selection
    function populateDosenSelection(currentSchedule) {
        clearDosenSelection();

        // Collect dosen NIDNs from the current schedule
        const dosenNidnList = currentSchedule.dosen_pengampu.map(dp => dp.dosen.nidn);

        // Loop through the NIDNs and add them to the selected list
        dosenNidnList.forEach(nidn => {
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

    function getSelectedDosenNidns(selectedDosenDisplay) {

        const nidnArray = [];

        // Get all list items from selectedDosenDisplay
        const items = selectedDosenDisplay.querySelectorAll('li[data-nidn]');
        items.forEach(item => {
            const nidn = item.getAttribute('data-nidn'); // Get the value of data-nidn
            // console.log(nidn);
            if (nidn) {
                nidnArray.push(nidn); // Add it to the array
            }
        });

        return nidnArray; // Return the array of data-nidn values
    }

// Assuming you have the current schedule ID available in your script


    form.addEventListener('submit', function (event) {
        const ruangValue = ruang.value;
        const hariValue = hari.value;
        const jamMulaiValue = jamMulai.value;
        const jamSelesaiValue = jamSelesai.value;
        const kodeMkValue = kodeMK; // Get selected mata kuliah
        const currentScheduleId = '{{ $jadwal->id_jadwal }}';
        const selectedRuangOption = ruang.options[ruang.selectedIndex];
        const kuotaValue = kuota.value; // Get the kuota value
        const kapasitas = selectedRuangOption ? parseInt(selectedRuangOption.getAttribute('data-kapasitas'), 10) : 0;

        // Get selected dosen NIDNs
        const selectedDosenNidns = getSelectedDosenNidns(selectedDosenDisplay);

        if (parseInt(kuotaValue, 10) > kapasitas) {
            event.preventDefault();
            alert("Kuota tidak boleh melebihi kapasitas ruang.");
            return; // Stop form submission
        }

        // Validate against existing schedules
        const conflict1 = existingSchedules.some(schedule => {

            if (String(schedule.id_jadwal) === String(currentScheduleId)) {
                return false;
            }
            
            // Check if the same day and same mata kuliah
            if (schedule.hari === hariValue && schedule.kode_mk === kodeMkValue) {
                // Check if time overlaps
                const timeOverlap = isTimeOverlap(schedule.jam_mulai, schedule.jam_selesai, jamMulaiValue, jamSelesaiValue);

                if (timeOverlap) {
                    // Extract dosen NIDNs from the existing schedule
                    const scheduleDosenNidns = schedule.dosen_pengampu.map(dp => dp.dosen.nidn);

                    // Check if all dosen in the schedule match the selected dosen
                    const allDosenMatch = scheduleDosenNidns.every(nidn => selectedDosenNidns.includes(nidn)) &&
                                        selectedDosenNidns.every(nidn => scheduleDosenNidns.includes(nidn));

                    if (allDosenMatch) {
                        return true; // Conflict found
                    }
                }
            }
            return false;
        });

        const conflict2 = existingSchedules.some(schedule => {
            console.log(schedule.id_jadwal, currentScheduleId)
            return (
                schedule.ruang === ruangValue && // Check same room
                schedule.hari === hariValue && // Check same day
                String(schedule.id_jadwal) !== currentScheduleId && // Exclude the current schedule
                isTimeOverlap(schedule.jam_mulai, schedule.jam_selesai, jamMulaiValue, jamSelesaiValue) // Check time overlap
            );
        });

        if (conflict1) {
            event.preventDefault(); // Prevent form submission
            alert("Jadwal bentrok! Dosen tidak boleh memiliki waktu yang sama dalam mata kuliah yang sama pada hari tersebut.");
        } else if (conflict2){
            event.preventDefault();
            alert("Ruang di waktu yang sama sudah diisi oleh jadwal lain!")
        }
    });

    // Helper function to check if two time ranges overlap
    function isTimeOverlap(startA, endA, startB, endB) {
        return (startA < endB && startB < endA);
    }


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