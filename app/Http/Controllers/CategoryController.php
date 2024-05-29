<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách danh mục';
        $list = Category::all();
        $listParent = Category::where('id_parent',0)->get();
        return view('category.list',compact('title','list','listParent'));
    }
    //form them danh muc
    function formInsert(){
        $title = 'Thêm danh mục';
        $listParent = Category::where('id_parent',0)->get();
        return view('category.insert',compact('title','listParent'));
    }
    //them danh muc
    function add(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['unique:category,name'], //kiem tra tinh duy nhat trong bang category va truong du lieu name
        ],
        [
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);
        $insert = Category::create([
            'name' => $data['name'],
            'id_parent' => $data['id_parent'],
        ]);
        if($insert){
            return redirect()->route('category.formInsert')->with('message','<p class="text-success small">Thêm danh mục '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('category.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua danh muc
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa danh mục';
        $one = Category::find($id);
        $listParent = Category::where('id_parent',0)->get();
        return view('category.update',compact('title','listParent','one'));
    }
    //them danh muc
    function edit(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['unique:category,name'], //kiem tra tinh duy nhat trong bang category va truong du lieu name
        ],
        [
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);
        $one = Category::find($data['id']);
        $one->name = $data['name'];
        $one->id_parent = $data['id_parent'];
        $update = $one->save();
        if($update){
            return redirect()->route('category.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa danh mục '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('category.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa danh muc
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Category::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá danh mục', 'text' => 'Xóa danh mục thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá danh mục', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
