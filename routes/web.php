<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdmCategoryController;
use App\Http\Controllers\Admin\AdmHomeController;
use App\Http\Controllers\Admin\AdmProductController;
use App\Http\Controllers\Admin\AdmUserController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\AminMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/product', [ProductController::class, "product"])->name('product');
Route::get('/detail/{id}', [ProductController::class, "detail"])->name('detail');
Route::get('/search', [ProductController::class, "search"])->name('products.search');

Route::get('/about', [HomeController::class, "about"])->name('about');
Route::get('/sale', [HomeController::class, "sale"])->name('sale');
Route::get('/news', [HomeController::class, "news"])->name('news');
Route::get('/contact', [HomeController::class, "contact"])->name('contact');

Route::get('/registerr', [UserController::class, "view_register"])->name('registerr');
Route::post('/registerr', [UserController::class, "register"])->name('registerp');
Route::get('/loginn', [UserController::class, "view_login"])->name('loginn');
Route::post('/loginn', [UserController::class, "login"])->name('loginnp');
Route::get('/loginn/logout', [UserController::class, "logout"])->name('logout');
Route::post('/loginn/fogot', [UserController::class, "forgot"])->name('forgot');
Route::get('/inforUser', [UserController::class, "view_inforUser"])->name('inforUser');
Route::post('/inforUser/form', [UserController::class, "handel_from"])->name('handel_fromUser');
Route::post('/inforUser', [UserController::class, "handel_fromImg"])->name('handel_fromUserImg');

Route::get('/cart', [CartController::class, "index"])->name('cart');
Route::post('/cart', [CartController::class, "handelform"])->name('cart.post');

Route::get('/checkout', [CheckoutController::class, "checkout"])->name('checkout');
Route::post('/checkout', [CheckoutController::class, "handel_form"])->name('checkout.post');
// Route::get('/vnpay_return', [CheckoutCo^ntroller::class, 'vnpay_return'])->name('vnpay.return');

Route::get('/bill/{id}', [BillController::class, "view_bill"])->name('bill');



Route::get('/favourite', [HomeController::class, "favourite"])->name('favourite');
Route::get('/news_details', [HomeController::class, "news_details"])->name('news_details');



Route::prefix('/admin')->middleware('admin')->group(function () {
  Route::get('/', [AdmHomeController::class, "index"])->name('home-admin');
  Route::prefix('/manager-category')->group(function () {
    Route::get('/', [AdmCategoryController::class, "qldanhmuc"])->name('manager-category');
    Route::get('/add-category', [AdmCategoryController::class, "add_danhmuc"])->name('add-category');
    Route::post('/add-category', [AdmCategoryController::class, "create_danhmuc"]);
    Route::get('/edit-category/{id}', [AdmCategoryController::class, "editdanhmuc"])->name('manager-category.edit');
    Route::post('/edit-category/{id}', [AdmCategoryController::class, "updatedanhmuc"]);
    Route::post('delete/{id}', [AdmCategoryController::class, "deletedanhmuc"])->name('delete-category');
  });
  Route::prefix('/manager-product')->group(function () {
    Route::get('/', [AdmProductController::class, "qlsanpham"])->name('manager-product');
    Route::get('/add-product', [AdmProductController::class, "add_sanpham"])->name('add-product');
    Route::post('/add-product', [AdmProductController::class, "create_sanpham"]);
    Route::get('/edit-product/{id}', [AdmProductController::class, "edit_sanpham"])->name('edit-product');
    Route::post('/edit-product/{id}', [AdmProductController::class, "update_sanpham"]);
    Route::post('/delete-product/{id}', [AdmProductController::class, "delete_product"])->name('delete-product');

    Route::get('/detail-product/{id}', [AdmProductController::class, "qldetail"])->name('detail-product');
    Route::post('/detail-product/{id}', [AdmProductController::class, "create_detail"]);

    Route::post('/detail-image/{id}', [AdmProductController::class, "detete_image"])->name('detail-image');
    Route::post('/detail-product/manager-detail/{id}/', [AdmProductController::class, "ql_chitiet"])->name('detail-mangerp');
    Route::get('/detail-product/manager-detail/{id}/', [AdmProductController::class, "ql_chitiet"])->name('detail-manger');
    
    Route::get('/detail-product/manager-detail/add-detail/{id}', [AdmProductController::class, "add_chitiet"])->name('add-detail');
    Route::post('/detail-product/manager-detail/add-detail/{id}', [AdmProductController::class, "add_chitiet"])->name('add-detailp');
    Route::post('/detail-product/manager-detail/create/{id}', [AdmProductController::class, "create_chitiet"])->name('create-detail-manager');

    Route::get('detail-product/manager-detail/edit-detail/{id}', [AdmProductController::class, "viewEdit_chitiet"])->name('edit-detail');
    Route::post('detail-product/manager-detail/edit-detail/{id}', [AdmProductController::class, "viewEdit_chitiet"])->name('edit-detailp');
    Route::post('detail-product/manager-detail/update/{id}', [AdmProductController::class, "update_chitiet"])->name('update-detail-manager');

    Route::post('detail-product/manager-detail/detele/{id}', [AdmProductController::class, "delete_chitiet"])->name('delete-detail-manager');

  });
  Route::get('/manager-order', [OrderController::class, "qldonhang"])->name('manager-order');
  
  Route::get('/manager-message', [MessageController::class, "view_message"])->name('manager-message');
  


  Route::prefix('manager-user')->group(function () {
    Route::get('/', [AdmUserController::class, "qluser"])->name('manager-user');
  });
  Route::get('/manager-news', [AdmHomeController::class, "qlbaiviet"])->name('manager-news');
});

Route::prefix('api')->group(function () {
  Route::get('/product/{id}', [ProductController::class, "show_product"]);
  Route::resource('/cart', CartController::class);
  Route::get('/manager-order/infor/{id}', [OrderController::class, "index"]);
  Route::get('/manager-order/orders', [OrderController::class, "show_billuser"]);
  Route::post('/manager-order/status', [OrderController::class, "status"]);
  Route::post('/manager-order/cancel_status', [OrderController::class, "cancel_status"]);

  Route::post('/messages', [MessageController::class, 'store']);
  Route::get('/messages/{id}', [MessageController::class, 'index']);
  
  Route::get('/users', [MessageController::class, 'getUsers']);
  Route::get('/messagesAdmin/{userId}', [MessageController::class, 'getMessages']);
  Route::post('/messagesAdmin/sent', [MessageController::class, 'sendMessage']);
  // Route::post('/cart', 'CartController@addToCart');
});

// Route::middleware(['auth'])->group(function () {
//   Route::get('api/messages', [MessageController::class, 'index']);
// });

// send mail
Route::get('/invoice', [EmailController::class, 'sendEmailReminder']);