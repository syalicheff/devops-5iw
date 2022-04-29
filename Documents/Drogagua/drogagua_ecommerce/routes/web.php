<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [MainController::class,'index']); 

Route::get('/produit/{id}',[MainController::class,'produit']); 

Route::get('/categories{id}',[MainController::class,'theCategories']);
Route::get('/categories',[MainController::class,'theCategories']);

require __DIR__.'/auth.php';
