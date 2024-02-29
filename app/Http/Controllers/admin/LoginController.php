<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\catagory;
use App\Models\Subcatagory;
use App\Models\Product_details;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class LoginController extends Controller
{
    function loginpost(Request $request){
        
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',

        ]);

        if (Auth::guard('admin')->attempt(
            array(
                'email' => $request->email, 
                'password' => $request->password
            )
        ))
        {
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('admin.login')->with('message', 'Credintials are not correct');
        }
       
    }

    function registersubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:admins',
            'password' => 'required | confirmed'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();

        return redirect()->route('admin.add-admin');
    }

    function dashboard(){
        $id = Auth::guard('admin')->id();
        $data = Admin::where('id',$id)->get();
        return view('admin.dashboard');
    }

    
    function banner(Request $request){
        $request->validate([
            'image' => 'required|image',
        ]);

        $image = $request->image;
        $extension = $image->extension();

        $fileName = time() . mt_rand(1000000, 9999999) .'.'. $extension;
        $image->move(public_path('front/images/banners'), $fileName);

        Banner::insert([
            'image_name' => $fileName
        ]);

        return redirect()->route('admin.dashboard');
    }

    function contact(Request $request){
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'monday_to_friday' => 'required',
            'saturday' => 'required',
            'sunday' => 'required',
            'Comment' => 'required'
        ]);

        // $contact = new ContactUs;
        // $contact->phone = $request->phone;
        // $contact->monday_to_friday = $request->monday_to_friday;
        // $contact->saturday = $request->saturday;
        // $contact->sunday = $request->sunday;
        // $contact->Comment = $request->Comment;
        // $contact->Save();

        ContactUs::where('id', 1)->limit(1)->update(array('address' => $request->address, 'email' => $request->email, 'phone' => $request->phone, 'monday_to_friday' => $request->monday_to_friday, 'saturday' => $request->saturday , 'sunday' => $request->sunday, 'Comment' => $request->Comment));

        return redirect()->route('admin.dashboard');
    }

    function about(Request $request){
        $request->validate([
            'about' => 'required',
        ]);

        // $about = new AboutUs;
        // $about->Comment = $request->about;
        // $about->Save();

        AboutUs::where('id', 1)->limit(1)->update(array('Comment' => $request->about));

        return redirect()->route('admin.dashboard');
    }

    function catagory(){
        $catdata = catagory::all();

        return view('admin.catagory' , compact('catdata'));
    }

    function action_Catagory(Request $request){
        $request->validate([
            'catagory' => 'required'
        ]);

        $category = new catagory;
        $category->catagory_name = $request->catagory;
        $category->save();

        $catdata = catagory::all();

        return view('admin.catagory' , compact('catdata'));
    }

    function subcatagory(){
        $catagory = catagory::all();

        $subcatagory = Subcatagory::all();

        $data = catagory::join('subcatagories','catagories.id','=','subcatagories.catagory_id')->get();

        return view('admin.Sub-Catagory', compact('catagory','subcatagory','data'));
    }

    function Sub_Catagory(Request $request){
        $request->validate([
            'subcatagory' => 'required',
            'catagory_id' => 'required'
        ]);

        $Subcatagory = new Subcatagory;
        $Subcatagory->catagory_id = $request->catagory_id;
        $Subcatagory->subcatagory_name = $request->subcatagory;
        $Subcatagory->save();

        $catagory = catagory::all();

        $subcatagory = Subcatagory::all();

        $data = catagory::join('subcatagories','catagories.id','=','subcatagories.catagory_id')->select('catagories.*','subcatagories.subcatagory_name');

        return view('admin.Sub-Catagory', compact('catagory','subcatagory','data'));
    }

    function edit_catagory($id){
        $edit_data = catagory::find($id);
        
        return view('admin.edit-catagory', compact('edit_data'));
    }

    function sumbit_edit_catagory($id,Request $request){
        catagory::where('id',$id)->limit(1)->update(array('catagory_name' => $request->editcategory));

        return redirect()->route('admin.Catagory')->with('message','Data Updated Successfully');
    }

    function edit_subcatagory($id){
        $edit_data = Subcatagory::find($id);
        
        return view('admin.edit-subcatagory', compact('edit_data'));
    }

    function sumbit_edit_subcatagory($id,Request $request){
        Subcatagory::where('id',$id)->limit(1)->update(array('subcatagory_name' => $request->editsubcategory));

        return redirect()->route('admin.Sub-Catagory')->with('message','Data Updated Successfully');
    }

    function delete_catagory($id){
        catagory::where('id', $id)->delete();

        return redirect()->route('admin.Catagory')->with('message','Data Deleted Successfully');
    }

    function delete_subcatagory($id){
        Subcatagory::where('id', $id)->delete();

        return redirect()->route('admin.Sub-Catagory')->with('message','Data Deleted Successfully');
    }

    function product(){
        $catagory = catagory::all();

        return view('admin.add-product' , compact('catagory'));
    }

    function submit_product(Request $request){
        
        $array = array();
        $request->validate([
            'Subcategory' => 'required',
            'Product_Name' => 'required',
            'Short_Discription' => 'required',
            'discription' => 'required',
            'features' => 'required',
            'specification' => 'required',
            'sku_code' => 'required',
            'brand_name' => 'required',
            'thumbnail' => 'required|image',
            'section' => 'required',
            'price' => 'required'
        ]);

        // Thumbnail....!

        $image = $request->thumbnail;
        $extension = $image->extension();

        $thumbnail = time() . mt_rand(1000000, 9999999) .'.'. $extension;
        $image->move(public_path('front/images/Product_image'), $thumbnail);

        // Thumbnail....!

        // images....!

        foreach($request->sub_image as $value){
            $sub_image = $value;
            $extension = $sub_image->extension();

            $new_name = time() . mt_rand(1000000, 9999999) .'.'. $extension;
            $array[] = $new_name;
            $sub_image->move(public_path('front/images/Product_image'), $new_name);
        }

        $db_name = serialize($array);

        // images....!

        // Section........!

        $original_array = $request->section;
        $string_version = implode(',', $original_array);

        // Section........!

        // Inserting data in product details........!

        $data = new Product_details;
        $data->product_name = $request->Product_Name;
        $data->short_dis = $request->Short_Discription;
        $data->discription = $request->discription;
        $data->features = $request->features;
        $data->spacifications = $request->specification;
        $data->sku = $request->sku_code;
        $data->brand = $request->brand_name;
        $data->price = $request->price;
        $data->thumbnail = $thumbnail;
        $data->sub_image = $db_name;
        $data->show_in = $string_version;
        $data->save();
        $last_id = $data->id;

        // Inserting data in product details........!

        // Inserting data in product.........!

        $product = new Products;
        $product->product_detail_id = $last_id;
        $product->sub_catagory_id = $request->Subcategory;
        $product->save();

        // Inserting data in product.........!
        
        return redirect()->route('admin.add-product')->with('message', 'Data Inserted Successfully!');
    }

    function logout(){

        // return catagory::find(1)->Subcatagory;
        // $category = catagory::join('subcatagories','catagories.id','=','subcatagories.catagory_id');
        // $category->select('catagories.*','subcatagories.subcatagory');
        // $category = $category->get();

        // catagory::join('subcatagories','catagories.id','=','subcatagories.catagory_id')->select('catagories.*','subcatagories.subcatagory');
        // // $category = $category->get();
        // return catagory::find(1)->subcatagories;
        // dd($category);
        // die;
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    function product_ajax(Request $request){
        $productdata = Product_details::all();

        $name = $request->data;

        foreach($productdata as $value){
            if($value->product_name == $name){
                return response()->json(array('msg' => 'This Name is already Exist!!'));
                
            }
        }
        return '';
    }

    function catagory_ajax(Request $request){
        $request->validate([
            'data' => 'required'
        ]);
        
        $subcatagory = Subcatagory::where('catagory_id', $request->data)->get();

        return $subcatagory;
    }
}
