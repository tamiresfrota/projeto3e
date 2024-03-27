<?php

use App\Http\Controllers\AssetsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('assets')->middleware(['auth'])->group(function(){
    Route::get('/', [AssetsController::class, 'index'])->name('assets-index');
    Route::get('/create', [AssetsController::class,'create'])->name('assets-create');
    Route::post('/', [AssetsController::class,'store'])->name('assets-store');
    Route::get('/{id}/edit', [AssetsController::class,'edit'])->where('id', '[0-9]+')->name('assets-edit');
    Route::put('/{id}', [AssetsController::class,'update'])->where('id', '[0-9]+')->name('assets-update');
    Route::delete('/{id}', [AssetsController::class,'destroy'])->where('id', '[0-9]+')->name('assets-destroy');


});