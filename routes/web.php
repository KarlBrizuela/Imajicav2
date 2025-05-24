<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CategoryListController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\tierController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageCostController;
use App\Http\Controllers\ServiceCostController;
use App\Http\Controllers\category_expenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\SalesTransactionController;
use App\Http\Controllers\wasteController;


Route::get('/package/get-cost', [PackageController::class, 'get_cost'])->name('service.get_cost');


 

Route::get('/service/get-cost', [ServiceCostController::class, 'getServiceCost'])->name('service.get_cost');
Route::get('/package/get-cost', [PackageCostController::class, 'getPackageCost'])->name('package.get_cost');

use App\Http\Controllers\ServiceProductController;

use App\Http\Controllers\VoidLogController;









use App\Http\Controllers\VoidedOrdersController;



// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [LoginController::class, 'index'])->name('page.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/expenses-report', [App\Http\Controllers\ExpensesReportController::class, 'index'])->name('page.expenses-report')->middleware(['auth', 'admin']);

Route::get('/employee-report', [App\Http\Controllers\EmployeeReportController::class, 'index'])->name('page.employee-report')->middleware(['auth', 'admin']);



Route::delete('/bookings/delete', [BookingController::class, 'delete'])->name('booking.delete');

Route::get('/patient/attachment/download/{id}', [PatientController::class, 'downloadAttachment'])->name('patient.attachment.download')->middleware(['auth', 'admin']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'admin']);

        Route::get('/new-coupon', [DashboardController::class, 'new_coupon'])->name('page.new-coupon')->middleware(['auth', 'admin']);
        Route::post('/coupon/create',[CouponController::class, 'create'] )->name('coupon.create')->middleware(['auth', 'admin']);
        Route::get('/coupon/list', [DashboardController::class, 'coupon_list'])->name('page.coupon-list')->middleware(['auth', 'admin']);
        Route::get('/coupon/edit/{coupon_code}', [CouponController::class, 'edit'])->name('coupon.edit')->middleware(['auth', 'admin']);
        Route::put('/coupon/update', [CouponController::class, 'update'])->name('coupon.update')->middleware(['auth', 'admin']);
        Route::delete('/coupon/delete', [CouponController::class, 'delete'])->name('coupon.delete')->middleware(['auth', 'admin']);

        Route::get('/coupon/get', [CouponController::class, 'get'])->name('coupon.get')->middleware(['auth', 'admin']);


Route::get('/coupon-list', [DashboardController::class, 'coupon_list'])->name('page.coupon-list')->middleware(['auth', 'admin']);

Route::get('/new-loyalty', [DashboardController::class, 'new_loyalty'])->name('page.new-loyalty')->middleware(['auth', 'admin']);

Route::get('/sales-transaction', [DashboardController::class, 'sales_transaction'])->name('page.sales-transaction')->middleware(['auth', 'admin']);

Route::get('/employee-sales', [App\Http\Controllers\EmployeeController::class, 'index'])->name('page.employee-sales')->middleware(['auth', 'admin']);


Route::get('/commision-employee', [DashboardController::class, 'commision_employee'])->name('page.commsion-employee')->middleware(['auth', 'admin']);


Route::get('/purchase', [DashboardController::class, 'purchase'])->name('page.purchase')->middleware(['auth', 'admin']);
Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index')->middleware(['auth', 'admin']);


Route::get('/void-logs', [DashboardController::class, 'void_logs'])->name('page.void-logs')->middleware(['auth', 'admin']);
Route::get('/voided-orders', [VoidedOrdersController::class, 'index'])->name('page.voided-orders')->middleware(['auth', 'admin']);

Route::get('/product-list', [DashboardController::class, 'product_list'])->name('page.product-list')->middleware(['auth', 'admin']);

// Add the edit-branch route before the ORDER ROUTES
Route::get('/branch/edit/{branch_code}', [branchController::class, 'edit'])->name('page.edit-branch')->middleware(['auth', 'admin']);

