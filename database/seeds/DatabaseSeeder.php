<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Call "UserSeeder" , "GradeSeeder" , "ClassroomSeeder" , "SectionSeeder" , "BloodTableSeeder" , "SpecializationsTableSeeder" , "GenderTableSeeder"""
       $this->call([
            UserSeeder::class                   ,
            GradeSeeder::class                  ,
            ClassroomSeeder::class              ,
            SectionSeeder::class                ,
            BloodTableSeeder::class             ,
            NationalitiesTableSeeder::class     ,
            ReligionTableSeeder::class          ,
            SpecializationsTableSeeder::class   ,
            GenderTableSeeder::class
       ]);
    }
}
