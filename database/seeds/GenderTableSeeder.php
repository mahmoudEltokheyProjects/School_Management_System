<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /* +++++++++++++++++ run()  +++++++++++++++++ */
    public function run()
    {
        // +++++++++++++++++ Clean "gender" table : To Prevent "duplicate of data in table" When seeder is implemented each time ++++++++++++++++++
        DB::table('genders')->delete();

        $genders = [
            [
                "ar" => 'ذكر' ,
                'en' => 'Male'
            ],
            [
                "ar" => 'انثي' ,
                'en' => 'Female'
            ]
        ];

        foreach( $genders as $g )
        {
            Gender::create(["Name" => $g]);
        }

    }
}
