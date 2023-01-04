<?php

namespace App\Http\Controllers;

use App\Models\collection;
use App\Models\product;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=collection::all();
        // return $data;
        return view('/admin/collection')->with('dataArr',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/collectionAdd');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=new collection;
        $res->des=$request->input('txtname');
        $res->status="1";
        $res->save();
        return redirect('collectionPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=collection::find($id);
        return view('admin/collectionEdit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res=collection::find($id);
        $res->des=$request->input('txtname');
        $res->status=$request->input('txtstatus');
        $res->save();
        return redirect('collectionPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=$request->input('txtid');
        collection::destroy(array('id',$id));
        return redirect('collectionPage');
    }
}
