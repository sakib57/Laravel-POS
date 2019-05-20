<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.global_config.companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.global_config.companies.create');
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
            'name' => 'required|unique:companies',
            'phone' => 'required|regex: /(01)[0-9]{9}/|size:11',
            'email' => 'required',
            'website' => 'required',
            'address' => 'required',
            'company_logo' => 'required'
        ]);

        $company = new Company;
        $company_id = $company->max('id') + 1 ;
            
        if($request->file('company_logo')){
            $company->company_logo = $this->upload_image($request->file('company_logo'), $company_id);
        }

        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->save();

        if($company){
            
            return \redirect('companies')->with(['message'=>'Company Created Successfuly!']);
        }
    }

    public function upload_image($image, $company_id){
        $imageName = $company_id.'_logo.jpg';
        $image->move('assets/company_logo',$imageName);
        return $imageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.global_config.companies.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.global_config.companies.edit', ['company' => $company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|name|unique:companies,name,{{ $id }}',
            'phone' => 'required|regex: /(01)[0-9]{9}/|size:11',
            'email' => 'required',
            'website' => 'required',
            'address' => 'required',
            'company_logo' => 'required'
        ]);

        $company = Company::findOrFail($id);
        $company_id = $company->id ;
            
        if($request->file('company_logo')){
            $company->company_logo = $this->upload_image($request->file('company_logo'), $company_id);
        }

        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->save();

        if($company){
            
            return \redirect('companies')->with(['message'=>'Company Updated Successfuly!']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();


        return redirect('/companies')->with(['message'=>'Company Deleted Success!']);
    }
}
