<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SIAController;

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

Route::get('/sia/', [
    SIAController::class,
    'index',
])->middleware(['auth'])->name('sia');

Route::get('/sia/view/{id}', [
    SIAController::class,
    'show'
])->middleware(['auth']);

Route::get('/sia/pdf', function () {
    return view('sia.pdf');
})->middleware(['auth']);

//Route::get('/sia/view/{id}', function () {
//    return view('sia.view');
//})->middleware(['auth']);


require __DIR__.'/auth.php';
