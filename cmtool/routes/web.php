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
 
Route::get('/home', [App\Http\Controllers\PortalPageController::class, 'index'])->middleware('language');
Route::get('/', [App\Http\Controllers\PortalPageController::class, 'index'])->name('home')->middleware('language');

Route::get('setlocale/{locale}',function($lang){
    \Session::put('locale',$lang);
    return redirect()->back();   
});

Route::get('/sites', [App\Http\Controllers\PortalPageController::class, 'viewSitesPage'])->middleware('language');
Route::get('/sites/update/{siteId}', [App\Http\Controllers\PortalPageController::class, 'viewSiteUpdatePage'])->name('viewSiteUpdatePage')->middleware('language');
Route::put('/sites/delete/{siteId}', [App\Http\Controllers\PortalPageController::class, 'deleteSite'])->name('deleteSite')->middleware('language');
Route::get('/sites/create', [App\Http\Controllers\PortalPageController::class, 'viewSiteCreatePage'])->name('viewSiteCreatePage')->middleware('language');
Route::put('/sites/add', [App\Http\Controllers\PortalPageController::class, 'addSite'])->name('addSite')->middleware('language');
Route::put('/sites/update', [App\Http\Controllers\PortalPageController::class, 'updateSite'])->name('updateSite')->middleware('language');

Route::get('/contactLanding', [App\Http\Controllers\PortalPageController::class, 'viewContactLandingPage'])->name('viewContactLandingPage')->middleware('language');

Route::get('/makers', [App\Http\Controllers\PortalPageController::class, 'viewMakersPage'])->name('viewMakersPage')->middleware('language');
Route::get('/makers/update/{makerId}', [App\Http\Controllers\PortalPageController::class, 'viewMakerUpdatePage'])->name('viewMakerUpdatePage')->middleware('language');
Route::put('/makers/delete/{makerId}', [App\Http\Controllers\PortalPageController::class, 'deleteMaker'])->name('deleteMaker')->middleware('language');
Route::put('/makers/update', [App\Http\Controllers\PortalPageController::class, 'updateMaker'])->name('updateMaker')->middleware('language');
Route::get('/makers/create', [App\Http\Controllers\PortalPageController::class, 'viewMakerCreatePage'])->name('viewMakerCreatePage')->middleware('language');
Route::put('/makers/add', [App\Http\Controllers\PortalPageController::class, 'addMaker'])->name('addMaker')->middleware('language');


//Route::get('/contactList', [App\Http\Controllers\PortalPageController::class, 'contactList'])->name('contactList');
Route::get('/customers', [App\Http\Controllers\PortalPageController::class, 'viewCustomerPage'])->name('viewCustomerPage')->middleware('language');
Route::get('/customers/create', [App\Http\Controllers\PortalPageController::class, 'viewAddCustomerPage'])->name('viewAddCustomerPage')->middleware('language');
Route::put('/customers/add', [App\Http\Controllers\PortalPageController::class, 'addCustomer'])->name('addCustomer')->middleware('language');
Route::get('/customers/update/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateCustomerPage'])->name('viewUpdateCustomerPage')->middleware('language');
Route::put('/customers/delete/{customerId}', [App\Http\Controllers\PortalPageController::class, 'deleteCustomer'])->name('deleteCustomer')->middleware('language');
Route::put('/customers/update', [App\Http\Controllers\PortalPageController::class, 'updateCustomer'])->name('updateCustomer')->middleware('language');

Route::get('/admin', [App\Http\Controllers\AdminPageController::class, 'index'])->name('admin');

Route::get('/items/list/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewItemsPage'])->name('viewItemsPage')->middleware('language');
Route::get('/items/delete/{itemId}', [App\Http\Controllers\PortalPageController::class, 'deleteItem'])->name('deleteItem')->middleware('language');
Route::get('/items/{itemId}/info', [App\Http\Controllers\PortalPageController::class, 'viewItemInfoPage'])->name('viewItemInfoPage')->middleware('language');
Route::get('/items/create/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewCreateItemPage'])->name('viewCreateItemPage')->middleware('language');
Route::get('/items/edit/{siteId}/{customerId}/{itemId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateItemPage'])->name('viewUpdateItemPage')->middleware('language');
Route::put('/items/add/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'addItem'])->name('addItem')->middleware('language');
Route::put('/items/update/{siteId}/{customerId}/{itemId}', [App\Http\Controllers\PortalPageController::class, 'updateItem'])->name('updateItem')->middleware('language');

Route::get('/categories', [App\Http\Controllers\PortalPageController::class, 'viewCategoriesPage'])->name('viewCategoriesPage')->middleware('language');
Route::get('/categories/delete/{itemId}', [App\Http\Controllers\PortalPageController::class, 'deleteCategory'])->name('deleteCategory')->middleware('language');
Route::get('/categories/create', [App\Http\Controllers\PortalPageController::class, 'viewCreateCategoryPage'])->name('viewCreateCategoryPage')->middleware('language');
Route::put('/categories/add', [App\Http\Controllers\PortalPageController::class, 'addCategory'])->name('addCategory')->middleware('language');
Route::get('/categories/edit/{categoryId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateCategoryPage'])->name('viewUpdateCategoryPage')->middleware('language');
Route::put('/categories/update/{categoryId}', [App\Http\Controllers\PortalPageController::class, 'updateCategory'])->name('updateCategory')->middleware('language');