//ORDER ROUTES
Route::get('/order-list', [DashboardController::class, 'order_list'])->name('page.order-list')->middleware(['auth', 'admin']);
Route::get('/add-order', [DashboardController::class, 'add_order'])->name('page.add_order')->middleware(['auth', 'admin']);
Route::post('/order/create', [orderController::class, 'create'])->name('order.create')->middleware(['auth', 'admin']);
Route::get('/edit-order/{id}', [OrderController::class, 'edit'])->name('page.edit-order')->middleware(['auth', 'admin']);
Route::put('/order/update', [OrderController::class, 'update'])->name('order.update')->middleware(['auth', 'admin']);
Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('page.order-details')->middleware(['auth', 'admin']);
Route::get('/order/order-details/{orderId}', [OrderController::class, 'getOrderDetails'])->name('api.order.details')->middleware(['auth', 'admin']);
Route::delete('/orders/delete', [OrderController::class, 'delete'])->name('order.delete');
Route::get('/add-product', [DashboardController::class, 'add_product'])->name('page.add-product')->middleware(['auth', 'admin']);
Route::post('/product/create', [AddProductController::class, 'create'])->name('product.create')->middleware(['auth', 'admin']);
Route::get('/edit-product/{sku}', [AddProductController::class, 'edit'])
    ->name('product.edit')
    ->where('sku', '.*')->middleware(['auth', 'admin']); // Allow any character in sku

Route::post('/product/{sku}/update', [AddProductController::class, 'update'])->name('product.update')->middleware(['auth', 'admin']);
Route::delete('/product/delete', [AddProductController::class, 'delete'])->name('product.delete')->middleware(['auth', 'admin']);

Route::get('/category-list', [DashboardController::class, 'category_list'])->name('page.category-list')->middleware(['auth', 'admin']);
Route::get('/categories', [CategoryListController::class, 'getAll'])->name('category.getAll')->middleware(['auth', 'admin']);
Route::get('/system-settings', [DashboardController::class, 'system_settings'])->name('page.system-settings')->middleware(['auth', 'admin']);

Route::get('/new-loyalty', [DashboardController::class, 'new_loyalty'])->name('page.new-loyalty')->middleware(['auth', 'admin']);

Route::get('/loyalty-list', [DashboardController::class, 'loyalty_list'])->name('page.loyalty-list')->middleware(['auth', 'admin']);

Route::get('/new-patient', [DashboardController::class, 'new_patient'])->name('page.new-patient')->middleware(['auth', 'admin']);

Route::get('/patient-list', [DashboardController::class, 'patient_list'])->name('page.patient-list')->middleware(['auth', 'admin']);
Route::post('patient/create', [App\Http\Controllers\patientController::class, 'create'])->name('patient.create')->middleware(['auth', 'admin']);

Route::get('/new-supplier', [DashboardController::class, 'new_supplier'])->name('page.new-supplier')->middleware(['auth', 'admin']);

Route::get('/supplier-list', [DashboardController::class, 'supplier_list'])->name('page.supplier-list')->middleware(['auth', 'admin']);

Route::get('/new-staff', [DashboardController::class, 'new_staff'])->name('page.new-staff')->middleware(['auth', 'admin']);

Route::get('/staff-list', [DashboardController::class, 'staff_list'])->name('page.staff-list')->middleware(['auth', 'admin']);

Route::get('/new-branch', [DashboardController::class, 'new_branch'])->name('page.new-branch')->middleware(['auth', 'admin']);

Route::get('/branch-list', [DashboardController::class, 'branch_list'])->name('page.branch-list')->middleware(['auth', 'admin']);

Route::get('/new-services', [DashboardController::class, 'new_services'])->name('page.new-services')->middleware(['auth', 'admin']);

Route::get('/services-list', [DashboardController::class, 'services_list'])->name('page.services-list')->middleware(['auth', 'admin']);
Route::get('/service/edit/{id}', [serviceController::class, 'edit'])->name('service.edit')->middleware(['auth', 'admin']);

//Route::get('/new-user', [DashboardController::class, 'new_user'])->name('page.new-user')->middleware(['auth', 'admin']);
Route::get('/new-user', [DashboardController::class, 'new_user'])->name('page.new-user');
Route::get('/user-list', [DashboardController::class, 'user_list'])->name('page.user-list')->middleware(['auth', 'admin']);

