<?php

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    // +++++++++++++++++++ Grade Seeder +++++++++++++++++++
    public function run()
    {
        // Clear "grades" table
        DB::table('grades')->delete();

        $grades =
        [
            ['en'=> 'Primary Stage' , 'ar'  =>  'المرحلة الابتدائية'],
            ['en'=> 'Middle School' , 'ar'  =>  'المرحلة الاعدادية' ],
            ['en'=> 'High School'   , 'ar'  =>  'المرحلة الثانوية' ],
        ];

        foreach ($grades as $grade)
        {
            Grade::create(['Name' => $grade]);
        }
    }
}
