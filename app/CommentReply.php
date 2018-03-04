<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['comment_id','author','email','body','is_active', 'photo'];
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }
}
