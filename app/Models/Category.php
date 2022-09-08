<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public function story()
    {
    	return $this->hasMany('App\Models\Story','categoryId','id');
    }
    public $timestamps = false;

}
