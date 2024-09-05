<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth.custom'])->group(function () {

    Route::post('/comments/{product}', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/toggle-visibility', [CommentController::class, 'toggleVisibility']);
    Route::post('/replies/{comment}', [ReplyController::class, 'store']);
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
});

Route::resource('orders', OrderController::class);

Route::post('comments/{product}', [CommentController::class, 'store'])->name('comments.store');
Route::post('comments/{comment}/toggle-visibility', [CommentController::class, 'toggleVisibility'])->name('comments.toggleVisibility');

Route::post('replies/{comment}', [ReplyController::class, 'store'])->name('replies.store');

Route::post('likes', [LikeController::class, 'store'])->name('likes.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('Abrar');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.r');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/1', function () {
    return view('dashboard');
});

Route::get('/2', function () {
    return view('pproprty');
});

Route::get('/login', function () {
    return view('login');
});
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/single', [ProductController::class, 'single'])->name('single');

//Route::get('/single', function () {
//    return view('single');
//});

Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->middleware('auth')->name('products.order');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/property/{product}', [ProductController::class, 'show'])->name('property.show');

//profile

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
