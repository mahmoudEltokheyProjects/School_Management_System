<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;
    // "Name" is Multi_language Column
    public $translatable = ['Name'];
    protected $table = 'religions';
    public $timestamps = true ;
    // Allow to enter data only in "Name" column in "religions" table
    protected $fillable = ["Name"];
}
