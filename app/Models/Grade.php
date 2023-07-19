<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;
    // "Name" is Multi_language Column
    public $translatable = ['Name'];
    protected $table = 'grades';
    public $timestamps = true ;
    protected $guarded = [];
    // ++++++++++++++++++++++++++++++ Relationships ++++++++++++++++++++++++++++++
    // 1- Sections() Relationship
    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة
    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }

}
