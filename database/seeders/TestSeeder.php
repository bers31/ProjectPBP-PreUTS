<?php

namespace Database\Seeders;

use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            ['email'=> 'nashwana@students.undip.ac.id',
            'password' => '12345',
            'role' => 'mahasiswa']);

        Mahasiswa::create(
            ['nim'=>'24060122130084',
            'nama' => 'Nashwan Adenaya',
            'email'=> 'nashwana@students.undip.ac.id',
            'semester' => 5,
            'kode_prodi' => 'IFS1',
            'status_akademik' => 'aktif',
            'doswal'=> '123456789011']);

        // IRS
        IRS::create([
            'nim' => '24060122130084',
            'semester' => '1',
            'kode_tahun' => '22/23GA',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim' => '24060122130084',
            'semester' => '2',
            'kode_tahun' => '22/23GE',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim' => '24060122130084',
            'semester' => '3',
            'kode_tahun' => '23/24GA',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim' => '24060122130084',
            'semester' => '4',
            'kode_tahun' => '23/24GE',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim' => '24060122130084',
            'semester' => '5',
            'kode_tahun' => '24/25GA',
            'status' => 'sudah_disetujui'
        ]);

        // Jadwal Semester 1
        Jadwal::create([
            'kode_mk' => 'PAIK6102',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'E103',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00005',
            'jam_mulai' => '06:00',
            'jam_selesai' => '06:50',
            'kode_kelas' => 'A',
            'ruang' => 'E101',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6103',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6104',
            'jam_mulai' => '09:40',
            'jam_selesai' => '12:10',
            'kode_kelas' => 'A',
            'ruang' => 'E303',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00007',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E101',
            'hari' => 'Kamis',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6101',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'B201',
            'hari' => 'Jumat',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6105',
            'jam_mulai' => '09:40',
            'jam_selesai' => '11:20',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Jumat',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00003',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'B103',
            'hari' => 'Sabtu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);

        // Jadwal Semester 2
        Jadwal::create([
            'kode_mk' => 'PAIK6202',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00006',
            'jam_mulai' => '15:40',
            'jam_selesai' => '17:20',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00004',
            'jam_mulai' => '08:50',
            'jam_selesai' => '10:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6204',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Selasa',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6603',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'K102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6203',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Selasa',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00011',
            'jam_mulai' => '08:50',
            'jam_selesai' => '10:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6201',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Kamis',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);

        // Semester 3
        Jadwal::create([
            'kode_mk' => 'PAIK6301',
            'jam_mulai' => '10:40',
            'jam_selesai' => '12:20',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Kamis',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
    }
}
