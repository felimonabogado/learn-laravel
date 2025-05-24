<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CateogoryController;

// Homepage Route
Route::view('/', "home");

Route::resource('categories', CateogoryController::class);

/*-------------- Group all the route on the same controller -----------------*/
Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function(){
    Route::get('/', 'index')->name(".index");
    Route::get('/create', 'create')->name("create");
    Route::post('/store', 'store')->name("store");
    Route::get('/{product}', 'show')->name("show");
    Route::get('/{product}/edit', 'edit')->name("edit");
    Route::patch('/{product}', 'update')->name("update");
    Route::delete('/{product}', 'destroy')->name("destroy");
});
/*-------------- End - Group all the route on the same controller -----------------*/


/*-------- To manually Define Routes --------*/

// Route::get('/products', [ProductController::class, "index"])->name("products.index");

// Route::get('/products/create', [ProductController::class, "create"])->name("products.create");

// Route::post('/products/store', [ProductController::class, "store"])->name("products.store");

// // Route Base on ID
// // Route::get('/products/{id}', [ProductController::class, "show"])
// //     ->name("products.show")
// //     ->whereNumber("id", "[0-9]+");

// Route::get('/products/{product}', [ProductController::class, "show"])
//     ->name("products.show");

// Route::get('/products/{product}/edit', [ProductController::class, "edit"])
//     ->name("products.edit");

// Route::patch('/products/{product}', [ProductController::class, "update"])
//     ->name("products.update");

// Route::delete('/products/{product}', [ProductController::class, "destroy"])
//     ->name("products.destroy");

/*-------- End-  To manually Define Routes --------*/