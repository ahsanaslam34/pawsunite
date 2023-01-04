<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=blog::all();
        return view('admin/bloglist')->with('blogArr',$blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blogadd');
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


        $req=new blog;
        $req->title=$request->input('txttitle');
        $req->des=$request->input('txtdes');
        $req->post=$request->input('txtpost');
        $req->date=$date;
        $req->time=$time;
        $req->des=$request->input('txtdes');
        

        if($request->hasfile('txtimage'))
        {
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/blog/', $filename);
            $req->img = $filename;
        }

        
        $req->save();
        return redirect()->back()->with('message','Product Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=blog::find($id);
        return view('admin/blogedit')->with('blogArr',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $req=blog::find($id);
        $req->title=$request->input('txttitle');
        $req->des=$request->input('txtdes');
        $req->post=$request->input('txtpost');
        $req->des=$request->input('txtdes');
        

        if($request->hasfile('txtimage'))
        {
            $var2 = date_create();
            $time2 = date_format($var2, 'YmdHis');
            $file = $request->file('txtimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $time2 . '-' .$file->getClientOriginalName();
            $file->move('assets/img/blog/', $filename);
            $req->img = $filename;
        }

        
        $req->save();
        return redirect()->back()->with('message','Product Upload Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
