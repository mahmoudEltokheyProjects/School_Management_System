<?php

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\Teacher;

    // +++++++++++++++++++++++++ getGender() : Get "All Genders" +++++++++++++++++++++++++
    function getGender()
    {
        return Gender::all();
    }
    // +++++++++++++++++++++++++ getClassrooms() : Get "All Classrooms" +++++++++++++++++++++++++
    function getClassrooms()
    {
        return Classroom::all();
    }
    // +++++++++++++++++++++++++ getParents() : Get "All Parent" +++++++++++++++++++++++++
    function getParents()
    {
        return My_Parent::all();
    }
    // +++++++++++++++++++++++++ getTeachers() : Get "All Teachers" +++++++++++++++++++++++++
    function getTeachers()
    {
        return Teacher::all();
    }
    // +++++++++++++++++++++++++ getStudents() : Get "All Students" +++++++++++++++++++++++++
    function getStudents()
    {
        return Student::all();
    }
    // +++++++++++++++++++++++++ getGrades() : Get "All Parent" +++++++++++++++++++++++++
    function getGrades()
    {
        return Grade::all();
    }
    // +++++++++++++++++++++++++ getNationalitie() : Get "All Nationalities" +++++++++++++++++++++++++
    function getNationalitie()
    {
        return Nationalitie::all();
    }
    // +++++++++++++++++++++++++ getBloods() : Get "All Bloods" +++++++++++++++++++++++++
    function getBloods()
    {
        return Type_Blood::all();
    }


?>