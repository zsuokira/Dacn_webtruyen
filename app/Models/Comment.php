<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    
    public function story()
    {
    	return $this->belongsTo('App\Models\Story','storyId','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
    public $timestamps = false;
}
