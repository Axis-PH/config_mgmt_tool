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
Route::get('/', [App\Http\Controllers\PortalPageController::class, 'index'])->name('home');

Route::get('/sites', [App\Http\Controllers\PortalPageController::class, 'viewSitesPage'])->name('viewSitesPage');
Route::get('/sites/update/{siteId}', [App\Http\Controllers\PortalPageController::class, 'viewSiteUpdatePage'])->name('viewSiteUpdatePage');
Route::put('/sites/delete/{siteId}', [App\Http\Controllers\PortalPageController::class, 'deleteSite'])->name('deleteSite');
Route::get('/sites/create', [App\Http\Controllers\PortalPageController::class, 'viewSiteCreatePage'])->name('viewSiteCreatePage');
Route::put('/sites/add', [App\Http\Controllers\PortalPageController::class, 'addSite'])->name('addSite');
Route::put('/sites/update', [App\Http\Controllers\PortalPageController::class, 'updateSite'])->name('updateSite');

Route::get('/contactLanding', [App\Http\Controllers\PortalPageController::class, 'viewContactLandingPage'])->name('viewContactLandingPage');

Route::get('/makers', [App\Http\Controllers\PortalPageController::class, 'viewMakersPage'])->name('viewMakersPage');
Route::get('/makers/update/{makerId}', [App\Http\Controllers\PortalPageController::class, 'viewMakerUpdatePage'])->name('viewMakerUpdatePage');
Route::put('/makers/delete/{makerId}', [App\Http\Controllers\PortalPageController::class, 'deleteMaker'])->name('deleteMaker');
Route::put('/makers/update', [App\Http\Controllers\PortalPageController::class, 'updateMaker'])->name('updateMaker');
Route::get('/makers/create', [App\Http\Controllers\PortalPageController::class, 'viewMakerCreatePage'])->name('viewMakerCreatePage');
Route::put('/makers/add', [App\Http\Controllers\PortalPageController::class, 'addMaker'])->name('addMaker');


//Route::get('/contactList', [App\Http\Controllers\PortalPageController::class, 'contactList'])->name('contactList');
Route::get('/customers', [App\Http\Controllers\PortalPageController::class, 'viewCustomerListPage'])->name('viewCustomerListPage');
Route::get('/customers/create', [App\Http\Controllers\PortalPageController::class, 'viewAddCustomerListPage'])->name('viewAddCustomerListPage');
Route::put('/customers/add', [App\Http\Controllers\PortalPageController::class, 'addCustomer'])->name('addCustomer');
Route::get('/customers/update/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateCustomerListPage'])->name('viewUpdateCustomerListPage');
Route::put('/customers/delete/{customerId}', [App\Http\Controllers\PortalPageController::class, 'deleteCustomer'])->name('deleteCustomer');
Route::put('/customers/update', [App\Http\Controllers\PortalPageController::class, 'updateCustomer'])->name('updateCustomer');

Route::get('/admin', [App\Http\Controllers\AdminPageController::class, 'index'])->name('admin');

Route::get('/items/list/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewItemsPage'])->name('viewItemsPage');
Route::get('/items/delete/{itemId}', [App\Http\Controllers\PortalPageController::class, 'deleteItem'])->name('deleteItem');
Route::get('/items/{itemId}/info', [App\Http\Controllers\PortalPageController::class, 'viewItemInfoPage'])->name('viewItemInfoPage');
Route::get('/items/create/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'viewCreateItemPage'])->name('viewCreateItemPage');
Route::get('/items/edit/{siteId}/{customerId}/{itemId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateItemPage'])->name('viewUpdateItemPage');
Route::put('/items/add/{siteId}/{customerId}', [App\Http\Controllers\PortalPageController::class, 'addItem'])->name('addItem');
Route::put('/items/update/{siteId}/{customerId}/{itemId}', [App\Http\Controllers\PortalPageController::class, 'updateItem'])->name('updateItem');

Route::get('/categories', [App\Http\Controllers\PortalPageController::class, 'viewCategoriesPage'])->name('viewCategoriesPage');
Route::get('/categories/delete/{itemId}', [App\Http\Controllers\PortalPageController::class, 'deleteCategory'])->name('deleteCategory');
Route::get('/categories/create', [App\Http\Controllers\PortalPageController::class, 'viewCreateCategoryPage'])->name('viewCreateCategoryPage');
Route::put('/categories/add', [App\Http\Controllers\PortalPageController::class, 'addCategory'])->name('addCategory');
Route::get('/categories/edit/{categoryId}', [App\Http\Controllers\PortalPageController::class, 'viewUpdateCategoryPage'])->name('viewUpdateCategoryPage');
Route::put('/categories/update/{categoryId}', [App\Http\Controllers\PortalPageController::class, 'updateCategory'])->name('updateCategory');