<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmHomeController extends Controller
{
    function index(){
        return view("admin.home");
    }



    function qlbaiviet(){
        return view("admin.manager-news");
    }


}
