<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');


Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/add/product', [ProductController::class, 'create'])->name('add.product');
    Route::post('/store/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/update/product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/delete/product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
    Route::get('/manage/product', [ProductController::class, 'index'])->name('manage.product');
});

require __DIR__.'/auth.php';
