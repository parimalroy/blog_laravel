<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded=[];


    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'categorie_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    Public function Title():Attribute{
        return Attribute::make(
            set:fn($value)=>strtolower($value),
            get:fn($value)=>ucwords($value),
        );
    }
    Public function Author():Attribute{
        return Attribute::make(
            set:fn($value)=>strtolower($value),
            get:fn($value)=>ucwords($value),
        );
    }

    Public function CreatedAt():Attribute{
        return Attribute::make(
            get:fn($value)=>Carbon::parse($value)->format('d M Y')
        );
    }
}
