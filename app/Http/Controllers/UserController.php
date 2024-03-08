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
use App\Models\Product_details;
use App\Models\Company;
use App\Models\Models;
use App\Models\Engine;
use App\Models\Subcatagory;


  
class UserController extends BaseController
{
    function home(){
        
        $image = Banner::orderBy('id', 'DESC')->first();
    
        $featuredata = Products::joined_data()->whereRaw('FIND_IN_SET("1", show_in)')->get();
        $company = Company::all();
        $model = Models::all();
        $join = company::join('models','companies.id','=','models.company_id')->get();
        
        $engine = Engine::all();
        
        return view('front.index',compact('image','featuredata','company','model','join'));
    }

    function about(){
        $about = AboutUs::first();

        return view('front.about', compact('about'));
    }

    function contact(){
        $contact = ContactUs::first();

        return view('front.contact', compact('contact'));
    }

    function product_details($slug){
        // $slug->validate(['required']);
        //$related_product = Product::where('sub_catagory',);
        $slug = Product_details::where('slug',$slug)->join('products','product_details.id','=','products.product_detail_id')->first();
        $id = $slug->sub_catagory_id;
        $related_data = Products::where('sub_catagory_id',$id)->join('Product_details','products.product_detail_id','=','product_details.id')->get();
        return view('front.product-details',compact('slug','related_data'));
    }

    function company_ajax(Request $request){
        $request->validate([
            'data' => 'required'
        ]);
        $model = Models::where('company_id', $request->data)->get();
        
        return $model;
    }

    function model_ajax(Request $request){
        $request->validate([
            'data' => 'required'
        ]);

        $engine = Engine::where('model_id', $request->data)->get();
        
        return $engine;
    }

    function category_details(){
       
        $product =Product_details ::first();
        
        //dd($product);
        
        return view('front.category_details',compact('product'));
    }
}
