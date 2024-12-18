<!DOCTYPE html>
<html>
<head>
    <title>PRINT IRS {{ Str::upper($mahasiswa->nama) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="font-family: 'Times New Roman', Times, serif;" class="h-full flex flex-col my-4">
    <div class="grid grid-cols-10 grid-rows-2 gap-0 justify-center text-center py-4">
        <div class="col-span-9 text-sm">
            <h1>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h1>
            <h1>FAKULTAS {{ Str::upper($mahasiswa->prodi->departemen->fakultas->nama_fakultas) }}</h1>
            <h1>UNIVERSITAS DIPONEGORO</h1>
        </div>
        <div>
            <img class="w-20 h-28 object-cover" src="\img\Pasfoto.png" alt="pasfoto">
        </div>
        <div class="col-span-9">
            <h2 class="font-bold text-sm">ISIAN RENCANA STUDI</h2>
            <h2 class="font-bold text-sm">Semester {{$tahunAjaranAktif->bag_semester}} TA {{$tahunAjaranAktif->tahun_akademik}}</h2>
        </div>
    </div>

    <div class="mx-12 text-sm">
        <p>Nama: {{$mahasiswa->nama}}</p>
        <p>NIM: {{$mahasiswa->nim}}</p>
        <p>Program Studi: {{$mahasiswa->prodi->nama }} {{$mahasiswa->prodi->strata}}</p>
        <p>Dosen Wali: {{$mahasiswa->dosen->nama}}</p>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 my-4 text-xs">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-2 py-1">No</th>
                        <th class="border border-gray-300 px-2 py-1">Kode MK</th>
                        <th class="border border-gray-300 px-2 py-1">Nama MK</th>
                        <th class="border border-gray-300 px-2 py-1">SKS</th>
                        <th class="border border-gray-300 px-2 py-1">Kelas</th>
                        <th class="border border-gray-300 px-2 py-1">Ruangan</th>
                        <th class="border border-gray-300 px-2 py-1">Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ListJadwal as $index => $detail)
                    <tr>
                        <td class="border border-gray-300 text-center px-2 py-1" rowspan="2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{$detail->jadwal->matakuliah->kode_mk}}</td>
                        <td class="border border-gray-300 px-2 py-1">{{$detail->jadwal->matakuliah->nama_mk}}</td>
                        <td class="border border-gray-300 text-center px-2 py-1">{{$detail->jadwal->matakuliah->sks}}</td>
                        <td class="border border-gray-300 text-center px-2 py-1">{{$detail->jadwal->kode_kelas}}</td>
                        <td class="border border-gray-300 text-center px-2 py-1">{{$detail->jadwal->ruang}}</td>
                        <td class="border border-gray-300 px-2 py-1">
                            @if($detail->jadwal->dosen_pengampu->isNotEmpty())
                                {{ $detail->jadwal->dosen_pengampu->map(function($dosenPengampu) {
                                    return $dosenPengampu->dosen->nama;
                                })->implode(', ') }}
                            @else
                                Tidak ada dosen
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-2 py-1" colspan="6">
                            {{$detail->jadwal->hari}} pukul {{$detail->jadwal->jam_mulai}} - {{$detail->jadwal->jam_selesai}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 mx-12 flex justify-between text-sm">
        <div>
            <p class="mb-20">Pembimbing Akademik (Dosen Wali)</p>
            <p>{{$mahasiswa->dosen->nama}}</p>
            <p>NIDN. {{$mahasiswa->dosen->nidn}}</p>
        </div>

        <div>
            <p class="mb-20">Semarang, {{$date}}</p>
            <p>{{Str::upper($mahasiswa->nama)}}</p>
            <p>NIM. {{$mahasiswa->nim}}</p>
        </div>
    </div>
</body>
</html>
