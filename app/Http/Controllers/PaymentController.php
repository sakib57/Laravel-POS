<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Account;
use Illuminate\Http\Request;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('payments')
            ->join('accounts', 'payments.fk_account', '=', 'accounts.id')
            ->select('payments.*', 'accounts.account_no','accounts.account_name')
            ->get();
        return view('admin.account.payments.index')->with('payments',$payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts=Account::all();
        return view('admin.account.payments.create')->with('accounts',$accounts);
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
            'fk_account'=>'required',
            'method_name'=>'required',
            'description'=>'required'
        ]);

        $payment=new Payment;

        $payment->fk_account=$request->fk_account;
        $payment->method_name=$request->method_name;
        $payment->description=$request->description;
        $payment->status=$request->status;       
        $payment->fk_created_by=$request->user_id;
        $payment->fk_updated_by=$request->user_id;
        $payment->fk_company_id=$request->company_id;
        $payment->save();

        if($payment){
            return \redirect('accounts/payments')->with(['message'=>'Account Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payament  $payament
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$payments = Payment::findOrFail($id);

        $payments = DB::table('payments')
            ->where('payments.id',$id)
            ->join('accounts', 'payments.fk_account', '=', 'accounts.id')
            ->select('payments.*', 'accounts.account_name','accounts.account_no')
            ->first();

        return view('admin.account.payments.show',['payments' => $payments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payament  $payament
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.account.payments.edit', ['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payament  $payament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'method_name'=>'required',
            'description'=>'required'
        ]);

       

        $stts=Payment::where('id',$id)
                        ->update(array('method_name' => $request->method_name,
                                        'description'=>$request->description,
                                        'fk_updated_by'=>$request->user_id));
        if($stts){
            return \redirect('accounts/payments')->with(['message'=>'Payment Method Updated Successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payament  $payament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stts=Payment::where('id',$id)->delete($id);
        if($stts){
            return \redirect('accounts/payments')->with(['message'=>'Payment Method Deleted Successfuly!']);
        }
    }

    public function status($id){
        $stts=Payment::findOrFail($id);
        if($stts->status==0){
            Payment::where('id',$id)->update(array('status' => 1));
        } elseif($stts->status==1){
            Payment::where('id',$id)->update(array('status' => 0));
        }
        return \redirect('accounts/payments')->with(['message'=>'Status Updated Successfuly!']);
    }
}
