<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\CsvData;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $suppliers = Supplier::all();
       return view('admin.people.suppliers.index', ['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.people.suppliers.create');
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
            'supplier_code'=>'required|unique:suppliers',
            'phone' => 'required|unique:suppliers|regex: /(01)[0-9]{9}/|size:11',
            'email' => 'required|unique:suppliers',
            'address' => 'required'
        ]);

        $supplier_save = Supplier::create($request->except('_token'));

        if($supplier_save){
            return \redirect('people/suppliers')->with(['message'=>'Supplier Created Successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = $this->get_supplier($id);
        return view('admin.people.suppliers.show', ['supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = $this->get_supplier($id);
        return view('admin.people.suppliers.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:suppliers,name,'.$request->id,
            'supplier_code'=>'required|unique:suppliers,supplier_code,'.$request->id,
            'phone' => 'required|regex: /(01)[0-9]{9}/|size:11|unique:suppliers,phone,'.$request->id,
            'email' => 'required|unique:suppliers,email,'.$request->id,
            'address' => 'required'
        ]);

        $supplier = $this->get_supplier($id);
        $supplier_update = $supplier->update($request->except(['_token']));

        if($supplier_update){
            return \redirect('people/suppliers')->with(['message'=>'Supplier Updated Successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = $this->get_supplier($id);
        $supplier->delete();
        return \redirect('people/suppliers')->with(['message'=>'Supplier Deleted Successfully!']);
    }

    public function get_supplier($id){
        return Supplier::findOrFail($id);
    }


//<import csv file>
    public function get_import(){
        return view('admin.people.suppliers.import');
    }

    public function parse_import(Request $request){
        $path = $request->file('supplier_csv')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $count = count($data);
        $csv_data = array_slice($data, 1, $count);

        $csv_data_file = CsvData::create([
            'csv_file_name' => $request->file('supplier_csv')->getClientOriginalName(),
            'csv_header' => 1,
            'csv_data' => json_encode($csv_data)
        ]);


        return view('admin.people.suppliers.import_fields', ['csv_data'=>$csv_data, 'csv_data_file'=>$csv_data_file]);

    }

    public function process_import(Request $request){
        
        $data = CsvData::findOrFail($request->csv_file_id);
        $csv_data = json_decode($data->csv_data, true);

        foreach($csv_data as $row){
            $supplier = new Supplier();

            $duplicate_error = 0;
            
            $supplier->fk_company_id = $request->fk_company_id;
            $supplier->fk_created_by = $request->fk_created_by;
            $supplier->fk_updated_by = $request->fk_updated_by;
            $supplier_max_id = Supplier::max('id')+1;
            $supplier_code_db = 'supplier-'.$supplier_max_id;
            $supplier->supplier_code = $supplier_code_db;

            foreach(config('app.import_fields_people') as $index => $field){
                $supplier->$field = $row[$index];
                
            }

            if($this->check_duplicate($supplier->phone, $supplier->email) == TRUE){
                $duplicate_error += 1;
            }
            else{
                $supplier->save();
            }            
            

        }
        if($duplicate_error>=1){
            return  \redirect('people/suppliers/get_import')->with(['error'=>'Duplicate data found!']);
        }
        else{
            return  \redirect('people/suppliers/get_import')->with(['message'=>'Data imported succesfully!']);
        }    
        
            

    }


    function check_duplicate($supplier_phone, $supplier_email){
        $duplicate_count = Supplier::where('phone', $supplier_phone)->orWhere('email', $supplier_email)->get()->count();
        if($duplicate_count>=1){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    // </import>

}
