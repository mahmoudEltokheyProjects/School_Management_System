<?php

namespace App\Http\Controllers\Sections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section ;
use App\Models\Teacher;

class SectionController extends Controller
{
    // ++++++++++++++++++++ index() ++++++++++++++++++++
    public function index()
    {
        // Get "All grades" with "sections" : get "each grade" with "its sections"
        $Grades = Grade::with(['Sections'])->get();
        // Get "All grades"     , getGrades() ==> helper function
        $list_Grades = getGrades();
        // Get "All teachers"   , getTeachers() ==> helper function
        $teachers = getTeachers();
        return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));
    }
    // ++++++++++++++++++++ getclasses($id) ++++++++++++++++++++
    public function getclasses($id)
    {
        $List_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $List_classes;
    }

    public function create()
    {
        //
    }
    /* ++++++++++++++++++++++++++++++ store() ++++++++++++++++++++++++++++++ */
    public function store(StoreSectionsRequest $request)
    {
        try
        {
            $Sections = new Section();
            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            // Store "Selected Teachers" in "Sections" Table
            // attach( $id , pivot_table_name ) method : to store data in "teacher_section" table
            // Store "section_id" And "teacher_id" in "teacher_section" table
            $Sections->teachers()->attach($request->teacher_id);
            return redirect()->route('Sections.index')->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* ++++++++++++++++++++++++++++++ show() ++++++++++++++++++++++++++++++ */
    public function show(Section $section)
    {
        //
    }
    /* ++++++++++++++++++++++++++++++ edit() ++++++++++++++++++++++++++++++ */
    public function edit(Section $section)
    {
        //
    }
    /* ++++++++++++++++++++++++++++++ update() ++++++++++++++++++++++++++++++ */
    public function update(StoreSectionsRequest $request)
    {
        try
        {
            // Get "Upated Section" data
            $Sections = Section::findOrFail($request->id);
            // +++++++++++++ update ++++++++++++++
            $Sections->update([
                // update "section_name"
                "Name_Section" => ['ar' => $request->Name_Section_Ar , 'en' => $request->Name_Section_En],
                // update "Grade_id"
                "Grade_id" => $request->Grade_id,
                // update "Class_id"
                "Class_id" => $request->Class_id ,
            ]);
            // update "status" Checkbox
            if( isset($request->Status) )
            {
                $Sections->Status = 1;
            }
            else
            {
                $Sections->Status = 2;
            }
            // ++++++++++++++++++++ Teacher : update pivot Table ++++++++++++++++++++
            if (isset($request->teacher_id))
            {
                // if "teachers" are "Edited" then take "new teachers" and store them in "teacher_section" table without repeating
                $Sections->teachers()->sync($request->teacher_id);
            }
            else
            {
                // if "teachers" are "Not Edited" then "Don't Update Teachers" in "teacher_section" table
                $Sections->teachers()->sync(array());
            }
            $Sections->save();
            return redirect()->back()->with('record_updated',trans('messages.update'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // ++++++++++++++++++++++++++++++ destroy() ++++++++++++++++++++++++++++++
    public function destroy(Request $request)
    {
        // find and delete "section"
        Section::findOrFail($request->id)->delete();
        // Show Delete Alert
        return redirect()->route('Sections.index')->with('record_deleted',trans('messages.delete'));

    }
}
