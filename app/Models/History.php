<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    public $timestamps = false;
    public function chapter()
    {
    	return $this->belongsTo('App\Models\Chapter','chapterId','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
    public function story()
    {
    	return $this->belongsTo('App\Models\Story','storyId','id');
    }
}
