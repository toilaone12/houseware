<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //trang chu
    function add(Request $request){
        $data = $request->all();
        $id = $request->get('id');
        $color = $request->get('color');
        $idCustomer = Cookie::get('id_customer');
        $product = Product::find($id);
        $price = $product->discount ? intval($product->price) - (intval($product->price) * intval($product->discount) / 100) : intval($product->price);
        $cartCheck = Cart::where('id_account',$idCustomer)->where('id_product',$id)->where('id_color',$color)->first();
        $isCheck = true;
        $isUpdate = false;
        if($cartCheck){ // da co gio hang
            $cartCheck->quantity = $cartCheck->quantity + 1;
            $update = $cartCheck->update();
            if(!$update){
                $isCheck = false;
            }else{
                $isUpdate = true;
            }
        }else{ // chua co gio hang
            $insert = Cart::create([
                'id_account' => $idCustomer,
                'id_product' => $id,
                'image' => $product->image,
                'id_color' => $color,
                'name' => $product->name,
                'quantity' => isset($data['quantity']) && $data['quantity'] ? intval($data['quantity']) : 1,
                'price' => $price,
            ]);
            if(!$insert){
                $isCheck = false;
            }
        }
        if($isCheck){
            $carts = Cart::where('id_account',$idCustomer)->get();
            $carts = $carts->toArray();
            foreach($carts as $key => &$cart){
                $color = Color::find($cart['id_color']);
                $cart['color'] = $color->name;
                unset($cart);
            }
            return json_encode(['res' => 'success', 'title' => 'Thêm sản phẩm giỏ hàng', 'text' => 'Thêm sản phẩm vào giỏ hàng thành công', 'carts' => $carts, 'count' => count($carts), 'isUpdate' => $isUpdate]);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Thêm sản phẩm giỏ hàng', 'text' => 'Sản phẩm đã có trong giỏ hàng', 'carts' => '', 'count' => '']);
        }
    }
}
