<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách mã giảm giá';
        $list = Coupon::all();
        return view('coupon.list',compact('title','list'));
    }
    //form them ma giam gia
    function formInsert(){
        $title = 'Thêm mã giảm giá';
        return view('coupon.insert',compact('title'));
    }
    //them ma giam gia
    function add(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['unique:coupon,name'], //kiem tra tinh duy nhat trong bang Coupon va truong du lieu name
            'code' => ['min:6','regex: /^[A-Z0-9-]+$/'],
        ],
        [
            'name.unique' => 'Tên mã giảm giá đã tồn tại',
            'code.regex' => 'Mã code phải viết hoa toàn bộ',
            'code.min' => 'Mã code phải từ 6 ký tự',
        ])->validate();
        $insert = Coupon::create([
            'name' => $data['name'],
            'code' => $data['code'],
            'quantity' => $data['quantity'],
            'type' => $data['type'],
            'discount' => str_replace('.','',$data['discount']),
            'expiration' => $data['expiration']
        ]);
        if($insert){
            return redirect()->route('coupon.formInsert')->with('message','<p class="text-success small">Thêm mã giảm giá '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('coupon.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua ma giam gia
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa mã giảm giá';
        $one = Coupon::find($id);
        return view('coupon.update',compact('title','one'));
    }
    //sua ma giam gia
    function edit(Request $request){
        $data = $request->all();
        $one = Coupon::find($data['id']);
        $one->name = $data['name'];
        $one->code = $data['code'];
        $one->quantity = $data['quantity'];
        $one->type = $data['type'];
        $one->discount = str_replace('.','',$data['discount']);
        $one->expiration = $data['expiration'];
        $update = $one->save();
        if($update){
            return redirect()->route('coupon.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa mã giảm giá '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('coupon.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa ma giam gia
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Coupon::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá mã giảm giá', 'text' => 'Xóa mã giảm giá thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá mã giảm giá', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    function addCouponUser(Request $request){
        $data = $request->all();
        $check = CouponUser::where('id_account', $data['id'])->where('id_coupon', $data['coupon'])->first();
        if(!$check){
            $insert = CouponUser::create([
                'id_account' => $data['id'],
                'id_coupon' => $data['coupon']
            ]);
            if($insert){
                return json_encode(['res' => 'success', 'title' => 'Cấp mã giảm giá', 'text' => 'Cấp mã giảm giá cho khách thành công', 'icon' => 'success']);
            }else{
                return json_encode(['res' => 'error', 'title' => 'Cấp mã giảm giá', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
            }
        }else{
            return json_encode(['res' => 'warning', 'title' => 'Cấp mã giảm giá', 'text' => 'Khách hàng này đã có mã giảm giá này', 'icon' => 'warning']);
        }
    }
    //trang chu
    //ap dung ma
    function apply(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('code',$data['code'])->where('expiration','>=',date('Y-m-d'))->first();
        if($coupon){
            $id = $coupon->id_coupon;
            $check = CouponUser::where('id_account',$data['id_account'])
            ->where('id_coupon',$id)->first();
            if($check){
                $type = $coupon->type;
                return response()->json(['res' => 'success', 'text' => 'Áp dụng mã giảm giá thành công', 'fee' => $coupon->discount, 'type' => $type, 'id' => $id]);
            }else{
                return response()->json(['res' => 'warning', 'text' => 'Bạn không có mã khuyến mãi này']);
            }
        }else{
            return response()->json(['res' => 'warning', 'text' => 'Mã khuyến mãi này không tồn tại hoặc đã hết hạn']);
        }
    }
}
