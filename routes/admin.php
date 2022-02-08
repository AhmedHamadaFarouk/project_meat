
<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CashingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CleaningDisinfectionController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DisinfectionMaterialsController;
use App\Http\Controllers\Admin\DispensePackingMaterialsvController;
use App\Http\Controllers\Admin\ExaminationMeatController;
use App\Http\Controllers\Admin\ExaminationReceipt;
use App\Http\Controllers\Admin\ExaminSectionController;
use App\Http\Controllers\Admin\ExchangeRawMaterialsController;
use App\Http\Controllers\Admin\MaterialInspectionController;
use App\Http\Controllers\Admin\MeatReceiptControler;
use App\Http\Controllers\Admin\MeatToxinController;
use App\Http\Controllers\Admin\PackingMaterialsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
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



    Route::resource('cashings',CashingController::class);
    Route::resource('PackingMaterials',PackingMaterialsController::class);
    Route::resource('meatToxin',MeatToxinController::class);
    Route::get('cashingsmeatToxin/{id}',[MeatToxinController::class,'cashingsmeatToxin'])->name('cashingsmeatToxin');


    Route::resource('meatReceipt',MeatReceiptControler::class);
    Route::resource('meatToxin',MeatToxinController::class);
    Route::get('meatToxinDeletelies/{id}',[MeatToxinController::class,'meatToxinDeletelies'])->name('meatToxinDeletelies');
    Route::post('packagesprice', [MeatToxinController::class, 'storepackagesprice'])->name('packagesprice.store');
    Route::resource('bank', BankController::class);
    Route::resource('client', ClientController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('store', StoreController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('section', SectionController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('print_product/{id}', [ProductController::class, 'Print_product'])->name('product');
    Route::resource('examination_receipt', ExaminationReceipt::class);
    Route::get('print_examination/{id}', [ExaminationReceipt::class, 'print_examination'])->name('print');
    Route::get('details/{id}', [ExaminationReceipt::class, 'details'])->name('details');
    Route::resource('examination_meat', ExaminationMeatController::class);
    Route::get('print_examinmeat/{id}', [ExaminationMeatController::class, 'print_examinmeat'])->name('print_examinmeat');
    Route::get('details/{id}', [ExaminationMeatController::class, 'details'])->name('details');
    Route::resource('examin_section', ExaminSectionController::class);
    Route::get('section/{id}', [ExaminSectionController::class, 'getcategories']);
    Route::resource('wasteLog', WasteLogController::class);
    Route::get('print_wasteLog/{id}', [WasteLogController::class, 'print_wasteLog'])->name('waste');
    Route::resource('exchangeRawMaterials', ExchangeRawMaterialsController::class);
    Route::get('print_exchange/{id}', [ExchangeRawMaterialsController::class, 'print_exchange'])->name('exchange');
    Route::resource('materialInspection', MaterialInspectionController::class);
    Route::get('print_material/{id}', [MaterialInspectionController::class, 'print_material'])->name('material');
    Route::resource('disinfectionMaterials', DisinfectionMaterialsController::class);
    Route::get('print_disinfection/{id}', [DisinfectionMaterialsController::class, 'print_disinfection'])->name('disinfection');
    Route::resource('cleaningDisinfection', CleaningDisinfectionController::class);
    Route::get('print_cleaning/{id}', [CleaningDisinfectionController::class, 'print_cleaning'])->name('clean');
    Route::resource('dispensePacking', DispensePackingMaterialsvController::class);
    Route::get('print_dispense/{id}', [DispensePackingMaterialsvController::class, 'print_dispense'])->name('dispense');
});




Route::get('/{page}', [AdminController::class, 'index']);
