<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdmUserController extends Controller
{
    protected $userSevice;
    public  function __construct( $userSevice) {
        $this->userSevice = $userSevice;
    }
    function qluser(){
        $viewUser = User::all();
        return view("admin.manager-user", compact('viewUser'));
    }
}
