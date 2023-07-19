<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    use HasTranslations;
    // Multi_Languages Columns
    public $translatable = ["Name_Father","Job_Father","Name_Mother","Job_Mother"];
    protected $table = "my__parents";
    // Make "All Columns" Are "Fillable"
    protected $guarded = [];

}
