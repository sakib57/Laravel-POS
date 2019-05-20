<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $purchases = Purchase::all();
       return view('admin.purchases.index', ['purchases'=>$purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.purchases.create');
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
            'purchase_code'=>'required|unique:purchases',
            'phone' => 'required|unique:purchases',
            'email' => 'required|unique:purchases',
            'address' => 'required'
        ]);

        $purchase_save = Purchase::create($request->except('_token'));

        if($purchase_save){
            return \redirect('people/purchases')->with(['message'=>'Purchase Created Successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchases.show', ['purchase'=>$purchase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchases.edit', ['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:purchases,name,'.$request->id,
            'purchase_code'=>'required|unique:purchases,purchase_code,'.$request->id,
            'phone' => 'required|unique:purchases,phone,'.$request->id,
            'email' => 'required|unique:purchases,email,'.$request->id,
            'address' => 'required'
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase_update = $purchase->update($request->except(['_token']));

        if($purchase_update){
            return \redirect('people/purchases')->with(['message'=>'Purchase Updated Successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
