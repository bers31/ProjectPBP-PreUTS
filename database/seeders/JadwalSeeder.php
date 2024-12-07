<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Jadwal;
use App\Models\RuangKelas;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada ruang kelas yang terdaftar sebelum menambahkan jadwal

        $jadwals = [
            ['kode_mk' => 'PAIK6101', 'hari' => 'Senin',   'kode_kelas' => 'A', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'A101', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6102', 'hari' => 'Senin',   'kode_kelas' => 'B', 'jam_mulai' => '10:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'A102', 'kuota' => 40, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6103', 'hari' => 'Selasa',  'kode_kelas' => 'A', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'E101', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6104', 'hari' => 'Selasa',  'kode_kelas' => 'B', 'jam_mulai' => '10:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'E102', 'kuota' => 40, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6105', 'hari' => 'Rabu',    'kode_kelas' => 'A', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'A201', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'UUW00003', 'hari' => 'Rabu',    'kode_kelas' => 'B', 'jam_mulai' => '10:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'A301', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'UUW00005', 'hari' => 'Kamis',   'kode_kelas' => 'A', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'A302', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'UUW00007', 'hari' => 'Kamis',   'kode_kelas' => 'B', 'jam_mulai' => '10:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'A202', 'kuota' => 40, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6201', 'hari' => 'Jumat',   'kode_kelas' => 'A', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'K101', 'kuota' => 60, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6202', 'hari' => 'Jumat',   'kode_kelas' => 'B', 'jam_mulai' => '10:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'K102', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6501', 'hari' => 'Kamis',   'kode_kelas' => 'B', 'jam_mulai' => '11:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'K102', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Rabu',   'kode_kelas' => 'B', 'jam_mulai' => '11:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'K102', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Rabu',   'kode_kelas' => 'C', 'jam_mulai' => '11:00:00', 'jam_selesai' => '12:00:00', 'ruang' => 'K101', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
            ['kode_mk' => 'PAIK6101', 'hari' => 'Selasa',   'kode_kelas' => 'D', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'ruang' => 'K102', 'kuota' => 50, 'kode_tahun' => '24/25GA'],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
