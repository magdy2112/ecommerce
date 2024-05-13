<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Register3Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Notadmin;
use App\Http\Middleware\Notuser;
use App\Models\CartItem;
use App\Models\OrderDetail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Traits\HttpResponse;


Route::middleware('auth:sanctum')
    ->group(function () {
        Route::controller(UserController::class)
            ->prefix('users')
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{user}', 'show');
            });

        // route product controller

        Route::controller(ProductController::class)
            ->prefix('product')
            ->group(function () {
                Route::get('/', 'index'); // all products
                Route::get('/{id}', 'show'); // single product
                route::post('store', 'store');   // add a new product to the database (admin)
                route::delete('/{product}', 'destroy'); // delete single products (admin)
                route::put('/{product}', 'update'); // update single products (admin)
                route::patch('/updates', 'updatemany'); // update many products (admin)
                route::delete('/delete', 'destroymany'); // delete many products (admin)
            });

        //route fav controller
        route::controller(FavController::class)->prefix('fav')
            ->group(function () {
                Route::get('/', 'show');
                Route::post('/', 'store');
                Route::delete('/{fav}', 'destroy');
            });
        //route cart item controller
        route::controller(CartItemController::class)->middleware(Notadmin::class)
            ->prefix('cartitem')
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::post('store', 'store');
                Route::put('/{cartItem}', 'update');
                Route::delete('/{cartItem}', 'destroy');
            });
        // discount route
        route::controller(DiscountController::class)
            ->prefix('discount')
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::post('store', 'store');
                Route::put('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });
            // route order_detail
            route::controller(OrderDetailController::class)
           ->prefix('orderdetails')
           ->group(function(){
                route::get('/','index');
            });
            // route product category
            route::controller(ProductCategoryController::class)
            ->prefix('category')
            ->group(function () {
                Route::get('/', 'index'); // all products
                Route::get('/products/{id}', 'product_category'); // single product
                route::post('store', 'store');   // add a new product to the database (admin)
                route::delete('/{id}', 'destroy'); // delete single products (admin)
                route::put('/{id}', 'update'); // update single products (admin)

            });
    });
// register controller
route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth', 'guest')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return response()->json([
        'success' => true,
        'status' => 'ok',
        'status_msg' => 'Verified',


    ]);
})->middleware(['auth', 'signed', 'guest'])->name('verification.verify');

route::controller(LoginController::class)->group(function () {
    Route::post('out', 'logout');
});

route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login')->name('login');
});
