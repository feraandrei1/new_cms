<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Models\PostController;
use App\Models\Post;

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

    // ASTA ESTE MAIN PENTRU LOGIN SHIT - http://127.0.0.1:8000/home
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //
    //
    //

    // ASTA ESTE CA ATUNCI CAND DAI LOGOUT SA DEA REDIRECT UNDE TREBUIE
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    //
    //
    //

    // ASTA ESTE PENTRU POSTARE - http://127.0.0.1:8000/post
    Route::get('/post/{post}', [App\Models\PostController::class, 'show'])->name('post');

    //
    //
    //

    Route::middleware('auth')->group(function(){
        // ASTA ESTE PENTRU ADMIN - http://127.0.0.1:8000/admin
        Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    });

    //
    //
    //

    //
    //
    //

    //
    //
    //

    // POSTS
    // POSTS
    // POSTS

    // ASTA ESTE SA VEZI FULL POSTARILE DIN ADMIN - http://127.0.0.1:8000/admin/posts/index
    Route::get('/admin/posts/index', [App\Models\PostController::class, 'index'])->name('post.index');

    // ASTA ESTE PENTRU POSTARE - http://127.0.0.1:8000/admin/posts/create
    Route::get('/admin/posts/create', [App\Models\PostController::class, 'create'])->name('post.create');

    // ASTA ESTE PENTRU ADMIN POSTS DIRECTORY - http://127.0.0.1:8000//admin/posts/
    Route::post('/admin/posts/', [App\Models\PostController::class, 'store'])->name('post.store');

    // ASTA ESTE SA STERGI POSTAREA DIN ADMIN - http://127.0.0.1:8000/admin/posts/3/destroy_post
    Route::delete('/admin/posts/{post}/destroy_post', [App\Models\PostController::class, 'destroy_post'])->name('post.destroy_post');

    // ASTA ESTE SA EDITEZI POSTAREA DIN ADMIN 2 - http://127.0.0.1:8000/admin/posts/3/update_post
    Route::patch('/admin/posts/{post}/update_post', [App\Models\PostController::class, 'update_post'])->name('post.update_post');

    // ASTA ESTE SA EDITEZI POSTAREA DIN ADMIN - http://127.0.0.1:8000/admin/posts/3/edit_post
    Route::get('/admin/posts/{post}/edit_post', [App\Models\PostController::class, 'edit_post'])->name('post.edit_post');

    //
    //
    //

    //
    //
    //

    //
    //
    //

    // USERS
    // USERS
    // USERS

    // ASTA ESTE SA ITI UPDATEZE PROFILUL LA USER - ADMINUL LOGAT - http://127.0.0.1:8000/admin/users/3/update
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    // ASTA ESTE SA DAI DELETE LA USERI - http://127.0.0.1:8000/admin/users/3/destroy_user
    Route::delete('/admin/users/{user}/destroy_user', [App\Http\Controllers\UserController::class, 'destroy_user'])->name('user.destroy_user');

    Route::middleware(['role:admin', 'auth'])->group(function(){
        // ASTA ESTE SA VEZI TOTI USERII - http://127.0.0.1:8000/admin/users/
        Route::get('/admin/users/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

        // ASTA ESTE SA DAI ATTACH LA ROLURI DIN USER PROFILE - http://127.0.0.1:8000/admin/users/3/attach
        Route::put('/admin/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');

        // ASTA ESTE SA DAI ATTACH LA ROLURI DIN USER PROFILE - http://127.0.0.1:8000/admin/users/3/detach
        Route::put('/admin/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
    });

    Route::middleware(['can:view,user'])->group(function(){
        // ASTA ESTE SA ITI AFISEZE PROFILUL LA USER - ADMINUL LOGAT - http://127.0.0.1:8000/admin/users/21/profile
        Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    });

    // ASTA ESTE SA CREEZI USER - http://127.0.0.1:8000/admin/users/create
    Route::get('/admin/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');

    // ASTA ESTE SA CREEZI USER 2 - http://127.0.0.1:8000//admin/users/
    Route::post('/admin/users/', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

    // ASTA ESTE SA EDITEZI USERUL DIN ADMIN - http://127.0.0.1:8000/admin/users/3/edit_user
    Route::get('/admin/users/{user}/edit_user', [App\Http\Controllers\UserController::class, 'edit_user'])->name('user.edit_user');

    // ASTA ESTE SA EDITEZI USERUL DIN ADMIN 2 - http://127.0.0.1:8000/admin/users/3/update_user
    Route::patch('/admin/users/{user}/update_user', [App\Http\Controllers\UserController::class, 'update_user'])->name('user.update_user');

    //
    //
    //

    //
    //
    //

    //
    //
    //

    // CATEGORIES

    // ASTA ESTE PENTRU CATEGORII - http://127.0.0.1:8000/categories/html
    Route::get('/categories/html', [App\Http\Controllers\HomeController::class, 'html'])->name('html');

    // ASTA ESTE PENTRU CATEGORII - http://127.0.0.1:8000/categories/php
    Route::get('/categories/php', [App\Http\Controllers\HomeController::class, 'php'])->name('php');

    // ASTA ESTE PENTRU CATEGORII - http://127.0.0.1:8000/categories/javascript
    Route::get('/categories/javascript', [App\Http\Controllers\HomeController::class, 'javascript'])->name('javascript');

    //
    //
    //

    //
    //
    //

    //
    //
    //

    // COMMENTS

    Route::get('/admin/comments', [App\Http\Controllers\PostCommentController::class, 'index'])->name('comments.index');

    Route::post('/admin/comments', [App\Http\Controllers\PostCommentController::class, 'store'])->name('comments.store');

    Route::delete('/admin/comments/{comment}/delete', [App\Http\Controllers\PostCommentController::class, 'delete'])->name('comments.delete');