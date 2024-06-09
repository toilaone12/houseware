<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\DetailOrder;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //trang chu
    //gui gio hang sang dat hang
    function apply(Request $request){
        $data = $request->all();
        if(isset($data['code']) && $data['code']){
            $coupon = [
                'code' => $data['code'],
                'discount' => str_replace('-','',$data['discount']),
            ];
            Session::put('coupon',$coupon);
        }else{
            $coupon = Session::get('coupon');
            if(isset($coupon) && $coupon){
                Session::forget('coupon');
            }
        }
        return response()->json(['res' => 'success']);
    }

    //trang kiem tra thong tin don hang
    function checkout(Request $request){
        $title = 'Thông tin đơn hàng';
        //danh muc cha
        $listParentCate = Category::where('id_parent',0)->get();
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
        //lay thong tin gio hang
        foreach($carts as &$cart){
            $chooseColor = $cart->id_color;
            $color = Color::find($cart->id_color);
            $productColor = ProductColor::where('id_product',$cart->id_product)->first();
            $colorPath = json_decode($productColor->color_path,true);
            //tao mang moi co id color bang mau dang chon
            $array = array_filter($colorPath, function ($item) use ($chooseColor) {
                return $item['id_color'] == $chooseColor;
            });
            $array = array_values($array); //reset key cua mang
            $quantityProduct = $array[0]['quantity'];
            $cart['color'] = $color->name;
            $cart['limit'] = $array[0]['quantity'];
            unset($cart);
        }
        //ma giam gia
        $coupon = Session::get('coupon');
        if(!isset($coupon) && !$coupon){
            $coupon = [];
        }
        return view('order.checkout',compact('listParentCate','carts','count','countWhiteList','title','coupon'));
    }
    //dat hang
    function order(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,[
            'phone' => ['min:10','max:10'],
        ],[
            'phone.*' => 'Số điện thoại đặt hàng phải trong phạm vi lãnh thổ Việt Nam'
        ]);
        if($validation->fails()){ //kiemt ra co loi
            return response()->json(['res' => 'warning', 'text' => $validation->errors()]);
        }else{
            $idCustomer = Cookie::get('id_customer');
            $carts = Cart::where('id_account',$idCustomer)->get();
            $total = 0;
            $subtotal = 0;
            $feeship = intval(str_replace('.','',$data['feeship']));
            $discountCoupon = $data['feecoupon'] ? intval(str_replace('.','',$data['feecoupon'])) : 0;
            foreach($carts as $cart){
                $subtotal = $cart->quantity * $cart->price;
                $total += $subtotal;
            }
            $totalOriginal = $total;
            $total += $feeship - $discountCoupon;
            $code = strtoupper(substr(md5(microtime()),rand(0,26),5));
            $order = [
                'id_account' => $idCustomer,
                'code' => $code,
                'fullname' => $data['fullname'],
                'phone' => $data['phone'],
                'address' => isset($data['address']) && $data['address'] ? $data['address'] : '',
                'email' => $data['email'],
                'note' => isset($data['note']) && $data['note'] ? $data['note'] : '',
                'subtotal' => $totalOriginal,
                'feeship' => $feeship,
                'discount' => $discountCoupon,
                'total' => $total,
                'payment' => $data['choose-payment'],
                'status' => 0,
                'date_updated' => date('Y-m-d'),
            ];
            Session::put('order',$order);
            if($data['choose-payment'] == 2){ // thanh toan bang the
                $payment = $this->payment($data['card'],$total,$code);
                if(isset($payment['mess']) && $payment['mess']){
                    return response()->json(['res' => 'error', 'text' => $payment['mess']]);
                }else{
                    return response()->json(['res' => 'success', 'url' => $payment]);
                }
            }else{ //thanh toan khi nhan hang hoac thanh toan khi den nha
                return response()->json(['res' => 'success', 'url' => route('order.handle')]);
            }
        }
    }
    //xu ly sau khi chap nhan thanh toan mua hang
    function handle(Request $request){
        $idCustomer = Cookie::get('id_customer');
        $carts = Cart::where('id_account',$idCustomer)->get();
        $order = Session::get('order');
        $code = $order['code'];
        $insert = Order::create($order);
        if($insert){
            $idOrder = $insert->id_order;
            $handleOrderDetail = $this->handleOrderDetail($idOrder,$code,$carts,$idCustomer); //xu ly don hang chi tiet
            if(!$handleOrderDetail['res']){
                Order::find($idOrder)->delete();
                return redirect()->route('order.checkout')->with('errorOrder',$handleOrderDetail['note']);
            }
            $handleCoupon = true;
            $coupon = Session::get('coupon');
            if(isset($coupon) && $coupon){
                $handleCoupon = $this->handleCoupon($coupon,$idCustomer); //xu ly khuyen mai
                if(!$handleCoupon['res']) {
                    Order::find($idOrder)->delete();
                    return redirect()->route('order.checkout')->with('errorOrder',$handleCoupon['note']);
                }else{
                    $handleCoupon = ['res' => true];
                }
            }else{
                $handleCoupon = ['res' => true];
            }
            if($handleCoupon['res'] && $handleOrderDetail['res']){
                $request->session()->forget('order');
                $request->session()->forget('coupon');
                $request->session()->flush();
                return redirect()->route('cart.home')->with('successOrder','Mua hàng thành công');
            }
        }
    }

    //xu ly don hang chi tiet
    function handleOrderDetail($id,$code,$carts,$idCustomer){
        $checkProductColor = [];
        $isCheck = true;
        foreach ($carts as $key => $cart) {
            $productColor = ProductColor::where('id_product',$cart->id_product)->first();
            $colorPath = json_decode($productColor->color_path,true);
            $color = $cart->id_color;
            //tao mang moi co id color bang mau dang chon
            $array = array_filter($colorPath, function ($item) use ($color) {
                return $item['id_color'] == $color;
            });
            $array = array_values($array); //reset key cua mang
            $quantityProduct = $array[0]['quantity'];
            $quantityCart = $cart['quantity'];
            if($quantityCart <= $quantityProduct){ // neu du trong kho
                $checkProductColor[] = [
                    'id' => $cart['id_product'],
                    'name' => $cart['name'],
                    'quantity' => $quantityProduct - $quantityCart,
                    'price' => $cart['price'],
                    'note' => true,
                ];
            }else{ //neu k du
                $checkProductColor[] = [
                    'id' => $cart['id_product'],
                    'name' => $cart['name'],
                    'quantity' => $cart['quantity'],
                    'price' => $cart['price'],
                    'enough' => intval($quantityProduct),
                    'note' => false,
                ];
                $isCheck = false;
            }
        }
        if(!$isCheck){ //trong gio hang co 1 hoac nhieu san pham k du nua (trong th co nguoi truoc mua trung san pham tranh trc)
            $error = '';
            $count = 0;
            foreach($checkProductColor as $productColor){
                if(!$productColor['note']){
                    if($count){
                        $error .= ' và ';
                    }
                    $error .= 'Sản phẩm '.$productColor['name'].' chỉ còn '.$productColor['enough'].' sản phẩm';
                    $count++;
                }
            }
            return ['res' => false, 'note' => $error];
        }else{ //khi k co loi
            DB::beginTransaction(); //bat dau 1 giao dich
            try { //try catch xu ly loi
                foreach ($carts as $key => $cart) {
                    $data = [
                        'id_order' => $id,
                        'code' => $code,
                        'id_product' => $cart->id_product,
                        'image' => $cart->image,
                        'name' => $cart->name,
                        'id_color' => $cart->id_color,
                        'quantity' => $cart->quantity,
                        'price' => $cart->price,
                    ];
                    $insert = DetailOrder::create($data);
                    if (!$insert) {
                        throw new \Exception('Không thể chèn chi tiết đơn hàng'); //neu loi nem luon vao catch
                    }else{
                        $productColor = ProductColor::where('id_product',$cart->id_product)->first();
                        $colorPath = json_decode($productColor->color_path,true);
                        foreach($colorPath as &$color){
                            if(in_array($cart->id_color,$color)){
                                $color['quantity'] = $color['quantity'] - $cart->quantity;
                            }
                        }
                        $productColor->color_path = json_encode($colorPath);
                        $productColor->save();
                    }
                };
                Cart::where('id_account', $idCustomer)->delete();
                DB::commit(); //neu transaction k co loi se len DB
                return ['res' => true];
            } catch (\Exception $e) { //neu co loi se rollback lai va k them du lieu
                DB::rollBack();
                return ['res' => false, 'note' => 'Có vấn đề về truy vấn'];
            }
        }
    }

    function handleCoupon($coupon,$idCustomer){
        $coupon = Coupon::where('id_coupon', $coupon['code'])->first();
        if($coupon){
            CouponUser::where('id_account', $idCustomer)->where('id_coupon', $coupon->id_coupon)->delete();
            $coupon->quantity -= 1;
            $update = $coupon->save();
            if($update) {
                return ['res' => true];
            }else{
                return ['res' => false, 'note' => 'Lỗi truy vấn'];
            }
        }else{
            return ['res' => false, 'note' => 'Không tồn tại mã khuyến mãi'];
        }
    }

    function payment($type,$total,$code){
        if($type == 'momo'){
            // print_r($filterTotal);
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total;
            $redirectUrl = route('order.handle');
            $ipnUrl = route('order.handle');
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $code . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey); //tao ra chu ky so
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $code,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            if(!$jsonResult['resultCode']){
                return $jsonResult['payUrl'];
            }else{
                $error = ['mess' => $jsonResult['message']];
                return $error;
            }
        }else if($type == 'vnpay'){
            $totalOrder = preg_replace('/[^0-9\-]/','',$total);
            $vnp_TmnCode = "S4VUE5JO"; //Website ID in VNPAY System
            $vnp_HashSecret = "DIXPZ7P9YO2WQM60F4C0MZQT03XGOXJI"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('order.handle');
            $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán bằng VNPAY";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $totalOrder * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Billing
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
            if ($code != "") {
                return $vnp_Url;
                die();
            } else {
                return json_encode($returnData);
            }
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url); // tai nguyen curl
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // du lieu
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // thiet lap true khi truy van
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); //thiet lap ket noi trong vong
        //execute post
        $result = curl_exec($ch); // thuc hien truy van y/c
        //close connection
        curl_close($ch);
        return $result;
    }
}
