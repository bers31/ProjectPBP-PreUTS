@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                KHS
            </div>
        </div>
        <div id="history-khs-container">
            <p>KHS content goes here...</p>
        </div>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            let nim = "{{ Auth::user()->mahasiswa->nim }}"; // Pass 'nim' dynamically from Blade
            $.ajax({
                url: "{{ url('api/fetch-history-khs') }}",
                type: "POST",
                data: {
                    nim: nim,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (response) {
                    let historyKHS = response.history_khs;
                    let historyContent = '';
                    
                    // Check if historyKHS exists and has data
                    if (historyKHS && historyKHS.length > 0) {
                        historyKHS.forEach((semester, index) => {
                            historyContent += `
                            <div class="border-b last:border-b-0">
                                <!-- Semester Header -->
                                <button 
                                    onclick="toggleSemester(${semester.semester})"
                                    class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50"
                                >
                                    <div class="flex items-center gap-4">
                                        <span class="font-medium">Semester ${semester.semester}</span>
                                    </div>
                                    <svg 
                                        id="semester-icon-${semester.semester}"
                                        class="transform transition-transform text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        width="20"
                                        height="20"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                </button>
                            
                                <!-- Expandable Content -->
                                <div 
                                    id="semester-content-${semester.semester}"
                                    class="p-6 border-t bg-gray-50 hidden"
                                >
                                    <table class="w-full bg-white">
                                        <thead>
                                            <tr class="bg-gray-50">
                                                <th class="px-4 py-3 text-left border">Kode MK</th>
                                                <th class="px-4 py-3 text-left border">Mata Kuliah</th>
                                                <th class="px-4 py-3 text-center border">SKS</th>
                                                <th class="px-4 py-3 text-center border">Nilai Angka</th>
                                                <th class="px-4 py-3 text-center border">Nilai Huruf</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${generateKHSRows(semester.mata_kuliah)}
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-gray-50">
                                                <td colspan="2" class="px-4 py-3 font-medium border">Total SKS</td>
                                                <td class="px-4 py-3 text-center font-medium border">${semester.total_sks}</td>
                                                <td colspan="2" class="border"></td>
                                            </tr>
                                            <tr class="bg-gray-50">
                                                <td colspan="2" class="px-4 py-3 font-medium border">IPS</td>
                                                <td class="px-4 py-3 text-center font-medium border">${semester.ip_semester}</td>
                                                <td colspan="2" class="border"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>`;
                        });

                        $('#history-khs-container').html(historyContent);
                    } else {
                        // If no history is found
                        $('#history-khs-container').html('<div class="text-center p-4">Tidak ada riwayat KHS.</div>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat mengambil riwayat KHS.");
                    $('#history-khs-container').html('<div class="text-center p-4">Tidak ada riwayat KHS.</div>');
                }
            });
        });

        // Function to generate KHS rows
        function generateKHSRows(mataKuliah) {
            return mataKuliah.map(item => `
                <tr>
                    <td class="px-4 py-3 border">${item.kode_mk}</td>
                    <td class="px-4 py-3 border">${item.nama_mk}</td>
                    <td class="px-4 py-3 text-center border">${item.sks}</td>
                    <td class="px-4 py-3 text-center border">${item.nilai_angka}</td>
                    <td class="px-4 py-3 text-center border">${item.nilai_huruf}</td>
                </tr>
            `).join('');
        }

        function toggleSemester(semesterNumber) {
            const contentEl = $(`#semester-content-${semesterNumber}`);
            const iconEl = $(`#semester-icon-${semesterNumber}`);

            contentEl.toggleClass('hidden');
            iconEl.toggleClass('rotate-180');
        }
    </script>
@include('footer')