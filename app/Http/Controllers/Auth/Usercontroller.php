<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Usercontroller extends Controller
{
    //INFOR USER
    function view_inforUser()
    {
        return view("inforUser");
    }
    function handel_from(Request $request)
    {
        $userId = $request->input('id_user');
        $user = User::find($userId);
        if ($user) {
            // Cập nhật thông tin người dùng
            $user->update($request->all());

            // Chuyển hướng đến trang thông tin người dùng
            return redirect()->route('inforUser')->with('success', 'Cập nhật thông tin thành công.');
        }
        return redirect()->back()->withErrors(['error' => 'Người dùng không tồn tại.']);
    }
    function handel_fromImg(Request $request)
    {
        $userId = $request->input('id_user');
        $user = User::find($userId);
        if ($user && $request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalExtension();
            $file->move(public_path('upload/user'), $filename);
            $user->image = $filename;
            $user->save();
            return redirect()->route('inforUser')->with('success', 'Cập nhật hình ảnh thành công.');
        }
        return redirect()->back()->withErrors(['error' => 'Người dùng không tồn tại hoặc không có file hình ảnh.']);

    }
    //END INFOR USER

    //LOGIN && REGISTER
    function view_register()
    {
        return view("registerr");
    }
    public function register(RegisterRequest $request)
    {


        $user = $request->all();
        if ($request->input('confirm_pw') != $request->input('password')) {
            session()->put('message', 'Mật khẩu nhập lại không khớp!');
            return back();
        }
        $user = User::where('email', $request->input('email'))->first();
        if (isset($user)) {
            session()->put('message', 'Email đã tồn tại!');
            return back();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password
        $user->save();

        return redirect()->route('loginn');
    }

    //LOGIN
    function view_login()
    {
        return view("loginn");
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Kiểm tra role của user đã đăng nhập
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('home-admin');
            }
             return redirect()->intended();
        }
        return redirect()->back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không chính xác.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginn');
    }
    public function forgot()
    {

    }

}
