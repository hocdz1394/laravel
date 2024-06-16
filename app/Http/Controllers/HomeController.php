<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\HomeService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DetailProduct;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(HomeService $homeService) {
        $this->homeService = $homeService;
    }
    function index(){
        $fl_product = Product::fl_product();
        $new_product= $this->homeService->new_product(7);
        $features_product = Product::features_product();
        $get_category = Category::get_Category();
        return view("home", compact('fl_product','new_product','features_product'));
    }
    function about(){
        return view("about");
    }
    
    function sale(){
        return view("sale");
    }
    function news(){
        return view("news");
    }
    function contact(){
        return view("contact");
    }

    function favourite(){
        return view("favourite");
    }

    function bill(){
        return view("bill");
    }
    function news_details(){
        return view("news_details");
    }

    
}