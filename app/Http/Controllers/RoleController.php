<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách chức vụ';
        $list = Role::all();
        return view('role.list',compact('title','list'));
    }
    //form them mau
    function formInsert(){
        $title = 'Thêm chức vụ';
        return view('role.insert',compact('title'));
    }
    //them mau
    function add(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['unique:role,name'], //kiem tra tinh duy nhat trong bang Role va truong du lieu name
        ],
        [
            'name.unique' => 'Tên chức vụ đã tồn tại',
        ])->validate();
        $insert = Role::create([
            'name' => $data['name'],
            'is_admin' => isset($data['is_admin']) ? 1 : 0
        ]);
        if($insert){
            return redirect()->route('role.formInsert')->with('message','<p class="text-success small">Thêm chức vụ '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('role.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua mau
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa chức vụ';
        $one = Role::find($id);
        return view('role.update',compact('title','one'));
    }
    //sua mau
    function edit(Request $request){
        $data = $request->all();
        $one = Role::find($data['id']);
        $one->name = $data['name'];
        $one->is_admin = isset($data['is_admin']) ? 1 : 0;
        $update = $one->save();
        if($update){
            return redirect()->route('role.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa chức vụ '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('role.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa mau
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Role::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá chức vụ', 'text' => 'Xóa chức vụ thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá chức vụ', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
