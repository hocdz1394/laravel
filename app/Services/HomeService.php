<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class HomeService
{
  // ADMIN ZONE

  // END ADMIN ZONE

  // USER ZONE
  public function new_product($limit)
  {
    return Product::orderBy('created_at', 'desc')->take($limit)->get();
  }
  // END USER ZONE

  //GENERAL
}