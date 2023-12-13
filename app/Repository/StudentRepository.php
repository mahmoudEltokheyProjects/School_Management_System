<?php
namespace App\Repository;

use Exception;
use App\Models\City;
use App\Models\Grade;
use App\Models\Image;
use App\Models\State;
use App\Models\Gender;
use App\Models\Quarter;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Repository\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    // ++++++++++++++++++++ Create_Student() : get All Teachers ++++++++++++++++++++
    public function Create_Student()
    {
        $data['my_grades']  = getGrades();
        $data['parents']    = getParents();
        $data['Genders']    = getGender();
        $data['nationals']  = getNationalitie();
        $data['bloods']     = getBloods();
        $data['countries']  = getCountries();
        return view('pages.Students.add',$data);
    }
    // ++++++++++++++ fetchState(): to get "states" of "selected country" selectbox ++++++++++++++
    public function fetchState($request)
    {
        $data['states'] = State::where('country_id', $request->country_id)->get(['id','name']);
        return response()->json($data);
    }
    // ++++++++++++++ fetchCity(): to get "cities" of "selected state" selectbox ++++++++++++++
    public function fetchCity($request)
    {
        $data['cities'] = City::where('state_id', $request->state_id)->get(['id','name']);
        return response()->json($data);
    }
    // ++++++++++++++ fetchQuarter(): to get "quarters" of "selected city" selectbox ++++++++++++++
    public function fetchQuarter($request)
    {
        $data['quarters'] = Quarter::where('city_id', $request->city_id)->get(['id','name']);
        return response()->json($data);
    }
    // +++++++++ store "cities" according to "selected country" +++++++++++
    public function StoreRegion($request)
    {
        try
        {
            // dd($request);
            // Validate the incoming request data
            $validatedData = $request->validate([
                'state_id' => 'required|integer',
                'name' => 'required|string|max:255|unique:cities,name,NULL,id,state_id,' . $request->state_id,
            ]);
            // Create a new region in the cities table
            $city = new City();
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            // Save the new region to the database
            $city->save();
            // Optionally, you can return a response to the client
            return redirect()->back()->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            // dd($e);
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // +++++++++ store "quarters" according to "selected city" +++++++++++
    public function StoreQuarter($request)
    {
        // dd($request);
        try
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'city_id' => 'required|integer',
                'name' => 'required|string|max:255|unique:quarters,name,NULL,id,city_id,' . $request->input('city_id'),
            ]);
            // Create a new quarter in the quarter table
            $quarter = new Quarter();
            $quarter->city_id = (int)$request->city_id;
            $quarter->name = $request->name;
            // Save the new quarter to the database
            $quarter->save();
            // Optionally, you can return a response to the client
            return redirect()->back()->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            // dd($e);
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* +++++++++++++++++++++++++ Show_Student() : Show "student details" +++++++++++++++++++++++++ */
    public function Show_Student($id)
    {
        $Student = Student::findOrFail($id);
        return view('pages.Students.show',compact('Student'));
    }
    // ++++++++++++++++++++ Get_Student() : get All Students ++++++++++++++++++++
    public function Get_Student()
    {
        $List_Students = getStudents();
        return $List_Students;
    }
    // ++++++++++++ getclasses() : Get "all classes" According to selected "grade" selectbox ++++++++++++
    public function Get_classrooms($id)
    {
        $List_classes = Classroom::where('Grade_id',$id)->pluck('Name_Class','id');
        return $List_classes;
    }
    // ++++++++++++ getsections() : Get "all sections" According to selected "class" selectbox ++++++++++++
    public function Get_Sections($class_id,$grade_id)
    {
        $List_sections = Section::where('Class_id', $class_id)->where('Grade_id',$grade_id)->pluck('Name_Section','id');
        return $List_sections;
    }
    /* ++++++++++++ Store_Student() : Store Student Data ++++++++++++ */
    public function Store_Student($request)
    {
        // dd($request);
        // if There are any Error in "saving students images" , Cancel The saving of students data
        // لو حصل مشكلة اثناء تخزين صور الطالب فهيقوم بالغاء كل البيانات بتاعت الطالب ومش هيخزنها في قاعدة البيانات
        DB::beginTransaction();
        try
        {
            // ++++++++++++++++ Store Student Data ++++++++++++++++
            $student = new Student();
            $student->name           = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            // ++++++++ store email in array ++++++++
            $student->email          = json_encode($request->email);
            $student->password       = Hash::make($request->password);
            $student->gender_id      = $request->gender_id;
            $student->country_id     = $request->country_id;
            $student->state_id       = $request->state_id;
            $student->city_id        = $request->city_id;
            $student->quarter_id     = $request->quarter_id;
            $student->nationalitie_id= $request->nationalitie_id;
            $student->blood_id       = $request->blood_id;
            $student->Date_Birth     = $request->Date_Birth;
            $student->Grade_id       = $request->Grade_id;
            $student->Classroom_id   = $request->Classroom_id;
            $student->section_id     = $request->section_id;
            $student->parent_id      = $request->parent_id;
            $student->academic_year  = $request->academic_year;
            $student->save();
            // +++++++++++++++++++++++ Store Student Photos +++++++++++++++++++++++++++
            if( $request->hasFile('photos') )
            {
                foreach( $request->file('photos') as $file )
                {
                    // +++++++++++++++++++++++ Store in Public Folder +++++++++++++++++++++++
                    // image name
                    $name = $file->getClientOriginalName();
                    // storeAs( storing_place , imageName , diskName )
                    // store images in "public/attachments/students/studentName" folder
                    $file->storeAs('attachments/students/'.$student->name , $name , 'upload_attachments' );
                    // +++++++++++++++++++++++ Store in images Table in DB +++++++++++++++++++++++
                    // insert "image" in "images" table
                    $images = new Image();
                    $images->filename = $name ;
                    $images->imageable_id = $student->id ;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            // Save Data in DB
            DB::commit();
            return redirect()->route('Student.index')->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            dd($e);
            // if There are any Error in "saving students images" , Rollback The saving of students data
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* ++++++++++++ Edit_Student() : Get Data of Edited Student ++++++++++++ */
    public function Edit_Student($id)
    {
        $Students   = Student::findOrFail($id);
        $Grades     = getGrades();
        $parents    = getParents();
        $Genders    = getGender();
        $nationals  = getNationalitie();
        $bloods     = getBloods();
        return view('pages.Students.edit',compact('Students','Grades','parents','Genders','nationals','bloods'));
    }
    /* ++++++++++++ Update_Student() : Update Data of Edited Student ++++++++++++ */
    public function Update_Student($request)
    {
        try
        {

            $student = Student::findOrFail($request->id);
            $student->name = ['ar'=>$request->name_ar , 'en'=>$request->name_en];
            $student->email = $request->email ;
            $student->password = $request->password;
            $student->gender_id = $request->gender_id;
            $student->nationalitie_id = $request->nationalitie_id;
            $student->blood_id = $request->blood_id;
            $student->Date_Birth = $request->Date_Birth;
            $student->Grade_id = $request->Grade_id;
            $student->Classroom_id = $request->Classroom_id;
            $student->section_id = $request->section_id;
            $student->parent_id = $request->parent_id;
            $student->academic_year = $request->academic_year;
            $student->save();
            return redirect()->route('Student.index')->with('record_updated',trans('messages.update'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* ++++++++++++ Delete_Student() : Delete Student ++++++++++++ */
    public function Delete_Student($request)
    {
        try
        {
            $deleted_student = Student::findOrFail($request->id);
            $deleted_student->delete();
            return redirect()->route('Student.index')->with('record_deleted',trans('messages.delete'));
        }
        catch(Exception $e)
        {
            return redirect()->route('Student.index')->with('record_deleted',trans('Grades_trans.delete_grade_error'));
        }
    }
    // Upload_attachment
    public function Upload_attachment($request)
    {
        foreach( $request->file('photo') as $file )
        {
            $name = $file->getClientOriginalName();
            // Store "uploaded images" in "public/attachments/students" folder
            $file->storeAs('attachments/students/'.$name , $name );
            // Store "uploaded images" in DB

        }
    }
    // ++++++++++++++++++ Date Filter ++++++++++++++
    public function dateFilter($request)
    {
        $start_date = $request->start_date ;
        $end_date = $request->end_date ;
        $students = Student::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->get();
        return view('pages.Students.index',compact('students'));
    }

}


?>
