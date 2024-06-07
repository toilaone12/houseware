<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    //trang chu
    //tra phi van chuyen
    function apply(Request $request)
    {
        $data = $request->all();
        $apiKey = 'M--tqWacqVfZvRoIjEeEN9Pn_nPJV6IHlRPHaQBUN3M';
        $lat = $data['lat'];
        $lng = $data['lng'];
        $start = '20.993961580653178,105.79290252525247'; //toa do vi tri HN
        $end = $lat . ',' . $lng;
        $endpoint = 'https://router.hereapi.com/v8/routes';
        $url = $endpoint . '?xnlp=CL_JSMv3.1.38.0&apikey=' . $apiKey . '&routingMode=fast&transportMode=car&origin=' . $start . '&destination=' . $end . '&return=travelSummary';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $distance = $data['routes'][0]['sections'][0]['travelSummary']['length'] / 1000;
        $weather = $this->getStatusWeather($lat, $lng);
        $arrayWeather = ['Clouds', 'Rain', 'Drizzle', 'Thunderstorm', 'Snow'];
        $condition = '';
        if (array_search($weather, $arrayWeather)) {
            $condition = 'Mưa';
        } else {
            $condition = 'Nắng';
        }
        $checkFee = Fee::where('weather', $condition)->where('radius', '>=', $distance)->orderBy('radius', 'asc')->first();
        if ($checkFee) {
            return response()->json(['res' => 'success', 'text' => 'Áp phí vận chuyển thành công', 'fee' => $checkFee->fee]);
        } else {
            if ($condition == 'Mưa') {
                return response()->json(['res' => 'success', 'text' => 'Áp phí vận chuyển thành công', 'fee' => 7000 * round($distance)]);
            } else {
                return response()->json(['res' => 'success', 'text' => 'Áp phí vận chuyển thành công', 'fee' => 5000 * round($distance)]);
            }
        }
        // return array('distance' => $distance, 'duration' => $duration);
    }

    function getStatusWeather($lat, $lng)
    {
        $apiKey = '69f59d0621e668fb571e5dda73e6ab46';
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $lat . '&lon=' . $lng . '&appid=' . $apiKey;
        $response = file_get_contents($url);

        // Xử lý kết quả JSON
        $data = json_decode($response, true);
        return $data['weather'][0]['main'];
    }
}
