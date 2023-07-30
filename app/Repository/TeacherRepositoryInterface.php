<?php
namespace App\Repository;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\TeacherValidationRequest;

interface TeacherRepositoryInterface
{
    // Get "All Teachers"
    public function getAllTeachers();
    // Get "All Specializations"
    public function getAllSpecializations();
    // Get "All Genders"
    public function getAllGenders();
    // Store "Teachers"
    public function storeTeachers(StoreTeacherRequest $request);
}
?>
