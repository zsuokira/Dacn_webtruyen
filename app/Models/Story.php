<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = "story";

    public function category()
    {
    	return $this->belongsTo('App\Models\Category','categoryId','id');
    }
    public function chapter()
    {
    	return $this->hasMany('App\Models\Chapter','storyId','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','authorId','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Models\Comment','storyId','id');
    }
    public function favorite()
    {
    	return $this->hasMany('App\Models\Favorite','storyId','id');
    }
    public function history()
    {
    	return $this->belongsTo('App\Models\History','storyId','id');
    }
    public $timestamps = false;
}
