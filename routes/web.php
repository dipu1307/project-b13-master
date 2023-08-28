<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelReportController;


/*
|--------------------------------------------------------------------------
|Route --- Middleware  --- Controller  -- View
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [DashboardController::class, 'showDashboard'])->middleware('auth');

Route::prefix('products')->group(function(){
    Route::get('/index', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('product_store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product_update');
});

Route::prefix('categories')->group(function () {    
    Route::get('/index', [CategoryController::class, 'index'])->name('category_index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category_create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category_show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category_update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category_delete');

    // soft deletes routes 

    Route::get('/trash-items', [CategoryController::class, 'trashList'])->name('category_trashed');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category_restore');

    Route::get('/category_pdf', [PdfController::class, 'categoryReport'])->name('category_pdf');

    Route::get('category/export/', [ExcelReportController::class, 'export'])->name('category_excel');

});

Route::get('/users', [UserController::class, 'index'])->name('user_index');





require __DIR__.'/auth.php';


//  product 
//  category select

