<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\breed;
use App\Models\user;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id=$request->input('user_id');
        if ($user_id) {
            $dataArr=post::where('user_id','=',$user_id)->orderBy('id','desc')->get();
        }else{
            $dataArr=post::orderBy('id','desc')->get();
        }
        $userArr=user::orderBy('name','asc')->get();

        return view('admin/ads',compact('dataArr','userArr'));
    }
    /**
     * approve
     */
    public function approve($id){

        $req=post::findOrFail($id);
        $req->active_status=1;
        $req->save();
        return back()->with('success','Approve Successfully');

    }
    /**
     * Pending
     */
    public function pending($id){

        $req=post::findOrFail($id);
        $req->status=0;
        $req->save();
        return back()->with('success','Pending Successfully');

    }
    /**
     * Pending
     */
    public function reject($id){

        $req=post::findOrFail($id);
        $req->active_status=2;
        $req->save();
        return back()->with('success','Reject Successfully');

    }
    /**
     * Ads Featured Save
     */
    public function adsFeaturedSave(Request $request){
        $featured=2;
        $post_id=$request->input('post_id');
        if ($request->input('featured')) {
            $featured=1;
        }
        $req=post::findOrFail($post_id);
        $req->is_featured=$featured;
        $req->save();
        return back()->with('success','Successfully');
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
        $breedArr=breed::all();
        $postArr=post::where('id','=',$id)
        ->get()
        ->first();
        return view('admin/adsEdit',compact('postArr','breedArr'));
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
        $user_id=session('dogLossProjectUser')->id;
        $featured=2;
        if ($request->input('featured')) {
            $featured=1;
        }
        $req=post::where('id','=',$id)
        ->where('user_id','=',$user_id)
        ->get()
        ->first();
        if (!$req) {
            abort('403');
        }
        $req->name=$request->input('name');
        $req->pet_type=$request->input('pet_type');
        $req->status=$request->input('status');
        $req->gender=$request->input('gender');
        $req->breed=$request->input('breed');
        $req->age=$request->input('age');
        $req->color=$request->input('color');
        $req->region=$request->input('region');
        $req->postcode=$request->input('postcode');
        $req->date_loss=$request->input('date_loss');
        $req->where_loss=$request->input('where_loss');
        $req->identification_marks=$request->input('identification_marks');
        $req->tagged=$request->input('tagged');
        $req->microchipped=$request->input('microchipped');
        $req->tattoed=$request->input('tattoed');
        $req->other=$request->input('other');
        $req->active_status=$request->input('active_status');
        $req->is_featured=$featured;

        //Multiple image 
        if($request->hasfile('txtimage'))
        {
            

            foreach($request->file('txtimage') as $image)
            {

                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $name=$time . '-' .$image->getClientOriginalName();
                $image->move('assets/img/post/', $name);
                $data[] = $name;  
            }
            $req->image = implode(",", $data);
        }
        $req->save();
        return redirect('admin/ads')->with('message','Post Update Successfully');
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
}
