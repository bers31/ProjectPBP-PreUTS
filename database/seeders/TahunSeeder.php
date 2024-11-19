<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunSeeder extends Seeder{
  public function run(): void
    {
      Tahun::create(['kode_tahun'=>'24/25GA',
                    'bag_semester'=>'gasal',
                    'tahun_akademik'=>'2024/2025',
                    'status'=>'aktif']);
      Tahun::create(['kode_tahun'=>'23/24GA',
                    'bag_semester'=>'gasal',
                    'tahun_akademik'=>'2023/2024',
                    'status'=>'non-aktif']);
      Tahun::create(['kode_tahun'=>'23/24GE',
                    'bag_semester'=>'genap',
                    'tahun_akademik'=>'2024/2025',
                    'status'=>'non-aktif']);
      Tahun::create(['kode_tahun'=>'22/23GA',
                    'bag_semester'=>'gasal',
                    'tahun_akademik'=>'2022/2023',
                    'status'=>'non-aktif']);
      Tahun::create(['kode_tahun'=>'22/23GE',
                    'bag_semester'=>'genap',
                    'tahun_akademik'=>'2022/2023',
                    'status'=>'non-aktif']);
      Tahun::create(['kode_tahun'=>'21/22GE',
                    'bag_semester'=>'genap',
                    'tahun_akademik'=>'2021/2023',
                    'status'=>'non-aktif']);
    }
}