<?php
namespace App\Repository;

interface StudentRepositoryInterface
{
    // Get "Add Form" Student
    public function Create_Student();
    public function Get_classrooms($id);
    public function Get_Sections($id);
}
?>
