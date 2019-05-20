<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
   
    public function index()
    {
        $account=Account::all();
       // dd($account);
        return view('admin.account.accounts.index')->with('all_account',$account);
    }

    
    public function create()
    {
        return view('admin.account.accounts.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'account_no'=>'required|unique:accounts',
            'account_name'=>'required',
            'branch_name'=>'required',
            'status'=>'required'
        ]);


        if($request->default_account){
            $def_acct=1;
            
            $val=Account::where('default_account',1)->get();
            foreach ($val as $v) {
                Account::where('default_account',1)->update(array('default_account'=>0));
            }
        }else{
            $def_acct=0;
        }

        $account=new Account;

        $account->account_no=$request->account_no;
        $account->account_name=$request->account_name;
        $account->branch_name=$request->branch_name;
        $account->status=$request->status;
        $account->default_account=$def_acct;        
        $account->fk_created_by=$request->user_id;
        $account->fk_updated_by=$request->user_id;
        $account->fk_company_id=$request->company_id;
        $account->save();

        if($account){
            return \redirect('accounts')->with(['message'=>'Account Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);
        return view('admin.account.accounts.show',['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('admin.account.accounts.edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'account_no'=>'required',
            'account_name'=>'required',
            'branch_name'=>'required'
        ]);

       if($request->default_account){
            $def_acct=1;
            
            $val=Account::where('default_account',1)->get();
            foreach ($val as $v) {
                Account::where('default_account',1)->update(array('default_account'=>0));
            }
        }else{
            $def_acct=0;
        }

        $stts=Account::where('id',$id)
                        ->update(array('account_no' => $request->account_no,
                                        'account_name'=>$request->account_name,
                                        'branch_name'=>$request->branch_name,
                                        'default_account'=>$def_acct,
                                        'fk_updated_by'=>$request->user_id));
        if($stts){
            return \redirect('accounts')->with(['message'=>'Account Updated Successfuly!']);
        }
    }

    public function destroy($id)
    {
        $stts=Account::where('id',$id)->delete($id);
        if($stts){
            return \redirect('accounts')->with(['message'=>'Account Deleted Successfuly!']);
        }
    }

    public function status($id){
        $stts=Account::findOrFail($id);
        if($stts->status==0){
            Account::where('id',$id)->update(array('status' => 1));
        } elseif($stts->status==1){
            Account::where('id',$id)->update(array('status' => 0));
        }
        return \redirect('accounts')->with(['message'=>'Status Updated Successfuly!']);
    }
}
