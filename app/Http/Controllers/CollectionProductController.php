<?php

namespace App\Http\Controllers;

use App\Models\collection;
use App\Models\collectionProduct;
use App\Models\product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CollectionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productArr=DB::table('collection_products')
        ->join('products','collection_products.pid','products.id')
        ->where('collection_products.col_id','=',$id)
        ->select('collection_products.id as id','products.id as pid','products.img as img','products.pname as pname')
        ->get();
        $data=collection::find($id);


        return view('admin/collectionProductList',compact('productArr'))->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=collection::find($id);
        $productArr=product::all();
        return view('/admin/collectionProductAdd',compact('productArr'))->with('data',$data);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $product_id=$request->input('pid');
        $request->validate([
            "pid"=>"required"
        ]);
        for ($i=0; $i < count($product_id); $i++) { 
        $res=new collectionProduct;
            $res->col_id=$id;
            $res->pid=$product_id[$i];
            $res->save();
            
        }
        return redirect('collectionPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\collectionProduct  $collectionProduct
     * @return \Illuminate\Http\Response
     */
    public function show(collectionProduct $collectionProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\collectionProduct  $collectionProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(collectionProduct $collectionProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\collectionProduct  $collectionProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, collectionProduct $collectionProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\collectionProduct  $collectionProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(collectionProduct $collectionProduct,request $request)
    {
        $id=$request->input('txtid');
        collectionProduct::destroy(array('id',$id));
        return back();
    }
}
