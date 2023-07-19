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
    // 1- My_class() : "1:M" Relationship
    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

}