Route::get('/booking', [BookingController::class, 'index'])->name('page.booking')->middleware(['auth', 'admin']);
Route::post('/save-quick-note', [BookingController::class, 'saveQuickNote'])->name('booking.save-quick-note')->middleware(['auth', 'admin']);


Route::get('/customer-report', [DashboardController::class, 'customer_report'])->name('page.customer-report')->middleware(['auth', 'admin']);

// Service Routes
Route::post('/services/create', [App\Http\Controllers\serviceController::class, 'create'])->name('service.create')->middleware(['auth', 'admin']);
Route::get('/services/all', [App\Http\Controllers\serviceController::class, 'get_services'])->name('get.services')->middleware(['auth', 'admin']);
Route::get('/services/branch/{branch_code}', [App\Http\Controllers\serviceController::class, 'get_services_by_branch'])->name('get.services.by.branch')->middleware(['auth', 'admin']);
Route::put('/services/update', [App\Http\Controllers\serviceController::class, 'update'])->name('service.update')->middleware(['auth', 'admin']);
Route::delete('/services/delete', [App\Http\Controllers\serviceController::class, 'delete'])->name('service.delete')->middleware(['auth', 'admin']);
Route::delete('/services/{id}', [App\Http\Controllers\serviceController::class, 'delete_service'])->name('delete.service')->middleware(['auth', 'admin']);

// Branch Routes

Route::post('/branch/create', [App\Http\Controllers\branchController::class, 'create'])->name('branch.create')->middleware(['auth', 'admin']);
// Fix the update route - remove the {branch} from within the URL and make it a parameter
Route::put('/branch/update', [App\Http\Controllers\branchController::class, 'update'])->name('branch.update')->middleware(['auth', 'admin']);
Route::delete('/branch/delete', [App\Http\Controllers\branchController::class, 'delete'])->name('branch.delete')->middleware(['auth', 'admin']);
Route::get('/branches/all', [App\Http\Controllers\branchController::class, 'getAllBranches'])->name('branch.getAllBranches')->middleware(['auth', 'admin']);
Route::get('/edit-branch/{branch_code}', [App\Http\Controllers\branchController::class, 'edit'])->name('branch.edit')->middleware(['auth', 'admin']);

// Supplier Routes
Route::post('/supplier/add', [App\Http\Controllers\supplierController::class, 'add_supplier'])->name('add.supplier')->middleware(['auth', 'admin']);
Route::get('/supplier/all', [App\Http\Controllers\supplierController::class, 'get_suppliers'])->name('get.suppliers')->middleware(['auth', 'admin']);
Route::get('/supplier/{id}', [App\Http\Controllers\supplierController::class, 'get_supplier'])->name('get.supplier')->middleware(['auth', 'admin']);
Route::put('/supplier/{suppler_id}/update', [App\Http\Controllers\supplierController::class, 'update_supplier'])->name('supplier.update')->middleware(['auth', 'admin']);
Route::delete('/supplier/{id}', [App\Http\Controllers\supplierController::class, 'delete_supplier'])->name('delete.supplier')->middleware(['auth', 'admin']);
Route::get('/supplier/edit/{id}', [App\Http\Controllers\supplierController::class, 'edit'])->name('supplier.edit')->middleware(['auth', 'admin']);
Route::put('/supplier/update/{id}', [SupplierController::class, 'update_supplier'])->name('update.supplier')->middleware(['auth', 'admin']);
Route::get('/supplier/get/{id}', [SupplierController::class, 'get_supplier'])->name('get.supplier')->middleware(['auth', 'admin']);
Route::get('/suppliers', [SupplierController::class, 'get_suppliers'])->name('get.suppliers')->middleware(['auth', 'admin']);
Route::post('/supplier/add', [SupplierController::class, 'add_supplier'])->name('add.supplier')->middleware(['auth', 'admin']);
Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete_supplier'])->name('delete.supplier')->middleware(['auth', 'admin']);

