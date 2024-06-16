<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdmCategoryController extends Controller
{
    function editdanhmuc($id){
        $category = Category::find($id);
        return view('admin.edit-category', compact('category'));
    }
    function updatedanhmuc(Request $request, $id){
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $description = $request->input('description');

        $category = Category::find($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->description = $description;
        $category->save();
        return redirect()->route('manager-category')->with('success', 'Cập nhật danh mục thành công!');
    }
    function qldanhmuc(){
        $get_category = Category::get_Category();
        return view("admin.manager-category",compact('get_category'));
    }
    function add_danhmuc(){
        return view("admin.add-category");
    }
    function create_danhmuc(Request $request){
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $description = $request->input('description');

        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
        $category->description = $description;
        $category->save();
        return redirect()->route('manager-category')->with('success', 'Thêm mới danh mục thành công!');
    }

    function deletedanhmuc($id){
        Category::destroy($id);
        return redirect()->route('manager-category')->with('success', 'Xoá danh mục thành công!');
    }
}
