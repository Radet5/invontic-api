<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\GoodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/request-token', [UserController::class, 'requestToken'])->name('request-token');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/organizations/{organization}/invoices', [InvoiceController::class, 'organizationIndex'])->name('api.organization.invoice.index');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('api.invoice.show');
    Route::get('/organizations/{organization}/suppliers', [SupplierController::class, 'organizationIndex'])->name('api.organization.supplier.index');
    Route::get('/organizations/{organization}/invoice-types', [InvoiceController::class, 'organizationInvoiceTypes'])->name('api.organization.invoice-types');
    Route::get('/suppliers/{supplier}/goods', [GoodController::class, 'supplierIndex'])->name('api.supplier.good.index');
    Route::get('/organizations/{organization}/goods-departments', [GoodController::class, 'organizationGoodsDepartments'])->name('api.organization.goods-departments');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
