<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        ])->validate();
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
    //sua danh muc
    function edit(Request $request){
        $data = $request->all();
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
    //home
    //danh sach danh muc
    function home(Request $request){
        $data = $request->all();
        $desc = intval($request->get('desc'));
        $asc = intval($request->get('asc'));
        $min = intval($request->get('min'));
        $max = intval($request->get('max'));
        $one = Category::find($data['id']);
        $title = $one->name;
        $listParentCate = Category::where('id_parent',0)->get();
        $listChild = Category::where('id_parent',$one->id_category)->get();
        $listChildAll = Category::where('id_parent','!=',0)->get();
        $arrChild = [];
        //phan san pham
        if(count($listChild)){
            foreach($listChild as $child){
                $childDatas[] = $child->id_category;
            }
            $listProduct = Product::whereIn('id_category',$childDatas);
            if($asc){
                $listProduct = $listProduct->orderBy('id_product','asc');
            }else if($desc){
                $listProduct = $listProduct->orderBy('id_product','desc');
            }
            if($min && $max){
                $listProduct = $listProduct->whereBetween('price',[$min,$max]);
            }
            $listProduct = $listProduct->paginate(9);
            $countProduct = Product::whereIn('id_category',$childDatas)->get();
        }else{
            $listProduct = Product::where('id_category',$one->id_category);
            if($asc){
                $listProduct = $listProduct->orderBy('id_product','asc');
            }else if($desc){
                $listProduct = $listProduct->orderBy('id_product','desc');
            }
            $listProduct = $listProduct->paginate(9);
            $countProduct = Product::where('id_category',$one->id_category)->get();
        }
        //phan danh muc
        foreach($listParentCate as $key => $parent){
            $listChild = Category::where('id_parent',$parent->id_category)->get();
            if($parent->id_category != $one->id_category){
                if(count($listChild)){
                    $parentDatas = [
                        'id' => $parent->id_category,
                        'name' => $parent->name,
                        'count' => 0,
                    ];
                    $count = 0;
                    foreach($listChild as $child){
                        $productChild = Product::where('id_category',$child->id_category)->get();
                        $count += count($productChild);
                        $parentDatas['count'] = $count;
                    }
                }else{
                    $productParent = Product::where('id_category',$parent->id_category)->get();
                    $parentDatas = [
                        'id' => $parent->id_category,
                        'name' => $parent->name,
                        'count' => count($productParent)
                    ];
                }
                $arrChild[] = $parentDatas;
            }
        }
        return view('category.home',compact('one','title','listProduct','listParentCate','countProduct','arrChild'));
    }
}
