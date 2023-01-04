<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\order;
use App\Models\post;
use App\Models\inquiry;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
         $id=session('dogLossProjectUser')['id'];
         $request->validate([
            "name"=>"required",
            "contact"=>"required",
            "address"=>"required",
            "country"=>"required",
            "state"=>"required",
            "city"=>"required"
        ]);
         
        $req=user::find($id);
        $req->name=$request->input('name');
        $req->contact=$request->input('contact');
        $req->address=$request->input('address');
        $req->country=$request->input('country');
        $req->postcode=$request->input('postcode');
        $req->region=$request->input('region');
        $result=$req->save();
        if ($result) {
           return back()->with('success','Update Successfully');
        }else{
           return back()->with('fail','Something Wrong');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->input('txtid');
        user::destroy(array('id',$id));
        return redirect('user');
    }

    public function registerUser(user $user,request $request){

        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "pass"=>"required|min:6",
            "contact"=>"required",
            "address"=>"required",
            "country"=>"required",
            "postcode"=>"required",
            "region"=>"required"
        ]);
        $req=new user();
        $req->name=$request->input('name');
        $req->email=$request->input('email');
        $req->pass=Hash::make($request->input('pass'));
        $req->contact=$request->input('contact');
        $req->address=$request->input('address');
        $req->country=$request->input('country');
        $req->postcode=$request->input('postcode');
        $req->region=$request->input('region');
        $result=$req->save();
        if ($result) {
           return redirect('login')->with('success','You Have Registered Successfully');
        }else{
           return back()->with('fail','Something Wrong');

        }

    }

     //Login
    public function login(Request $request){
        $request->validate([
            "txtemail"=>"required",
            "txtpass"=>"required",
        ]);
        // return $request->input();
        $admin=user::where('email','=',$request->txtemail)->first();
        // return $admin;
        if ($admin) {
            if (Hash::check($request->txtpass,$admin->pass)) {
                $request->session()->put('dogLossProjectUser',$admin);
                return redirect('/myac');
            }else{
                 return back()->with('fail','Password Is Invalid');

            }

        }else{
            return back()->with('fail','Username Is Invalid');
        }
    }

    //Logout
    public function logout(Request $request){
        if (session()->has('dogLossProjectUser')) {
            $request->session()->pull('dogLossProjectUser',null);
            return redirect('login');

        }else{
            return redirect('login');

        }
    }

    public function myAccount(){
        $id=session('dogLossProjectUser')['id'];

        $postArr=post::where('user_id','=',$id)->orderBy('id','desc')->get();
        $inactiveArr=post::where('user_id','=',$id)->where('active_status','=','2')->orderBy('id','desc')->get();
        $activeArr=post::where('user_id','=',$id)->where('active_status','=','1')->orderBy('id','desc')->get();



        return view('myac',compact('postArr','activeArr','inactiveArr'));
    }

     public function pendingAds(){
        $id=session('dogLossProjectUser')['id'];

        $postArr=post::where('user_id','=',$id)->where('status','=','0')->orderBy('id','desc')->get();
        $pendArr=post::where('user_id','=',$id)->where('status','=','0')->orderBy('id','desc')->get();
        $activeArr=post::where('user_id','=',$id)->where('status','=','1')->orderBy('id','desc')->get();


        $rejectArr=post::where('user_id','=',$id)->where('status','=','2')->orderBy('id','desc')->get();
        $data=user::findOrFail($id);

        $order=order::where('user_id','=',$id)->orderBy('id','desc')->get();
        return view('pendingads',compact('order','postArr','activeArr','pendArr','rejectArr'))->with('user',$data);
    }


     public function inquiryShow(){
        $id=session('dogLossProjectUser')['id'];

        $inquiryArr=inquiry::where('user_id','=',$id)->orderBy('id','desc')->get();
        $data=user::findOrFail($id);
       
        return view('inquiries',compact('inquiryArr'))->with('user',$data);
    }

    public function activeAds(){
        $id=session('dogLossProjectUser')['id'];

        $postArr=post::where('user_id','=',$id)->orderBy('id','desc')->get();
        $inactiveArr=post::where('user_id','=',$id)->where('active_status','=','2')->orderBy('id','desc')->get();
        $activeArr=post::where('user_id','=',$id)->where('active_status','=','1')->orderBy('id','desc')->get();


        

        return view('activeads',compact('activeArr','inactiveArr','postArr'));
    }
    public function inactiveAds(){
        $id=session('dogLossProjectUser')['id'];

        $postArr=post::where('user_id','=',$id)->orderBy('id','desc')->get();
        $inactiveArr=post::where('user_id','=',$id)->where('active_status','=','2')->orderBy('id','desc')->get();
        $activeArr=post::where('user_id','=',$id)->where('active_status','=','1')->orderBy('id','desc')->get();
        return view('inactiveads',compact('activeArr','inactiveArr','postArr'));

    }

    public function userListAdmin(){
        $data=user::orderBy('id','desc')->get();
        return view('admin/user')->with('user',$data);
    }
    public function profilePage(){
        $id=session('dogLossProjectUser')['id'];
        $data=user::findOrFail($id);

        return view('profile')->with('user',$data);

    }
    public function inactive(Request $request,$id){
        $req=user::find($id);
        $req->status=2;
        $req->save();
        $update_post=post::where('user_id','=',$id)->update(['active_status' => 2]);
        return back();
    }
    public function active(Request $request,$id){

        $req=user::find($id);
        $req->status=1;
        $req->save();
        $update_post=post::where('user_id','=',$id)->update(['active_status' => 1]);

        return back();
    }
}
