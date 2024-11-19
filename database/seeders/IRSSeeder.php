<?php

namespace Database\Seeders;

use App\Models\IRS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IRS::create(['nim_mahasiswa'=> '24060122130001', 'semester'=>'1', 'tahun_akademik'=> '24/25GA', 'status'=>'belum_irs']);
        IRS::create(['nim_mahasiswa'=> '24060122130068', 'semester'=>'5', 'tahun_akademik'=> '24/25GA', 'status'=>'belum_irs']);
    }
}
