<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/card/add/{id}', 'App\Http\Controllers\CardController@add');
Route::get('/card', 'App\Http\Controllers\CardController@index');


Route::resource('products', ProductsController::class);


Route::get('/', function () {
    return view('welcome');
});