<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Container\Attributes\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;

class JadwalNowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jadwals5 = [
            ['kode_mk' => 'PAIK6404', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A303', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6401', 'hari' => 'Senin', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6406', 'hari' => 'Selasa', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'K102', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6601', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'K202', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6403', 'hari' => 'Kamis', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A303', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6405', 'hari' => 'Kamis', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'K102', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6402', 'hari' => 'Jumat', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'A204', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6501', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '10:20:00', 'ruang' => 'E102', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6501', 'hari' => 'Senin', 'jam_mulai' => '13:00:00', 'jam_selesai' => '16:20:00', 'ruang' => 'E103', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6501', 'hari' => 'Selasa', 'jam_mulai' => '07:00:00', 'jam_selesai' => '10:20:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6501', 'hari' => 'Selasa', 'jam_mulai' => '13:00:00', 'jam_selesai' => '16:20:00', 'ruang' => 'E101', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Rabu', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E103', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Rabu', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E101', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6502', 'hari' => 'Kamis', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'A303', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6503', 'hari' => 'Kamis', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E101', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6503', 'hari' => 'Kamis', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E101', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6503', 'hari' => 'Kamis', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6503', 'hari' => 'Jumat', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E101', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6504', 'hari' => 'Kamis', 'jam_mulai' => '09:40:00', 'jam_selesai' => '12:10:00', 'ruang' => 'E102', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6504', 'hari' => 'Rabu', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A303', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6504', 'hari' => 'Jumat', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6504', 'hari' => 'Rabu', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'A303', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6505', 'hari' => 'Kamis', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E102', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6505', 'hari' => 'Jumat', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A202', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6505', 'hari' => 'Kamis', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E102', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6505', 'hari' => 'Rabu', 'jam_mulai' => '09:40:00', 'jam_selesai' => '12:10:00', 'ruang' => 'E101', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6506', 'hari' => 'Jumat', 'jam_mulai' => '09:40:00', 'jam_selesai' => '12:10:00', 'ruang' => 'A303', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6506', 'hari' => 'Rabu', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'E101', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6506', 'hari' => 'Kamis', 'jam_mulai' => '09:40:00', 'jam_selesai' => '12:10:00', 'ruang' => 'E101', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'PAIK6506', 'hari' => 'Jumat', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E101', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'UUW00008', 'hari' => 'Selasa', 'jam_mulai' => '09:40:00', 'jam_selesai' => '11:20:00', 'ruang' => 'E102', 'kode_kelas' => 'A', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'UUW00008', 'hari' => 'Selasa', 'jam_mulai' => '13:00:00', 'jam_selesai' => '14:40:00', 'ruang' => 'E102', 'kode_kelas' => 'B', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'UUW00008', 'hari' => 'Senin', 'jam_mulai' => '09:40:00', 'jam_selesai' => '11:20:00', 'ruang' => 'E102', 'kode_kelas' => 'C', 'kode_tahun' => '24/25GA', 'kuota' => '50'],
            ['kode_mk' => 'UUW00008', 'hari' => 'Senin', 'jam_mulai' => '13:00:00', 'jam_selesai' => '14:40:00', 'ruang' => 'A202', 'kode_kelas' => 'D', 'kode_tahun' => '24/25GA', 'kuota' => '50'],];
            
    
            foreach ($jadwals5 as $row) {
                try {
                    DB::table('jadwal')->insert($row);
                } catch (\Illuminate\Database\QueryException $exception) {
                    FacadesLog::error('Error inserting data:', [
                        'data' => $row,
                        'error' => $exception->getMessage(),
                    ]);
                    dump('Conflicting data:', $row);
                }
            }
        }
}
