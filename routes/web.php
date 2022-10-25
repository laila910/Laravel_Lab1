<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
// use Auth\LoginController;
Route::get('/',function(){
    return view('welcome');
});
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
// Show all posts
Route::get('/posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');

// create new post
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware(['auth']);

// store new post
Route::post('/posts',[PostController::class,'store'])->name('posts.store');

// show data of post
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');

// Edit new Post
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
// Route::resource('posts', 'PostController');

// Update New Post
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');

// Delete New Post
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');//{{route(name of route)}} in blade

Route::get('post/restore/one/{id}', [PostController::class, 'restore'])->name('post.restore')->middleware('auth');

Route::get('post/restore_all', [PostController::class, 'restore_all'])->name('post.restore_all')->middleware('auth');
// store new Comment
Route::post('/comments',[CommentController::class,'store'])->name('comments.store')->middleware('auth');
// Edit new Comment
Route::get('comments/{comment}/edit',[CommentController::class,'edit'])->name('comments.edit')->middleware('auth');
// Update New Comment
Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comments.update')->middleware('auth');
// Delete New Comment
Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy')->middleware('auth');//{{route(name of route)}} in blade


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/logout', [Auth\LoginController::class,'logout'])->name('logout');

