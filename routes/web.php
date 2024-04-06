<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// In your routes/web.php file
Route::group(['middleware' => 'web'], function () {
    // Your login routes go here
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    

   
});

 
 
Route::group(['middleware' => 'auth'], function () {

	Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/products/import', [ProductController::class, 'import'])->name('product.import');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



