<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    use HasTranslations;
    // "Name" is Multi_language Column
    public $translatable = ['Name'];
    protected $table = 'nationalities';
    public $timestamps = true ;
    protected $fillable = ["Name"];
}
