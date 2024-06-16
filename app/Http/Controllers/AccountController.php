<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\DetailOrder;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //admin
    //danh sach
    function list(){
        $title = 'Danh sách tài khoản';
        $listRole = Role::all();
        $listRoleAdmin = Role::where('is_admin',1)->get();
        $listRoleUser = Role::where('is_admin',0)->get();
        $arrAdmin = [];
        $arrUser = [];
        foreach($listRoleAdmin as $roleAdmin){
            $arrAdmin[] = $roleAdmin->id_role;
        }
        foreach($listRoleUser as $roleUser){
            $arrUser[] = $roleUser->id_role;
        }
        $listAdmin = Account::whereIn('id_role',$arrAdmin)->get();
        $listUser = Account::whereIn('id_role',$arrUser)->get();
        return view('account.list',compact('title','listAdmin','listUser','listRole'));
    }
    //form them tai khoan
    function formInsert(){
        $title = 'Thêm tài khoản';
        $listRole = Role::where('is_admin',1)->get();
        return view('account.insert',compact('title','listRole'));
    }
    //them tai khoan
    function add(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $titleMail = 'Tạo tài khoản thành công';
        Validator::make($data,[
            'username' => ['unique:account,username'], //kiem tra tinh duy nhat trong bang Account va truong du lieu name
            'fullname' => ['regex: /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơĂƯăưẠ-ỹ ]+$/u'],
            'password' => ['min:6','max:32'],
        ],
        [
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'fullname.regex' => 'Họ tên phải là chữ cái',
            'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
        ])->validate();
        $insert = Account::create([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'id_role' => $data['id_role'],
            'is_online' => 0
        ]);
        if($insert){
            $dataMail = [
                'name' => $data['fullname'],
                'username' => $data['username'],
                'password' => $data['password'],
            ];
            $mail = Mail::send('mail.register',$dataMail,function($message) use ($titleMail,$email){
                $message->to($email)->subject($titleMail);
                $message->from($email,$titleMail);
            });
            return redirect()->route('account.formInsert')->with('message','<p class="text-success small">Thêm tài khoản '.mb_strtolower($data['username'],'UTF-8').' thành công, vui lòng kiểm tra email</p>');
        }else{
            return redirect()->route('account.formInsert')->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //form sua tai khoan
    function formUpdate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa tài khoản';
        $one = Account::find($id);
        return view('account.update',compact('title','one'));
    }
    //sua tai khoan
    function edit(Request $request){
        $data = $request->all();
        $one = Account::find($data['id']);
        $one->name = $data['name'];
        $update = $one->save();
        if($update){
            return redirect()->route('account.formUpdate',['id' => $data['id']])->with('message','<p class="text-success small">Sửa tài khoản '.mb_strtolower($data['name'],'UTF-8').' thành công</p>');
        }else{
            return redirect()->route('account.formUpdate',['id' => $data['id']])->with('message','<p class="text-danger small">Lỗi truy vấn</p>');
        }
    }
    //xoa tai khoan
    function delete(Request $request){
        $id = $request->get('id');
        $delete = Account::find($id)->delete();
        if($delete){
            return json_encode(['res' => 'success', 'title' => 'Xoá tài khoản', 'text' => 'Xóa tài khoản thành công', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Xoá tài khoản', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    //cap mat khau tai khoan
    function assign(Request $request){
        $id = $request->get('id');
        $titleMail = 'Cấp lại mật khẩu';
        $one = Account::find($id);
        $email = $one->email;
        $password = rand(000000,999999);
        $one->password = md5($password);
        $update = $one->save();
        if($update){
            $dataMail = [
                'name' => $one->fullname,
                'username' => $one->username,
                'password' => $password,
            ];
            $mail = Mail::send('mail.assign',$dataMail,function($message) use ($titleMail,$email){
                $message->to($email)->subject($titleMail);
                $message->from($email,$titleMail);
            });
            return json_encode(['res' => 'success', 'title' => 'Cấp mật khẩu tài khoản', 'text' => 'Cấp mật khẩu thành công, vui lòng kiểm tra lại email!', 'icon' => 'success']);
        }else{
            return json_encode(['res' => 'error', 'title' => 'Cấp mật khẩu tài khoản', 'text' => 'Lỗi truy vấn', 'icon' => 'error']);
        }
    }
    //trang chu
    function home(Request $request){
        $type = request()->get('type');
        if(!$type) return redirect()->route('account.home',['type' => 'info']);
        $title = 'Thông tin cá nhân';
        $listParentCate = Category::where('id_parent',0)->get();
        $listChildrenCate = Category::where('id_parent','!=',0)->get();
        //hien thi gio hang
        $idCustomer = Cookie::get('id_customer');
        $carts = [];
        $count = 0;
        if(isset($idCustomer) && $idCustomer){
            $carts = Cart::where('id_account',$idCustomer)->get();
            $count = count($carts->toArray());
        }
        //hien thi yeu thich
        $countWhiteList = 0;
        if(isset($idCustomer) && $idCustomer){
            $whitelists = Favourite::where('id_account',$idCustomer)->first();
            if(!empty($whitelists->product_path)){
                $countWhiteList = count(explode('|',trim($whitelists->product_path,'|')));
            }
        }
        $account = Account::find($idCustomer);
        $coupons = Coupon::all();
        $couponUser = CouponUser::where('id_account',$idCustomer)->get();
        $orders = Order::where('id_account',$idCustomer)->get();
        return view('account.home',compact('listParentCate','listChildrenCate','countWhiteList','carts','title','count','type','account','couponUser','coupons','orders'));
    }

    //san pham yeu thich
    function whitelist(Request $request){
        $title = 'Yêu thích';
        $listParentCate = Category::where('id_parent',0)->get();
        $listChildrenCate = Category::where('id_parent','!=',0)->get();
        //hien thi gio hang
        $idCustomer = Cookie::get('id_customer');
        $carts = [];
        $count = 0;
        if(isset($idCustomer) && $idCustomer){
            $carts = Cart::where('id_account',$idCustomer)->get();
            $count = count($carts->toArray());
        }
        //hien thi yeu thich
        $countWhiteList = 0;
        $arrWhitelist = [];
        if(isset($idCustomer) && $idCustomer){
            $whitelists = Favourite::where('id_account',$idCustomer)->first();
            if(!empty($whitelists->product_path)){
                $countWhiteList = count(explode('|',trim($whitelists->product_path,'|')));
                $products = explode('|',trim($whitelists->product_path,'|'));
                foreach($products as $id){
                    $one = Product::find($id);
                    $arrWhitelist[] = $one;
                }
            }
        }
        return view('account.whitelist',compact('listParentCate','listChildrenCate','countWhiteList','carts','title','count','arrWhitelist'));
    }

    function updateProfile(Request $request){
        $data = $request->all();

        Validator::make($data,[
            'phone' => ['min:10','max:10'],
        ],[
            'phone.*' => 'Số điện thoại đặt hàng phải trong phạm vi lãnh thổ Việt Nam'
        ])->validate();
        $idCustomer = Cookie::get('id_customer');
        $account = Account::find($idCustomer);
        $account->fullname = $data['fullname'];
        $account->phone = $data['phone'];
        $account->email = $data['email'];
        $account->address = $data['address'];
        $update = $account->save();
        if($update){
            return redirect()->route('account.home',['type' => 'info'])->with('successOrder','Thay đổi thông tin thành công');
        }else{
            return redirect()->route('account.home',['type' => 'info'])->with('errorOrder','Lỗi truy vấn');
        }
    }

    function updatePassword(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'password' => ['min:6','max:32'],
            'repassword' => ['same:password', 'min:6', 'max:32'],
        ],
        [
            'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
            'repassword.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
            'repassword.same' => 'Mật khẩu không trùng khớp',
        ])->validate();
        $idCustomer = Cookie::get('id_customer');
        $account = Account::find($idCustomer);
        $account->password = md5($data['password']);
        $update = $account->save();
        if($update){
            return redirect()->route('account.home',['type' => 'password'])->with('successOrder','Thay đổi mật khẩu thành công');
        }else{
            return redirect()->route('account.home',['type' => 'password'])->with('errorOrder','Lỗi truy vấn');
        }
    }
}
