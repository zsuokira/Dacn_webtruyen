<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = "author_application";
    public $timestamps = false;
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }

}
