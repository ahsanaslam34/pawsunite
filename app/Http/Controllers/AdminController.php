<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\order;
use App\Models\user;
use App\Models\product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $totalUser=user::count();

        

        return view('admin/index',compact('totalUser'));
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
     //Login
    public function login(Request $request){
        $request->validate([
            "txtuser"=>"required",
            "txtpass"=>"required",
        ]);
        // return $request->input();
        $admin=admin::where('user','=',$request->txtuser)->first();
        if ($admin) {
            if (Hash::check($request->txtpass,$admin->pass)) {
                $request->session()->put('dogLossProject',$admin);
                return redirect('/dashboard');
            }else{
                 return back()->with('fail','Password Is Invalid');

            }

        }else{
            return back()->with('fail','Username Is Invalid');
        }
    }

    //Logout
    public function logout(Request $request){
        if (session()->has('dogLossProject')) {
            $request->session()->pull('dogLossProject',null);
            return redirect('admin');

        }else{
            return redirect('admin');

        }
    }
}
