<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db-test', function() {
    if(\Illuminate\Support\Facades\DB::connection()->getDatabaseName()){
       echo "connected sucessfully to database " . \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
    }
 });

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'postLogin'])->name('login');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('index', [PermissionController::class, 'index'])->name('permission.index');

            Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
            Route::post('create', [PermissionController::class, 'store'])->name('permission.store');

            Route::get('show/{id}', [PermissionController::class, 'show'])->name('permission.show');

            Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
            Route::post('update/{id}', [PermissionController::class, 'update'])->name('permission.update');

            Route::get('delete/{id}', [PermissionController::class, 'destroy '])->name('permission.destroy');
        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('index', [RoleController::class, 'index'])->name('role.index');

            Route::get('create', [RoleController::class, 'create'])->name('role.create');
            Route::post('create', [RoleController::class, 'store'])->name('role.store');

            Route::get('show/{id}', [RoleController::class, 'show '])->name('role.show');

            Route::get('edit/{id}', [RoleController::class, 'edit '])->name('role.edit');
            Route::post('update/{id}', [RoleController::class, 'update '])->name('role.update');

            Route::get('delete/{id}', [RoleController::class, 'destroy '])->name('role.destroy');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('index', [UserController::class, 'index'])->name('user.index');

            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::post('create', [UserController::class, 'store'])->name('user.store');

            Route::get('show/{id}', [UserController::class, 'show '])->name('user.show');

            Route::get('edit/{id}', [UserController::class, 'edit '])->name('user.edit');
            Route::post('update/{id}', [UserController::class, 'update '])->name('user.update');

            Route::get('delete/{id}', [UserController::class, 'destroy '])->name('user.destroy');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('index', [CategoryController::class, 'index'])->name('category.index');

            Route::get('create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('create', [CategoryController::class, 'store'])->name('category.store');

            Route::get('show/{id}', [CategoryController::class, 'show '])->name('category.show');

            Route::get('edit/{id}', [CategoryController::class, 'edit '])->name('category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update '])->name('category.update');

            Route::get('delete/{id}', [CategoryController::class, 'destroy '])->name('category.destroy');
        });

        Route::group(['prefix' => 'banners'], function () {
            Route::get('index', [BannerController::class, 'index'])->name('banner.index');

            Route::get('create', [BannerController::class, 'create'])->name('banner.create');
            Route::post('create', [BannerController::class, 'store'])->name('banner.store');

            Route::get('show/{id}', [BannerController::class, 'show '])->name('banner.show');

            Route::get('edit/{id}', [BannerController::class, 'edit '])->name('banner.edit');
            Route::post('update/{id}', [BannerController::class, 'update '])->name('banner.update');

            Route::get('delete/{id}', [BannerController::class, 'destroy '])->name('banner.destroy');
        });

    });
});