// Patients Routes
Route::post('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update')->middleware(['auth', 'admin']);
Route::post('/patient/{id}/update', [PatientController::class, 'update'])->name('patient.update')->middleware(['auth', 'admin']);
Route::delete('/patient/{id}', [App\Http\Controllers\patientController::class, 'destroy'])->name('patient.destroy')->middleware(['auth', 'admin']);
Route::delete('/patient/delete', [PatientController::class, 'destroy'])->name('patient.delete')->middleware(['auth', 'admin']);
Route::get('/patients/{id}/view', [PatientController::class, 'view'])->name('patient.view')->middleware(['auth', 'admin']);
Route::get('/patients/{id}/view', [PatientController::class, 'show'])->name('patient.view')->middleware(['auth', 'admin']);
Route::get('/patients', [PatientController::class, 'index'])->name('patient.list')->middleware(['auth', 'admin']);

Route::get('/service-product', [DashboardController::class, 'service_product'])->name('page.service-product')->middleware(['auth', 'admin']);



Route::get('/new-expenses', [DashboardController::class, 'new_expenses'])->name('page.new-expenses')->middleware(['auth', 'admin']);

Route::get('/expenses-list', [DashboardController::class, 'expenses_list'])->name('page.expenses-list')->middleware(['auth', 'admin']);

Route::get('/new category-expenses', [DashboardController::class, 'newcategory_expenses'])->name('page.new category-expenses')->middleware(['auth', 'admin']);

Route::get('/categoryexpenses-list', [DashboardController::class, 'categoryexpenses_list'])->name('page.categoryexpenses-list')->middleware(['auth', 'admin']);

// Route::get('/expenses/view/{id}', [ExpensesController::class, 'view'])->name('expenses.view')->middleware(['auth', 'admin']);

Route::get('/category/all', [CategoryListController::class, 'getAll'])->name('category.all')->middleware(['auth', 'admin']);
Route::get('/api/categories', [CategoryListController::class, 'getAll'])->name('api.categories')->middleware(['auth', 'admin']);
Route::post('/category/create', [CategoryListController::class, 'create'])->name('category.create')->middleware(['auth', 'admin']);
Route::get('/category-list', [DashboardController::class, 'category_list'])->name('page.category-list')->middleware(['auth', 'admin']);
Route::delete('/category/delete', [CategoryListController::class, 'delete'])->name('category.delete')->middleware(['auth', 'admin']);
Route::get('/category/get/{id}', [CategoryListController::class, 'getCategory'])->name('category.get')->middleware(['auth', 'admin']);
Route::put('/category/update', [CategoryListController::class, 'update'])->name('category.update')->middleware(['auth', 'admin']);

//Staff Route
Route::post('/staff/create', [App\Http\Controllers\staffController::class, 'create'])->name('staff.create')->middleware(['auth', 'admin']);
Route::get('/staff/all', [App\Http\Controllers\staffController::class, 'get_staff'])->name('get.staff')->middleware(['auth', 'admin']);
Route::put('/staff/update', [staffController::class, 'update'])->name('staff.update')->middleware(['auth', 'admin']);
Route::delete('/staff/{id}', [App\Http\Controllers\staffController::class, 'delete'])->name('staff.delete')->middleware(['auth', 'admin']);
Route::get('/staff/edit/{id}', [staffController::class, 'edit'])->name('staff.edit')->middleware(['auth', 'admin']);

//Loyalty Route
Route::post('/tier/create', [App\Http\Controllers\tierController::class, 'create'])->name('tier.create')->middleware(['auth', 'admin']);
Route::get('/tier/all', [App\Http\Controllers\tierController::class, 'list'])->name('tier.list')->middleware(['auth', 'admin']);
Route::get('/tier/edit/{patient_tier_id}', [App\Http\Controllers\tierController::class, 'edit'])->name('tier.edit')->middleware(['auth', 'admin']);
Route::put('/tier/update', [App\Http\Controllers\tierController::class, 'update'])->name('tier.update')->middleware(['auth', 'admin']);
Route::delete('/tier/delete', [App\Http\Controllers\tierController::class, 'delete'])->name('tier.delete')->middleware(['auth', 'admin']);


