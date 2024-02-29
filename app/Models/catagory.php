<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcatagory;

class catagory extends Model
{
    use HasFactory;


    public function Subcatagory()  
    {  
        return $this->hasMany('App\Models\Subcatagory','catagory_id');
    }  
}
