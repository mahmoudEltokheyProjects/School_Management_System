<?php
namespace App\Repository;

interface StudentRepositoryInterface
{
    // Get "Add Form" Student
    public function Create_Student();
    /* +++++++++++++++++++++++++ Show_Student() : Show "student details" +++++++++++++++++++++++++ */
    public function Show_Student($id);
    public function Get_classrooms($id);
    public function Get_Sections($class_id,$grade_id);
    /* Store_Student() : Store Student Data  */
    public function Store_Student($request);
    /* Get_Student() : Get Student Data  */
    public function Get_Student();
    /* Edit_Student() : Get Data of Edited Student */
    public function Edit_Student($id);
    /* Update_Student() : Update Data of Edited Student */
    public function Update_Student($request);
    /* Delete_Student() : Delete Student */
    public function Delete_Student($request);
    // Upload_attachment
    public function Upload_attachment($request);
    // dateFilter
    public function dateFilter($request);
}
?>
