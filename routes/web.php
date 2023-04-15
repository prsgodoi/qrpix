<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PixController;
use App\Http\Controllers\BancoController;

use App\Http\Controllers\LinkController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download', function () {
    return view('download');
});
Route::post('download', [PixController::class, 'base64'])->name('base64');

Route::group([
    'prefix' => '/banco',
    'as' => 'banco.',
], function () {
    Route::get('/', [BancoController::class, 'index'])->name('index');
    Route::post('store', [BancoController::class, 'store'])->name('store');
});


Route::group([
    'prefix' => '/pix',
    'as' => 'pix.',
], function () {
    Route::get('/', [PixController::class, 'index'])->name('index');
    Route::post('store', [PixController::class, 'store'])->name('store');
    //
    Route::get('qrcode/{id}',[PixController::class, 'show'])->name('show');
    Route::get('qrcode/{id}/download',[PixController::class, 'download'])->name('download');



});

Route::get('/l/{short_link}', [LinkController::class, 'redirect'])->name('redirect');
Route::post('/link/compartilhar', [LinkController::class, 'store'])->name('link.store');

//
Route::get('checkout/v1/payment/redirect/{id}',[LinkController::class, 'show'])->name('show');
