<!DOCTYPE html>
<html>
<head>
    <title>PRINT IRS {{Str::upper($mahasiswa->nama)}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="font-family: 'Times New Roman', Times, serif;" class="h-full flex flex-col ">
    <div class="grid grid-flow-row-dense grid-cols-10 grid-rows-2 gap-0 justify-center text-center py-6">
        <div class="col-span-9 ">
            <h1 class="">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h1>
            <h1 class="">FAKULTAS {{ Str::upper($mahasiswa->prodi->departemen->fakultas->nama_fakultas) }}</h1>
            <h1 class="">UNIVERSITAS DIPONEGORO</h1>
        </div>
        <div class="">
            <img class=" w-24 h-36 object-cover" src="\img\Pasfoto.png" alt="pasfoto">
        </div>

        <div class="col-span-9 row-span-1">
            <H2 class="font-bold">ISIAN RENCANA STUDI</H2>
            <h2 class="font-bold">Semester {{$tahunAjaranAktif->bag_semester}} TA {{$tahunAjaranAktif->tahun_akademik}}</h2>
        </div>
    </div>

    <div class="mx-196">
        <p>Nama: {{$mahasiswa->nama}}</p>
        <p>NIM: {{$mahasiswa->nim}}</p>
        <p>Program Studi: {{$mahasiswa->prodi->nama }} {{$mahasiswa->prodi->strata}}</p>
        <p>Dosen Wali: {{$mahasiswa->dosen->nama}}</p>

        <table class="table table-bordered my-6">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Kelas</th>
                    <th>Ruangan</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ListJadwal as $index => $detail)
            <tr>
                <td rowspan='2'>{{ $index + 1 }}</td>
                <td class="px-4 py-3 border">{{$detail->jadwal->matakuliah->kode_mk}}</td>
                <td class="px-4 py-3 border">{{$detail->jadwal->matakuliah->nama_mk}}</td>
                <td class="px-4 py-3 text-center border">{{$detail->jadwal->matakuliah->sks}}</td>
                <td class="px-4 py-3 text-center border">{{$detail->jadwal->kode_kelas}}</td>
                <td class="px-4 py-3 text-center border">{{$detail->jadwal->ruang}}</td>
                <td class="px-4 py-3 border">{{$detail->jadwal->dosen}}</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border" colspan='5'>{{$detail->jadwal->hari}} pukul {{$detail->jadwal->jam_mulai}} - {{$detail->jadwal->jam_selesai}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <p class="mb-16">Pembimbing Akademik (Dosen Wali)</p>
        <p>{{$mahasiswa->dosen->nama}}</p>
        <p>NIDN. {{$mahasiswa->dosen->nidn}}</p>
    </div>

    <div>
        <p class="mb-16">Semarang, {{$date}}<p>
        <p>{{Str::upper($mahasiswa->nama)}}</p>
        <p>NIM. {{$mahasiswa->nim}}</p>
    </div>
</body>
</html>