<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách phí vận chuyển';
        $list = Fee::all();
        return view('fee.list',compact('title','list'));
    }
    //form them phi van chuyen
    function formInsert(){
        $title = 'Thêm phí vận chuyển';
        return view('fee.insert',compact('title'));
    }
    //them phi van chuyen
    function add(Request $request){
        $data = $request->all();
        $insert = Fee::create([
            'radius' => $data['radius'],
            'weather' => $data['weather'],
            'fee' => str_replace('.','',$data['fee']),
        ]);
        if($insert){
            return redirect()->route('fee.formInsert')->with('message','<p class="text-success small">Thêm phí vận chuyển trong khoảng cách '.mb_strtolower($data['radius'],'UTF-8').'km thành công</p>');
        }else{
            return redirect()->route('fee.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua phi van chuyen
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa phí vận chuyển';
        $one = Fee::find($id);
        return view('fee.update',compact('title','one'));
    }
    //sua phi van chuyen
    function edit(Request $request){
        $data = $request->all();
        $one = Fee::find($data['id']);
        $one->radius = $data['radius'];
        $one->weather = $data['weather'];
        $one->fee = str_replace('.','',$data['fee']);
        $update = $one->save();
        if($update){
            return redirect()->route('fee.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa phí vận chuyển trong khoảng cách '.mb_strtolower($data['radius'],'UTF-8').'km thành công</p>');
        }else{
            return redirect()->route('fee.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa phi van chuyen
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Fee::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá phí vận chuyển', 'text' => 'Xóa phí vận chuyển thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá phí vận chuyển', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
