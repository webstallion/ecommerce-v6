<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
 
Route::get('/login_page', function () {
    return view('login');
});

Route::post("/login",[UserController::class, 'login']);
Route::get('/', [ProductController::class, 'index']);
Route::get('details/{id}', [ProductController::class, 'details']);
Route::post('add_to_cart', [ProductController::class, 'addToCart']);
Route::get('/logout', function (){
    //Session::forget('user');
    if(session()->has('user')){
        session()->pull('user', null);
    }
    return redirect('login_page');
});
Route::get('cartlist', [ProductController::class, 'cartList']);