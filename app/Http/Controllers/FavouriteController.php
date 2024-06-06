<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    //trang chu
    //them san pham yeu thich
    function add(Request $request){
        $data = $request->all();
        $favourite = Favourite::where('id_account',$data['id_customer'])->first();
        $array[] = $data['id'];
        $isUpdate = false;
        if(!empty($favourite->product_path)){ // truong hop k mang rong
            $arrayPath = explode('|',trim($favourite->product_path,'|'));
            if(!in_array($data['id'], $arrayPath)){
                $array = array_merge($array,$arrayPath);
                $isUpdate = true;
            }else{
                return json_encode(['res' => 'error', 'title' => 'Thêm sản phẩm yêu thích', 'text' => 'Sản phẩm đó đã tồn tại', 'count' => count($arrayPath)]);
            }
        }
        $productPath = '|'.implode('|',$array).'|';
        if($isUpdate){
            $favourite->product_path = $productPath;
            $update = $favourite->save();
            if($update){
                return json_encode(['res' => 'success', 'title' => 'Thêm sản phẩm yêu thích', 'text' => 'Thêm vào yêu thích thành công', 'count' => count($array), 'isUpdate' => $isUpdate]);
            }else{
                return json_encode(['res' => 'error', 'title' => 'Thêm sản phẩm yêu thích', 'text' => 'Thêm vào yêu thích thất bại', 'count' => '']);
            }
        }else{
            $insert = Favourite::create([
                'id_account' => $data['id_customer'],
                'product_path' => $productPath,
            ]);
            if($insert){
                return json_encode(['res' => 'success', 'title' => 'Thêm sản phẩm yêu thích', 'text' => 'Thêm vào yêu thích thành công', 'count' => count($array), 'isUpdate' => $isUpdate]);
            }else{
                return json_encode(['res' => 'error', 'title' => 'Thêm sản phẩm yêu thích', 'text' => 'Thêm vào yêu thích thất bại', 'count' => '']);
            }
        }
    }
}
