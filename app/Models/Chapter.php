<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = "chapter";

    public function story()
    {
    	return $this->belongsTo('App\Models\Story','storyId','id');
    }
    public function history()
    {
    	return $this->hasMany('App\Models\History','chapterId','id');
    }
    public function report()
    {
    	return $this->hasMany('App\Models\Chapter','chapterId','id');
    }
    public $timestamps = false;
}
