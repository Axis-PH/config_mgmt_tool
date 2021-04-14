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


Route::get('/home', [App\Http\Controllers\PortalPageController::class, 'index']);
Route::get('/', [App\Http\Controllers\PortalPageController::class, 'index'])->name('home');

Route::get('/site', [App\Http\Controllers\PortalPageController::class, 'viewSiteListPage'])->name('viewSiteListPage');
Route::get('/site/update/{siteId}', [App\Http\Controllers\PortalPageController::class, 'viewSiteUpdatePage'])->name('viewSiteUpdatePage');
Route::put('/site/delete/{siteId}', [App\Http\Controllers\PortalPageController::class, 'deleteSite'])->name('deleteSite');
Route::get('/site/create', [App\Http\Controllers\PortalPageController::class, 'viewSiteCreatePage'])->name('viewSiteCreatePage');
Route::put('/site/add', [App\Http\Controllers\PortalPageController::class, 'addSite'])->name('addSite');
Route::put('/site/update', [App\Http\Controllers\PortalPageController::class, 'updateSite'])->name('updateSite');

Route::get('/contactLanding', [App\Http\Controllers\PortalPageController::class, 'viewContactLandingPage'])->name('viewContactLandingPage');

Route::get('/maker', [App\Http\Controllers\PortalPageController::class, 'viewMakerListPage'])->name('viewMakerListPage');
Route::get('/maker/update/{makerId}', [App\Http\Controllers\PortalPageController::class, 'viewMakerUpdatePage'])->name('viewMakerUpdatePage');
Route::put('/maker/delete/{makerId}', [App\Http\Controllers\PortalPageController::class, 'deleteMaker'])->name('deleteMaker');
Route::put('/maker/update', [App\Http\Controllers\PortalPageController::class, 'updateMaker'])->name('updateMaker');

Route::get('/itemList', [App\Http\Controllers\PortalPageController::class, 'itemList'])->name('itemList');
Route::get('/itemList/{customerId}', [App\Http\Controllers\PortalPageController::class, 'itemListByCustomerId'])->name('itemListByCustomerId');

Route::get('/contactList', [App\Http\Controllers\PortalPageController::class, 'contactList'])->name('contactList');

Route::get('/admin', [App\Http\Controllers\AdminPageController::class, 'index'])->name('admin');

Route::get('/deleteDevice/{id}', [App\Http\Controllers\PortalPageController::class, 'deleteDevice'])->name('deleteDevice');
Route::get('/createDevice', [App\Http\Controllers\PortalPageController::class, 'createDevice'])->name('createDevice');
Route::get('/editDevice/{id}', [App\Http\Controllers\PortalPageController::class, 'editDevice'])->name('editDevice');
Route::get('/displayDevice/{id}', [App\Http\Controllers\PortalPageController::class, 'displayDevice'])->name('displayDevice');

Route::put('/addDevice', 'PortalPageController@addDevice');
Route::put('/updateDevice/{id}', 'PortalPageController@updateDevice');