<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Comment extends Model
{
    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function replies(){
        return $this->hasMany(Reply::class,'comment_id');
    }

    public function CreatedAt():Attribute{
        return Attribute::make(
            get:fn($value)=>Carbon::parse($value)->format('d M Y'),
        );
    }
}
