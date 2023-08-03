<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $gurded=[];
    // =========== "1:M" Relationship : genders() ===========
    // "one teacher" belongs to only "one specializations" , "one specialization" has "many teachers"
    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }
    // =========== "1:M" Relationship : genders() ===========
    // "one teacher" belongs to only "one gender" , "one gender" has "many teachers"
    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
    // =========== "M:M" Relationship : Sections() ===========
    // "one teachers" can teach to "many sections" , "one section" can be learn fro "many teachers"
    // علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }
}
