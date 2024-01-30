<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\HomeController;
use App\Http\Controllers\admins\PostsController;
use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\clients\HomeClientController;
use App\Http\Controllers\clients\DetailClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\clients\CommentController;

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
Route::prefix('admin')->middleware('admin.author') -> name('admins.')-> group(function() {

    // home
    Route::get('/', [HomeController::class, 'index'])->name('index');

    //posts
    Route::prefix('/posts') -> name('posts.')-> group(function() {

        Route::get('/', [PostsController::class, 'index'])->name('posts');

        Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('detailPosts');

        Route::get('addPosts', [PostsController::class, 'addPosts'])->name('addPosts');

        Route::post('addPostsPost', [PostsController::class, 'addPostsPost'])->name('addPostsPost');

        Route::post('/deletePosts', [PostsController::class, 'deletePosts'])->name('deletePosts');

        Route::get('/updatePosts/{id}', [PostsController::class, 'updatePosts'])->name('updatePosts');

        Route::post('/updatePostsPost', [PostsController::class, 'updatePostsPost'])->name('updatePostsPost');
    });

    //users
    Route::prefix('/users') -> name('users.')-> group(function() {

        Route::get('/', [UserController::class, 'index'])->name('user');

        Route::post('/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');


    });

});

Route::get('/', [HomeClientController::class, 'index'])->name('/');

Route::prefix('/client') -> name('clients.')-> group(function() {

    Route::get('/detail/{id}', [DetailClientController::class, 'detail'])->name('detail');

});

Route::get('/login', [LoginController::class,'login'])->name("login");

Route::post('/login', [LoginController::class,'loginPost']);

Route::get('/logout', [LogoutController::class,'logout'])->name('logout');

Route::get('/ForgotPassword', [ForgotPasswordController::class, 'index']) ->name('forgotPassword');

Route::post('/ForgotPassword', [ForgotPasswordController::class, 'sendMail']);

Route::get('/ChangePassword/{id}', [ForgotPasswordController::class, 'changePassword'])->name('ChangePassword');

Route::post('/ChangePassword', [ForgotPasswordController::class, 'changePasswordPost'])->name('ChangePasswordPost');

Route::post('/AddComment', [CommentController::class,'addComment']) -> name('AddComment');

