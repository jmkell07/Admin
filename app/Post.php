<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
// use Cviebrock\EloquentSluggable\SluggableInterface;
// use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model 
{
    //implements SluggableInterface
    // use SluggableTrait;
    // protected $sluggable = [
    //     'build_from'    => 'title', 
    //     'save_to'       => 'slug',
    //     'on_update'     => true
    // ];
    protected $fillable = ['title','body','category_id','photo_id'];
    protected $dates = ['created_at','upadted_at'];
    public function user(){
         return $this->belongsTo('App\User');
     }
    public function photo(){
         return $this->belongsTo('App\Photo');
     }
    public function category(){
         return $this->belongsTo('App\Category');
     }
     public function comments(){
         return $this->hasMany('App\Comment');
     }
    public function getCreatedAtAttribute($created){
        $carbonDate = new Carbon($created);
        return $carbonDate->diffForHumans();
    }
    public function getUpdatedAtAttribute($updated){
        $carbonDate = new Carbon($updated);
        return $carbonDate->diffForHumans();
    }
}
