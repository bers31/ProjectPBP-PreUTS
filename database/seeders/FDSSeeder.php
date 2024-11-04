<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FDSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_fakultas = [
            ["kode_fakultas"=>"FSM",'nama_fakultas'=>'Sains dan Matematika'],
            ["kode_fakultas"=>"FT",'nama_fakultas'=>'Teknik'],
            ["kode_fakultas"=>"FPIK",'nama_fakultas'=>'Perikanan dan Kelautan'],
            ["kode_fakultas"=>"FK",'nama_fakultas'=>'Kedokteran'],
            ["kode_fakultas"=>"FPP",'nama_fakultas'=>'Pertanian dan Perhutanan'],
            ["kode_fakultas"=>"FKM",'nama_fakultas'=>'Kesehatan Masyarakat'],
            ["kode_fakultas"=>"FH",'nama_fakultas'=>'Hukum'],
            ["kode_fakultas"=>"FEB",'nama_fakultas'=>'Ekonomi dan Bisnis'],
            ["kode_fakultas"=>"FIB",'nama_fakultas'=>'Ilmu Budaya'],
            ["kode_fakultas"=>"FISIP",'nama_fakultas'=>'Ilmu Sosial dan Politik']
        ];
        
        $data_departemen = [
            ["kode_departemen"=>"IF",'nama'=>'Informatika', 'kode_fakultas'=>'FSM'],
            ["kode_departemen"=>"BIO",'nama'=>'Biologi', 'kode_fakultas'=>'FSM'],
            ["kode_departemen"=>"KIM",'nama'=>'Kimia', 'kode_fakultas'=>'FSM'],
            ["kode_departemen"=>"MAT",'nama'=>'Matematika', 'kode_fakultas'=>'FSM'],
            ["kode_departemen"=>"FIS",'nama'=>'Fisika', 'kode_fakultas'=>'FSM'],
            ["kode_departemen"=>"STAT",'nama'=>'Statistika', 'kode_fakultas'=>'FSM']
        ];
        $data_prodi = [
            ['kode_prodi'=>'IFS1','nama'=>'Informatika','strata'=>'S1',"kode_departemen"=>"IF"],
            ['kode_prodi'=>'BIOS1','nama'=>'Biologi','strata'=>'S1',"kode_departemen"=>"BIO"],
            ['kode_prodi'=>'BIOTS1','nama'=>'Bioteknologi','strata'=>'S1',"kode_departemen"=>"BIO"],
            ['kode_prodi'=>'KIMS1','nama'=>'Kimia','strata'=>'S1',"kode_departemen"=>"KIM"],
            ['kode_prodi'=>'KIMS2','nama'=>'Kimia','strata'=>'S2',"kode_departemen"=>"KIM"],
            ['kode_prodi'=>'KIMS3','nama'=>'Kimia','strata'=>'S3',"kode_departemen"=>"KIM"],
            ['kode_prodi'=>'MATS1','nama'=>'Matematika','strata'=>'S1',"kode_departemen"=>"MAT"],
            ['kode_prodi'=>'MATS2','nama'=>'Matematika','strata'=>'S2',"kode_departemen"=>"MAT"],
            ['kode_prodi'=>'MATS3','nama'=>'Matematika','strata'=>'S3',"kode_departemen"=>"MAT"],
            ['kode_prodi'=>'FISS1','nama'=>'Fisika','strata'=>'S1',"kode_departemen"=>"FIS"],
            ['kode_prodi'=>'STATS1','nama'=>'Statistika','strata'=>'S1',"kode_departemen"=>"STAT"]
        ];

        foreach ($data_fakultas as $fakultas) {
            Fakultas::create($fakultas);
        }
        foreach ($data_departemen as $departemen) {
            Departemen::create($departemen);
        }
        foreach ($data_prodi as $prodi) {
            Prodi::create($prodi);
        }
    }
}
