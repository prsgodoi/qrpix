<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PixController;

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
/*
Route::get('/pix', function () {
    return view('qrcode');
});



Route::get('/test', [PixController::class, 'create']);


Route::get('/download', function () {
    return view('download');
});
Route::post('/download', 'PixController@storeImageHtmlCanvas');
*/

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
