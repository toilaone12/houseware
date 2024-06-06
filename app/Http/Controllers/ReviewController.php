<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //admin
    //trang chu
    //gui danh gia
    function add(Request $request){
        $data = $request->all();
        $insert = Review::create([
            'id_product' => $data['id_product'],
            'id_account' => $data['id_account'],
            'fullname' => $data['fullname'],
            'rating' => $data['rating'],
            'review' => $data['review'],
            'id_reply' => 0,
            'is_update' => 0
        ]);
        if($insert) {
            return response()->json(['res' => 'success', 'text' => 'Đánh giá thành công']);
        }else{
            return response()->json(['res' => 'error', 'text' => 'Đánh giá thất bại']);
        }
    }
    //phan trang
    function pagination(Request $request){
        $data = $request->all();
        $page = $data['page'] != 1 ? intval($data['page']) - 1 : 0;
        $reviews = Review::where('id_product',$data['id'])->orderBy('id_review','desc')->skip($page * 3)->take(3)->get();
        if($reviews){
            $array = [];
            foreach($reviews as $review){
                $array[] = [
                    'id' => $review->id_review,
                    'fullname' => $review->fullname,
                    'rating' => $review->rating,
                    'date' => date('d m Y g:i A',strtotime($review->updated_at)),
                    'review' => $review->review
                ];
            }
            return response()->json(['res' => 'success', 'reviews' => $array]);
        }else{
            return response()->json(['res' => 'error', 'reviews' => '']);
        }
    }
}
