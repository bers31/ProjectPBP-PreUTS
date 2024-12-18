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
                ['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6201', 'nama_mk' => 'Matematika II', 'sks' => '2', 'kode_prodi' => 'IFS1'],
                ['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6202', 'nama_mk' => 'Algoritma dan Pemrograman', 'sks' => '4', 'kode_prodi' => 'IFS1'],
                ['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6203', 'nama_mk' => 'Organisasi dan Arsitektur Komputer', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6301', 'nama_mk' => 'Struktur Data', 'sks' => '4', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6302', 'nama_mk' => 'Sistem Operasi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6303', 'nama_mk' => 'Basis Data', 'sks' => '4', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6304', 'nama_mk' => 'Metode Numerik', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6305', 'nama_mk' => 'Interaksi Manusia dan Komputer', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '3', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6306', 'nama_mk' => 'Statistika', 'sks' => '2', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6401', 'nama_mk' => 'Pemrograman Berorientasi Objek', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6402', 'nama_mk' => 'Jaringan Komputer', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6403', 'nama_mk' => 'Manajemen Basis Data', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6404', 'nama_mk' => 'Grafika dan Komputasi Visual', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6405', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '4', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6406', 'nama_mk' => 'Sistem Cerdas', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '6', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6601', 'nama_mk' => 'Analisis dan Strategi Algoritma', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '6', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6602', 'nama_mk' => 'Uji Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '6', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6603', 'nama_mk' => 'Masyarakat dan Etika Profesi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6604', 'nama_mk' => 'Praktik Kerja Lapangan', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '6', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6605', 'nama_mk' => 'Manajemen Proyek', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6701', 'nama_mk' => 'Metodologi Penelitian dan Penulisan Ilmiah', 'sks' => '2', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6702', 'nama_mk' => 'Teori Bahasa dan Otomata', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6703', 'nama_mk' => 'Metode Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6704', 'nama_mk' => 'Kualitas Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6705', 'nama_mk' => 'Pemodelan dan Simulasi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6706', 'nama_mk' => 'Visi Komputer', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6707', 'nama_mk' => 'Audit Sistem Informasi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6708', 'nama_mk' => 'Penambangan Data', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6709', 'nama_mk' => 'Sistem Tertanam', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6710', 'nama_mk' => 'Algoritma Evolusioner', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6711', 'nama_mk' => 'Komputasi Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '7', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6712', 'nama_mk' => 'Temu Balik Informasi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6801', 'nama_mk' => 'Topik Khusus RPL & STI', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6802', 'nama_mk' => 'Topik Khusus SC & KG', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6803', 'nama_mk' => 'Evolusi Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6804', 'nama_mk' => 'Rekayasa Sistem', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6805', 'nama_mk' => 'Komputasi Awan', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6806', 'nama_mk' => 'Arsitektur Perangkat Lunak', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6807', 'nama_mk' => 'Pemrograman Lanjut', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6808', 'nama_mk' => 'Pengenalan Pola', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6809', 'nama_mk' => 'Kriptografi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6810', 'nama_mk' => 'Bioinformatika', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6811', 'nama_mk' => 'Keamanan Siber', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6812', 'nama_mk' => 'Pemrosesan Citra Medis', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6813', 'nama_mk' => 'Data Besar', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6814', 'nama_mk' => 'Intelijen Bisnis', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6815', 'nama_mk' => 'Pemodelan Informasi', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6816', 'nama_mk' => 'Sistem Enterprise', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6817', 'nama_mk' => 'Robotika', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6818', 'nama_mk' => 'Pengolahan Bahasa Alami', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6819', 'nama_mk' => 'Analisis Jaringan Sosial', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '8', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'PAIK6820', 'nama_mk' => 'Sains Data', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'PAIK6821', 'nama_mk' => 'Tugas Akhir', 'sks' => '6', 'kode_prodi' => 'IFS1'],
                ['semester' => '0', 'kurikulum' => '2020', 'sifat' => 'wajib', 'kode_mk' => 'UUW00009', 'nama_mk' => 'Kuliah Kerja Nyata', 'sks' => '3', 'kode_prodi' => 'IFS1'],
                ['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'UUW00031', 'nama_mk' => 'Pendidikan Agama Khatolik', 'sks' => '2', 'kode_prodi' => 'IFS1'],
['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'UUW00041', 'nama_mk' => 'Pendidikan Agama Hindu', 'sks' => '2', 'kode_prodi' => 'IFS1'],
['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'UUW00051', 'nama_mk' => 'Pendidikan Agama Buddha', 'sks' => '2', 'kode_prodi' => 'IFS1'],
['semester' => '2', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'UUW00061', 'nama_mk' => 'Pendidikan Agama Kong Hu Chu', 'sks' => '2', 'kode_prodi' => 'IFS1'],
['semester' => '5', 'kurikulum' => '2020', 'sifat' => 'peminatan', 'kode_mk' => 'UUW00008', 'nama_mk' => 'Kewirausahaan', 'sks' => '2', 'kode_prodi' => 'IFS1'],
            ];
    
            foreach ($data as $mataKuliah) {
                Matakuliah::firstOrCreate(
                    ['kode_mk' => $mataKuliah['kode_mk']], // Fields to check for duplicates
                    $mataKuliah // Fields to insert if no match is found
                );
            }
        
    }
}
