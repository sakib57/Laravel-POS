<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.settings.categories.index')->with('all_categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "sdfjhdj";
        // exit();
        $this->validate($request,[
            'category_code'=>'required|unique:categories',
            'category_name'=>'required'
        ]);

        $category=new Category;

        $category->category_name=$request->category_name;
        $category->category_code=$request->category_code;
        $category->fk_created_by=$request->user_id;
        $category->fk_updated_by=$request->user_id;
        $category->fk_company_id=$request->company_id;

        $category->save();

        if($category){
            return \redirect('settings/categories')->with(['message'=>'Category Created Successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.settings.categories.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::findOrFail($id);

         
        //dd($category);
        return view('admin.settings.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request,[
            'category_code'=>'required',
            'category_name'=>'required'
        ]);

        $stts=Category::where('id',$id)
                        ->update(array('category_name' => $request->category_name,
                                        'category_code'=>$request->category_code,
                                        'fk_updated_by'=>$request->updated_by));
        if($stts){
            return \redirect('settings/categories')->with(['message'=>'Category Updated Successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // return $id;
        // exit();
        $stts=Category::where('id',$id)->delete($id);
        if($stts){
            return \redirect('settings/categories')->with(['message'=>'Category Deleted Successfuly!']);
        }
    }
}
