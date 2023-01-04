<?php

namespace App\Http\Controllers;


use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=brand::all();
        return view('admin/brandlist')->with('brandArr',$brand);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brandadd');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Karachi");
        $date=date('d/m/Y');
        $time=date('h:i:s A');


        $req=new brand;
        $req->title=$request->input('txttitle');
        

        if($request->hasfile('txtimage'))
        {
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/brand/', $filename);
            $req->img = $filename;
        }

        
        $req->save();
        return redirect()->back()->with('message','Brand Upload Successfully');
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
        $brand=brand::find($id);
        return view('admin/brandedit')->with('brandArr',$brand);
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
        $req=brand::find($id);
        $req->title=$request->input('txttitle');
        
        if($request->hasfile('txtimage'))
        {
            $imgCheck1 = "assets/img/brand/".$req->img;
            if (is_file($imgCheck1)){
                unlink("assets/img/brand/".$req->img);
            }
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/brand/', $filename);
            $req->img = $filename;
        }

        
        $req->save();
        return redirect()->back()->with('message','Brand Upload Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand,Request $request)
    {
        $id=$request->input('txtid');

        $brand=brand::find($id);
        $imgCheck1 = "assets/img/brand/".$brand->img;
            if (is_file($imgCheck1)){
                unlink("assets/img/brand/".$brand->img);
            }

        brand::destroy(array('id',$id));
        return redirect('brandlist');
    }
}
