<?php
namespace App\Repository;

use App\Http\Requests\StoreTeacherRequest;

interface TeacherRepositoryInterface
{
    // Get "All Teachers"
    public function getAllTeachers();
    // Get "All Specializations"
    public function getAllSpecializations();
    // Get "All Genders"
    public function getAllGenders();
    // Store "Teachers"
    public function StoreTeachers($request);
    // update "Teacher"
    public function UpdateTeacher($request);
    // delete "Teacher"
    public function DeleteTeacher($request);
}

?>
