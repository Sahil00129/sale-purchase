<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PDFController;
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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// logout route
Route::get('/logout', [LoginController::class,'logout']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});

///////
Route::get('/import-data', [ImportDataController::class,'importDataView']);
Route::post('/import', [ImportDataController::class,'importData']);

Route::get('/itemMaster-table', [TableController::class,'itemMasterTable']);
Route::get('/saleData-table', [TableController::class,'saleDataTable']);
Route::get('/purchaseData-table', [TableController::class,'purchaseDataTable']);
Route::get('/warehouse-sites', [TableController::class,'warehouseSite']);

Route::get('sales-data-request', [AjaxController::class,'getServerSide']);
Route::get('purhase-data-request', [AjaxController::class,'getpurchaseServerSide']);

Route::get('/get-pdf', [ImportDataController::class,'getsinglepdf']);
Route::any('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::post('filter-items', [ImportDataController::class,'getItemsofgroup']); 

Route::get('/bulkpdf', [ImportDataController::class,'bulkpdf']);
Route::any('/generate-allinone-pdf', [PDFController::class, 'allinone']);

Route::any('delete-courierCompany/{id}', [TableController::class, 'destroyItems']);
