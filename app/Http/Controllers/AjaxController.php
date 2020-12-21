<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrandModel;


class AjaxController extends Controller
{
    public function getBrand($idCategory){
        $brand = BrandModel::where("category_id",$idCategory)->get();
        foreach ($brand as $br){
            echo '<option value="'.$br->id.'">'.$br->brand_name.'</option>';
        }
    }
}
