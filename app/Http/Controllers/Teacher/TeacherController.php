<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Repository\TeacherRepositoryInterface;

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
        $this->repo->getAllTeachers();
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
        $this->repo->storeTeachers($request);
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
