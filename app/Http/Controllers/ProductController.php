<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách sản phẩm';
        $list = Product::all();
        $listCate = Category::all();
        return view('product.list',compact('title','listCate','list'));
    }
    //form them san pham
    function formInsert(){
        $title = 'Thêm sản phẩm';
        $listCateChild = Category::where('id_parent','!=',0)->get();
        $listCateParent = Category::where('id_parent',0)->get();
        return view('product.insert',compact('title','listCateChild','listCateParent'));
    }
    //them san pham
    function add(Request $request){
        $data = $request->all();
        $image = $request->file('image');
        Validator::make($data,[
            'name' => ['unique:product,name'], //kiem tra tinh duy nhat trong bang category va truong du lieu name
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ],
        [
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'image.file' => 'Không thể xử lý tệp đã chọn.',
            'image.image' => 'Tệp phải là hình ảnh.',
            'image.mimes' => 'Định dạng tệp không hợp lệ. Chấp nhận định dạng jpeg, png, jpg, gif, webp.',
        ])->validate();
        $uploads = public_path('be/img/product/');
        $filename = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
        $filename = $filename.'-'.time().'.'.$extension;
        if (!file_exists($uploads)) { //truong hop chua co file do
            mkdir($uploads, 0777, true); // Create the directory if it does not exist
        }
        $image->move($uploads,$filename); // nem anh vao
        $insert = Product::create([
            'name' => $data['name'],
            'image' => 'be/img/product/'.$filename,
            'id_category' => $data['id_category'],
            'quantity' => $data['quantity'],
            'discount' => $data['discount'],
            'price' => str_replace('.','',$data['price']),
            'description' => $data['description'],
            'technical' => $data['technical'],
        ]);
        if($insert){
            return redirect()->route('product.formInsert')->with('message','<p class="text-success small">Thêm sản phẩm '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('product.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua san pham
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa sản phẩm';
        $listCateChild = Category::where('id_parent','!=',0)->get();
        $listCateParent = Category::where('id_parent',0)->get();
        $one = Product::find($id);
        return view('product.update',compact('title','listCateChild','listCateParent','one'));
    }
    //sua san pham
    function edit(Request $request){
        $data = $request->all();
        $image = $request->file('image');
        Validator::make($data,[
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ],
        [
            'image.file' => 'Không thể xử lý tệp đã chọn.',
            'image.image' => 'Tệp phải là hình ảnh.',
            'image.mimes' => 'Định dạng tệp không hợp lệ. Chấp nhận định dạng jpeg, png, jpg, gif, webp.',
        ])->validate();
        $one = Product::find($data['id']);
        if($image){
            $uploads = public_path('be/img/product/');
            $filename = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
            $filenameOld = public_path($data['image-old']);
            $extension = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
            $filename = $filename.'-'.time().'.'.$extension;
            $image->move($uploads,$filename); // nem anh vao
            if(file_exists($filenameOld)) unlink(($filenameOld)); // xoa anh cu
            $one->image = 'be/img/product/'.$filename;
        }
        $one->name = $data['name'];
        $one->id_category = $data['id_category'];
        $one->quantity = $data['quantity'];
        $one->discount = $data['discount'];
        $one->price = str_replace('.','',$data['price']);
        $one->description = $data['description'];
        $one->technical = $data['technical'];
        $update = $one->save();
        if($update){
            return redirect()->route('product.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa sản phẩm '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('product.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa san pham
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Product::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá sản phẩm', 'text' => 'Xóa sản phẩm thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá sản phẩm', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    //form chon mau cho san pham
    function formColor(Request $request){
        $id = $request->get('id');
        $idColor = $request->get('id_color');
        $idColor = isset($idColor) ? $idColor : '';
        $type = $request->get('type');
        $type = isset($type) ? $type : '';
        $title = 'Chọn màu sản phẩm';
        $listColor = Color::all();
        $one = Product::find($id);
        $oneProductColor = ProductColor::where('id_product',$id)->first();
        $colorPath = [];
        if($oneProductColor){
            $colorPath = json_decode($oneProductColor->color_path,true);
        }
        return view('product.color',compact('title','one','listColor','colorPath','type','idColor'));
    }
    //them mau
    function insertColor(Request $request){
        $data = $request->all();
        $arrQuantity = $data['quantity'];
        $one = Product::find($data['id']);
        $oneProductColor = ProductColor::where('id_product',$data['id'])->first();
        $array = [];
        $quantityProduct = intval($one['quantity']);
        foreach($arrQuantity as $key => $quantity){
            $quantityProduct -= $quantity;
            if($quantity){
                $array[] = [
                    'id_color' => $key,
                    'quantity' => $quantity,
                ];
                if($oneProductColor){
                    $colorPathArr = json_decode($oneProductColor->color_path,true);
                    $array = array_merge($colorPathArr,$array);
                }
            }
        }
        if($quantityProduct >= 0){ // ktra so luong vuot qua trong kho
            $one->quantity = $quantityProduct;
            $update = $one->save();
            $jsonArray = json_encode($array);
            if($oneProductColor){ // neu da co mau r
                $oneProductColor->color_path = $jsonArray;
                $updateProductColor = $oneProductColor->save();
                if($updateProductColor && $update){
                    return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-success small">Thêm màu cho sản phẩm '.mb_strtolower($one['name'],'UTF-8').' thành công</p>');
                }else{
                    return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
                }
            }else{ // neu chua co mau
                $insert = ProductColor::create([
                    'id_product' => $data['id'],
                    'color_path' => $jsonArray,
                ]);
                if($insert && $update){
                    return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-success small">Thêm màu cho sản phẩm '.mb_strtolower($one['name'],'UTF-8').' thành công</p>');
                }else{
                    return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
                }
            }
        }else{
            return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-danger small">Quá số lượng trong kho (Trong kho chỉ có '.$one->quantity.' sản phẩm)</p>');
        }
    }
    //sua mau
    function updateColor(Request $request){
        $data = $request->all();
        $one = Product::find($data['id']);
        $oneProductColor = ProductColor::where('id_product',$data['id'])->first();
        $colorPathArr = json_decode($oneProductColor->color_path,true);
        $quantityProduct = intval($one['quantity']);
        foreach($colorPathArr as $key => $colorPath){
            if(in_array($data['id_color'],$colorPath)){
                $quantityProduct += $colorPath['quantity'] - $data['quantity'];
                $colorPathArr[$key]['quantity'] = $data['quantity'];
            }
        }
        if($quantityProduct >= 0){ // ktra so luong vuot qua trong kho
            $one->quantity = $quantityProduct;
            $update = $one->save();
            $jsonArray = json_encode($colorPathArr);
            $oneProductColor->color_path = $jsonArray;
            $updateProductColor = $oneProductColor->save();
            if($updateProductColor && $update){
                return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-success small">Sửa màu cho sản phẩm '.mb_strtolower($one['name'],'UTF-8').' thành công</p>');
            }else{
                return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
            }
        }else{
            return redirect()->route('product.formColor',['id' => $data['id']])->with('message','<p class="text-danger small">Quá số lượng trong kho (Trong kho chỉ có '.$one->quantity.' sản phẩm)</p>');
        }
    }
    //xoa mau
    function deleteColor(Request $request){
        $data = $request->all();
        $one = Product::find($data['id']);
        $oneProductColor = ProductColor::where('id_product',$data['id'])->first();
        $colorPathArr = json_decode($oneProductColor->color_path,true);
        $quantityProduct = intval($one['quantity']);
        foreach($colorPathArr as $key => $colorPath){
            if(in_array($data['id_color'],$colorPath)){
                $quantityProduct += $colorPath['quantity'];
                unset($colorPathArr[$key]);
            }
        }
        $one->quantity = $quantityProduct;
        $update = $one->save();
        $jsonArray = json_encode($colorPathArr);
        $oneProductColor->color_path = $jsonArray;
        $updateProductColor = $oneProductColor->save();
        if($updateProductColor && $update){
            return json_encode(['res' => 'success', 'title' => 'Xóa màu cho sản phẩm', 'text' => 'Xóa màu sản phẩm thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xóa màu cho sản phẩm', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    //danh sach anh
    function formThumbnails(Request $request){
        $id = $request->get('id');
        $type = $request->get('type');
        $type = isset($type) ? $type : '';
        $title = 'Chọn ảnh sản phẩm';
        $one = Product::find($id);
        if($one->thumbnail_path){
            $thumbnails = explode('|',trim($one->thumbnail_path,'|'));
            $count = count($thumbnails);
        }else{
            $thumbnails = '';
            $count = 0;
        }
        return view('product.thumbnails',compact('title','one','type','thumbnails','count'));
    }
    //them anh
    function insertThumbnails(Request $request){
        $data = $request->all();
        $files = $request->file('image');
        Validator::make($data, [
            'image' => ['array', 'max:5'],
            'image.*' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ], [
            'image.max' => 'Tối đa chỉ được 5 ảnh thôi',
            'image.*.file' => 'Không thể xử lý tệp đã chọn.',
            'image.*.image' => 'Tệp phải là hình ảnh.',
            'image.*.mimes' => 'Định dạng tệp không hợp lệ. Chấp nhận định dạng jpeg, png, jpg, gif, webp.',
        ])->validate();
        $one = Product::find($data['id']);
        $thumbnailsPath = '|';
        $fileArr = [];
        foreach($files as $key => $file){
            $uploads = public_path('be/img/thumbnails/');
            $filename = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
            $filename = $filename.'-'.time().'.'.$extension;
            $fileArr[] = $filename;
            if (!file_exists($uploads)) { //truong hop chua co file do
                mkdir($uploads, 0777, true); // Create the directory if it does not exist
            }
            $file->move($uploads,$filename); // nem anh vao
        }
        if($one->thumbnail_path){
            $thumbnailsPath .= implode('|',$fileArr).$one->thumbnail_path;
        }else{
            $thumbnailsPath .= implode('|',$fileArr);
            $thumbnailsPath .= '|';
        }
        $countThumbnails = count(explode('|',trim($thumbnailsPath,'|')));
        if($countThumbnails <= 5){
            $one->thumbnail_path = $thumbnailsPath;
            $update = $one->save();
            if($update){
                return redirect()->route('product.formThumbnails',['id' => $data['id']])->with('message','<p class="text-success small">Thêm nhiều ảnh cho sản phẩm '.mb_strtolower($one->name,'UTF-8').' thành công</p>');
            }else{
                return redirect()->route('product.formThumbnails',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
            }
        }else{
            foreach($fileArr as $key => $file){
                $uploads = public_path('be/img/thumbnails/');
                unlink($uploads.$file);
            }
            return redirect()->route('product.formThumbnails',['id' => $data['id']])->with('message','<p class="text-danger small">Một sản phẩm chỉ tối đa 5 ảnh</p>');
        }
    }
    //sua anh
    function updateThumbnails(Request $request){
        $data = $request->all();
        $one = Product::find($data['id']);
        $thumbnails = explode('|',trim($one->thumbnail_path,'|'));
        foreach($thumbnails as $key => $thumbnail){
            if($data['image-old'] == $thumbnail){
                $uploads = public_path('be/img/thumbnails/');
                $filename = pathinfo($data['image']->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($data['image']->getClientOriginalName(),PATHINFO_EXTENSION);
                $filename = $filename.'-'.time().'.'.$extension;
                $filenameOld = public_path('be/img/thumbnails/'.$data['image-old']);
                $data['image']->move($uploads,$filename); // nem anh vao
                if(file_exists($filenameOld)) unlink(($filenameOld)); // xoa anh cu
                $thumbnails[$key] = $filename;
            }
        }
        // dd('|'.implode('|',$thumbnails).'|');
        $one->thumbnail_path = '|'.implode('|',$thumbnails).'|';
        $update = $one->save();
        if($update){
            return json_encode(['res' => 'success', 'title' => 'Sửa ảnh cho sản phẩm', 'text' => 'Sửa ảnh sản phẩm thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Sửa ảnh cho sản phẩm', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    //xoa anh
    function deleteThumbnails(Request $request){
        $data = $request->all();
        $one = Product::find($data['id']);
        $thumbnails = explode('|',trim($one->thumbnail_path,'|'));
        foreach($thumbnails as $key => $thumbnail){
            if($data['thumbnails'] == $thumbnail){
                $uploads = public_path('be/img/thumbnails/');
                unlink($uploads.$thumbnails[$key]);
                unset($thumbnails[$key]);
            }
        }
        $one->thumbnail_path = '|'.implode('|',$thumbnails).'|';
        $update = $one->save();
        if($update){
            return json_encode(['res' => 'success', 'title' => 'Xóa ảnh cho sản phẩm', 'text' => 'Xóa ảnh sản phẩm thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xóa ảnh cho sản phẩm', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
