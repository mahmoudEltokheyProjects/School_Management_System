<?php

use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    // -------------------------------- run() --------------------------------
    public function run()
    {
        // Clear "classrooms" table
        DB::table('classrooms')->delete();
        // +++++++++++++++++ 1- Primary Stage : المرحلة الابتدائية +++++++++++++++++
        $classrooms1 =
        [
            ['en'=> 'Class 1' , 'ar'  =>  'الصف الاول'   ],
            ['en'=> 'Class 2' , 'ar'  =>  'الصف الثاني' ],
            ['en'=> 'Class 3' , 'ar'  =>  'الصف الثالث' ],
            ['en'=> 'Class 4' , 'ar'  =>  'الصف الرابع' ],
            ['en'=> 'Class 5' , 'ar'  =>  'الصف الخامس' ],
            ['en'=> 'Class 6' , 'ar'  =>  'الصف السادس' ],
        ];
        // +++++++++++++++++ 2- Middle School Stage : المرحلة الاعدادية +++++++++++++++++
        $classrooms2 =
        [
            ['en'=> 'Class 1' , 'ar'  =>  'الصف الاول'   ],
            ['en'=> 'Class 2' , 'ar'  =>  'الصف الثاني' ],
            ['en'=> 'Class 3' , 'ar'  =>  'الصف الثالث' ],
        ];
        // +++++++++++++++++ 3- High School Stage : المرحلة الثانوية +++++++++++++++++
        $classrooms3 =
        [
            ['en'=> 'Class 1' , 'ar'  =>  'الصف الاول'   ],
            ['en'=> 'Class 2' , 'ar'  =>  'الصف الثاني' ],
            ['en'=> 'Class 3' , 'ar'  =>  'الصف الثالث' ],
        ];
        // ============================ 1- Primary Stage : المرحلة الابتدائية ============================
        foreach ($classrooms1 as $classroom)
        {
            Classroom::create(['Name_Class' => $classroom , "Grade_id"=>1]);
        }
        // ============================ 2- Middle School Stage : المرحلة الاعدادية ============================
        foreach ($classrooms2 as $classroom)
        {
            Classroom::create(['Name_Class' => $classroom , "Grade_id" => 2]);
        }
        // ============================ 3- High School Stage : المرحلة الثانوية ============================
        foreach ($classrooms3 as $classroom)
        {
            Classroom::create(['Name_Class' => $classroom , "Grade_id" => 3]);
        }
    }
}
