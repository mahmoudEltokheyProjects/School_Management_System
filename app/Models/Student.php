<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;

    public $translatable=['name'];
    protected $guarded=[];
    // +++++++++++++++++++ Relationship : 1:M : "student" has only "one gender" , "one gender has "Many Students" +++++++++++++++++++
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one grade" , "one grade has "Many Students" +++++++++++++++++++
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one classroom" , "one classroom has "Many Students" +++++++++++++++++++
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one section" , "one section has "Many Students" +++++++++++++++++++
    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }
    // +++++++++++++++++++ 1:M Polymorphic Relationship : Between Image And Student Model +++++++++++++++++++
    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one nationality" , "one nationality has "Many Students" +++++++++++++++++++
    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie','nationalitie_id');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one parent" , "one parent has "Many Students" +++++++++++++++++++
    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent','parent_id');
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one country" +++++++++++++++++++
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one state" +++++++++++++++++++
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one city" +++++++++++++++++++
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    // +++++++++++++++++++ Relationship : 1:M : "student" belongs only to "one quarter" +++++++++++++++++++
    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
    }
}


