<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    // +++++++++++++++++++++++ index() method +++++++++++++++++++++++
    public function index()
    {
        // Get "All Grades"
        $Grades = Grade::all();
        // Get "All Classrooms"
        $My_Classes = Classroom::all();
        return view('pages.Classrooms.My_Classes',compact('My_Classes','Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /* +++++++++++++++++++++++++++++++++ store() method  +++++++++++++++++++++++++++++++++ */
    public function store(StoreClassroomRequest $request)
    {
        // +++++++++ Store Data +++++++++
        // Assign "New Class" Form Data
        $List_Classes = $request->List_Classes ;
        try
        {
            // validate data
            $validated = $request->validated();
            // Loop on "All Classes"
            foreach ( $List_Classes as $List_Class  )
            {
                $My_Classes = new Classroom();
                $My_Classes->Name_Class = [ 'en' => $List_Class['Name_class_en'] , 'ar' => $List_Class['Name'] ];
                $My_Classes->Grade_id = $List_Class['Grade_id'];
                $My_Classes->save();
            }
            return redirect()->route('Classrooms.index')->with('record_added',trans('messages.success'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* +++++++++++++++++++++++++++++++++ show() method  +++++++++++++++++++++++++++++++++ */
    public function show(Classroom $classroom)
    {
        //
    }
    /* +++++++++++++++++++++++++++++++++ edit() method  +++++++++++++++++++++++++++++++++ */
    public function edit(Classroom $classroom)
    {
        //
    }
    /* +++++++++++++++++++++++++++++++++ update() method  +++++++++++++++++++++++++++++++++ */
    public function update(Request $request)
    {
        // Get "classroom data" where "id = $request->id"
        $classrooms = Classroom::findOrFail($request->id);
        // Apply Update on "classrooms"
        try
        {
            $classrooms->update([
                $classrooms->Name_Class = ['ar'=>$request->Name , 'en'=>$request->Name_en ],
                $classrooms->Grade_id = $request->Grade_id ,
            ]);
            return redirect()->route('Classrooms.index')->with('record_updated',trans('messages.update'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /* +++++++++++++++++++++++++++++++++ destroy() method  +++++++++++++++++++++++++++++++++ */
    public function destroy(Request $request)
    {
        // Get "classroom" where "id = $request->id"
        $classroom = Classroom::findOrFail($request->id);
        // Delete the "classroom"
        $classroom->delete();
        // Delete Alert
        return redirect()->route('Classrooms.index')->with('record_deleted',trans('messages.delete'));
    }
    /* +++++++++++++++++++++++++++++++++ delete_all() method  +++++++++++++++++++++++++++++++++ */
    public function delete_all(Request $request)
    {
        // Convert String of Id's into array
        $delete_all_id_array = explode(',',$request->delete_all_id);
        // Delete "classroom" row which it's "id" Exists "array of id's"
        Classroom::whereIn('id',$delete_all_id_array)->delete();
        // Delete Alert
        return redirect()->route('Classrooms.index')->with('record_deleted',trans('messages.delete'));
    }
    // +++++++++++++++++++++++++++++++++ Search Selecbox +++++++++++++++++++++++++++++++++
    public function Filter_Classes(Request $request)
    {
        // Get "All Grades"
        $Grades = Grade::all();
        // Get "All classrooms" Related to "selected Grade"
        $Search = Classroom::select('*')->where('Grade_id', $request->Grade_id)->get();
        // Go To "views/pages/My_Classes/My_Classes.blade.php" and Take "Grades" and "Search" but Rename "$Search" To "Details"
        return view('pages.Classrooms.My_Classes',compact('Grades'))->withDetails($Search);
    }
}
