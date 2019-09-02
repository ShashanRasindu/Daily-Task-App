<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function indexabout(){
        return view('/about');
    }

    public function indexcontact(){
        return view('contact');
    }
}
