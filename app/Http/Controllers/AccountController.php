<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
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
            'username' => ['unique:Account,username'], //kiem tra tinh duy nhat trong bang Account va truong du lieu name
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
}
