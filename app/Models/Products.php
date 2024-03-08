<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_details;


class Products extends Model
{
    use HasFactory;

    static function joined_data()
    {
        $data = Products::join('product_details','products.product_detail_id','=','product_details.id')->join('subcatagories','products.sub_catagory_id','=','subcatagories.id');

        return $data;
    }

}
