<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
}