//Booking Route
Route::post('/booking/create', [BookingController::class, 'create'])->name('booking.create')->middleware(['auth', 'admin']);
Route::get('/booking/all', [BookingController::class, 'get_bookings'])->name('get.bookings')->middleware(['auth', 'admin']);
Route::put('/booking/update', [BookingController::class, 'update'])->name('booking.update')->middleware(['auth', 'admin']);
Route::delete('/booking/delete', [BookingController::class, 'delete'])->name('booking.delete')->middleware(['auth', 'admin']);
Route::get('/get-calendar-bookings', [BookingController::class, 'getCalendarBookings']);


Route::get('/position-list', [DashboardController::class, 'position_list'])->name('page.position-list')->middleware(['auth', 'admin']);
Route::post('/position/create', [PositionController::class, 'create'])->name('position.create')->middleware(['auth', 'admin']);
Route::get('/position/edit/{id}', [PositionController::class, 'edit'])->name('position.edit')->middleware(['auth', 'admin']);
Route::put('/position/update', [PositionController::class, 'update'])->name('position.update')->middleware(['auth', 'admin']);
Route::delete('/position/delete', [App\Http\Controllers\PositionController::class, 'delete'])->name('position.delete')->middleware(['auth', 'admin']);

// Add this route
Route::get('/position/new', [PositionController::class, 'create'])->name('page.new-position')->middleware(['auth', 'admin']);
Route::post('/position/store', [PositionController::class, 'store'])->name('position.store')->middleware(['auth', 'admin']);

