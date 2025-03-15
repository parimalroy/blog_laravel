<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    protected $guarded=[];

    public function CreatedAt():Attribute{
        return Attribute::make(
            get:fn($value)=>Carbon::parse($value)->format('d M Y')
        );
        
    }

    public function Name():Attribute{
        return Attribute::make(
            set:fn($value)=>strtolower($value),
            get:fn($value)=>ucfirst($value)
        );
    }
}
