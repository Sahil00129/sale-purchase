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
use App\Http\Controllers\CompanySetupController;
use App\Http\Controllers\PurchaseImportController;
use App\Http\Controllers\SampleDownloadController;
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
///////////////User and Roles////////////////////
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});

/////////////
Route::get('/import-data', [ImportDataController::class,'importDataView']);
Route::post('/import', [ImportDataController::class,'importData']);
Route::get('/maintenance', [HomeController::class,'maintenance']);

Route::get('/itemMaster-table', [TableController::class,'itemMasterTable']);
Route::get('/saleData-table', [TableController::class,'saleDataTable']);
Route::get('/purchaseData-table', [TableController::class,'purchaseDataTable']);
Route::get('/warehouse-sites', [TableController::class,'warehouseSite']);
Route::get('/openingData-table', [TableController::class,'openingTable']);
Route::get('/stockTransfer-table', [TableController::class,'stockTransferTable']);

Route::get('sales-data-request', [AjaxController::class,'getServerSide']);
Route::get('purhase-data-request', [AjaxController::class,'getpurchaseServerSide']);
Route::get('opening-data-request', [AjaxController::class,'getopeningServerSide']);
Route::get('stockTransfer-data-request', [AjaxController::class,'getstockTransferServerSide']);

Route::get('/get-pdf', [ImportDataController::class,'getsinglepdf']);
Route::any('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::post('filter-items', [ImportDataController::class,'getItemsofgroup']); 
Route::post('filter-group', [ImportDataController::class,'getclientOfGroup']); 

Route::get('/bulkpdf', [ImportDataController::class,'bulkpdf']);
Route::any('/generate-allinone-pdf', [PDFController::class, 'allinone']);

Route::any('delete-courierCompany/{id}', [TableController::class, 'destroyItems']);

/////////////////////////////Company setup////////////////////////

Route::get('/group/identity', [CompanySetupController::class,'groupIdentity']);
Route::get('/group/identity/client', [CompanySetupController::class,'clientIdentity']);
Route::get('/group/identity/client/sites', [CompanySetupController::class,'clientSites']);
Route::any('/add-group', [CompanySetupController::class,'addGroup']);
Route::any('/add-identity', [CompanySetupController::class,'addIdentity']);
Route::any('/add-identity-client', [CompanySetupController::class,'addIdentityClient']);

Route::any('/creat-client', [CompanySetupController::class,'createClient']);

Route::get('/comapny-group', [CompanySetupController::class,'companygroupTable']);
Route::get('/identity-client-site', [CompanySetupController::class,'identityClientSites']);
Route::any('/add-identity-sites', [CompanySetupController::class,'addIdentitySites']);
Route::any('/delete-identity/{id}', [CompanySetupController::class, 'destroyIdentity']);

Route::get('/company-organisation', [CompanySetupController::class,'companyOrganisation']);

Route::get('/sample-itemMaster',[SampleDownloadController::class, 'itemMasterSample']);
Route::get('/sample-purchase',[SampledownloadController::class, 'purchaseSample']);
Route::get('/sample-sale',[SampleDownloadController::class, 'saleSample']);
Route::get('/sample-stockTransfer',[SampledownloadController::class, 'stockTransferSample']);
Route::get('/sample-stockOpening',[SampleDownloadController::class, 'stockOpeningSample']);


/**********************************************  Purchase **********************************************/

//Route::get('purchase-Import', [PurchaseImportController::class,'purchaseImportView']);
//Route::post('/purchase-import', [PurchaseImportController::class,'purchaseImportData']);

//Route::get('monthlyPurchase-Table', [AjaxController::class,'monthlyPurchaseServer']);

//Route::get('monthlyPurchase-data-request', [AjaxController::class,'monthlyPurchaseServer']);
//Route::get('dailyPurchase-data-request', [AjaxController::class,'dailyPurchaseServer']);

//Route::get('finalView-table', [PurchaseImportController::class,'finalTableView']);
//Route::any('get-final-data', [PurchaseImportController::class,'finalTableCalculation']);

