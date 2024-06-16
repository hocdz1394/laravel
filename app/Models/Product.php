<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailProduct;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    //Khai báo tham số vì không đặt ttheo laravel    
    protected $table = 'product';
    protected $fillable = [
        'name',
        'slug',
        'regular_price',
        'sale_price',
        'flash_sale',
        'features',
        'gender',
        'description',
        'id_categories'
    ];

    //Liên kết với bảng detail_product
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories');
    }
    public function detail_product()
    {
        return $this->hasMany(DetailProduct::class, 'id_product');
    }
    public function image_product()
    {
        return $this->hasMany(ImageProduct::class, 'id_product');
    }
    //Relationship
    // ADMIN ZONE
    public function scoperecommend($query, $id)
    {
        return $query->where('id', '!=', $id)->orderBy('id', 'desc')->take(7)->get();
    }

    public function scopepro_all($query)
    {
        return $query->paginate(8);
    }
    public function scopeget_allpro($query)
    {
        return $query->with('image_product')->orderBy("id", "desc")->paginate(8);
    }


    //END ADMIN
    public function scopefl_product($query, $limit = 5)
    {
        return $query->where('flash_sale', 1)
            ->orderBy('created_at', 'desc')->take($limit)->get();
    }
    public function scopenew_product($query, $limit = 5)
    {
        return $query->where('created_at', 'desc')->take($limit)->get();
    }
    public function scopefeatures_product($query, $limit = 5)
    {
        return $query->where('features', 1)->orderBy('created_at', 'desc')->take($limit)->get();
    }
}