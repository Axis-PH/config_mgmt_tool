<?php

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

// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/', function () {
//     return view('pages/main/landing');
// });

// Route::get('/portal', function () {
//     return view('pages/portal/landing');
// });

// Route::get('/management', function () {
//     return view('pages/management/landing');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\PortalPageController::class, 'index'])->name('home');

Route::get('/customerList', [App\Http\Controllers\PortalPageController::class, 'customerList'])->name('customerList');
Route::get('/itemList', [App\Http\Controllers\PortalPageController::class, 'itemList'])->name('itemList');
Route::get('/itemList/{customerId}', [App\Http\Controllers\PortalPageController::class, 'itemListByCustomerId'])->name('itemListByCustomerId');

Route::get('/contactList', [App\Http\Controllers\PortalPageController::class, 'contactList'])->name('contactList');

Route::get('/admin', [App\Http\Controllers\AdminPageController::class, 'index'])->name('admin');
