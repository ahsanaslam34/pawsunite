<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use App\Models\sub_category;
use App\Models\unit;
use App\Models\attribute;
use App\Models\brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryArr=category::all();
        $unitArr=unit::all();
        $brandArr=brand::all();
        $subCatArr=sub_category::all();
        $attrArr=attribute::orderBy('id','desc')->get();
        return view('admin/addpro',compact('categoryArr','unitArr','subCatArr','attrArr','brandArr'));
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
        
        $req=new product;
        $req->pname=$request->input('txtpname');
        $req->price=$request->input('txtprice');
        $req->discount=$request->input('txtdiscount');
        $req->new_price=$request->input('txtnewprice');
        $req->price_dollar=$request->input('txtpricedollar');
        $req->discount_dollar=$request->input('txtdiscountdollar');
        $req->new_price_dollar=$request->input('txtnewpricedollar');
        $req->attr_id=$request->input('txtattr');
        $req->brand_id=$request->input('txtbrand');
        $req->unit=$request->input('txtunit');
        $req->cat_id=$request->input('txtcat');
        $req->sub_id=$request->input('txtsub');
        $req->des=$request->input('txtdes');
        $req->status=1;
        // $req->img='test';

        if($request->hasfile('txtimage'))
        {
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/product/', $filename);
            $req->img = $filename;
        }

        //Related image
        if($request->hasfile('txtrelatedimg'))
        {
            

            foreach($request->file('txtrelatedimg') as $image)
            {
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $name=$time . '-' .$image->getClientOriginalName();
                $image->move('assets/img/product/', $name);
                $data[] = $name;  
            }
            $req->img2 = implode(",", $data);

        }

        $req->save();
        return redirect()->back()->with('message','Product Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        // $product_data=product::all();
        $product_data=DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('units','products.unit','=','units.id')
        ->select('products.id','products.img','products.pname','units.des as unit','category.des as cat','products.status','products.price','products.created_at','products.price_dollar')
        ->orderBy('products.id','desc')
        ->get();
        // return $data;
        return view('admin/productlist')->with('productArr',$product_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::find($id);
        $categoryArr=category::all();
        $brandArr=brand::all();
        $unitArr=unit::all();
        $subCatArr=sub_category::all();
        $attrArr=attribute::orderBy('id','desc')->get();

        return view('admin/editpro',compact('categoryArr','unitArr','subCatArr','attrArr','brandArr'))->with('productArr',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $req=product::find($id);
        $req->pname=$request->input('txtpname');
        $req->price=$request->input('txtprice');
        $req->discount=$request->input('txtdiscount');
        $req->new_price=$request->input('txtnewprice');
        $req->price_dollar=$request->input('txtpricedollar');
        $req->discount_dollar=$request->input('txtdiscountdollar');
        $req->new_price_dollar=$request->input('txtnewpricedollar');
        $req->attr_id=$request->input('txtattr');
        $req->brand_id=$request->input('txtbrand');
        $req->unit=$request->input('txtunit');
        $req->cat_id=$request->input('txtcat');
        $req->sub_id=$request->input('txtsub');
        $req->des=$request->input('txtdes');
        $req->status=$request->input('txtstatus');
        // $req->img='test';

        if($request->hasfile('txtimage'))
        {
            $imgCheck1 = $req->img;
            if (is_file($imgCheck1)){
                unlink("assets/img/product/".$req->img);
            }
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/product/', $filename);
            $req->img = $filename;
        }

        //Related image
        if($request->hasfile('txtrelatedimg'))
        {
            
             $imgCheck2 = $req->img2;
            if (is_file($imgCheck2)){
                $productRelatedImg=explode(",",$req->img2);
                for ($i=0; $i < count($productRelatedImg); $i++) { 
                    unlink("assets/img/product/".$productRelatedImg[$i]);                
                }

            }

            foreach($request->file('txtrelatedimg') as $image)
            {
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $name=$time . '-' .$image->getClientOriginalName();
                $image->move('assets/img/product/', $name);
                $data[] = $name;  
            }
            $req->img2 = implode(",", $data);

        }

        $req->save();
        return redirect('products')->with('message','Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product,Request $request)
    {
        $id=$request->input('txtid');
        $product=product::find($id);        
        $imgCheck1 = $product->img;
            if (is_file($imgCheck1)){
                unlink("assets/img/product/".$product->img);
            }
        if ($product->img2) {
            $imgCheck2 = $product->img2;
            if (is_file($imgCheck2)){
                $productRelatedImg=explode(",",$product->img2);
                for ($i=0; $i < count($productRelatedImg); $i++) { 
                    unlink("assets/img/product/".$productRelatedImg[$i]);
                    
                }
            }

        }
        product::destroy(array('id',$id));
        return redirect('products');
    }
    
}
