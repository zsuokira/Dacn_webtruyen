<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
  
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
    	return $this->belongsToMany('App\Models\Role');
    }

    public function story()
    {
    	return $this->hasMany('App\Models\Story','authorId','id');
    }

    public function hasRole($role){
        return null !== $this ->role() -> where('name',$role) ->first();
    }
    public function invite()
    {
    	return $this->belongsTo('App\Models\Invite','userId','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Models\Comment','userId','id');
    }
    public function favorite()
    {
    	return $this->hasMany('App\Models\Favorite','userId','id');
    }
    public function history()
    {
    	return $this->hasMany('App\Models\History','userId','id');
    }
    public function report()
    {
    	return $this->belongsTo('App\Models\Report','userId','id');
    }
    public function notification()
    {
    	return $this->hasMany('App\Models\Notification','userId','id');
    }
    public $timestamps = false;
}
