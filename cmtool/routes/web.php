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

Auth::routes();


Route::get('/home', [App\Http\Controllers\PortalPageController::class, 'index']);
Route::get('/', [App\Http\Controllers\PortalPageController::class, 'index'])->name('home')->middleware('language');

Route::get('setlocale/{locale}',function($lang){
    \Session::put('locale',$lang);
    return redirect()->back();   
});

Route::get('/sites', [App\Http\Controllers\PortalPageController::class, 'viewSitesPage'])->middleware('language');
Route::get('/sites/update/{siteId}', [App\Http\Controllers\PortalPageController::class, 'viewSiteUpdatePage'])->name('viewSiteUpdatePage')->middleware('language');
Route::put('/sites/delete/{siteId}', [App\Http\Controllers\PortalPageController::class, 'deleteSite'])->name('deleteSite');
Route::get('/sites/create', [App\Http\Controllers\PortalPageController::class, 'viewSiteCreatePage'])->name('viewSiteCreatePage');
Route::put('/sites/add', [App\Http\Controllers\PortalPageController::class, 'addSite'])->name('addSite');
Route::put('/sites/update', [App\Http\Controllers\PortalPageController::class, 'updateSite'])->name('updateSite');

Route::get('/contactLanding', [App\Http\Controllers\PortalPageController::class, 'viewContactLandingPage'])->name('viewContactLandingPage');

Route::get('/makers', [App\Http\Controllers\PortalPageController::class, 'viewMakerListPage'])->name('viewMakerListPage');
Route::get('/makers/update/{makerId}', [App\Http\Controllers\PortalPageController::class, 'viewMakerUpdatePage'])->name('viewMakerUpdatePage');
Route::put('/makers/delete/{makerId}', [App\Http\Controllers\PortalPageController::class, 'deleteMaker'])->name('deleteMaker');
Route::put('/makers/update', [App\Http\Controllers\PortalPageController::class, 'updateMaker'])->name('updateMaker');
Route::get('/makers/create', [App\Http\Controllers\PortalPageController::class, 'viewMakerCreatePage'])->name('viewMakerCreatePage');
Route::put('/makers/add', [App\Http\Controllers\PortalPageController::class, 'addMaker'])->name('addMaker');


Route::get('/itemList', [App\Http\Controllers\PortalPageController::class, 'itemList'])->name('itemList');
Route::get('/itemList/{customerId}', [App\Http\Controllers\PortalPageController::class, 'itemListByCustomerId'])->name('itemListByCustomerId');

Route::get('/contactList', [App\Http\Controllers\PortalPageController::class, 'contactList'])->name('contactList');

Route::get('/admin', [App\Http\Controllers\AdminPageController::class, 'index'])->name('admin');


