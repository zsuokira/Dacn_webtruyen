<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "news";
    public $timestamps = false;
    public function user()
    {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
}
