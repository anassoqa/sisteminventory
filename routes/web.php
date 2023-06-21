<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GrnController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/create_pro',[PostController::class,'create_pro']);
Route::get('/pro',[PostController::class,'pro'])->name('pro');
Route::get('/grn',[Postcontroller::class,'grn'])->name('grn');
Route::get('/grn_report',[Postcontroller::class,'grn_report'])->name('grn_report');
Route::get('/shipment_list',[Postcontroller::class,'shipment_list'])->name('shipment_list');
Route::get('/po',[Postcontroller::class,'po'])->name('po');
Route::post('po',[Postcontroller::class,'store1']);
Route::get('/sin',[Postcontroller::class,'sin']);

Route::group(['prefix'=> 'transaksi','as' => 'transaksi.'],function(){
Route::get('',[TransaksiController::class, 'index'])->name('index');
Route::get('create',[TransaksiController::class, 'create'])->name('create');
Route::get('store',[TransaksiController::class, 'store'])->name('store');
Route::delete('destroy/{id}',[TransaksiController::class, 'destroy'])->name('destroy');

});

Route::get('/post_sin',[PostController::class,'post_sin'])->name('post_sin');

Route::get('/',[Postcontroller::class,'dashboard']);
Route::post('/store',[PostController::class,'store'])->name('store');

Route::post('/store1',[PostController::class,'store1'])->name('store1');

Route::get('/shipment',[PostController::class,'shipment'])->name('shipment');
Route::post('/payment',[PostController::class,'payment'])->name('payment');
Route::post('/store_payment',[PostController::class,'store_payment'])->name('store_payment');
Route::post('/layout',[PostController::class,'main.layout'])->name('layout');

Route::post('/storepo',[PostController::class,'storepo'])->name('storepo');

Route::post('/store_grn',[PostController::class,'store_grn'])->name('store_grn');

Route::post('/post_grn',[PostController::class,'post_grn'])->name('post_grn');

Route::get('/stock',[Postcontroller::class,'stock'])->name('stock');