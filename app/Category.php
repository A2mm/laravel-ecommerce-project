<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable= ['name', 'description', 'status'];

    protected $dates= ['deleted_at'];

    public function setStatusAttribute($value)
    {
         $this->attributes['status']= (boolean)($value);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
