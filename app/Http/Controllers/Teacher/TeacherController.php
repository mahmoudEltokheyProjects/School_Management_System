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
        return view('pages.Teachers.Teachers',compact('Teachers'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
