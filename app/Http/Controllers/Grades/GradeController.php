<?php

namespace App\Http\Controllers\Grades;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreGradesRequest;
use App\Models\Classroom;

class GradeController extends Controller
{
    // +++++++++++++++++++++++ index() method +++++++++++++++++++++++
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.Grades',compact('Grades'));
    }
    // +++++++++++++++++++++++ create() method +++++++++++++++++++++++
    public function create()
    {
        //
    }
    // +++++++++++++++++++++++ store() method +++++++++++++++++++++++
    public function store(StoreGradesRequest $request)
    {
        // Check if "Name" is "Repeated" or "Not"
        if( Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name_en)->exists() )
        {
            return redirect()->back()->withErrors(trans('Grades_trans.exists'));
        }
        $validated = $request->validated();
        // ++++++++ insert "name" , "notes" of Grade +++++++++++++
        try
        {
            $Grade = new Grade();
            $Grade->Name  = ['en' => $request->Name_en ,'ar' => $request->Name];
            $Grade->Notes =  $request->Notes ;
            $Grade->save();
            return redirect()->route('Grades.index')->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }
    // +++++++++++++++++++++++ update() method +++++++++++++++++++++++
    public function update(StoreGradesRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);

            $Grades->update([
                "Name" => ['ar' => $request->Name , 'en' => $request->Name_en],
                "Notes" => $request->Notes,
            ]);
            return redirect()->route('Grades.index')->with('record_updated',trans('messages.update'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // +++++++++++++++++++++++ delete() method +++++++++++++++++++++++
    public function destroy(Request $request)
    {
        // التاكد من وجود صفوف تابعة للمرحلة الدراسية قبل حذف المرحلة
        // Get "Grade_id" of "All Classes" related to "Grade"
        $grade_classrooms = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
        // if "Grade" Haven't Any "Classrooms" لم يوجد اي صف تابع للمرحلة الدراسية
        if( $grade_classrooms->count() == 0 )
        {
            // Delete The "Grade"
            $Grades = Grade::findOrFail($request->id)->delete();
            // Show Delete Alert
            return redirect()->route('Grades.index')->with('record_deleted',trans('messages.delete'));
        }
        // if "Grade" Has "Classrooms" في حالة وجود صفوف تابعه للمرحلة الدراسية
        else
        {
            // Show Warning Alert
            return redirect()->route('Grades.index')->with('record_deleted',trans('Grades_trans.delete_grade_error'));
        }
    }
}
