<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AutismCareController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ArtistController;

use App\Http\Controllers\TrackController;
use App\Http\Controllers\AlbumController;
use App\Models\Category;


Route::get('/', [ServiceController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');;
Route::get('/about', function () {
    
    $categories = Category::all();
    return view('about', ['categories' => $categories]);
})->name('about');;



//Route::get('/products', [ProductController::class, 'index'])->name('products');



Route::get('/logout', function () {
Auth::logout();
return redirect('/'); // Or wherever you want to redirect after logout
})->name('logout');





Route::get('/autism-care', [AutismCareController::class, 'index'])->name('autism.index');
Route::get('/autism-care/{id}', [AutismCareController::class, 'show'])->name('autism.show');
Route::get('/services', [ServiceController::class, 'index'])->name('services');



//Route::resource('users', UserController::class);
Route::get('/services/{category}', [ServiceController::class, 'show'])->name('services.show');
//Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);
Route::resource('order_items', OrderItemController::class);
Route::resource('contacts', ContactController::class);
Route::resource('tracks', TrackController::class);
Route::resource('albums', AlbumController::class);
Route::resource('artists', ArtistController::class);
// routes/web.php
    Route::middleware([AdminMiddleware::class])->group(function () {
        // Protected routes
       });

Route::get('/categories/{category}/products', [ProductController::class, 'showAll'])->name('categories.products.show_all');
Route::get('/categories/{category}/services', [ProductController::class, 'showAll'])->name('categories.services.show_all');
    

// Public routes (outside the middleware group)
Route::get('/public-route', function () { /* ... */ });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
