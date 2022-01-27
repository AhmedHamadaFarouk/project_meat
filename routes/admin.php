
<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BranchController;
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


    // اضافه بنك
    Route::resource('bank', BankController::class);

    ###############################################################

    // اضافه عميل
    Route::resource('client', ClientController::class);

    // اضافه فرع
    Route::resource('branch', BranchController::class);

    // اضافه مخزنphp artisan co:ca
    Route::resource('store', StoreController::class);

    // اضافه مورد
    Route::resource('supplier', SupplierController::class);


    //قسم
    Route::resource('section', SectionController::class);

    //صنف
    Route::resource('category', CategoryController::class);


    #############################################################

    // اذن اضافه للمخزن
    Route::resource('products', ProductController::class);

    //print
    Route::get('print_product/{id}', [ProductController::class, 'Print_product'])->name('product');

    // محضر فحص و استلام  لحوم
    Route::resource('examination_receipt', ExaminationReceipt::class);

    //print
    Route::get('print_examination/{id}', [ExaminationReceipt::class, 'print_examination'])->name('print');


    //details
    Route::get('details/{id}', [ExaminationReceipt::class, 'details'])->name('details');

######################################################################################################
    //  فحص  لحوم
    Route::resource('examination_meat', ExaminationMeatController::class);

    //print
    Route::get('print_examinmeat/{id}', [ExaminationMeatController::class, 'print_examinmeat'])->name('print');


    //details
    Route::get('details/{id}', [ExaminationMeatController::class, 'details'])->name('details');


    //واستلام امين المخزن
    Route::resource('examin_section', ExaminSectionController::class);

    Route::get('section/{id}', [ExaminSectionController::class, 'getcategories']);
######################################################################################################
    // سجل رفع المخلفات
    Route::resource('wasteLog', WasteLogController::class);

    //print
    Route::get('print_wasteLog/{id}', [WasteLogController::class, 'print_wasteLog'])->name('waste');

    // اذن صرف الخامات
    Route::resource('exchangeRawMaterials', ExchangeRawMaterialsController::class);

    //print
    Route::get('print_exchange/{id}', [ExchangeRawMaterialsController::class, 'print_exchange'])->name('exchange');
    #############################################################

    // محضر فحص الخامات
    Route::resource('materialInspection', MaterialInspectionController::class);

    //print
    Route::get('print_material/{id}', [MaterialInspectionController::class, 'print_material'])->name('material');

    // محضر فحص مواد التنظيف و التطهير
    Route::resource('disinfectionMaterials', DisinfectionMaterialsController::class);

    //print
    Route::get('print_disinfection/{id}', [DisinfectionMaterialsController::class, 'print_disinfection'])->name('disinfection');

    // اذن صرف مواد التنظيف و التطهير
    Route::resource('cleaningDisinfection', CleaningDisinfectionController::class);

    //print
    Route::get('print_cleaning/{id}', [CleaningDisinfectionController::class, 'print_cleaning'])->name('clean');

    // اذن صرف مواد تعبئة و تغليف
    Route::resource('dispensePacking', DispensePackingMaterialsvController::class);

    //print
    Route::get('print_dispense/{id}', [DispensePackingMaterialsvController::class, 'print_dispense'])->name('dispense');
    #############################################################

});




Route::get('/{page}', [AdminController::class, 'index']);
