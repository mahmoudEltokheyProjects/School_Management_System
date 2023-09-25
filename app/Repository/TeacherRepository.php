<?php
namespace App\Repository;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    // ++++++++++++++++++++ getAllTeachers() : get All Teachers ++++++++++++++++++++
    public function getAllTeachers()
    {
        return Teacher::all();
    }
    // ++++++++++++++++++++ getAllGenders() : get All Genders ++++++++++++++++++++
    public function getAllGenders()
    {
        return Gender::all();
    }
    // ++++++++++++++++++++ getAllSpecializations() : get All Specializations ++++++++++++++++++++
    public function getAllSpecializations()
    {
        return Specialization::all();
    }
    // ++++++++++++++++++++++++++ store() : store teacher ++++++++++++++++++++++++++
    public function StoreTeachers($request)
    {
        try
        {
            $Teachers = new Teacher();
            $Teachers->email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            return redirect()->route('Teacher.index')->with('record_added',trans('messages.success'));
        }
        catch (Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    // ++++++++++++++++++++++++++ update() : update teacher ++++++++++++++++++++++++++
    public function UpdateTeacher($request)
    {
        // return $request;
        try
        {

            $teacher = Teacher::findOrFail($request->id);
            $teacher->name = ['ar'=>$request->Name_ar , 'en'=>$request->Name_en];
            $teacher->Email = $request->Email  ;
            $teacher->Address = $request->Address ;
            if( $request->password != null && $request->password != '' )
            {
                $teacher->password = Hash::make($request->password) ;
            }
            $teacher->Gender_id = $request->Gender_id;
            $teacher->Specialization_id = $request->Specialization_id;
            $teacher->Joining_Date = $request->Joining_Date;
            $teacher->save();
            return redirect()->route('Teacher.index')->with('record_updated',trans('messages.update'));
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // ++++++++++++++++++++++++++ delete() : update teacher ++++++++++++++++++++++++++
    public function DeleteTeacher($request)
    {
        try
        {
            $teacher = Teacher::findOrFail($request->id);
            $teacher->delete();
            return redirect()->route('Teacher.index')->with('record_deleted',trans('messages.delete'));

        }
        catch(Exception $e)
        {
            return redirect()->route('Teacher.index')->with('record_deleted',trans('Grades_trans.delete_grade_error'));
        }
    }
}


?>
