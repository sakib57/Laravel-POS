<?php

namespace App\Http\Controllers;

use App\AccountChart;
use Illuminate\Http\Request;

class AccountChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_chart=AccountChart::all();
        return view('admin.account.charts.index',['account_chart'=> $account_chart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.charts.create');
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
            'head_type'=>'required',
            'head_name'=>'required',
            'status'=>'required'
        ]);

        $head=new AccountChart;

        $head->head_type=$request->head_type;
        $head->head_name=$request->head_name;
        $head->status=$request->status;
        $head->fk_created_by=$request->user_id;
        $head->fk_updated_by=$request->user_id;
        $head->fk_company_id=$request->company_id;
        //dd($head);
        $head->save();

        if($head){
            return \redirect('accounts/charts')->with(['message'=>'Head Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account_chart = AccountChart::findOrFail($id);
        return view('admin.account.charts.show',['account_chart' => $account_chart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_charts = AccountChart::findOrFail($id);
        return view('admin.account.charts.edit', ['account_charts' => $account_charts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'head_type'=>'required',
            'head_name'=>'required'
        ]);

      

        $stts=AccountChart::where('id',$id)
                        ->update(array('head_type' => $request->head_type,
                                        'head_name'=>$request->head_name,
                                        'fk_updated_by'=>$request->user_id));
        if($stts){
            return \redirect('accounts/charts')->with(['message'=>'Account Chart Updated Successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stts=AccountChart::where('id',$id)->delete($id);
        if($stts){
            return \redirect('accounts/charts')->with(['message'=>'Account Chart Deleted Successfuly!']);
        }
    }

     public function status($id){
        $stts=AccountChart::findOrFail($id);
        if($stts->status==0){
            AccountChart::where('id',$id)->update(array('status' => 1));
        } elseif($stts->status==1){
            AccountChart::where('id',$id)->update(array('status' => 0));
        }
        return \redirect('accounts/charts')->with(['message'=>'Status Updated Successfuly!']);
    }
}
