<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Favourite;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //trang chu
    //gui gio hang sang dat hang
    function apply(Request $request){
        $data = $request->all();
        if(isset($data['code']) && $data['code']){
            $coupon = [
                'code' => $data['id'],
                'discount' => $data['discount'],
            ];
            Session::put('coupon',$coupon);
        }
        return response()->json(['res' => 'success']);
    }

    //trang kiem tra thong tin don hang
    function checkout(Request $request){
        $title = 'Thông tin đơn hàng';
        //danh muc cha
        $listParentCate = Category::where('id_parent',0)->get();
        //hien thi gio hang
        $idCustomer = Cookie::get('id_customer');
        $carts = [];
        $count = 0;
        if(isset($idCustomer) && $idCustomer){
            $carts = Cart::where('id_account',$idCustomer)->get();
            $count = count($carts->toArray());
        }
        //hien thi yeu thich
        $countWhiteList = 0;
        if(isset($idCustomer) && $idCustomer){
            $whitelists = Favourite::where('id_account',$idCustomer)->first();
            if(!empty($whitelists->product_path)){
                $countWhiteList = count(explode('|',trim($whitelists->product_path,'|')));
            }
        }
        //lay thong tin gio hang
        foreach($carts as &$cart){
            $chooseColor = $cart->id_color;
            $color = Color::find($cart->id_color);
            $productColor = ProductColor::where('id_product',$cart->id_product)->first();
            $colorPath = json_decode($productColor->color_path,true);
            //tao mang moi co id color bang mau dang chon
            $array = array_filter($colorPath, function ($item) use ($chooseColor) {
                return $item['id_color'] == $chooseColor;
            });
            $array = array_values($array); //reset key cua mang
            $quantityProduct = $array[0]['quantity'];
            $cart['color'] = $color->name;
            $cart['limit'] = $array[0]['quantity'];
            unset($cart);
        }
        //ma giam gia
        $coupon = Session::get('coupon');
        if(!isset($coupon) && !$coupon){
            $coupon = [];
        }
        return view('order.checkout',compact('listParentCate','carts','count','countWhiteList','title','coupon'));
    }
}
