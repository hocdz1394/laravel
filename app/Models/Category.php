<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Category extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function scopeget_Category($query){
        return $query->orderBy('created_at','desc')->get();
    }
    public function scopeget_CategoryId($query, $id){
        return $query->where('id',$id)->first();
    }

}
