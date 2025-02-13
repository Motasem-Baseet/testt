<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;







Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){


Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');;


Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

Route::get('users', [App\Http\Controllers\Admin\usersController::class, 'index']);
Route::get('users/{user_id}', [App\Http\Controllers\Admin\usersController::class, 'edit']);
Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\usersController::class, 'update']);
Route::get('delete-user/{user_id}', [App\Http\Controllers\Admin\usersController::class, 'delete']);




Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');;

Route::get('add-products', [App\Http\Controllers\Admin\ProductController::class, 'create']);
Route::post('add-products', [App\Http\Controllers\Admin\ProductController::class, 'store']);

Route::get('edit-products/{products_id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);

Route::get('show-products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.show');


Route::put('update-products/{products_id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');

// Route::get('delete-products/{products_id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);


Route::delete('delete-products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);


Route::resource('rentals', App\Http\Controllers\Admin\RentalController::class);


});

Route::prefix('main')->group(function () {

    // Public routes (no login required)
    Route::get('/index', [App\Http\Controllers\Main\MainController::class, 'index']);
    Route::get('/products', [App\Http\Controllers\Main\ProductsController::class, 'index'])->name('products.index');
    Route::get('/about-us', [App\Http\Controllers\Main\AboutUsController::class, 'index']);
    Route::get('/services', [App\Http\Controllers\Main\servicesController::class, 'index']);
    Route::get('/faq', [App\Http\Controllers\Main\FaqController::class, 'index']);

    Route::get('login', [App\Http\Controllers\Main\LoginController::class, 'index']);
    Route::get('/forgetPass', [App\Http\Controllers\Main\ForgetPassController::class, 'index']);
    Route::get('register', [App\Http\Controllers\Main\RegisterController::class, 'index']);
    Route::get('contactUs', [App\Http\Controllers\Main\ContactUsController::class, 'index']);
    Route::get('/single-product/{id}', [App\Http\Controllers\singleProductcontoller::class, 'index'])->name('singleProduct.index');
    Route::post('/single-product/{id}', [App\Http\Controllers\singleProductcontoller::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\Main\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [App\Http\Controllers\Main\CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{id}', [App\Http\Controllers\Main\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [App\Http\Controllers\Main\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{receiverId}', [App\Http\Controllers\MessageController::class, 'fetchMessages'])->name('messages.fetch');
    Route::get('/search', [App\Http\Controllers\Main\ProductsController::class, 'search'])->name('products.search');
    Route::get('/contact', function() {
        return view('main.indexPage');
    })->name('contact');
    Route::post('/contact', [App\Http\Controllers\Main\ContactController::class, 'submit'])->name('contact.submit');

    // Authenticated route for checkout
    Route::middleware(['auth'])->group(function () {
        Route::get('/checkout', [App\Http\Controllers\Main\CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/process', [App\Http\Controllers\Main\CheckoutController::class, 'processCheckout'])->name('checkout.process');
        Route::get('/dashboard', [App\Http\Controllers\Main\dashboardController::class, 'index']);
    Route::get('/profile-post', [App\Http\Controllers\Main\ProfilepostController::class, 'index']);
    Route::get('/profile-payment', [App\Http\Controllers\Main\ProfilePaymentController::class, 'index']);
    Route::get('/profile-favorite', [App\Http\Controllers\Main\ProfileFavoriteController::class, 'index']);
    Route::get('/profile-privatSetting', [App\Http\Controllers\Main\ProfilePrivateSettingController::class, 'index']);
    Route::match(['get', 'post'], '/profile-setting', [App\Http\Controllers\Main\DashSettingController::class, 'handleRequest'])->name('main.dashsettingPage');
    Route::get('/profile-messages', [App\Http\Controllers\Main\ProfileMessageController::class, 'index']);

    Route::put('/profile/update', [App\Http\Controllers\Main\DashSettingController::class, 'updateProfile'])->name('user.updateProfile');

    });

});
