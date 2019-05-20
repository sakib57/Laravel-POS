<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Auth;
use App\Warehouse;
use App\Biller;
use App\Customer;
use App\taxRate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::all();
       return view('admin.products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $warehouses = Warehouse::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $billers = Biller::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $customers = Customer::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $tax_rates = taxRate::where('fk_company_id', Auth::user()->fk_company_id)->get();
        
        return view('admin.products.create',compact([
            'categories','warehouses',
            'billers','customers',
            'tax_rates'
            ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=>'required|unique:products',
            'fk_category_id' => 'required',
            'fk_sub_category_id' => 'required',
            'product_unit'=>'required',
            'product_size'=>'required',
            'product_cost'=>'required',
            'product_price'=>'required',
            'product_alert_quantity'=>'required',
            'product_reference'=>'required|unique:products',
            'fk_warehouse_id'=>'required',
            'fk_biller_id'=>'required',
            'fk_customer_id'=>'required',
            'fk_product_tax'=>'required'
            
        ]);

        $product_save = Product::create($request->except('_token'));

        if($product_save){
            return \redirect('products')->with(['message'=>'Product Created Successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->get_product($id);
        return view('admin.products.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $warehouses = Warehouse::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $billers = Biller::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $customers = Customer::where('fk_company_id', Auth::user()->fk_company_id)->get();
        $tax_rates = taxRate::where('fk_company_id', Auth::user()->fk_company_id)->get();
        
        
        $product = $this->get_product($id);
        return view('admin.products.edit', compact(['categories','warehouses',
        'billers','customers',
        'tax_rates','product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'=>'required|unique:products,product_name,'.$request->id,
            'fk_category_id' => 'required',
            'fk_sub_category_id' => 'required',
            'product_unit'=>'required',
            'product_size'=>'required',
            'product_cost'=>'required',
            'product_price'=>'required',
            'product_alert_quantity'=>'required',
            'product_reference'=>'required|unique:products,product_reference,'.$request->id,
            'fk_warehouse_id'=>'required',
            'fk_biller_id'=>'required',
            'fk_customer_id'=>'required',
            'fk_product_tax'=>'required'
        ]);

        $product = $this->get_product($id);
        $product_update = $product->update($request->except(['_token']));

        if($product_update){
            return \redirect('products')->with(['message'=>'Product Updated Successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->get_product($id);
        $product->delete();
        return \redirect('products')->with(['message'=>'Product Deleted Successfully!']);
    }

    public function get_product($id){
        return Product::findOrFail($id);
    }




    function get_subcategories(Request $request){
        if($request->ajax()){
            $sub_categories = SubCategory::where('fk_category_id', $request->id)->pluck('sub_category_name', 'id');
            return response()->json($sub_categories);
        }
    }



    //<import csv file>
    public function get_import(){
        return view('admin.products.import');
    }

    public function parse_import(Request $request){
        $path = $request->file('product_csv')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $count = count($data);
        $csv_data = array_slice($data, 1, $count);

        $csv_data_file = CsvData::create([
            'csv_file_name' => $request->file('product_csv')->getClientOriginalName(),
            'csv_header' => 1,
            'csv_data' => json_encode($csv_data)
        ]);


        return view('admin.products.import_fields', ['csv_data'=>$csv_data, 'csv_data_file'=>$csv_data_file]);

    }

    public function process_import(Request $request){
        
        $data = CsvData::findOrFail($request->csv_file_id);
        $csv_data = json_decode($data->csv_data, true);

        foreach($csv_data as $row){
            $product = new Product();

            $duplicate_error = 0;
            $value_not_exist_error = 0;
            
            $product->fk_company_id = $request->fk_company_id;
            $product->fk_created_by = $request->fk_created_by;
            $product->fk_updated_by = $request->fk_updated_by;
            $product_max_id = Product::max('id')+1;
            $product_code_db = 'product-'.$product_max_id;
            $product->product_code = $product_code_db;

            foreach(config('app.import_fields_product') as $index => $field){
                $product->$field = $row[$index];
                
            }

            if($this->check_column_value($product->$field)){
                $value_not_exist_error += 1;
            }elseif($this->check_duplicate($product->product_code, $product->product_name) == TRUE){
                $duplicate_error += 1;
            }
            else{
                $product->save();
            }            
            

        }
        if($value_not_exist_error>=1){
            return  \redirect('products/get_import')->with(['error'=>'Column value does not exist!']);
        }elseif($duplicate_error>=1){
            return  \redirect('products/get_import')->with(['error'=>'Duplicate data found!']);
        }
        else{
            return  \redirect('products/get_import')->with(['message'=>'Data imported succesfully!']);
        }    
        
            

    }


    function check_duplicate($product_code, $product_name){
        $duplicate_count = Product::where('product_code', $product_code)->orWhere('product_name', $product_name)->get()->count();
        if($duplicate_count>=1){
            return TRUE;
        }else{
            return FALSE;
        }

    }
}
