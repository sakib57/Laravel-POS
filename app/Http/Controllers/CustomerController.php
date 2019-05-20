<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\CsvData;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers = Customer::all();
       return view('admin.people.customers.index', ['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.people.customers.create');
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
            'name' => 'required',
            'customer_code'=>'required|unique:customers',
            'phone' => 'required|unique:customers|regex: /(01)[0-9]{9}/|size:11',
            'email' => 'required|unique:customers|email',
            'address' => 'required'
        ]);

        $customer_save = Customer::create($request->except('_token'));

        if($customer_save){
            return \redirect('people/customers')->with(['message'=>'Customer Created Successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->get_customer($id);
        return view('admin.people.customers.show', ['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->get_customer($id);
        return view('admin.people.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:customers,name,'.$request->id,
            'customer_code'=>'required|unique:customers,customer_code,'.$request->id,
            'phone' => 'required|regex: /(01)[0-9]{9}/|size:11|unique:customers,phone,'.$request->id,
            'email' => 'required|unique:customers,email,'.$request->id,
            'address' => 'required'
        ]);

        $customer = $this->get_customer($id);
        $customer_update = $customer->update($request->except(['_token']));

        if($customer_update){
            return \redirect('people/customers')->with(['message'=>'Customer Updated Successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->get_customer($id);
        $customer->delete();
        return \redirect('people/customers')->with(['message'=>'Customer Deleted Successfully!']);
    }

    public function get_customer($id){
        return Customer::findOrFail($id);
    }



    //<import csv file>
    public function get_import(){
        return view('admin.people.customers.import');
    }

    public function parse_import(Request $request){
        $path = $request->file('customer_csv')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $count = count($data);
        $csv_data = array_slice($data, 1, $count);

        $csv_data_file = CsvData::create([
            'csv_file_name' => $request->file('customer_csv')->getClientOriginalName(),
            'csv_header' => 1,
            'csv_data' => json_encode($csv_data)
        ]);


        return view('admin.people.customers.import_fields', ['csv_data'=>$csv_data, 'csv_data_file'=>$csv_data_file]);

    }

    public function process_import(Request $request){
        
        $data = CsvData::findOrFail($request->csv_file_id);
        $csv_data = json_decode($data->csv_data, true);

        foreach($csv_data as $row){
            $customer = new Customer();

            $duplicate_error = 0;

            $customer->fk_company_id = $request->fk_company_id;
            $customer->fk_created_by = $request->fk_created_by;
            $customer->fk_updated_by = $request->fk_updated_by;
            $customer_max_id = Customer::max('id')+1;
            $customer_code_db = 'customer-'.$customer_max_id;
            $customer->customer_code = $customer_code_db;

            foreach(config('app.import_fields_people') as $index => $field){
                $customer->$field = $row[$index];
                
            }
            
            if($this->check_duplicate($customer->phone, $customer->email) == TRUE){
                $duplicate_error += 1;
            }else{
                $customer->save();
            }
            
            

        }

        if($duplicate_error >= 1){
            return \redirect('people/customers/get_import')->with(['error'=>'Duplicate Data Found!']);
        }else{
            return  \redirect('people/customers/get_import')->with(['message'=>'Data imported succesfully!']);
        }
        
            


    }


    function check_duplicate($customer_phone, $customer_email){
        $duplicate_count = Customer::where('phone', $customer_phone)->orWhere('email', $customer_email)->get()->count();
        if($duplicate_count>=1){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    // </import>

}
