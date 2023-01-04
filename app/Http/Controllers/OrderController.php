<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\user;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order = order::join('order_details', 'orders.id', '=', 'order_details.order_id')
        //         ->join('users','orders.user_id','=','users.id')
        //         ->join('products','order_details.pid','=','products.id')
        //        ->get(['orders.id', 'users.name as user','products.pname','order_details.quantity','order_details.rate','orders.status','orders.date','orders.time','products.img']);
               
        $order=order::orderBy('id', 'DESC')->get();  
        return view('admin/orderlist')->with('orderArr',$order);
    }
    public function saveOrders(){
        $dnsCheck=request()->getHost();
        $currency="";
        if($dnsCheck=="tajjcollection.com") {
            $currency="$";
        }else{
            $currency="Rs";
        }
        $cartData=session('cart');
        foreach($cartData as $cartColumn) {
            $cartRate[] = $cartColumn['cartPrice']*$cartColumn['cartQty'];
        }
        $cartTotal=array_sum($cartRate);
        $cartCount=count($cartRate);
        
        date_default_timezone_set("Asia/Karachi");
        $date=date('d/m/Y');
        $time=date('h:i:s A');


        $user_id=session('dogLossProjectUser')->id;
        $order = new order;
        $order ->user_id = $user_id;
        $order ->total = $cartTotal;
        $order ->item = $cartCount;
        $order ->currency = $currency;
        $order ->date = $date;
        $order ->time = $time;
        $order ->status = 1;
        $order ->save();
        
        if (session('cart')) {

            $sessionCart=session('cart');
            foreach ($sessionCart as $id => $detail) {
                $orderDetail = new orderDetail;
                $orderDetail ->pid = $detail['cartId'];
                $orderDetail ->rate = $detail['cartPrice'];
                $orderDetail ->quantity = $detail['cartQty'];
                $orderDetail ->attr_size = $detail['cartAttrSize'];
                $orderDetail->getOrders()->associate($order);
                $orderDetail->save();
                // return redirect('/');
            }
            session()->pull('cart',null);
            return redirect('thanks');
        }else{
            return redirect('/');
        }

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
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, order $order)
    {
        $id=$request->input('txtid');
        order::destroy(array('id',$id));
        return redirect('order');
    }
    public function orderShow($id){
        // $orderDetail=order::find($id)->getOrderDetails;
        $orderDetail=DB::table('orders')
        ->join('order_details','orders.id','=','order_details.order_id')
        ->join('products','products.id','=','order_details.pid')
        ->where('orders.id','=',$id)
        ->select('products.pname','products.img','order_details.quantity','order_details.rate','order_details.attr_size')
        ->get();
        

        $user=order::find($id)->getUserDetails;
        $order=order::find($id);
        // return $order;
        
        return view('admin/orderShow',compact('orderDetail','order'))->with('user',$user);
    }
    public function orderStatus(Request $request,$id){
        $order=order::find($id);
        $order->status=$request->input('txtstatus');
        $order->save();
           return redirect('order')->with('msg','Status Update Successfully');

    }
}
