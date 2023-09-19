<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    // -------------------------------- run() --------------------------------
    public function run()
    {
        // Clear "classrooms" table
        DB::table('sections')->delete();
        // +++++++++++++++++++++++++++++++ Sections Array +++++++++++++++++++++++++++++++
        $sections =
        [
            ['en'=> 'Section A' , 'ar'  =>  'الفصل أ' ],
            ['en'=> 'Section B' , 'ar'  =>  'الفصل ب' ],
            ['en'=> 'Section C' , 'ar'  =>  'الفصل ت' ],
            ['en'=> 'Section D' , 'ar'  =>  'الفصل ث' ],
            ['en'=> 'Section E' , 'ar'  =>  'الفصل ج' ],
            ['en'=> 'Section F' , 'ar'  =>  'الفصل ح' ],
        ];
        // +++++++++++++++++++++++++++++++ Grades Loop +++++++++++++++++++++++++++++++
        for( $i=1 ; $i <= Grade::count() ; $i++ )
        {
            // ================ Primary Stage ================
            if( $i == 1 )
            {
                // Classrooms Loop : 6 Classrooms For "Primary" Stage
                for( $j=1 ; $j <= 6 ; $j++ )
                {
                    foreach ($sections as $section)
                    {
                        Section::create(['Name_Section' =>  $section , "Grade_id"=>$i , "Class_id"=>$j , "Status"=>1 ]);
                    }
                }
            }
            // ================ Middle , High Stage ================
            else
            {
                // Classrooms Loop : 3 Classrooms For "Middle" , "High" Stage
                for( $j=7 ; $j <= 12 ; $j++ )
                {
                    foreach ($sections as $section)
                    {
                        Section::create(['Name_Section' =>  $section , "Grade_id"=>$i , "Class_id"=>$j , "Status"=>1 ]);
                    }
                }
            }
        }
    }
}
