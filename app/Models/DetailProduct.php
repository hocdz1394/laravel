<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;
    public $table = "detail_product";

    protected $fillable = ['color', 'size', 'quantity', 'id_product'];

    public function product(){
        return $this->hasMany(Product::class, 'id_product');
    }
}
