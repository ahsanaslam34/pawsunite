<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=attribute::orderBy('id','desc')->get();
        return view('admin/attributes')->with('attrArr',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/attributesAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=new attribute;
        $res->name=$request->input('txtname');
        $res->value=$request->input('txtvalue');
        $res->save();
        return redirect('attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(attribute $attribute,$id)
    {
        $attribute=attribute::find($id);
        return view('admin/attributesEdit')->with('attrArr',$attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res=attribute::find($id);
        $res->name=$request->input('txtname');
        $res->value=$request->input('txtvalue');
        $res->save();
        return redirect('attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute $attribute,Request $request)
    {
        $id=$request->input('txtid');
        attribute::destroy(array('id',$id));
        return redirect('attributes');
    }
}
