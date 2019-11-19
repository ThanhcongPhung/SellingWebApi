<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Banner;
use Image;
// use App\Category;
// use App\Product;

class IndexController extends Controller
{
    //
    public function index() {

    	$banners = Banner::where('status','1')->get();
    	// return view('welcome');
    	return view('index')->with(compact('banners'));
    	// return view('index')->with(compact('banners'));
    }
}
