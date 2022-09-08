<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "report";
    public $timestamps = false;
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
    public function chapter()
    {
    	return $this->belongsTo('App\Models\Chapter','chapterId','id');
    }
}
