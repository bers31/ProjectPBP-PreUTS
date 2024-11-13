<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
=======
use App\Models\Jadwal;
use App\Models\RuangKelas;
>>>>>>> cf4e49d8319738519797d1e07573084ce0a20d87

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
<<<<<<< HEAD
     */
    public function run(): void
    {
        DB::table('jadwal')->insert([
            // Jadwal for MK001 - Basis Data
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK001',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'kode_kelas' => 'A',
                'ruang' => 'A102',
                'hari' => 'Senin',
                'kuota' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK001',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
                'kode_kelas' => 'B',
                'ruang' => 'E101',
                'hari' => 'Senin',
                'kuota' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK001',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
                'kode_kelas' => 'C',
                'ruang' => 'E102',
                'hari' => 'Senin',
                'kuota' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK001',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
                'kode_kelas' => 'D',
                'ruang' => 'A102',
                'hari' => 'Senin',
                'kuota' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jadwal for MK002 - Algoritma dan Pemrograman
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK002',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:00:00',
                'kode_kelas' => 'A',
                'ruang' => 'A102',
                'hari' => 'Selasa',
                'kuota' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK002',
                'jam_mulai' => '06:00:00',
                'jam_selesai' => '12:00:00',
                'kode_kelas' => 'B',
                'ruang' => 'E101',
                'hari' => 'Selasa',
                'kuota' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK002',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
                'kode_kelas' => 'C',
                'ruang' => 'E102',
                'hari' => 'Selasa',
                'kuota' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK002',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
                'kode_kelas' => 'D',
                'ruang' => 'A102',
                'hari' => 'Selasa',
                'kuota' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jadwal for MK003 - Struktur Diskrit
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK003',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'kode_kelas' => 'A',
                'ruang' => 'A102',
                'hari' => 'Rabu',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK003',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '12:00:00',
                'kode_kelas' => 'B',
                'ruang' => 'E101',
                'hari' => 'Rabu',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK003',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
                'kode_kelas' => 'C',
                'ruang' => 'E102',
                'hari' => 'Rabu',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK003',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
                'kode_kelas' => 'D',
                'ruang' => 'A102',
                'hari' => 'Rabu',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jadwal for MK004 - Jaringan Komputer
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK004',
                'jam_mulai' => '06:00:00',
                'jam_selesai' => '10:00:00',
                'kode_kelas' => 'A',
                'ruang' => 'A102',
                'hari' => 'Kamis',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK004',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
                'kode_kelas' => 'B',
                'ruang' => 'E101',
                'hari' => 'Kamis',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK004',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
                'kode_kelas' => 'C',
                'ruang' => 'E102',
                'hari' => 'Kamis',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK004',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
                'kode_kelas' => 'D',
                'ruang' => 'A102',
                'hari' => 'Kamis',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jadwal for MK005 - Sistem Cerdas
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK005',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'kode_kelas' => 'A',
                'ruang' => 'A102',
                'hari' => 'Jumat',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK005',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '12:00:00',
                'kode_kelas' => 'B',
                'ruang' => 'E101',
                'hari' => 'Jumat',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK005',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00',
                'kode_kelas' => 'C',
                'ruang' => 'E102',
                'hari' => 'Jumat',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => Str::uuid(),
                'kode_mk' => 'MK005',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '17:00:00',
                'kode_kelas' => 'D',
                'ruang' => 'A102',
                'hari' => 'Jumat',
                'kuota' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
=======
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
>>>>>>> cf4e49d8319738519797d1e07573084ce0a20d87
        ]);
    }
}
