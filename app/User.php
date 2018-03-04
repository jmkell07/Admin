<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [ 'name', 'email', 'password', 'role_id', 'is_active', 'photo_id' ];
    protected $hidden = [ 'password', 'remember_token', ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
    public function isAdmin(){
        return $this->role->name == "admin" && $this->is_active;
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }
}