//Department Route
Route::get('/new-department', [DashboardController::class, 'new_department'])->name('page.new-department')->middleware(['auth', 'admin']);
Route::post('/department/create', [App\Http\Controllers\DepartmentController::class, 'store'])->name('department.create')->middleware(['auth', 'admin']);
Route::get('/department-list', [DashboardController::class, 'department_list'])->name('page.department-list')->middleware(['auth', 'admin']);
Route::put('/department/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('department.update')->middleware(['auth', 'admin']);
Route::delete('/department/delete', [App\Http\Controllers\DepartmentController::class, 'delete'])->name('department.delete')->middleware(['auth', 'admin']);
Route::get('/departments/all', [App\Http\Controllers\DepartmentController::class, 'getAllDepartments'])->name('department.getAllDepartments')->middleware(['auth', 'admin']);
Route::get('/edit-department/{department_code}', [DepartmentController::class, 'edit'])->name('page.edit-department')->middleware(['auth', 'admin']);

//Category Expense Routes
Route::post('/category_expense/create', [App\Http\Controllers\category_expenseController::class, 'create'])->name('category_expense.create')->middleware(['auth', 'admin']);
Route::get('/category_expense/all', [App\Http\Controllers\category_expenseController::class, 'getAll'])->name('get.category_expenses')->middleware(['auth', 'admin']);
Route::get('/category_expense/edit/{id}', [App\Http\Controllers\category_expenseController::class, 'edit'])->name('category_expense.edit')->middleware(['auth', 'admin']);
Route::put('/category_expense/update/{id}', [App\Http\Controllers\category_expenseController::class, 'update'])->name('category_expense.update')->middleware(['auth', 'admin']);
Route::delete('/category_expense/delete/{id}', [App\Http\Controllers\category_expenseController::class, 'delete'])->name('category_expense.delete')->middleware(['auth', 'admin']);

// Expense Management Routes
Route::resource('expenses', ExpensesController::class);

// Waste management routes
Route::get('/new-waste', [App\Http\Controllers\wasteController::class, 'create'])->name('page.new-waste')->middleware(['auth', 'admin']);
Route::post('/waste/store', [App\Http\Controllers\wasteController::class, 'store'])->name('waste.store')->middleware(['auth', 'admin']);
Route::get('/waste-list', [App\Http\Controllers\wasteController::class, 'index'])->name('page.waste-list')->middleware(['auth', 'admin']);
Route::get('/waste/{id}/edit', [App\Http\Controllers\wasteController::class, 'edit'])->name('waste.edit')->middleware(['auth', 'admin']);
Route::put('/waste/{id}/update', [App\Http\Controllers\wasteController::class, 'update'])->name('waste.update')->middleware(['auth', 'admin']);
Route::delete('/waste/{id}', [App\Http\Controllers\wasteController::class, 'destroy'])->name('waste.destroy')->middleware(['auth', 'admin']);

// Patient Medical Information Routes
Route::post('/patient/allergy/add', [PatientController::class, 'addAllergy'])->name('patient.allergy.add')->middleware(['auth', 'admin']);
Route::post('/patient/medication/add', [PatientController::class, 'addMedication'])->name('patient.medication.add')->middleware(['auth', 'admin']);
Route::post('/patient/health-concern/add', [PatientController::class, 'addHealthConcern'])->name('patient.health-concern.add')->middleware(['auth', 'admin']);
Route::post('/patient/prescription/add', [PatientController::class, 'addPrescription'])->name('patient.prescription.add')->middleware(['auth', 'admin']);
Route::post('/patient/attachment/add', [PatientController::class, 'addAttachment'])->name('patient.attachment.add')->middleware(['auth', 'admin']);
Route::post('/patient/appointment/add', [PatientController::class, 'addAppointment'])->name('patient.appointment.add')->middleware(['auth', 'admin']);
Route::post('/patient/medical-record/add', [PatientController::class, 'addMedicalRecord'])->name('patient.medical-record.add')->middleware(['auth', 'admin']);

// Patient Medical Records CRUD Routes
Route::prefix('patient')->group(function () {
    // Allergies
    Route::get('/allergy/{id}', [PatientController::class, 'getAllergy'])->name('patient.allergy.get')->middleware(['auth', 'admin']);
    Route::put('/allergy/{id}', [PatientController::class, 'updateAllergy'])->name('patient.allergy.update')->middleware(['auth', 'admin']);
    Route::delete('/allergy/{id}', [PatientController::class, 'deleteAllergy'])->name('patient.allergy.delete')->middleware(['auth', 'admin']);
    
    // Medications
    Route::get('/medication/{id}', [PatientController::class, 'getMedication'])->name('patient.medication.get')->middleware(['auth', 'admin']);
    Route::put('/medication/{id}', [PatientController::class, 'updateMedication'])->name('patient.medication.update')->middleware(['auth', 'admin']);
    Route::delete('/medication/{id}', [PatientController::class, 'deleteMedication'])->name('patient.medication.delete')->middleware(['auth', 'admin']);
    
    // Health Concerns
    Route::get('/health-concern/{id}', [PatientController::class, 'getHealthConcern'])->name('patient.health-concern.get')->middleware(['auth', 'admin']);
    Route::put('/health-concern/{id}', [PatientController::class, 'updateHealthConcern'])->name('patient.health-concern.update')->middleware(['auth', 'admin']);
    Route::delete('/health-concern/{id}', [PatientController::class, 'deleteHealthConcern'])->name('patient.health-concern.delete')->middleware(['auth', 'admin']);
    
    // Attachments
    Route::post('/attachment/add', [PatientController::class, 'addAttachment'])->name('patient.attachment.add')->middleware(['auth', 'admin']);
    Route::get('/attachment/{id}', [PatientController::class, 'getAttachment'])->name('patient.attachment.get')->middleware(['auth', 'admin']);
    Route::put('/attachment/{id}', [PatientController::class, 'updateAttachment'])->name('patient.attachment.update')->middleware(['auth', 'admin']);
    Route::delete('/attachment/{id}', [PatientController::class, 'deleteAttachment'])->name('patient.attachment.delete')->middleware(['auth', 'admin']);

     // Add this new route for prescription updates
    Route::put('/prescription/{id}', [PatientController::class, 'updatePrescription'])
        ->name('patient.prescription.update')->middleware(['auth', 'admin']);
    
    // Add this new route for deleting prescriptions
    Route::delete('/prescription/{id}', [PatientController::class, 'deletePrescription'])
        ->name('patient.prescription.delete')->middleware(['auth', 'admin']);
});

Route::get('/waste-list', [DashboardController::class, 'waste_list'])->name('page.waste-list')->middleware(['auth', 'admin']);

Route::put('/position/update', [PositionController::class, 'update'])->name('position.update')->middleware(['auth', 'admin']);

Route::post('/verify-coupon', [App\Http\Controllers\CouponController::class, 'verify'])->name('coupon.verify');
Route::get('/patient/get-points', [PatientController::class, 'getPatientPoints'])->name('patient.get.points');

//User Routes
Route::post('/user/create', [UserController::class, 'create'])->name('user.create')->middleware(['auth', 'admin']);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('page.edit-user')->middleware(['auth', 'admin']);
Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware(['auth', 'admin']);
Route::post('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware(['auth', 'admin']);
Route::get('/users/create', [UserController::class, 'createForm'])->name('user.create.form');


Route::post('/check-first-time-patient', [App\Http\Controllers\BookingController::class, 'checkFirstTimePatient'])->name('check.first.time.patient');

// Package management routes
Route::get('/new-package', [DashboardController::class, 'new_package'])->name('page.new-package');
Route::get('/packages-list', [DashboardController::class, 'packages_list'])->name('page.packages-list');
Route::post('/package/create', [App\Http\Controllers\PackageController::class, 'create'])->name('package.create');
Route::get('/package/edit/{id}', [App\Http\Controllers\PackageController::class, 'edit'])->name('package.edit');
Route::put('/package/update', [App\Http\Controllers\PackageController::class, 'update'])->name('package.update');
Route::delete('/package/delete', [App\Http\Controllers\PackageController::class, 'delete'])->name('package.delete');
Route::get('/package/all', [App\Http\Controllers\PackageController::class, 'index'])->name('get.packages');


Route::get('/service-product', [ServiceProductController::class, 'index'])->name('service.product.report');
Route::get('/services/{id}/details', [ServiceProductController::class, 'getServiceDetails']);

Route::get('/sales-transaction', [App\Http\Controllers\SalesTransactionController::class, 'index']);
Route::post('/sales-transaction/filter', [App\Http\Controllers\SalesTransactionController::class, 'filter']);


Route::get('/void-logs', [VoidLogController::class, 'voidLogs'])->name('void.logs');

Route::get('/void-logs', [VoidLogController::class, 'voidLogs'])->name('void.logs');

Route::get('/service/get-cost', [serviceController::class, 'getCost'])->name('service.get_cost');

// Or for API routes
Route::get('/api/service/get-cost', [serviceController::class, 'getCost'])->name('service.get_cost');

// If it's a POST request
Route::post('/service/get-cost', [serviceController::class, 'getCost'])->name('service.get_cost');

// In routes/web.php or routes/api.php


Route::get('/booking', [BookingController::class, 'index']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Should have something like this:
Route::get('/booking', [BookingController::class, 'index'])->name('page.booking');
// In routes/web.php
Route::get('/booking', [BookingController::class, 'index'])->name('page.booking');

Route::get('/booking', function () {return view('page.booking');})->name('page.booking');

Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('page.booking');

// Add this to your routes/web.php
Route::get('/package/get-cost', [PackageController::class, 'getCost'])->name('package.get_cost');


Route::get('/package/get-cost', [PackageController::class, 'getCost'])->name('package.get_cost');

Route::get('/package/get-cost', [App\Http\Controllers\PackageController::class, 'getCost'])->name('package.get_cost');


// Temporary debug route
Route::get('/debug-coupon/{id}', function($id) {
    $coupon = App\Models\Coupon::find($id);
    return response()->json([
        'start_date' => $coupon->start_date,
        'end_date' => $coupon->end_date,
        'now' => now()->format('Y-m-d H:i:s'),
        'timezone' => config('app.timezone')
    ]);
});

// For Option 1:
Route::post('/services/cost', [serviceController::class, 'getServiceCost']);

// For Option 2:


Route::post('/services/cost', [ServiceCostController::class, 'getServiceCost']);

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');


Route::put('/package/update', [App\Http\Controllers\PackageController::class, 'update'])->name('package.update');