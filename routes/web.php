<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\AdminMailController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ClientCategoryController;
use App\Http\Controllers\SearchController;


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

Route::get("/product-detail/{slug}", [ProductController::class, "show"]);

Route::get("/cart", function(){

    return view("cart");

});

Route::get("/checkout", function(){

    return view("checkout");

});

Route::view("/admin/login", "admin.login")->name("login");
Route::post("/admin/login", [LoginController::class, "login"]);

Route::view("/admin/dashboard", "admin.dashboard")->middleware("auth");

Route::view("/admin/categories/index", "admin.categories.index")->middleware("auth");
Route::post("/admin/category/store", [CategoryController::class, "store"])->middleware("auth");
Route::get("/admin/category/fetch/{page}", [CategoryController::class, "fetch"])->middleware("auth");
Route::post("/admin/category/update", [CategoryController::class, "update"])->middleware("auth");
Route::post("/admin/category/delete", [CategoryController::class, "delete"])->middleware("auth");
Route::get("/category/all", [CategoryController::class, "all"]);

Route::view("/admin/colors/index", "admin.colors.index")->middleware("auth");
Route::post("/admin/colors/store", [ColorController::class, "store"])->middleware("auth");
Route::get("/admin/colors/fetch/{page}", [ColorController::class, "fetch"])->middleware("auth");
Route::post("/admin/colors/update", [ColorController::class, "update"])->middleware("auth");
Route::post("/admin/colors/delete", [ColorController::class, "delete"])->middleware("auth");
Route::get("/admin/colors/all", [ColorController::class, "all"]);

Route::view("/admin/banks/index", "admin.banks.index")->middleware("auth");
Route::post("/admin/banks/store", [BankController::class, "store"])->middleware("auth");
Route::post("/admin/banks/update", [BankController::class, "update"])->middleware("auth");
Route::post("/admin/banks/delete", [BankController::class, "delete"])->middleware("auth");
Route::get("/admin/banks/fetch/{page}", [BankController::class, "fetch"])->middleware("auth");
Route::get("/bank/all", [BankController::class, "all"]);

Route::view("/admin/products/index", "admin.products.list")->middleware("auth");
Route::view("/admin/products/create", "admin.products.create")->middleware("auth");
Route::view("/admin/products/list", "admin.products.list")->middleware("auth");
Route::post("/admin/products/store", [ProductController::class, "store"])->middleware("auth");
Route::post("/admin/products/update", [ProductController::class, "update"])->middleware("auth");
Route::get("/admin/products/fetch/{page}", [ProductController::class, "fetch"])->middleware("auth");
Route::get("/admin/products/edit/{id}", [ProductController::class, "edit"])->middleware("auth");
Route::post("/admin/products/delete", [ProductController::class, "delete"])->middleware("auth");

Route::get("/admin/sales/index", [SaleController::class, "index"])->middleware("auth");
Route::get("/admin/sales/fetch/{fetch}", [SaleController::class, "fetch"])->middleware("auth");
Route::get("/admin/sales/excel", [SaleController::class, "excelExport"])->middleware("auth");
Route::get("/admin/sales/csv", [SaleController::class, "csvExport"])->middleware("auth");
Route::post("/admin/sales/approve", [SaleController::class, "approve"])->middleware("auth");
Route::post("/admin/sales/reject", [SaleController::class, "reject"])->middleware("auth");

Route::get("admin/admin-email/index", [AdminMailController::class, "index"])->middleware("auth");
Route::post("admin/admin-email/store", [AdminMailController::class, "store"])->middleware("auth");
Route::get("admin/admin-email/fetch", [AdminMailController::class, "fetch"])->middleware("auth");
Route::post("admin/admin-email/update", [AdminMailController::class, "update"])->middleware("auth");
Route::post("admin/admin-email/delete", [AdminMailController::class, "delete"])->middleware("auth");


Route::post("/upload/picture", [ImageController::class, "upload"]);

Route::post("/cart/products/fetch", [CartController::class, "fetchProducts"]);

Route::post("/purchase", [PurchaseController::class, "store"]);

Route::get("/categories/products/{slug}", [ClientCategoryController::class, "productsByCategory"]);
Route::get("/categories/fetch/products/{categoryId}/{page}", [ClientCategoryController::class, "fetchProductsByCategory"]);

Route::get("/search/{slug}", [SearchController::class, "index"]);
Route::post("/search", [SearchController::class, "search"]);





