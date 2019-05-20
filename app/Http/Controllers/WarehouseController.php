<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse=Warehouse::all();
        return view('admin.settings.warehouses.index')->with('warehouse',$warehouse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'warehouse_code'=>'required|unique:warehouses',
            'warehouse_name'=>'required',
            'address'=>'required',
            'city'=>'required'
        ]);

        $watehouse=new warehouse;

        $watehouse->warehouse_code=$request->warehouse_code;
        $watehouse->warehouse_name=$request->warehouse_name;
        $watehouse->address=$request->address;
        $watehouse->city=$request->city;
        $watehouse->fk_created_by=$request->user_id;
        $watehouse->fk_updated_by=$request->user_id;
        $watehouse->fk_company_id=$request->fk_company_id;

        $watehouse->save();

        if($watehouse){
            return \redirect('settings/warehouses')->with(['message'=>'Warehouse Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('admin.settings.warehouses.show',['warehouse' => $warehouse]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('admin.settings.warehouses.edit', ['warehouse' => $warehouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'warehouse_code'=>'required',
            'warehouse_name'=>'required',
            'address'=>'required',
            'city'=>'required'
        ]);
        //dd($request);
        $stts=Warehouse::where('id',$id)
                        ->update(array('warehouse_code' => $request->warehouse_code,
                                        'warehouse_name'=>$request->warehouse_name,
                                        'address'=>$request->address,
                                        'address'=>$request->address,
                                        'city'=>$request->city,
                                        'fk_updated_by'=>$request->user_id));
        if($stts){
            return \redirect('settings/warehouses')->with(['message'=>'Warehouse Updated Successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $stts=Warehouse::where('id',$id)->delete($id);
        if($stts){
            return \redirect('settings/warehouses')->with(['message'=>'Warehouse Deleted Successfuly!']);
        }
    }
}
