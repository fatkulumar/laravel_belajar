<?php

use Illuminate\Database\Seeder;
use App\Kendaraan;

class KendaraanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\Illuminate\Support\Facades\DB::getDriverName() != 'sqlite') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        Kendaraan::truncate();

        Kendaraan::create([
            'no_plat' =>'1212',
            'merek'=>'Honda',
            'type'=>'Beat',
            'jenis'=>'Bebek',
            'model'=>'JYH873w',
            'tahun'=>'2017',
            'cc'=>'1000',
            'no_rangka_nik'=>'90UHUJ87uh9',
            'no_mesin'=>'89807JHUIGG89',
            'tgl_fak'=>date(now()),
            'bahan_bakar'=>'Gasoline',
            'warna_tnkb'=>'Black', 
            'no_pol_lama'=>'U0908',
            'kepemilikan'=>'HADI',
            'no_dok'=>'778967H878',
            'masa_stnk'=> date(now())
        ]);

       

        if (\Illuminate\Support\Facades\DB::getDriverName() != 'sqlite') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

    }
}
