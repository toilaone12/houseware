<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách quảng cáo';
        $list = Banner::all();
        return view('banner.list',compact('title','list'));
    }
    //form them quang cao
    function formInsert(){
        $title = 'Thêm quảng cáo';
        return view('banner.insert',compact('title'));
    }
    //them quang cao
    function add(Request $request){
        $data = $request->all();
        $image = $request->file('image');
        $uploads = public_path('be/img/banner/');
        $filename = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
        $filename = $filename.'-'.time().'.'.$extension;
        Validator::make($data, [
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif'],
        ], [
            'image.required' => 'Vui lòng chọn ít nhất một tệp ảnh.',
            'image.required' => 'Vui lòng chọn một tệp ảnh.',
            'image.file' => 'Không thể xử lý tệp đã chọn.',
            'image.image' => 'Tệp phải là hình ảnh.',
            'image.mimes' => 'Định dạng tệp không hợp lệ. Chấp nhận định dạng jpeg, png, jpg, gif.',
        ])->validate();

        if (!file_exists($uploads)) { //truong hop chua co file do
            mkdir($uploads, 0777, true); // Create the directory if it does not exist
        }
        $image->move($uploads,$filename); // nem anh vao
        $insert = Banner::create([
            'image' => 'be/img/banner/'.$filename,
        ]);
        if($insert){
            return redirect()->route('banner.formInsert')->with('message','<p class="text-success small">Thêm quảng cáo thành công</p>');
        }else{
            return redirect()->route('banner.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua quang cao
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa quảng cáo';
        $one = Banner::find($id);
        return view('banner.update',compact('title','one'));
    }
    //sua quang cao
    function edit(Request $request){
        $data = $request->all();
        $image = $request->file('image');
        if($image){
            $uploads = public_path('be/img/banner/');
            $filename = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
            $filenameOld = public_path($data['image-old']);
            $extension = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
            $filename = $filename.'-'.time().'.'.$extension;
            Validator::make($data, [
                'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            ], [
                'image.required' => 'Vui lòng chọn ít nhất một tệp ảnh.',
                'image.required' => 'Vui lòng chọn một tệp ảnh.',
                'image.file' => 'Không thể xử lý tệp đã chọn.',
                'image.image' => 'Tệp phải là hình ảnh.',
                'image.mimes' => 'Định dạng tệp không hợp lệ. Chấp nhận định dạng jpeg, png, jpg, gif, webp.',
            ])->validate();
            $image->move($uploads,$filename); // nem anh vao
            if(file_exists($filenameOld)) unlink(($filenameOld)); // xoa anh cu
            $one = Banner::find($data['id']);
            $one->image ='be/img/banner/'.$filename;
            $update = $one->save();
            if($update){
                return redirect()->route('banner.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa quảng cáo thành công</p>');
            }else{
                return redirect()->route('banner.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
            }
        }else{
            return redirect()->route('banner.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Cảm ơn vì đã cập nhật</p>');
        }
    }
    //xoa quang cao
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Banner::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá quảng cáo', 'text' => 'Xóa quảng cáo thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá quảng cáo', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
}
