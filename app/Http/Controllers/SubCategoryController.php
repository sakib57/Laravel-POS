<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sub_category=subCategory::all();

        //$sub_category = Category::with('category')->get();

        $sub_category = DB::table('sub_categories')
            ->join('categories', 'sub_categories.fk_category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->get();
        return view('admin.settings.sub_categories.index')->with('sub_categories',$sub_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.settings.sub_categories.create')->with('categories',$category);
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
            'sub_category_code'=>'required|unique:sub_categories',
            'sub_category_name'=>'required'
        ]);

        $sub_category=new subCategory;

        $sub_category->sub_category_name=$request->sub_category_name;
        $sub_category->sub_category_code=$request->sub_category_code;
        $sub_category->fk_created_by=$request->user_id;
        $sub_category->fk_updated_by=$request->user_id;
        $sub_category->fk_company_id=$request->fk_company_id;
        $sub_category->fk_category_id=$request->fk_category_id;

        $sub_category->save();

        if($sub_category){
            return \redirect('settings/subcategories')->with(['message'=>'Sub Category Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //return view('admin.settings.sub_categories.show');
        //$su_bcategory = subCategory::findOrFail($id);
        $sub_category = DB::table('sub_categories')
            ->where('sub_categories.id',$id)
            ->join('categories', 'sub_categories.fk_category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->first();
        return view('admin.settings.sub_categories.show',['sub_category' => $sub_category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = DB::table('sub_categories')
            ->where('sub_categories.id',$id)
            ->join('categories', 'sub_categories.fk_category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name','categories.id as cat_id')
            ->first();


        //dd($sub_category);

        $category=Category::all();
        return view('admin.settings.sub_categories.edit',['sub_category' => $sub_category])->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return "sjdhajksd";
        // exit();
        $this->validate($request,[
            'sub_category_code'=>'required',
            'sub_category_name'=>'required'
        ]);
        // return $id;
        // exit();
        $stts=subCategory::where('id',$id)
                        ->update(array('sub_category_name' => $request->sub_category_name,
                                        'sub_category_code'=>$request->sub_category_code,
                                        'fk_category_id'=>$request->fk_category_id,
                                        'fk_updated_by'=>$request->updated_by));
        if($stts){
            // return "sjdhajksd";
            // exit();
            return \redirect('settings/subcategories')->with(['message'=>'Sub Category Updated Successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // return $id;
        // exit();
        $stts=subCategory::where('id',$id)->delete($id);
        if($stts){
            return \redirect('settings/subcategories')->with(['message'=>'Category Deleted Successfuly!']);
        }
    }
}
