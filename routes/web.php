<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/getTypes/{id}', [HomeController::class, 'getTypes'])->name('getTypes');

Route::view('/about', 'about')->name('about');
Route::view('/how-order', 'orders/how-order')->name('how-order');

Route::resource('comments', CommentController::class);

Route::get('/stock', [StockController::class, 'stock'])->name('stock.index');
Route::get('/show-stock/{stock}', [StockController::class, 'showStock'])->name('stock.show-stock');

Route::get('/category', [CategoryController::class, 'category'])->name('category.index');
Route::get('/work/{category?}', [WorkController::class, 'showCategory'])->name('work.show');

Route::get('/register', [RegisterController::class, 'register'])->name('register.index');
Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginCheck'])->name('login.check');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [LoginController::class, 'edit'])->name('edit-profile');
    Route::patch('/edit-profile/update-profile', [LoginController::class, 'update'])->name('update-profile');
    Route::get('/edit-password', [LoginController::class, 'editPassword'])->name('edit-password');
    Route::patch('/edit-password/update-password', [LoginController::class, 'updatePassword'])->name('update-password');

    Route::resource('orders', OrderController::class);
    Route::get('/order-history/{order}', [OrderController::class, 'history'])->name('order-history');
    Route::delete('/profile/order/{order}', [OrderController::class, 'destroyProfile'])->name('order.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
    Route::post('/', [\App\Http\Controllers\Admin\LoginController::class, 'loginCheck'])
        ->name('login.check');

    Route::middleware('can:admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\LoginController::class, 'dashboard'])
            ->name('dashboard');
        Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])
            ->name('logout-admin');

        Route::get('/stocks/valid', [StockController::class, 'showValidStock'])->name('stocks.valid');
        Route::resource('stocks', StockController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('works', WorkController::class);
        Route::get('/work/{category?}', [WorkController::class, 'showCategoryAdmin'])->name('work.index');
        Route::post('/work', [WorkController::class, 'showCategoryAdmin'])->name("work.category-admin");

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/user/filter/{role}', [UserController::class, 'userFilter'])->name('user.filter');
        Route::patch('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/all', [UserController::class, 'usersAll'])->name('usersAll');
        Route::get('/users/filter/{role}', [UserController::class, 'usersFilter'])->name('filterUsers');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');

        Route::get('/orders/select', [OrderController::class, 'indexAdminSelect'])->name('orders.index-select');
        Route::get('/orders', [OrderController::class, 'indexAdmin'])->name('orders.index-admin');
        Route::patch('/orders/update/{order}', [OrderController::class, 'update'])->name('update-order');
        Route::get('/orders/edit/{order}', [OrderController::class, 'edit'])->name('order-edit');
        Route::get('/orders/sort', [OrderController::class, 'indexSort'])->name('sort-order');
        Route::get('/orders/getWorks/{category}', [OrderController::class, 'getWorks'])->name('getWorks');
        Route::patch('/orders/endOrder/{order}', [OrderController::class, 'endOrder'])->name('endOrder');
        Route::get('/orders/{order}/detach/{work}/', [OrderController::class, 'detachWorkInOrder'])
            ->name('orders.detachWork');

        Route::get('/comments', [CommentController::class, 'indexAdmin'])->name('comments.index-admin');
        Route::delete('/comments/destroy/{comment}/', [CommentController::class, 'destroyComment'])->name('comments.destroyComment');
        Route::patch('/comments/update/{comment}', [CommentController::class, 'update'])->name('comments.update');
    });
});

