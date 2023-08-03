<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $repo;

    public function __construct(StudentRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {

    }

    /* +++++++++++++++++++++++++ create() +++++++++++++++++++++++++ */
    public function create()
    {
        return $this->repo->Create_Student();
    }
    // ++++++++++++ getclasses() : Get "all classes" According to selected "grade" selectbox ++++++++++++
    public function Get_classrooms($id)
    {
        return $this->repo->Get_classrooms($id);
    }
    // ++++++++++++ Get_Sections() : Get "all sections" According to selected "classes" selectbox ++++++++++++
    public function Get_Sections($id)
    {
        return $this->repo->Get_Sections($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
