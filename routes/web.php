<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RelatedProductController;
use App\Http\Controllers\PublicwebController;
use App\Http\Controllers\ContactController;

/*
Route::get('/', function () {
    return view('wp-home');
});
*/
Route::get('/', [PublicwebController::class, 'index']);
Route::get('/productos', [ProductController::class, 'allproducts']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('/productos/{category}/{hash}', [ProductController::class, 'getProduct']);

/*Route::get('/unproducto', function () {
    return view('wp-unproducto');
});*/

Auth::routes();


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CATEGORY ROUTES
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{category}/edit', [ CategoryController::class, 'edit' ] );
Route::put('/category/{category}/update', [ CategoryController::class, 'update' ] );
Route::get('/category/{category}/delete', [ CategoryController::class, 'confirm' ] );
Route::delete('/category/{category}/destroy', [ CategoryController::class, 'destroy' ] );

//GALLERY ROUTES
Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/gallery/create', [GalleryController::class, 'create']);
Route::post('/gallery/store', [GalleryController::class, 'store']);
Route::get('/gallery/{gallery}/edit', [ GalleryController::class, 'edit' ] );
Route::put('/gallery/{gallery}/update', [ GalleryController::class, 'update' ] );
Route::get('/gallery/{gallery}/delete', [ GalleryController::class, 'confirm' ] );
Route::delete('/gallery/{gallery}/destroy', [ GalleryController::class, 'destroy' ] );

//IMAGES ROUTES
Route::get('/images/{gallery}/list', [ImageController::class, 'index']);
Route::post('/image/store', [ImageController::class, 'store']);
Route::delete('/image/{image}/destroy', [ImageController::class, 'destroy']);

//MAP ROUTES
Route::get('/maps', [MapController::class, 'index']);
Route::get('/map/create', [MapController::class, 'create']);
Route::post('/map/store', [MapController::class, 'store']);
Route::get('/map/{map}/edit', [ MapController::class, 'edit' ] );
Route::put('/map/{map}/update', [ MapController::class, 'update' ] );
Route::get('/map/{map}/delete', [ MapController::class, 'confirm' ] );
Route::delete('/map/{map}/destroy', [ MapController::class, 'destroy' ] );
Route::get('/map/{map}/points', [ MapController::class, 'getPoints' ] );

//POINTS ROUTES
Route::get('/points/{map}/list', [PointController::class, 'index']);
Route::post('/point/store', [PointController::class, 'store']);
Route::delete('/point/{point}/destroy', [PointController::class, 'destroy']);

/* USER ROUTES */
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/{user}/edit', [ UserController::class, 'edit' ] );
Route::put('/user/{user}/update', [ UserController::class, 'update' ] );
Route::get('/user/{user}/delete', [ UserController::class, 'confirm' ] );
Route::delete('/user/{user}/destroy', [ UserController::class,'destroy' ] );


//TEXTS ROUTES
Route::get('/texts', [TextController::class, 'index']);
Route::get('/text/{text}/edit', [ TextController::class, 'edit' ] );
Route::put('/text/{text}/update', [ TextController::class, 'update' ] );

//PRODUCT ROUTES
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{product}/edit', [ ProductController::class, 'edit' ] );
Route::put('/product/{product}/update', [ ProductController::class, 'update' ] );
Route::get('/product/{product}/delete', [ ProductController::class, 'confirm' ] );
Route::delete('/product/{product}/destroy', [ ProductController::class, 'destroy' ] );

//RELATED PRODUCTS
Route::get('/related-products/{product}/list', [RelatedProductController::class, 'index']);
Route::post('/related-product/store', [RelatedProductController::class, 'store']);
Route::delete('/related-product/{relatedProduct}/destroy', [RelatedProductController::class, 'destroy']);

//PROFILE

Route::get('/user/{user}/profile/edit', [ UserController::class, 'editprofile' ] );
Route::put('/user/{user}/profile/update', [ UserController::class, 'updateprofile' ] );

// Contact form send (AJAX)
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
