<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    //trang chu
    //modal mau cua san pham
    function modalColorProduct(Request $request){
        $id = $request->get('id');
        $productColor = ProductColor::where('id_product',$id)->first();
        $colorPath = json_decode($productColor['color_path'],true);
        return view('modal.color',compact('colorPath','id'));
    }
}