<?php

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('companies', 'CompanyController');
    Route::resource('users', 'UserController');
    Route::get('myProfile', 'ProfileController@index');




    //<settings>
    Route::resource('settings/categories', 'CategoryController');
    Route::resource('settings/subcategories', 'SubCategoryController');
    Route::resource('settings/warehouses', 'WarehouseController');
    Route::resource('settings/tax-rates', 'TaxRateController');
    Route::resource('settings/discounts', 'DiscountController');
    //</settings>

    //Accounts>
    Route::resource('accounts/charts', 'AccountChartController');
    Route::get('accounts/charts/status/{id}', 'AccountChartController@status')->name('charts.status');
    
    Route::resource('accounts/payments-method', 'PaymentController');
    Route::get('accounts/payments-method/status/{id}', 'PaymentController@status')->name('payment.status');

    Route::get('accounts/status/{id}', 'AccountController@status')->name('account.status');
    Route::resource('accounts', 'AccountController');
    //Accounts>



    //<Payments>
    Route::resource('payments', 'MakePaymentController');
    //</Payments>

    


	//<suppliers>
    Route::get('people/suppliers/get_import', 'SupplierController@get_import');
    Route::post('people/suppliers/parse_import', 'SupplierController@parse_import');
    Route::post('people/suppliers/process_import', 'SupplierController@process_import');
    Route::resource('people/suppliers', 'SupplierController');
    //</suppliers>

    Route::resource('people/users', 'UserController');
    Route::resource('people/billers', 'BillerController');
    
    //<customers>
    Route::get('people/customers/get_import', 'CustomerController@get_import');
    Route::post('people/customers/parse_import', 'CustomerController@parse_import');
    Route::post('people/customers/process_import', 'CustomerController@process_import');
    Route::resource('people/customers', 'CustomerController');


    Route::resource('quotations', 'QuotationController');

   


  
    Route::get('sales/delivery', 'SaleController@delivery')->name('sales.delivery');
    Route::resource('sales', 'SaleController');

    Route::resource('purchases', 'PurchaseController');

    //<product>
    Route::get('products/get_import', 'ProductController@get_import');
    Route::post('products/parse_import', 'ProductController@parse_import');
    Route::post('products/process_import', 'ProductController@process_import');
    Route::get('products/sub_categories', 'ProductController@get_subcategories');
    Route::resource('products', 'ProductController');
    //</product>


});
