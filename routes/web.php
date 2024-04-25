<?php

use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\postLikeController;
use App\Http\Controllers\userPostController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\registerController;


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







 

//Route::get('/posts', function () {
///
 ///   return view('posts.index');

 
//});


Route::get('/', function (){

    return view('home');
    
    })->name('home');


Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store']);


Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');



Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'store']);

Route::post('/logout', [logoutController::class, 'store'])->name('logoutStore');
 



Route::get('/posts', [postController::class, 'index'])->name('posts');
Route::post('/posts', [postController::class, 'store']);
Route::get('/posts/{post}', [postController::class, 'show'])->name('posts.show');

Route::delete('/posts/{post}', [postController::class, 'destroy'])->name('posts.destroy');



Route::post('/posts/{post}/likes', [postLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [postLikeController::class, 'destroy'])->name('posts.likes');



//route model biding
Route::get('/users/{user:username}/posts', [userPostController::class, 'index'])->name('users.posts');



route::get('/portfolio-details', function (){
    
    return view('portfolio-details');
    
    }); 

      

route::get('/otega', function (){

    return view('otega');
    
    });
    
    
    

