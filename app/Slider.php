<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable= ['name', 'description', 'image', 'status'];


    public function setStatusAttribute($value)
    {
         $this->attributes['status']= (boolean)($value);
    }
}
