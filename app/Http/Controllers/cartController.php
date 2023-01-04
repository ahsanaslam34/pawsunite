<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\attribute;
use Illuminate\Support\Facades\DB;

use Session;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        return view('cart');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cartRemove(Request $request){
        
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function cartUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["cartQty"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    static function cartItem(Request $request,$id){
        
        $product = product::find($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['cartQty']++;
        } else {
            $cart[$id] = [
                "cartId" => $product->id,
                "cartName" => $product->pname,
                "cartQty" => 1,
                "cartPrice" => $product->price,
                "cartImg" => $product->img
            ];
        }
          
        session()->put('cart', $cart);
        return redirect('cart');
        // return $value;
    }
    static function cartItemDetail(Request $request){
        $dnsCheck=request()->getHost();

        $id=$request->input('cartId');
        $qty=$request->input('cartQty');
        $attr_size=$request->input('attr_size');
        $flag=false;


        $product = product::find($id);

        $attrData=DB::table('attributes')
        ->where('id',$product->attr_id)
        ->select('value')
        ->get();

        if ($product->attr_id!=0 || $product->attr_id!=null) {

            $name=explode(",",$attrData[0]->value);
            // return count($name);
            for ($i=0; $i < count($name); $i++) { 
                if ($attr_size==$name[$i]) {
                   $flag=true;
                }
            }

            if ($flag==false) {
                return redirect('Oops');
            }
        }else{
            $attr_size=null;
        }




        if ($qty=="" || $qty==null || $qty=="0") {
            $qty=1;
        }
          
        $cart = session()->get('cart', []);
        
        $id.=$attr_size;

        $price=0;

        if($dnsCheck=="tajjcollection.com") {
            if ($product->discount_dollar || $product->discount_dollar!=null || $product->discount_dollar!=0) {
                $price=$product->new_price_dollar;
            }else{
                $price=$product->price_dollar;
            }
        }else{
            if ($product->discount || $product->discount!=null || $product->discount!=0) {
                $price=$product->new_price;
            }else{
                $price=$product->price;
            }
        }
        

        if(isset($cart[$id])) {
            $cart[$id]['cartQty']+=$qty;
        } else {
            $cart[$id] = [
                "cartId" => $product->id,
                "cartName" => $product->pname,
                "cartQty" => $qty,
                "cartPrice" => $price,
                "cartAttrSize" => $attr_size,
                "cartImg" => $product->img
            ];
        }
          
        session()->put('cart', $cart);
        return redirect('cart');
    }
}
