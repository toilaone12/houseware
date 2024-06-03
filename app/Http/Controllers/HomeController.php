<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function dashboard(){
        $title = 'Trang chủ';
        $listParentCate = Category::where('id_parent',0)->get();
        //san pham moi nhat
        $listsHot = [];

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
                    $listProduct = Product::where('id_category', $child->id_category)->orderBy('updated_at')->limit(5)->get();
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
                            if ($productCount >= 5) break 2; // Dừng khi đã có đủ 5 sản phẩm
                        }
                    }
                }
            } else {
                // Nếu không có danh mục con, lấy sản phẩm từ chính danh mục cha
                $listProduct = Product::where('id_category', $parent->id_category)->orderBy('updated_at')->limit(5)->get();
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

        // dd($listsHot);
        return view('home.content',compact('title','listParentCate','listsHot'));
    }
}
