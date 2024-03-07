<?php

use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CategoryController::class,"all"]);
Route::get('/categories/add',[CategoryController::class,"add"]);
Route::post('/categories/insert',[CategoryController::class,"insert"]);
Route::get('/categories/edit/{id}',[CategoryController::class,"edit"]);
Route::post('/categories/update/{id}',[CategoryController::class,"update"]);
Route::get('/categories/delete/{id}',[CategoryController::class,"delete"]);

