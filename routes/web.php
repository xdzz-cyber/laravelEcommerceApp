<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/shop/login", [ClientsController::class,"loginPage"]);

Route::get("/shop/register", [ClientsController::class, "registerPage"]);

Route::get("/shop", [ProductController::class, "index"]);

Route::get("/shop/detail/{id}", [ProductController::class, "detailPage"]);

Route::get("/shop/logout", [ClientsController::class, "logout"]);

Route::get("/shop/cartItemsList", [ProductController::class, "cartItemsList"]);

Route::get("/shop/removeCartListItem/{cartItemId}", [ProductController::class, "removeCartListItem"]);

Route::get("/shop/makeOrder", [ProductController::class, "makeOrder"]);

Route::get("/shop/clientOrderItemsListPage", [ProductController::class, "clientOrderItemsListPage"]);

Route::post("/shop/login", [ClientsController::class,"loginResult"]);

Route::post("/shop/addToCart", [ProductController::class, "addToCart"]);

Route::post("/shop/makeOrderResult", [ProductController::class, "makeOrderResult"]);

Route::post("/shop/registerResult", [ClientsController::class, "registerResult"]);