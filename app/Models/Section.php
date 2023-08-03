<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    // "Name_Section" is Multi_language Column
    public $translatable = ['Name_Section'];
    protected $table = 'sections';
    public $timestamps = true ;
    protected $guarded = [];
    // ++++++++++++++++++++++++++++++ Relationships ++++++++++++++++++++++++++++++
    // =========== "1:M" Relationship : My_class() ===========
    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام
    // فصل [اولي اول] بينتمي فقط [للصف الاول الابتدائي]
    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }
    // =========== "M:M" Relationship : Sections() ===========
    // "one teachers" can teach to "many sections" , "one section" can be learn from "many teachers"
    // علاقة المعلمين مع الاقسام
    public function Teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }



}
