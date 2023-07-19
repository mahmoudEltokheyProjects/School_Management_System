<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Blood extends Model
{
    protected $table = 'type__bloods';
    public $timestamps = true ;
    protected $fillable = ['Name'];

}
