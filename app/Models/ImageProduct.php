<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    public $table = 'image_product';
    public function product()
    {
        return $this->hasMany(Product::class, 'id_product');
    }
    protected $fillable = ['id', 'name', 'path', 'id_product'];
}
