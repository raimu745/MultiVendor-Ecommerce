<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function section(){
      return  $this->belongsTo(Section::class,'section_id'); 
    }
    public function parentCategory(){
        return  $this->belongsTo(Category::class,'parent_id'); 
      }

   function subcategory(){
     return $this->hasMany(Category::class,'parent_id');
   }  
}
