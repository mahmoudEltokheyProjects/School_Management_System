<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\StatesSeeder;
use Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Call "UserSeeder" , "GradeSeeder" , "ClassroomSeeder" , "SectionSeeder" , "BloodTableSeeder" , "SpecializationsTableSeeder" , "GenderTableSeeder"""
       $this->call([
            UserSeeder::class                   ,
            CountrySeeder::class                ,
            StatesSeeder::class                 ,
            CitySeeder::class                   ,
            GradeSeeder::class                  ,
            ClassroomSeeder::class              ,
            SectionSeeder::class                ,
            BloodTableSeeder::class             ,
            NationalitiesTableSeeder::class     ,
            ReligionTableSeeder::class          ,
            SpecializationsTableSeeder::class   ,
            GenderTableSeeder::class            ,
       ]);
    }
}
