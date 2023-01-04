<?php

namespace App\Http\Controllers;



use App\Models\breed;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id=$request->input('id');
        $name=$request->input('name');
        $breed=$request->input('breed');
        $gender=$request->input('gender');
        $status=$request->input('status');
        $region=$request->input('region');


        if ($id=="" && $name=="" && $status=="none" && $breed=="none" && $gender=="none" && $region=="none") {
           $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->get();
        }else if($id!="" && $name=="" && $status=="none" && $breed=="none" && $gender=="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('id','=',$id)
            ->get();
        }else if($id=="" && $name!="" && $status=="none" && $breed=="none" && $gender=="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('name','like',$name.'%')
            ->get();
        }else if($id=="" && $name=="" && $status!="none" && $breed=="none" && $gender=="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('status','=',$status)
            ->get();
        }else if($id=="" && $name=="" && $status=="none" && $breed!="none" && $gender=="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('breed','=',$breed)
            ->get();
        }else if($id=="" && $name=="" && $status=="none" && $breed=="none" && $gender!="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('gender','=',$gender)
            ->get();
        }else if($id=="" && $name=="" && $status=="none" && $breed=="none" && $gender=="none" && $region!="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('region','=',$region)
            ->get();
        }else if($id!="" && $name!="" && $status=="none" && $breed=="none" && $gender=="none" && $region=="none"){
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->orWhere('id','=',$id)
            ->orWhere('name','=',$name)
            ->get();
        }else{            
            $postArr=post::orderBy('id','asc')
            ->where('active_status','=','1')
            ->where('id','=',$id)
            ->where('name','=',$name)
            ->where('gender','=',$gender)
            ->where('breed','=',$breed)
            ->where('region','=',$region)
            ->where('status','=',$status)
            ->get();            
        }
        
        

        $postThreeArr=post::orderBy('id','desc')
        ->where('active_status','=','1')
        ->where('is_featured','=','1')
        ->get();
        $breedArr=breed::all();
             
        return view('index',compact('postArr','postThreeArr','breedArr'));
        
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
    public function productSearch(Request $request){
        $id=$request->input('search');
        return redirect('product?search='.$id);
    }

    public function adsPage($id){

        $slugs=str_replace('-', ' ', $id); 
       $postName=$slugs;
       $cat_id=category::where('des','=',$slugs)->firstOrFail()->id;
       $postArr=post::where('cat_id','=',$cat_id)
        ->where('status','=','1')
        ->get();
        $categoryArr=category::all();
        
        return view('products',compact('postArr','categoryArr','postName'));


    }

    public function productPage(product $product,Request $request){
        $id=$request->id;
        $search=$request->search;
        $brand=$request->brand;
        $subCat=$request->subCat;
        $collection=$request->collection;
        $productHead="Products";
        
        if ($id) {
           $productArr=product::where('cat_id','=',$id)
           ->where('status','=','1')
           ->orderBy('id','desc')
           ->get();
        $productHead=category::find($id)->des;
            
        }
        else if($search){
           $productArr=product::where('pname', 'like', '%'.$search.'%')
           ->where('status','=','1')
           ->get();

        }
        else if($brand){
           $productArr=product::where('brand_id','=',$brand)
           ->where('status','=','1')
           ->orderBy('id','desc')
           ->get();
                // $productHead=brand::find($brand)->value('des');


        }
        else if($subCat){
           $productArr=product::where('sub_id','=',$subCat)
           ->where('status','=','1')
           ->orderBy('id','desc')
           ->get();
        $productHead=sub_category::find($subCat)->des;


        }else if($collection){
           $productArr=DB::table('products')
        ->join('collection_products','products.id','=','collection_products.pid')
        ->join('collections','collection_products.col_id','=','collections.id')
           ->where('collection_products.col_id','=',$collection)
           ->where('collections.status','=','1')
           ->where('products.status','=','1')
           ->get();
        // $productHead=collection::find($collection)->des;

        }else{
            $productArr=product::where('status','=','1')
            ->orderBy('id','desc')
            ->get();
        }
        $randomProductArr=DB::table('products')
                ->where('status','=','1')
                ->inRandomOrder()
                ->limit(4)
                ->get();

        $categoryArr=category::all();
        
        return view('products',compact('productArr','categoryArr','randomProductArr','productHead'));
        
    }

    public function productDetailPage(Request $request,$id){
       // $slugs=str_replace('-', ' ', $id); 
       $slugs=""; 
       $postName=$slugs;
       $productData=post::where('id','=',$id)
       ->where('active_status','=','1')
       ->firstOrFail();


        $randomProductArr=DB::table('posts')
                ->where('active_status','=','1')
                ->inRandomOrder()
                ->limit(3)
                ->get();

        return view('productdetails',compact('randomProductArr','postName'))->with('productArr',$productData);
    }

    public function checkoutShow(){
        
        if (session('cart')) {
            return view('checkout');
        }else{
            return redirect('/cart');
        }
    }
    public function received(){
        return view('thanks');
    }

    public function contactSave(Request $request){
        $req=new contact();
        $req->name=$request->input('txtname');
        $req->email=$request->input('txtemail');
        $req->sub=$request->input('txtsub');
        $req->msg=$request->input('txtmsg');
        $req->save();
        
        return back()->with('msg','Message Sent Successfully');

    }
    public function userOrderDetails($id){
        $user_id=session('dogLossProjectUser')['id'];


        $orderDetail=DB::table('orders')
        ->join('order_details','orders.id','=','order_details.order_id')
        ->join('products','products.id','=','order_details.pid')
        ->where('orders.id','=',$id)
        ->where('orders.user_id','=',$user_id)
        ->select('products.pname','products.img','order_details.quantity','order_details.rate','order_details.attr_size')
        ->get();
        

       
        $order=order::find($id);
        // return $order;
        
        return view('orderview',compact('orderDetail'))->with('order',$order);
    }

    public function userOrderDesc(){
        $user_id=session('dogLossProjectUser')['id'];

        if (order::where('user_id',$user_id)->count() > 0) {
            $getOrderId=DB::table('orders')
            ->where('user_id',$user_id)
            ->orderBy('id','desc')
            ->limit(1)
            ->get();
            $id=$getOrderId[0]->id;



            $orderDetail=DB::table('orders')
            ->join('order_details','orders.id','=','order_details.order_id')
            ->join('products','products.id','=','order_details.pid')
            ->where('orders.id','=',$id)
            ->where('orders.user_id','=',$user_id)
            ->select('products.pname','products.img','order_details.quantity','order_details.rate','order_details.attr_size')
            ->get();
            

           
            $order=order::find($id);
            // return $order;
            
            return view('thanks',compact('orderDetail'))->with('order',$order);
        }else{
            return redirect('/');


        }

        
    }

    public function aboutPage(){
        $brandArr=brand::all();
        return view('aboutus',compact('brandArr'));
    }

    public function salePage(product $product,Request $request){
        $productArr=DB::table('products')
        ->where('status','=','1')
        ->where('discount','!=','')
            ->orderBy('id','desc')
            ->get();
        $categoryArr=category::all();
            
        return view('/sale',compact('productArr','categoryArr'));

    }

    public function getSubCat(Request $request)
    {
        $id=$request->input('id');
        $dataArr=sub_category::where('cat_id','=',$id)->get();    
        return view('category/subCategory',compact('dataArr'));
        
    }

    public function inquirySave(Request $request,$id)
    {
        $req=new inquiry;
        $req->name=$request->input('name');
        $req->email=$request->input('email');
        $req->contact=$request->input('contact');
        $req->message=$request->input('message');
        $req->user_id=$id;
        $req->save();
        return back()->with('msg','Message Sent Successfully');
        
    }
    

    
}
