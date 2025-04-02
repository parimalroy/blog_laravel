<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->belongsTo(Comment::class,'comment_id');
    }

}
