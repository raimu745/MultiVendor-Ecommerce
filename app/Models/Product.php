<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = []; 

    function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    function attributes(){
        return $this->hasMany(Attributes::class);
    }
    
    function productimage(){
        return $this->hasMany(ProductImage::class);
    }
   
}
