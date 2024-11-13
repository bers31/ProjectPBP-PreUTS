<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Matakuliah;


class MKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [
                ['kode_mk' => 'PAIK6101', 'nama_mk' => 'Matematika I', 'semester' => 1, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6102', 'nama_mk' => 'Dasar Pemrograman', 'semester' => 1, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6103', 'nama_mk' => 'Dasar Sistem', 'semester' => 1, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6104', 'nama_mk' => 'Logika Informatika', 'semester' => 1, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6105', 'nama_mk' => 'Struktur Diskrit', 'semester' => 1, 'sks' => 4, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00003', 'nama_mk' => 'Pancasila dan Kewarganegaraan', 'semester' => 1, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00005', 'nama_mk' => 'Olahraga', 'semester' => 1, 'sks' => 1, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00007', 'nama_mk' => 'Bahasa Inggris', 'semester' => 1, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6201', 'nama_mk' => 'Matematika II', 'semester' => 2, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6202', 'nama_mk' => 'Algoritma dan Pemrograman', 'semester' => 2, 'sks' => 4, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6203', 'nama_mk' => 'Organisasi dan Arsitektur Komputer', 'semester' => 2, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6204', 'nama_mk' => 'Aljabar Linier', 'semester' => 2, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00004', 'nama_mk' => 'Bahasa Indonesia', 'semester' => 2, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00006', 'nama_mk' => 'Internet of Things (IoT)', 'semester' => 2, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00011', 'nama_mk' => 'Pendidikan Agama Islam', 'semester' => 2, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00021', 'nama_mk' => 'Pendidikan Agama Kristen', 'semester' => 2, 'sks' => 2, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6820', 'nama_mk' => 'Sains Data', 'semester' => 8, 'sks' => 3, 'sifat' => 'peminatan', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6821', 'nama_mk' => 'Tugas Akhir', 'semester' => 0, 'sks' => 6, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'UUW00009', 'nama_mk' => 'Kuliah Kerja Nyata (KKN)', 'semester' => 0, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6702', 'nama_mk' => 'Teori Bahasa dan Otomata', 'semester' => 7, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6501', 'nama_mk' => 'Pengembangan Berbasis Platform', 'semester' => 5, 'sks' => 4, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6505', 'nama_mk' => 'Pembelajaran Mesin', 'semester' => 5, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6504', 'nama_mk' => 'Proyek Perangkat Lunak', 'semester' => 5, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6502', 'nama_mk' => 'Komputasi Tersebar dan Paralel', 'semester' => 5, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6503', 'nama_mk' => 'Sistem Informasi', 'semester' => 5, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
                ['kode_mk' => 'PAIK6506', 'nama_mk' => 'Keamanan dan Jaminan Informasi', 'semester' => 5, 'sks' => 3, 'sifat' => 'wajib', 'kurikulum' => '2020', 'kode_prodi' => 'IFS1'],
            ];
    
            foreach ($data as $mataKuliah) {
                Matakuliah::create($mataKuliah);
            }
        
    }
}
