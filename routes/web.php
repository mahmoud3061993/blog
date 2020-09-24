<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
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

Route::middleware('isadmin')->group(function(){
    

    //create
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/save', [PostController::class, 'save']);
   
    //update
    Route::get('/edit/{id}', [PostController::class, 'edit']);
    Route::post('/update/{id}', [PostController::class, 'update']);
    //delete
    Route::get('/delete/{id}', [PostController::class, 'delete']); 
    //people-message
    Route::get('/message', [MessageController::class, 'message']);
    Route::get('message/delete/{id}', [MessageController::class, 'delete']);
    //control admins
    Route::get('/cp',[UserController::class, 'controlAdmin']);
    Route::get('/cp/new',[UserController::class, 'new']);
    Route::post('new/save',[UserController::class, 'newone']);
    Route::get('/cp/delete/{id}',[UserController::class, 'delete']);
    Route::get('/cp/update/{id}',[UserController::class, 'update']);
    Route::post('/cp/update/save/{id}',[UserController::class, 'saveupdate']);

});

Route::middleware('isloggedin')->group(function(){
    Route::get('/', [PostController::class, 'welcome']);
    Route::get('/show/{id}', [PostController::class, 'show']);
    Route::get('/posts', [PostController::class, 'posts']); 
    Route::get('/logout',[UserController::class, 'logout']);
    Route::get('/contact',[MessageController::class, 'contact']);
    Route::post('/contact/save',[MessageController::class, 'save']);
});


//welcome

//register
Route::get('/register', [UserController::class, 'register']);
Route::post('/register/save', [UserController::class, 'save']);

//admin
Route::get('/admin', [UserController::class, 'admin']);
Route::post('/admin/login', [UserController::class, 'login']);

//not auth route 
Route::get('/notauth',function(){
    return 'you dont have permission to visit this link';
});


