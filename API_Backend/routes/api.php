<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NotifieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SetupStoreController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\User_addressController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cityController;
use App\Models\store;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller(cityController::class)
//     ->prefix('v1/')
//     ->group(function () {
//         Route::get('cities', 'index');
//     });

Route::prefix('v1')->group(function() {
    Route::get('cities', [ProvinceController::class, 'index']);
    Route::get('district/{id}', [DistrictController::class, 'getDistrictByCityId']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('getEmailBystoreid', [RegisterController::class, 'getEmailBystoreid']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgotPassword', [AuthController::class, 'forgotPassword']);
    Route::put('resetPassword', [AuthController::class, 'resetPassword']);
    Route::post('checkExistToken', [AuthController::class, 'checkExistToken']);
    Route::get('categories', [CategoryController::class, 'Categories']);
    Route::get('ProductOutstanding', [ProductController::class, 'ProductOutstanding']);
    Route::get('ProductSale', [ProductController::class, 'ProductSale']);
    Route::get('ProductSuggest', [ProductController::class, 'ProductSuggest']);
    Route::get('getProductbyslug/{slug}', [ProductController::class, 'getProductbyslug']);
    Route::get('getImagebyid/{id}', [ProductController::class, 'getImagebyid']);
    Route::get('getProductbyid/{id}', [ProductController::class, 'getProductbyid']);
    Route::get('getProducCartbyid/{id}', [ProductController::class, 'getProducCarttbyid']);
    Route::get('getStoreByid/{id}', [ProductController::class, 'getStoreByid']);
    Route::get('getfullProduct', [ProductController::class, 'getfullProduct']);
    Route::get('search', [ProductController::class, 'search']);
    Route::get('getInfostore/{id}', [storeController::class, 'getInfostore']);
    Route::get('getUserbyId/{id}', [UserController::class, 'getUser']);
    Route::get('getAllUser', [UserController::class, 'getAllUser']);
    Route::get('getProductByCategoriesId/{id}', [ProductController::class, 'getProductByCategoriesId']);



    Route::get('Allproduct/{id}', [ProductController::class, 'Allproduct']);
//    Route::get('createProduct', [ProductController::class, 'createProduct']);
    Route::get('getProductVariantByid/{id}', [ProductVariantController::class, 'getProductVariantByid']);
    Route::post('informationStore', [SetupStoreController::class, 'informationStore']);
//    Route::get('getNotifie', [NotifieController::class, 'getNotifie']);
    Route::get('getComment', [CommentController::class, 'getComment']);

});

Route::middleware('auth:sanctum')->prefix('v1/')->group(function () {
    Route::get('getNotifie', [NotifieController::class, 'getNotifie']);
    Route::post('setupStore', [ProductController::class, 'setupStore']);
    Route::post('createProduct', [ProductController::class, 'createProduct']);
    Route::post('drafcreateProduct', [ProductController::class, 'drafcreateProduct']);
    Route::get('ProductEdit/{id}', [ProductController::class, 'edit']);
    Route::get('getImages/{id}', [ProductController::class, 'getImages']);
    Route::get('getVariants/{id}', [ProductController::class, 'getVariants']);
    Route::get('compareImage/{id}', [ProductController::class, 'compareImage']);
    Route::post('updatePublished', [ProductController::class, 'updatePublished']);
    Route::post('addProductbyCart', [CartController::class, 'addProductbyCart']);
    Route::get('getCartbyId/{id}', [CartController::class, 'getCartbyId']);
    Route::delete('delete/{sku}', [CartController::class, 'detroy']);
    Route::post('addAddress', [User_addressController::class, 'addAddress']);
    Route::get('GetUserAddressByid/{id}', [User_addressController::class, 'GetUserAddressByid']);
    Route::get('GetIdAddressByUserid/{id}', [User_addressController::class, 'GetIdAddressByUserid']);
    Route::post('CreateOrder', [OrderController::class, 'CreateOrder']);
    Route::get('getAllDelivery', [DeliveryController::class, 'getAll']);
    Route::get('getCostById/{id}', [DeliveryController::class, 'getCostById']);
});


