<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
        $data['products']=Product::where('language_id',auth()->user()->language_id)->get();
//        $data['products_new']=Product::orderBy('created_at', 'DESC')->paginate(5);
        return view('front.home',$data);
    }
}

