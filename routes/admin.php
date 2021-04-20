<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SummaryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ProductCategoryController;

//Admin routes exits here
Route::group(['prefix'=>'/admin','middleware'=>['auth','role:admin|staff']],function(){
  
  Route::get('/',[AdminController::class,'index'])->name('admin.index');

  Route::resource('/usermanagement',UserManagementController::class);

  Route::get('/customer/filter',[CustomerController::class,'filter'])->name('customer.filter');
  Route::resource('/customer',CustomerController::class);

  Route::resource('/category',CategoryController::class); //expense category
  
  Route::get('/supplier/filter',[SupplierController::class,'filter'])->name('supplier.filter');
  Route::resource('/supplier',SupplierController::class);
  
  Route::resource('/summary',SummaryController::class);
  
  Route::resource('/product-category',ProductCategoryController::class);
  
  Route::get('/product/search',[ProductController::class,'search'])->name('product.search');
  Route::resource('/product',ProductController::class);

  Route::get('/sale/filter',[SaleController::class,'filter'])->name('sale.filter');
  Route::get('/sale/printInvoice/{id}',[SaleController::class,'printInvoice'])->name('sale.printInvoice');
  Route::resource('/sale',SaleController::class);

  Route::get('/quotation/filter',[QuotationController::class,'filter'])->name('quotation.filter');
  Route::resource('/quotation',QuotationController::class);
  Route::get('/quotation/printInvoice/{id}',[QuotationController::class,'printInvoice'])->name('quotation.printInvoice');
  Route::get('/quotation/mail/{id}',[QuotationController::class,'mail'])->name('quotation.mail');

  Route::get('/purchase/filter',[PurchaseController::class,'filter'])->name('purchase.filter');
  Route::resource('/purchase',PurchaseController::class);

  Route::get('/expense/filter',[ExpenseController::class,'filter'])->name('expense.filter');
  Route::resource('/expense',ExpenseController::class);
  
  Route::get('/income/filter',[IncomeController::class,'filter'])->name('income.filter');
  Route::resource('/income',IncomeController::class);

  Route::post('/setting/upload',[SettingController::class,'upload'])->name('setting.upload');
  Route::resource('/setting',SettingController::class);

  Route::get('/admin-password',[AdminPasswordController::class,'index'])->name('admin-password.index');
  Route::patch('/admin-password',[AdminPasswordController::class,'update'])->name('admin-password.update');
});
