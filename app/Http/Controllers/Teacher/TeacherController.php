<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    protected $repo ;
    /* ++++++++++++++++++ constructor ++++++++++++++++++ */
    public function __construct(TeacherRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    /* ++++++++++++++++++ index() ++++++++++++++++++ */
    public function index()
    {
        $Teachers = $this->repo->getAllTeachers();
        $specializations = $this->repo->getAllSpecializations();
        return view('pages.Teachers.Teachers',compact('Teachers','specializations'));
    }
   /* ++++++++++++++++++ getAllSpecializations() ++++++++++++++++++ */
   public function getAllGenders()
   {
       $this->repo->getAllGenders();
   }
   /* ++++++++++++++++++ getAllSpecializations() ++++++++++++++++++ */
   public function getAllSpecializations()
   {
       $this->repo->getAllSpecializations();
   }
   // ++++++++++++++++++ store() ++++++++++++++++++ */
    public function store(StoreTeacherRequest $request)
    {
        return $this->repo->StoreTeachers($request);
    }
    /* ++++++++++++++++++++++ create() : create New Teacher ++++++++++++++++++++++ */
    public function create()
    {
        $specializations  = $this->repo->getAllSpecializations() ;
        $genders          = $this->repo->getAllGenders();
        return view('pages.Teachers.create',compact('specializations','genders'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }
    /* ++++++++++++++++++++++++++ edit() +++++++++++++++++++++ */
    public function edit($id)
    {

    }
    /* ++++++++++++++++++++++++++ update() +++++++++++++++++++++ */
    public function update(Request $request)
    {
        return $this->repo->UpdateTeacher($request);
    }
    /* ++++++++++++++++++++++++++ destroy() +++++++++++++++++++++ */
    public function destroy(Request $teacher)
    {
        return $this->repo->DeleteTeacher($teacher);
    }
}
