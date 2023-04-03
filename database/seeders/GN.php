<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\GNS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GN extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('g_n_s')->delete();
        $genders = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'انثي'],

        ];

        foreach ($genders as $ge) {
            GNS::create(['Name' => $ge]);
        }
    }
}
