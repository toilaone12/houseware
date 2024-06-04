<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    function dashboard(){
        $title = 'Trang chủ';
        $listParentCate = Category::where('id_parent',0)->get();
        //san pham moi nhat
        $listsHot = [];
        $randomParent = [];
        $listsCategory = [];
        foreach ($listParentCate as $key => $parent) {
            $randomParent[] = [
                'id' => $parent->id_category,
                'name' => $parent->name,
            ];
        }
        foreach ($listParentCate as $key => $parent) {
            // Khởi tạo mảng parentData
            $parentData = [
                'name' => $parent->name,
                'products' => []
            ];
            // Biến đếm số lượng sản phẩm
            $productCount = 0;
            // Lấy danh sách các danh mục con
            $listChildCate = Category::where('id_parent', $parent->id_category)->get();
            // Kiểm tra nếu có danh mục con
            if (count($listChildCate)) {
                foreach ($listChildCate as $child) {
                    // Lấy danh sách các sản phẩm của danh mục con
                    $listProduct = Product::where('id_category', $child->id_category)->get();
                    foreach ($listProduct as $product) {
                        $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                        if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                            $parentData['products'][] = [
                                'id' => $product->id_product,
                                'image' => $product->image,
                                'name' => $product->name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                            ];
                            $productCount++;
                            if ($productCount >= 5) break 2; // Dừng khi đã có đủ 5 sản phẩm //break 2; la thoat khoi 2 vong lap long nhau
                        }
                    }
                }
            } else {
                // Nếu không có danh mục con, lấy sản phẩm từ chính danh mục cha
                $listProduct = Product::where('id_category', $parent->id_category)->get();
                foreach ($listProduct as $product) {
                    $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                    if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                        $parentData['products'][] = [
                            'id' => $product->id_product,
                            'image' => $product->image,
                            'name' => $product->name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                        ];
                        $productCount++;
                        if ($productCount >= 5) break; // Dừng khi đã có đủ 5 sản phẩm
                    }
                }
            }

            // Thêm parentData vào listsHot
            $listsHot[] = $parentData;
            // Giới hạn danh sách chỉ đến danh mục cha thứ 5
            if ($key == 4) break;
        }
        $keys = array_rand($randomParent,3);
        $randomItems = [];
        foreach($keys as $key){
            $randomItems[] = $randomParent[$key];
        }
        //hien random danh muc cac san pham truoc
        foreach ($randomItems as $key => $parent) {
            $parentData = [
                'name' => $parent['name'],
                'products' => []
            ];
            $productCount = 0;
            $listChildCate = Category::where('id_parent', $parent['id'])->get();
            if (count($listChildCate)) {
                foreach ($listChildCate as $child) {
                    // Lấy danh sách các sản phẩm của danh mục con
                    $listProduct = Product::where('id_category', $child->id_category)->orderBy('updated_at')->get();
                    foreach ($listProduct as $product) {
                        $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                        if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                            $parentData['products'][] = [
                                'id' => $product->id_product,
                                'image' => $product->image,
                                'name' => $product->name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                            ];
                            $productCount++;
                            if ($productCount >= 6) break 2; // Dừng khi đã có đủ 6 sản phẩm //break 2; la thoat khoi 2 vong lap long nhau
                        }
                    }
                }
            }else {
                // Nếu không có danh mục con, lấy sản phẩm từ chính danh mục cha
                $listProduct = Product::where('id_category', $parent['id'])->orderBy('updated_at')->get();
                foreach ($listProduct as $product) {
                    $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                    if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                        $parentData['products'][] = [
                            'id' => $product->id_product,
                            'image' => $product->image,
                            'name' => $product->name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                        ];
                        $productCount++;
                        if ($productCount >= 6) break; // Dừng khi đã có đủ 6 sản phẩm
                    }
                }
            }
            $listsCategory[] = $parentData;
            if($key == 2) break;
        }
        // dd($listsCategory);
        return view('home.content',compact('title','listParentCate','listsHot','listsCategory','listProduct'));
    }
}
