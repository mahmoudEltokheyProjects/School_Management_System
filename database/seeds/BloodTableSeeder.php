<?php

use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    // -------------------------------- run() --------------------------------
    public function run()
    {
        // Clear "bloods table" when Execute "BloodTableSeeder" : Delete "All Bloods"
        DB::table('type__bloods')->truncate();
        // All "bloods"
        $bgs = ['O-','O+','A+','A-','B+','B-','AB+','AB-'];

        foreach($bgs as $bg)
        {
            Type_Blood::create(['Name'=>$bg]);
        }
    }
}
