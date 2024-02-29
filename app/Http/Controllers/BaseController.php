<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\catagory;

class BaseController extends Controller
{
    function __construct(){
        $category = catagory::all();

        $subcategory = new catagory;

        // $subcategory = catagory::find($value->id)->Subcatagory;

        return view()->share( array('category' => $category , 'subcategory' => $subcategory));
    }

}
