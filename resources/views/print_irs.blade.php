<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p> --}}
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Kelas</th>
                    <th>Ruangan</th>
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
                <td class="px-4 py-3  border" colspan='5'>{{$detail->jadwal->hari}} pukul {{$detail->jadwal->jam_mulai}} - {{$detail->jadwal->jam_selesai}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>