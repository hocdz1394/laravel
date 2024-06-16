<?php
namespace App\Services;

use App\Common;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\DetailProduct;
use App\Models\ImageProduct;
use Illuminate\Support\Facades\File;

class ProductService
{
    // ADMIN ZONE
    public function add_product(AddProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        return Product::create($data);
    }
    public function update_product(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $product->update($data);
        return $product;
    }
    public function delete_product($id){
        $data = Product::find($id);
        $data->delete();
    }
    public function get_productId($id)
    {
        return Product::where('id', $id)->first();
    }
    // ImageProduct

    public function get_img_detail($id)
    {
        return ImageProduct::where('id_product', $id)->get();
    }
    public function get_detail($id)
    {
        return DetailProduct::where('id_product', $id)->get();
    }
    public function create_detailImg(Request $request, $id_product)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $image->move(public_path('upload/product'), $originalName);
                ImageProduct::create([
                    'path' => $originalName,
                    'id_product' => $id_product
                ]);
            }
        }

    }
    public function del_imgpro($id)
    {
        $imageProduct = ImageProduct::find($id);
        $imagePath = public_path('upload/product/'. $imageProduct->path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $imageProduct->delete();
    }
    //detail-product
    public function handel_addct(Request $request)
    {
        $data = $request->only(['color', 'size', 'quantity' ,'id_product']);

        // Kiểm tra nếu các trường không tồn tại, có thể xử lý lỗi
        if (!isset($data['color']) || !isset($data['size']) || !isset($data['quantity'])) {
            return back()->withErrors('Thiếu thông tin cần thiết.');
        }
        DetailProduct::create($data);

    }
    // END ADMIN ZONE

    // USER ZONE
    public function pro_one($id)
    {
        return Product::where('id', $id)->first();
    }
    
    // END USER ZONE

    //GENERAL
    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function updateProduct($id, $data)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }

    public function getProductsByCategory($category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }

    public function searchProductByName($keyword)
    {
        return Product::where('name', 'like', '%' . $keyword . '%')->get();
    }

    public function searchProductByPriceRange($minPrice, $maxPrice)
    {
        return Product::whereBetween('price', [$minPrice, $maxPrice])->get();
    }

}
