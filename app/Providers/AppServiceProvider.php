<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Auth;
use App\Biller;
use App\Supplier;
use App\Customer;
use App\Purchase;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);
       
        view()->composer('*', function($view){
            if(auth()->check()){
                $user_id_session = Auth::user()->id;
                $company_id_session = Auth::user()->fk_company_id;
                $role_id_session = Auth::user()->fk_role_id;
                $view->with('user_id_session', $user_id_session);
                $view->with('company_id_session', $company_id_session);
                $view->with('role_id_session', $role_id_session);
                
                $biller_max_id = Biller::max('id')+1;
                $biller_code_db = 'biller-'.$biller_max_id;
                $view->with('biller_code_db', $biller_code_db);
                
                $supplier_max_id = Supplier::max('id')+1;
                $supplier_code_db = 'supplier-'.$supplier_max_id;
                $view->with('supplier_code_db', $supplier_code_db);
                
                $customer_max_id = Customer::max('id')+1;
                $customer_code_db = 'customer-'.$customer_max_id;
                $view->with('customer_code_db', $customer_code_db);
                
                $purchase_max_id = Purchase::max('id')+1;
                $purchase_code_db = 'purchase-'.$purchase_max_id;
                $view->with('purchase_code_db', $purchase_code_db);

                $product_max_id = Product::max('id')+1;
                $product_code_db = 'product-'.$product_max_id;
                $view->with('product_code_db', $product_code_db);
                
            }
        });
       // View::share('company_id_se', '123');

    }
}
