<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\type_blood;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_bloods')->delete();
        $bug=['O-','O+','A-','A+','B-','B+','AB+','AB-'];
        foreach($bug as $bg){
            type_blood::create(['Name'=>$bg]);
        }
    }
}
