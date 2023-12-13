<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $fillable = ["city_id","name"];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
