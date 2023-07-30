<?php
namespace App\Repository;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        dd('getAllTeachers() method');
    }
    public function getAllGenders()
    {
        return Gender::all();
    }
    public function getAllSpecializations()
    {
        return Specialization::all();
    }
    public function storeTeachers(StoreTeacherRequest $request)
    {
        try
        {
            $teachers = new Teacher();
            $teachers->Email = $request->Email ;
            $teachers->Password = $request->Password;
            $teachers->Name = [ 'en'=>$request->Name_en , 'ar'=>$request->Name_ar ];
        }
        catch (\Exception $e)
        {

        }
    }
}


?>
