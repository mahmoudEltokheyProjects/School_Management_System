<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\State;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    // ++++++++++++++++++++++++ interface object ++++++++++++++++++++++++
    protected $repo;
    // ++++++++++++++++++++++++ __construct() ++++++++++++++++++++++++
    public function __construct(StudentRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    // ++++++++++++++++++++++++ index() ++++++++++++++++++++++++
    public function index()
    {
        $students = $this->repo->Get_Student();
        return view('pages.Students.index',compact('students'));
    }
    /* +++++++++++++++++++++++++ create() +++++++++++++++++++++++++ */
    public function create()
    {
        return $this->repo->Create_Student();
    }
    // ++++++++++++++ fetchState(): to get "states" of "selected country" selectbox ++++++++++++++
    public function fetchState(Request $request)
    {
        return $this->repo->FetchState($request);
    }
    // ++++++++++++++ fetchState(): to get "states" of "selected country" selectbox ++++++++++++++
    public function fetchCity(Request $request)
    {
        return $this->repo->FetchCity($request);
    }
    // ++++++++++++++ fetchState(): to get "states" of "selected country" selectbox ++++++++++++++
    public function fetchQuarter(Request $request)
    {
        return $this->repo->FetchQuarter($request);
    }
    // +++++++++ store city +++++++++++
    public function storeRegion(Request $request)
    {
        return $this->repo->StoreRegion($request);
    }
    // +++++++++ store quarter +++++++++++
    public function storeQuarter(Request $request)
    {
        return $this->repo->StoreQuarter($request);
    }
    /* +++++++++++++++++++++++++ show() : Show "student details" +++++++++++++++++++++++++ */
    public function show($id)
    {
        return $this->repo->Show_Student($id);
    }
    // ++++++++++++ getclasses() : Get "all classes" According to selected "grade" selectbox ++++++++++++
    public function Get_classrooms($id)
    {
        return $this->repo->Get_classrooms($id);
    }
    // ++++++++++++ Get_Sections() : Get "all sections" According to selected "classes" selectbox ++++++++++++
    public function Get_Sections($class_id, $section_id)
    {
        return $this->repo->Get_Sections($class_id,$section_id);
    }
    /* ++++++++++++++++++ store() : Store Student Data +++++++++++++++++++ */
    public function store(Request $request)
    {
        return $this->repo->Store_Student($request);
    }
    /* ++++++++++++++++++ edit() : Get Data of "Edit Student" +++++++++++++++++++ */
    public function edit($id)
    {
        return $this->repo->Edit_Student($id);
    }
    /* ++++++++++++++++++ update() : Update Data of "Edit Student" +++++++++++++++++++ */
    public function update(Request $request)
    {
        return $this->repo->Update_Student($request);
    }
    // ++++++++++++++++++++++++++ destroy() : Delete "Student" +++++++++++++++++
    public function destroy(Request $request)
    {
        return $this->repo->Delete_Student($request);
    }
    // ++++++++++++++++++++++++++ Upload_attachment() : Upload_attachment "Student" +++++++++++++++++
    public function Upload_attachment(Request $request)
    {
        return $this->repo->Upload_attachment($request);
    }
    // ++++++++++++++++++ Date Filter ++++++++++++++
    public function dateFilter(Request $request)
    {
        return $this->repo->dateFilter($request);
    }
}
