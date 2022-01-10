<?php


use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CleaningDisinfectionController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DisinfectionMaterialsController;
use App\Http\Controllers\Admin\DispensePackingMaterialsvController;
use App\Http\Controllers\Admin\ExaminationReceipt;
use App\Http\Controllers\Admin\ExchangeRawMaterialsController;
use App\Http\Controllers\Admin\MaterialInspectionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\WasteLogController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|-----------------------------------------------------------------------
*/

// Start Routes Admins -13


require __DIR__ . '/auth.php';




Route::middleware(['auth:admin'])->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('adminDashboard');


    // اضافه بنك
    Route::resource('bank', BankController::class);

    ###############################################################

    // اضافه عميل
    Route::resource('client', ClientController::class);

    // اضافه فرع
    Route::resource('branch', BranchController::class);

    // اضافه مخزن
    Route::resource('store', StoreController::class);

    // اضافه مورد
    Route::resource('supplier', SupplierController::class);

    #############################################################

    // اذن اضافه للمخزن
    Route::resource('products', ProductController::class);

    // محضر فحص و استلام  لحوم
    Route::resource('examination_receipt', ExaminationReceipt::class);

    // سجل رفع المخلفات
    Route::resource('wasteLog', WasteLogController::class);

    // اذن صرف الخامات
    Route::resource('exchangeRawMaterials', ExchangeRawMaterialsController::class);
    #############################################################

    // محضر فحص الخامات
    Route::resource('materialInspection', MaterialInspectionController::class);

    // محضر فحص مواد التنظيف و التطهير
    Route::resource('disinfectionMaterials', DisinfectionMaterialsController::class);

    // اذن صرف مواد التنظيف و التطهير
    Route::resource('cleaningDisinfection', CleaningDisinfectionController::class);

    // اذن صرف مواد تعبئة و تغليف
    Route::resource('dispensePacking', DispensePackingMaterialsvController::class);
    #############################################################

});




Route::get('/{page}', [AdminController::class,'index']);
