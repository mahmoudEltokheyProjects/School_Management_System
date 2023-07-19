<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionTableSeeder extends Seeder
{
    // +++++++++++++ run() +++++++++++++
    public function run()
    {
        // delete all "data" from "nationa(lities" tables
        DB::table('religions')->delete();
        // Religions Array
        $religions =
        [
            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];

        foreach ($religions as $R)
        {
            Religion::create(['Name' => $R]);
        }
    }
}
