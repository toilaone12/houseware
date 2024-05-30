<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách màu';
        $list = Color::all();
        return view('color.list',compact('title','list'));
    }
    //form them mau
    function formInsert(){
        $title = 'Thêm màu';
        return view('color.insert',compact('title'));
    }
    //them mau
    function add(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['unique:color,name'], //kiem tra tinh duy nhat trong bang Color va truong du lieu name
        ],
        [
            'name.unique' => 'Tên màu đã tồn tại',
        ])->validate();
        $insert = Color::create([
            'name' => $data['name'],
        ]);
        if($insert){
            return redirect()->route('color.formInsert')->with('message','<p class="text-success small">Thêm màu '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('color.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua mau
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa màu';
        $one = Color::find($id);
        return view('color.update',compact('title','one'));
    }
    //sua mau
    function edit(Request $request){
        $data = $request->all();
        $one = Color::find($data['id']);
        $one->name = $data['name'];
        $update = $one->save();
        if($update){
            return redirect()->route('color.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa màu '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('color.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa mau
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Color::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá màu', 'text' => 'Xóa màu thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá màu', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
