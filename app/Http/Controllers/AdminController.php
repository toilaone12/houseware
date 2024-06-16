<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Order;
use App\Models\ProductColor;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //admin
    //form dang nhap
    function login(){
        $id = Cookie::get('id_account');
        if(isset($id) && $id){
            Cookie::queue(Cookie::forget('id_account'));
            return redirect()->route('admin.login');
        }else{
            $title = 'Đăng nhập';
            return view('admin.login',compact('title'));
        }
    }
    //dang nhap
    function signIn(Request $request){
        $data = $request->all();
        $isRemember = isset($data['is_remember']) ? 1 : 0;
        if($isRemember){
            $arrRemember = [
                'username' => $data['username'],
                'password' => $data['password'],
                'remember' => $isRemember,
            ];
            $jsonRemember = json_encode($arrRemember);
            Cookie::queue('json_remember', $jsonRemember, 2628000);
        }else{
            $jsonRemember = Cookie::get('json_remember');
            if (isset($jsonRemember)) {
                Cookie::queue(Cookie::forget('json_remember'));
            }
        }
        Validator::make($data, [
            'password' => ['min:6', 'max:32'],
        ], [
            'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải từ 6 đến 32 ký tự',
        ])->validate();
        $login = Account::where('username', $data['username'])->where('password', md5($data['password']))->first();
        if($login){
            $account = Account::find($login->id_account);
            $account->is_online = 1;
            $online = $account->save();
            if($online){
                Cookie::queue('id_account',$login->id_account, 2628000);
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->route('admin.login')->with('message','Tài khoản hoặc mật khẩu sai hoặc không tồn tại');
        }
    }
    //trang chu
    function dashboard(){
        $title = 'Trang chủ';
        $totalProduct = ProductColor::all();
        $totalReview = Review::all();
        $totalPending = Order::where('status',0)->get();
        $totalComplete = Order::where('status',3)->get();
        $totalCancel = Order::where('status',4)->get();
        $totalOrder = Order::where('date_updated',date('Y-m-d'))->get();
        $orderComplete = Order::where('date_updated',date('Y-m-d'))->where('status',3)->get();
        $totalOrderComplete = 0;
        foreach($orderComplete as $complete){
            $totalOrderComplete += $complete->total;
        }
        return view('admin.content',compact('title','totalProduct','totalOrder','totalOrderComplete','totalReview','totalPending','totalCancel','totalComplete'));
    }
}
