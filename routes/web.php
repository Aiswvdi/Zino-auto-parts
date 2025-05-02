<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReturnOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ShipmentTrackingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierPaymentController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\EnginePartController;
use App\Http\Controllers\BrakePartController;
use App\Http\Controllers\SuspensionPartController;
use App\Http\Controllers\FluidOilController;
use App\Http\Controllers\LightBatteryController;
use App\Http\Controllers\CarInfoController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\StockIssueOrderController;
use App\Http\Controllers\DashboardController;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');



});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');


Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

Route::resource('customers', CustomerController::class);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('invoices', InvoiceController::class);

Route::resource('orders', OrderController::class);

Route::resource('order_items', OrderItemController::class);


Route::resource('returns', ReturnOrderController::class);

Route::prefix('payments')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payments.index'); // عرض جميع المدفوعات
    Route::get('/create', [PaymentController::class, 'create'])->name('payments.create'); // عرض نموذج إضافة مدفوعات جديدة
    Route::post('/', [PaymentController::class, 'store'])->name('payments.store'); // حفظ المدفوعات الجديدة
    Route::get('/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit'); // عرض نموذج تعديل
    Route::put('/{payment}', [PaymentController::class, 'update'])->name('payments.update'); // تحديث المدفوعات
    Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy'); // حذف المدفوعات
});

Route::resource('shippings', ShippingController::class);

Route::resource('shipment_tracking', ShipmentTrackingController::class);

Route::resource('inventory', InventoryController::class);

Route::resource('supplier_payments', SupplierPaymentController::class);

Route::resource('product_images', ProductImageController::class);

Route::get('/purchase/{id}', [PurchaseController::class, 'buy'])->name('purchase');

Route::resource('engine_parts', EnginePartController::class);

Route::resource('brake-parts', BrakePartController::class);

Route::resource('suspension-parts', SuspensionPartController::class);

Route::resource('fluid-oils', FluidOilController::class);

Route::resource('lights-batteries', LightBatteryController::class);

Route::get('/car-info/create', [CarInfoController::class, 'create'])->name('car_info.create');
Route::post('/car-info/store', [CarInfoController::class, 'store'])->name('car_info.store');

Route::resource('warehouses', WarehouseController::class);

Route::resource('stock_issue_orders', StockIssueOrderController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('stock_issues', StockIssueOrderController::class);





