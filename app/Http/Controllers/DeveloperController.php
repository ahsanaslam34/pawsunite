<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //

    public function personalFeatures()
    {
        return view('personalFeatures');
    }
    public function commercialFeatures()
    {
        return view('commercialFeatures');
    }
}
