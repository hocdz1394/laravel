<?php
namespace App\Services;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryService{
  // ADMIN ZONE
  
  // END ADMIN ZONE

  // USER ZONE

  // END USER ZONE

  //GENERAL

  // public function getAllCategory(){

  // }
  public function createCategory($data)
    {
        return Category::create($data);
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function updateCategory($id, $data)
    {
        $category = Category::find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    
public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }

    public function getCategorysByCategory($category_id)
    {
        return Category::where('category_id', $category_id)->get();
    }

    public function searchCategoryByName($keyword)
    {
        return Category::where('name', 'like', '%' . $keyword . '%')->get();
    }

    public function searchCategoryByPriceRange($minPrice, $maxPrice)
    {
        return Category::whereBetween('price', [$minPrice, $maxPrice])->get();
    }

}
