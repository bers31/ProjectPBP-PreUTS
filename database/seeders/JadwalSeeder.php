<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $ruang = RuangKelas::first();

        Jadwal::create([
            'mata_kuliah' => 'Matematika Diskrit',
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '10:00:00',
            'ruang_kelas_id' => $ruang->id,
            'status' => 'pending'
        ]);

        Jadwal::create([
            'mata_kuliah' => 'Pemrograman Web',
            'hari' => 'Selasa',
            'jam_mulai' => '10:00:00',
            'jam_selesai' => '12:00:00',
            'ruang_kelas_id' => $ruang->id,
            'status' => 'disetujui'
        ]);
    }
}
