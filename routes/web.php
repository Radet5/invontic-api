<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SiteController;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::delete('/sites/{site}/destroy', [SiteController::class, 'destroy'])->name('admin.site.destroy');

    #########################
    ## Organization Routes ##
    #########################
    Route::get('/organizations', [OrganizationController::class, 'index'])->name('admin.organization.index');
    Route::get('/organizations/create', [OrganizationController::class, 'create'])->name('admin.organization.create');
    Route::post('/organizations/store', [OrganizationController::class, 'store'])->name('admin.organization.store');
    Route::get('/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('admin.organization.edit');
    Route::put('/organizations/{organization}/update', [OrganizationController::class, 'update'])->name('admin.organization.update');
    Route::delete('/organizations/{organization}/destroy', [OrganizationController::class, 'destroy'])->name('admin.organization.destroy');

    Route::get('/organizations/{organization}/users/create', [UserController::class, 'organizationCreate'])->name('admin.organization.user.create');
    Route::post('/organizations/{organization}/users/store', [UserController::class, 'organizationStore'])->name('admin.organization.user.store');
    Route::get('/organizations/{organization}/users/{user}/edit', [UserController::class, 'organizationEdit'])->name('admin.organization.user.edit');
    Route::put('/organizations/{organization}/users/{user}/update', [UserController::class, 'organizationUpdate'])->name('admin.organization.user.update');

    Route::get('/organizations/{organization}/sites/create', [SiteController::class, 'organizationCreate'])->name('admin.organization.site.create');
    Route::post('/organizations/{organization}/sites/store', [SiteController::class, 'organizationStore'])->name('admin.organization.site.store');
    Route::get('/organizations/{organization}/sites/{site}/edit', [SiteController::class, 'organizationEdit'])->name('admin.organization.site.edit');
    Route::put('/organizations/{organization}/sites/{site}/update', [SiteController::class, 'organizationUpdate'])->name('admin.organization.site.update');
});

require __DIR__.'/auth.php';
