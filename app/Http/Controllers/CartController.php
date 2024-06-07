<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Favourite;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //trang chu
    //them gio hang
    function add(Request $request){
        $data = $request->all();
        $id = $request->get('id');
        $color = $request->get('color');
        $quantity = isset($data['quantity']) && $data['quantity'] ? intval($data['quantity']) : 1;
        $idCustomer = Cookie::get('id_customer');
        $product = Product::find($id);
        $productColor = ProductColor::where('id_product',$id)->first();
        $colorPath = json_decode($productColor->color_path,true);
        $price = $product->discount ? intval($product->price) - (intval($product->price) * intval($product->discount) / 100) : intval($product->price);
        $cartCheck = Cart::where('id_account',$idCustomer)->where('id_product',$id)->where('id_color',$color)->first();
        $isCheck = true;
        $isUpdate = false;
        if($cartCheck){ // da co gio hang
            //tao mang moi co id color bang mau dang chon
            $array = array_filter($colorPath, function ($item) use ($color) {
                return $item['id_color'] == $color;
            });
            $array = array_values($array); //reset key cua mang
            $quantityProduct = $array[0]['quantity'];
            $quantityCart = $cartCheck->quantity + $quantity;
            if($quantityCart <= $quantityProduct){
                $cartCheck->quantity = $cartCheck->quantity + $quantity;
                $update = $cartCheck->update();
                if(!$update){
                    $isCheck = false;
                }else{
                    $isUpdate = true;
                }
            }else{
                return json_encode(['res' => 'error', 'title' => 'Thêm sản phẩm giỏ hàng', 'text' => 'Không đủ sản phẩm trong kho (Trong giỏ hàng đã có '.$cartCheck->quantity.' sản phẩm)', 'carts' => '', 'count' => '']);
            }
        }else{ // chua co gio hang
            $insert = Cart::create([
                'id_account' => $idCustomer,
                'id_product' => $id,
                'image' => $product->image,
                'id_color' => $color,
                'name' => $product->name,
                'quantity' => $quantity,
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
    //trang gio hang
    function home(){
        $title = 'Giỏ hàng';
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
        return view('cart.home',compact('title','carts','count','countWhiteList','listParentCate'));
    }
    //cap nhat so luong
    function update(Request $request){
        $data = $request->all();
        $quantity = $data['quantity'];
        $cart = Cart::find($data['id']);
        $cart->quantity = $quantity;
        $update = $cart->save();
        if($update){
            $carts = Cart::where('id_account',$data['id_customer'])->get();
            $subtotal = 0;
            foreach($carts as $cart){
                $subtotal += ($cart->quantity * $cart->price);
            }
            return response()->json(['res' => 'success', 'text' => 'Cập nhật số lượng thành công', 'subtotal' => $subtotal]);
        }else{
            return response()->json(['res' => 'success', 'text' => 'Cập nhật số lượng thất bại']);
        }
    }
}
