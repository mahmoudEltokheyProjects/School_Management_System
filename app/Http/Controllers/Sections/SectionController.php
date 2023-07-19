<?php

namespace App\Http\Controllers\Sections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section ;

class SectionController extends Controller
{
    // ++++++++++++++++++++ index() ++++++++++++++++++++
    public function index()
    {
        // Get "All grades" with "sections" : get "each grade" with "its sections"
        $Grades = Grade::with(['Sections'])->get();
        // Get "All grades"
        // return $Grades;
        $list_Grades = Grade::all();
        return view('pages.Sections.Sections',compact('Grades','list_Grades'));
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
            $validated = $request->validated();
            $Sections = new Section();
            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            // $Sections->teachers()->attach($request->teacher_id);
            // toastr()->success(trans('messages.success'));
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
            // return $request;
            $validated = $request->validated();
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
            // if (isset($request->teacher_id))
            // {
            //     $Sections->teachers()->sync($request->teacher_id);
            // }
            // else
            // {
            //     $Sections->teachers()->sync(array());
            // }
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
