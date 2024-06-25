<?php

use App\Models\CategoryPermission;
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
use App\Http\Controllers\admins\PermissionController;
use Illuminate\Database\Eloquent\SoftDeletes;

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
Route::prefix('admin')->middleware(['admin.author','checkStatus']) -> name('admins.')-> group(function() {

    // home
    Route::get('/', [HomeController::class, 'index'])->name('index');

    //posts
    Route::prefix('/posts') -> name('posts.')-> group(function() {

        Route::get('/', [PostsController::class, 'index'])->name('posts');

        Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('detailPosts');

        Route::get('addPosts', [PostsController::class, 'addPosts'])->name('addPosts');

        Route::post('addPostsPost', [PostsController::class, 'addPostsPost'])->name('addPostsPost');

        Route::post('/deletePosts', [PostsController::class, 'deletePosts'])->name('deletePosts');

        Route::get('/updatePosts', [PostsController::class, 'updatePosts'])->name('updatePosts');

        Route::post('/updatePostsPost', [PostsController::class, 'updatePostsPost'])->name('updatePostsPost');
    });

    //users
    Route::prefix('/users') -> name('users.')-> group(function() {

        Route::get('/', [UserController::class, 'index'])->name('user');

        Route::post('/changeStatus', [UserController::class, 'changeStatus'])->name('changeStatus');

        Route::post('/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');

        Route::get('/addUser', [UserController::class, 'addUser'])->name('addUser');

        Route::post('/addUser', [UserController::class, 'addUserPost']);

        Route::get('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');

        Route::post('/updateUser/{id}', [UserController::class, 'updateUserPost']);
    });

    Route::prefix('/permission') -> name('permissions.')-> group(function() {

        Route::get('/', [PermissionController::class, 'index'])->name('permissions');

        Route::get('/addCategoryPermission', [PermissionController::class, 'addCategoryPermission'])->name('addCategoryPermission');

        Route::post('/addCategoryPermission', [PermissionController::class, 'addCategoryPermissionPost']);

        Route::get('/addPermission/{id}', [PermissionController::class, 'addPermission'])->name('addPermission');

        Route::post('/addPermission/{id}', [PermissionController::class, 'addPermissionPost']);

        Route::post('/deletedPermission', [PermissionController::class, 'deletedPermission'])->name('deletedPermission');

        Route::get('/updatePermission/{id}', [PermissionController::class, 'updatePermission'])->name('updatePermission');

        Route::post('/updatePermission/{id}', [PermissionController::class, 'updatePermissionPost']);

    });

});
Route::prefix('/')->middleware('checkStatus')-> group(function() {
    Route::get('/', [HomeClientController::class, 'index'])->name('/');

    Route::prefix('/client')->name('clients.')->group(function () {

        Route::get('/detail/{id}', [DetailClientController::class, 'detail'])->name('detail');

    });

    Route::get('/login', [LoginController::class, 'login'])->middleware('login')->name("login");

    Route::post('/login', [LoginController::class, 'loginPost'])->middleware('login');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/ForgotPassword', [ForgotPasswordController::class, 'index'])->middleware('login')->name('forgotPassword');

    Route::post('/ForgotPassword', [ForgotPasswordController::class, 'sendMail'])->middleware('login');

    Route::get('/ChangePassword/{id}/{token}', [ForgotPasswordController::class, 'changePassword'])->middleware('login')->name('ChangePassword');

    Route::post('/ChangePassword/{id}/{token}', [ForgotPasswordController::class, 'changePasswordPost'])->middleware('login');

    Route::post('/AddComment', [CommentController::class, 'addComment'])->name('AddComment');

    Route::post('/DeleteComment', [CommentController::class, 'deleteComment'])->name('DeleteComment');
});

Route::get('/test',function () {
    $categoryPermissionIdUser = CategoryPermission::where('code','show')->first()->category_permission_id;
    dd($categoryPermissionIdUser);
});
