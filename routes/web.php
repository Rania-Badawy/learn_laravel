<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
// Route::get('/',[CategoryController::class,"all"]);
// Route::get('/categories/add',[CategoryController::class,"add"]);
// Route::post('/categories/insert',[CategoryController::class,"insert"]);
// Route::get('/categories/edit/{id}',[CategoryController::class,"edit"]);
// Route::post('/categories/update/{id}',[CategoryController::class,"update"]);
// Route::get('/categories/delete/{id}',[CategoryController::class,"delete"]);

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories',"all");
    Route::get('/categories/add',"add");
    Route::post('/categories/insert',"insert");
    Route::get('/categories/edit/{id}',"edit");
    Route::post('/categories/update/{id}',"update");
    Route::get('/categories/delete/{id}',"delete");
});

Route::controller(BookController::class)->group(function(){
    Route::get('/books',"all");
    Route::get('/books/add',"add");
    Route::post('/books/insert',"insert");
    Route::get('/books/edit/{id}',"edit");
    Route::post('/books/update/{id}',"update");
    Route::get('/books/delete/{id}',"delete");
});

Route::controller(UserController::class)->group(function(){
    Route::middleware("guest")->group(function(){

        Route::get('/register',"register");
        Route::post('/addRegister',"addRegister");
        Route::get('/login',"login")->name('login');
        Route::post('/checkLogin',"checkLogin");
    });
    Route::get('/logout',"logout")->middleware('auth');
    Route::get('/allUsers',"allUsers")->middleware('IsAdmin');
});



