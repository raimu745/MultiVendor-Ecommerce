<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    function category(){
        return $this->hasMany(Category::class,'section_id')->with('subcategory');
    }
}
