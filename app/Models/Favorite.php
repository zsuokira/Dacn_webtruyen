<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = "user_follow";
    public $timestamps = false;
    public function story()
    {
    	return $this->belongsTo('App\Models\Story','storyId','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
}
