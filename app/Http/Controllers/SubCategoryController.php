<?php

namespace App\Http\Controllers;
 
use App\Models\category;
use App\Models\sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=new sub_category;
        $res->cat_id=$request->input('txtcat');
        $res->des=$request->input('txtsubCat');
        $res->save();
        // return $request->input();
        return redirect('sub_cat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(sub_category $sub_category)
    {
        // $subCategory=sub_category::all();
        $subCategory=DB::table('sub_category')
        ->join('category','category.id','=','sub_category.cat_id')
        ->select('sub_category.id','sub_category.des as des','sub_category.created_at','category.des as cat_des','category.id as cat_id')
        ->orderBy('sub_category.id','desc')
        ->get();
        $categoryData=category::all();
        return view('admin/sub_category',compact('subCategory','categoryData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(sub_category $sub_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sub_category $sub_category)
    {
        $id=$request->input('txtid');
        $res=sub_category::find($id);
        $res->cat_id=$request->input('txtcat');
        $res->des=$request->input('txtsubCat');
        $res->save();
        // return $request->input();
        return redirect('sub_cat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(sub_category $sub_category,request $request)
    {
        $id=$request->input('txtid');
        sub_category::destroy(array('id',$id));
        return redirect('sub_cat');
    }
}
