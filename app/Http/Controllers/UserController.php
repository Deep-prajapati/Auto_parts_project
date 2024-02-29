<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\catagory;
use App\Models\Banner;
use App\Models\Products;
use App\Http\Controllers\BaseController;
  
class UserController extends BaseController
{
    function home(){
        $image = Banner::orderBy('id', 'DESC')->first();

        $featuredata = Products::joined_data()->whereRaw('FIND_IN_SET("1", show_in)')->get();

        // dd($productdata);
        
        return view('front.index',compact('image','featuredata'));
    }

    function about(){
        $about = AboutUs::first();

        return view('front.about', compact('about'));
    }

    function contact(){
        $contact = ContactUs::first();

        return view('front.contact', compact('contact'));
    }

    function product_details(Request $request){
        // $request->validate([
        //     'id' => 'required'
        // ]);

        return view('front.product-details');
    }
}
