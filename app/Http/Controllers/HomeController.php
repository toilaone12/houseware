<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //trang chu
    function dashboard(){
        $title = 'Trang chủ';
        $listParentCate = Category::where('id_parent',0)->get();
        //hien thi gio hang
        $idCustomer = Cookie::get('id_customer');
        $carts = [];
        $count = 0;
        if(isset($idCustomer) && $idCustomer){
            $carts = Cart::where('id_account',$idCustomer)->get();
            $count = count($carts->toArray());
        }
        //san pham moi nhat
        $listsHot = [];
        $randomParent = [];
        $listsCategory = [];
        foreach ($listParentCate as $key => $parent) {
            $randomParent[] = [
                'id' => $parent->id_category,
                'name' => $parent->name,
            ];
        }
        foreach ($listParentCate as $key => $parent) {
            // Khởi tạo mảng parentData
            $parentData = [
                'name' => $parent->name,
                'products' => []
            ];
            // Biến đếm số lượng sản phẩm
            $productCount = 0;
            // Lấy danh sách các danh mục con
            $listChildCate = Category::where('id_parent', $parent->id_category)->get();
            // Kiểm tra nếu có danh mục con
            if (count($listChildCate)) {
                foreach ($listChildCate as $child) {
                    // Lấy danh sách các sản phẩm của danh mục con
                    $listProduct = Product::where('id_category', $child->id_category)->get();
                    foreach ($listProduct as $product) {
                        $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                        if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                            $parentData['products'][] = [
                                'id' => $product->id_product,
                                'image' => $product->image,
                                'name' => $product->name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                                'color' => json_decode($listProductColor['color_path'],true)
                            ];
                            $productCount++;
                            if ($productCount >= 5) break 2; // Dừng khi đã có đủ 5 sản phẩm //break 2; la thoat khoi 2 vong lap long nhau
                        }
                    }
                }
            } else {
                // Nếu không có danh mục con, lấy sản phẩm từ chính danh mục cha
                $listProduct = Product::where('id_category', $parent->id_category)->get();
                foreach ($listProduct as $product) {
                    $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                    if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                        $parentData['products'][] = [
                            'id' => $product->id_product,
                            'image' => $product->image,
                            'name' => $product->name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                            'color' => json_decode($listProductColor['color_path'],true)
                        ];
                        $productCount++;
                        if ($productCount >= 5) break; // Dừng khi đã có đủ 5 sản phẩm
                    }
                }
            }

            // Thêm parentData vào listsHot
            $listsHot[] = $parentData;
            // Giới hạn danh sách chỉ đến danh mục cha thứ 5
            if ($key == 4) break;
        }
        $keys = array_rand($randomParent,3);
        $randomItems = [];
        foreach($keys as $key){
            $randomItems[] = $randomParent[$key];
        }
        //hien random danh muc cac san pham truoc
        foreach ($randomItems as $key => $parent) {
            $parentData = [
                'name' => $parent['name'],
                'products' => []
            ];
            $productCount = 0;
            $listChildCate = Category::where('id_parent', $parent['id'])->get();
            if (count($listChildCate)) {
                foreach ($listChildCate as $child) {
                    // Lấy danh sách các sản phẩm của danh mục con
                    $listProduct = Product::where('id_category', $child->id_category)->orderBy('updated_at')->get();
                    foreach ($listProduct as $product) {
                        $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                        if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                            $parentData['products'][] = [
                                'id' => $product->id_product,
                                'image' => $product->image,
                                'name' => $product->name,
                                'price' => $product->price,
                                'discount' => $product->discount,
                            ];
                            $productCount++;
                            if ($productCount >= 6) break 2; // Dừng khi đã có đủ 6 sản phẩm //break 2; la thoat khoi 2 vong lap long nhau
                        }
                    }
                }
            }else {
                // Nếu không có danh mục con, lấy sản phẩm từ chính danh mục cha
                $listProduct = Product::where('id_category', $parent['id'])->orderBy('updated_at')->get();
                foreach ($listProduct as $product) {
                    $listProductColor = ProductColor::where('id_product', $product->id_product)->first();
                    if (!empty($listProductColor)) { // neu san pham phai co mau thi moi dc hien
                        $parentData['products'][] = [
                            'id' => $product->id_product,
                            'image' => $product->image,
                            'name' => $product->name,
                            'price' => $product->price,
                            'discount' => $product->discount,
                        ];
                        $productCount++;
                        if ($productCount >= 6) break; // Dừng khi đã có đủ 6 sản phẩm
                    }
                }
            }
            $listsCategory[] = $parentData;
            if($key == 2) break;
        }
        // dd($listsCategory);
        return view('home.content',compact('title','listParentCate','listsHot','listsCategory','listProduct','count','carts'));
    }
    //form dang nhap & dang ky
    function login(){
        return view('home.login');
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
        $idRole = Role::where('is_admin',0)->select('id_role')->first();
        $login = Account::where('username', $data['username'])->where('password', md5($data['password']))->where('id_role',$idRole->id_role)->first();
        if($login){
            $account = Account::find($login->id_account);
            $account->is_online = 1;
            $online = $account->save();
            if($online){
                Cookie::queue('id_customer',$login->id_account, 2628000);
                return redirect()->route('home.dashboard');
            }
        } else {
            return redirect()->route('home.login')->with('message','<p class="text-danger small">Tài khoản hoặc mật khẩu sai hoặc không tồn tại</p>');
        }
    }
    //dang ky
    function signUp(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $titleMail = 'Tạo tài khoản thành công';
        Validator::make($data,[
            'fullname' => ['regex: /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơĂƯăưẠ-ỹ ]+$/u'],
            'password' => ['min:6','max:32'],
        ],
        [
            'fullname.regex' => 'Họ tên phải là chữ cái',
            'password.min' => 'Mật khẩu phải từ 6 đến 32 ký tự',
        ])->validate();
        $idRoleCustomer = Role::where('is_admin',0)->select('id_role')->first();
        $account = Account::where('id_role',$idRoleCustomer)->where('username',$data['username'])->first();
        if(empty($account)){
            $insert = Account::create([
                'username' => $data['username'],
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'password' => md5($data['password']),
                'id_role' => $idRoleCustomer->id_role,
                'is_online' => 0,
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
                return redirect()->route('home.login')->with('signUp','<p class="text-success small">Tạo tài khoản thành công, vui lòng kiểm tra email</p>');
            }else{
                return redirect()->route('home.login')->with('signUp','<p class="text-danger small">Lỗi truy vấn</p>');
            }
        }else{
            return redirect()->route('home.login')->with('signUp','<p class="text-danger small">Tài khoản đã tồn tại</p>');
        }
    }
}
