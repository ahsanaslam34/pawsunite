<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use App\Models\sub_category;
use App\Models\breed;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $breedArr=breed::all();

        return view('/placead',compact('breedArr'));
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

        $user_id=session('dogLossProjectUser')->id;

        $date=date('d/m/Y');
        
        $req=new post;
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
        $req->active_status=1;
        $req->user_id=$user_id;
        $req->date=$date;

        // Single Image
        // if($request->hasfile('txtimage'))
        // {
        //     $var2 = date_create();
        //     $time2 = date_format($var2, 'YmdHis');
        //     $file = $request->file('txtimage');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = $time2 . '-' .$file->getClientOriginalName();
        //     $file->move('assets/img/post/', $filename);
        //     $req->image = $filename;
        // }

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
        return redirect('myac')->with('message','Post Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $user_id=session('dogLossProjectUser')->id;

        $breedArr=breed::all();
        $postArr=post::where('id','=',$id)
        ->where('user_id','=',$user_id)
        ->get()
        ->first();
        if (!$postArr) {
            abort('403');
        }
        return view('/post/edit',compact('breedArr','postArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id=session('dogLossProjectUser')->id;

        
        
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
        return redirect('myac')->with('message','Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
