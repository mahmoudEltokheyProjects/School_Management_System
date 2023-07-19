<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;
    // "Name_Class" is Multi_language Column
    public $translatable = ['Name_Class'];
    protected $table = 'classrooms';
    public $timestamps = true ;
    protected $fillable = ['Name_Class','Grade_id'];
    // +++++++++++++++ Relationship 1 : M : "one classroom" belongs to "one grade" +++++++++++++++
    //  "Primary Stage" has "first","second","third","fourth","fifth","sixth" Class
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
}
