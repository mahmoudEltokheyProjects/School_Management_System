<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Repository\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    // ++++++++++++++++++++ Create_Student() : get All Teachers ++++++++++++++++++++
    public function Create_Student()
    {
        $data['my_grades']  = Grade::all();
        $data['parents']    = My_Parent::all();
        $data['Genders']    = Gender::all();
        $data['nationals']  = Nationalitie::all();
        $data['bloods']     = Type_Blood::all();
        return view('pages.Students.add',$data);
    }
    // ++++++++++++ getclasses() : Get "all classes" According to selected "grade" selectbox ++++++++++++
    public function Get_classrooms($id)
    {
        $List_classes = Classroom::where('Grade_id',$id)->pluck('Name_Class','id');
        return $List_classes;
    }
    // ++++++++++++ getsections() : Get "all sections" According to selected "class" selectbox ++++++++++++
    public function Get_Sections($id)
    {
        $List_sections = Section::where('Class_id', $id)->pluck('Name_Section','id');
        return $List_sections;
    }
}


?>
