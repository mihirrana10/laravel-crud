<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//adminsite route
Route::get('/product', function () {
    return view('product');
});

Route::get('product','App\Http\Controllers\ProductController@show');
Route::post('submitproduct','App\Http\Controllers\ProductController@store');
Route::get('product/{id}','App\Http\Controllers\ProductController@edit');
Route::post('updateproduct/{id}','App\Http\Controllers\ProductController@update');
Route::get('product_delete/{id}','App\Http\Controllers\ProductController@destroy');



// Category
Route::get('','App\Http\Controllers\EComController@show');
Route::get('welcome','App\Http\Controllers\EComController@create');
Route::post('submit','App\Http\Controllers\EComController@store');
Route::get('edit/{id}','App\Http\Controllers\EComController@edit');
Route::post('update/{id}','App\Http\Controllers\EComController@update');
Route::get('ecom_delete/{id}','App\Http\Controllers\EComController@destroy');



// usersite route

// Route::get('/index', function () {
//     return view('user/index');
// });
// Route::get('/cart', function () {
//     return view('user/cart');
// });

// Route::get('/chekout', function () {
//     return view('user/chekout');
// });
// Route::get('/shop', function () {
//     return view('user/shop');
// });

// Route::get('/contact', function () {
//     return view('user/contact');
// });

// Route::get('/shopdetails', function () {
//     return view('user/shopdetails');
// });

Route::get('/shopshow', function () {
    return view('user/shopshow');
});

Route::get('/index','App\Http\Controllers\EComController@categoryshow');
Route::get('/index','App\Http\Controllers\ProductController@productsshow');

Route::get('/cart','App\Http\Controllers\EComController@navcartshow');
Route::get('/chekout','App\Http\Controllers\EComController@navchekoutshow');
Route::get('/shop','App\Http\Controllers\EComController@navshow');
Route::get('/shopdetails','App\Http\Controllers\EComController@navshopshow');
Route::get('/contact','App\Http\Controllers\EComController@navcontactshow');
// Route::get('/addtocart','App\Http\Controllers\EComController@addtocartnav');

// Route::get('/shopshow','App\Http\Controllers\EComController@categoryproducts');

Route::get('/shop','App\Http\Controllers\ProductController@productshow');
Route::get('/shopshow/{id}','App\Http\Controllers\ProductController@categoryproduct');




Route::get('/signup', function () {   
    return view('user/signup');       //user    
});

Route::get('/login', function () {
    return view('user/login');      //user
});

Route::post('/signup',[App\Http\Controllers\AuthController::class,'signup']);//user
Route::post('/login',[App\Http\Controllers\AuthController::class,'authenticate']);//user
Route::get("/logout",[App\Http\Controllers\AuthController::class,'logout']);//user

// Route::post("user/addtocart/{id}",[App\Http\Controllers\CartController::class,'store'])->name('user/addtocart/');//cart



// Route::get("/addtocart",[App\Http\Controllers\CartController::class,'cart']);//user

// Route::get('/addtocart', function () {
//     return view('user,addtocart');
// });
// Route::get('/addtocart','App\Http\Controllers\CartController@productshow');


Route::post('/add_to_cart',[App\Http\Controllers\ProductController::class,'addtocart']);//add a product in table and cart
Route::get('/addtocart',[App\Http\Controllers\ProductController::class,'cartlist']);//product list in add to cart

Route::get('/removecartlist/{id}',[App\Http\Controllers\ProductController::class,'removecartlist']);//remove product a addtocart

Route::get('detail/{id}/',[App\Http\Controllers\ProductController::class,'detail']);//product details show

Route::get('/search',[App\Http\Controllers\ProductController::class,'search']);//search a products



Route::get('/chekout', [RazorpayPaymentController::class, 'index']);//rezorpay
Route::post('/chekout', [RazorpayPaymentController::class, 'store']);//rezorpay


