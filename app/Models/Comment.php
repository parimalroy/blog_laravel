<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
