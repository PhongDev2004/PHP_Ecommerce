<?php
    if (isset($_POST['placeordered'])) {
        $size = $_POST['size'];
    
        $color = $_POST['color'];
        var_dump($color);
        $soluong = $_POST['soluong'];
        $pro_id = $_POST['pro_id'];
    
        $kh_id  = $_POST['kh_id'];
        $products = queryonepro($pro_id);
        // echo $kh_id;
        $address = $_POST['address'];
        // echo $address;
        $trangthai = 'Đang chờ xác nhận';
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // timezone Việt Nam
        $time = date('d-m-y');
        // echo $time;
        $tongtien = $_POST['tongtien'];
        // echo $tongtien;
        add_order($kh_id, $time, $trangthai, $address, $tongtien);
    
    
    
        $sql = "select * from `order` where order_id  = (select max(order_id) from `order`)";
        $order_chitiet = pdo_query_one($sql);
        
        
                       
                pdo_execute($sql);
                if ($_POST['thanhtoan'] == 2) {
                    add_chitietdonhang($order_chitiet['order_id'], $pro_id, $color, $size, $products['pro_price'], $soluong);
                    $pro_soluong =   query_pro_soluong($pro_id,$color,$size);
                    $sl = $pro_soluong['soluong'];
                    
               $sql = "update pro_chitiet set soluong = $sl - $soluong where pro_id = $pro_id and size_id = $size and color_id = $color";
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    /*
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
            
                    $vnp_TmnCode = "CGXZLS0Z"; //Mã định danh merchant kết nối (Terminal Id)
                    $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Secret key
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/da1/src/";
                    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
                    $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
                    //Config input format
                    //Expire
                    $startTime = date("YmdHis");
                    $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
            
            
                    // end config
            
            
                    $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
                    $vnp_Amount = $_POST['tongtien']; // Số tiền thanh toán
                    $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
                    $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
            
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $tongtien * 100000,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                        "vnp_OrderType" => "other",
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                        // "vnp_ExpireDate"=>$expire
                    );
            
                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
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
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
            
                    header('Location: ' . $vnp_Url);
                    die();
                    // for ($i = 0; $i < count($size); $i++) {
                    //     $products = queryonepro($add_order_chitiet['pro_id'][$i]);
            
                    //     $pro_order = $add_order_chitiet['pro_id'][$i];
                    //     $sl_order = $add_order_chitiet['soluong'][$i];
                    //     $size_order = $add_order_chitiet['size'][$i];
                    //     $color_order = $add_order_chitiet['color'][$i];
                    //     $pro_chitiet = query_pro_soluong($pro_order, $color_order, $size_order);
                    //     $sl = $pro_chitiet['soluong'];
                    //     add_chitietdonhang($order_chitiet['order_id'], $add_order_chitiet['pro_id'][$i], $add_order_chitiet['color'][$i], $add_order_chitiet['size'][$i], $products['pro_price'], $add_order_chitiet['soluong'][$i]);
                    //     del_cart_order($add_order_chitiet['pro_id'][$i], $cart_kh['cart_id']);
            
                    //     $sql = "update pro_chitiet set soluong = $sl - $sl_order where pro_id = $pro_order and size_id = $size_order and color_id = $color_order";
                    //     pdo_execute($sql);
                    //     header("Location:index.php?act=home");
                    // }
                }
                else{
                    add_chitietdonhang($order_chitiet['order_id'], $pro_id, $color, $size, $products['pro_price'], $soluong);
                    $pro_soluong =   query_pro_soluong($pro_id,$color,$size);
                    $sl = $pro_soluong['soluong'];
                    
               $sql = "update pro_chitiet set soluong = $sl - $soluong where pro_id = $pro_id and size_id = $size and color_id = $color";
        header("Location:index.php?act=myAccount");

                }
    }   
    
        // header("Location:index.php?act=home");
?>