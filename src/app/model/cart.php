<?php
    function addcart_kh($kh_id,$tongtien){
        $sql = "insert into cart  values (null,$kh_id,$tongtien)";
        pdo_execute($sql);
    }
    function querycart_kh($kh_id){
        $sql = "select * from cart where kh_id = $kh_id";
        $result = pdo_query_one($sql);
        return $result;
    }
    function querycart_chitiet($cart_id){
        $sql = "select * from cart_chitiet where cart_id = $cart_id";
        $result = pdo_queryall($sql);
        return $result;
    }
    function add_cartchitiet($cart_id,$pro_id,$color,$size,$pro_price,$soluong){
        $tongtien = $pro_price * $soluong;
        $sql = "insert into cart_chitiet values (null,$cart_id,$pro_id,$color,$size,$pro_price,$soluong,$tongtien)";
        pdo_execute($sql);
    }
    function del_cart($cart_id){
        $sql = "delete from cart_chitiet where 	cart_chitiet_id = $cart_id";
        pdo_execute($sql);
    }
    function add_order($kh_id,$order_date,$order_trangthai,$order_address,$tongtien){
        $sql = "insert into `order`( `kh_id`, `order_date`, `order_trangthai`, `order_adress`, `order_totalprice`) values ('$kh_id','$order_date','$order_trangthai','$order_address','$tongtien')";
        pdo_execute($sql);
    }
    function querycart_update($cart_chitiet_id){
        $sql = "select * from cart_chitiet where cart_chitiet_id = $cart_chitiet_id";
        $result = pdo_query_one($sql);
        return $result;
    }
    function update_cart($cart_chitiet_id,$price,$soluong,$size,$color){
        $tongtien = $price * $soluong;
        $sql = "update cart_chitiet set total_price=$tongtien, color_id=$color, size_id=$size,soluong = $soluong  where cart_chitiet_id = $cart_chitiet_id";
        pdo_execute($sql);
    }
    
    function update_soluong_cart($soluong,$price,$id,$sl){
        $total = $soluong + $sl;
        $tongtien = $total* $price;
        $sql = "update cart_chitiet set total_price = $tongtien, soluong = $total where cart_chitiet_id = $id";
        pdo_execute($sql);

    }
    function check_cart($size,$pro,$color,$cart_id){
        $sql = "select * from cart_chitiet where pro_id = $pro and size_id = $size and color_id = $color and cart_id = $cart_id";
        $result = pdo_query_one($sql);
        return $result;
    }
    function del_cart_order($pro_id,$cart_id){
        $sql = "delete from cart_chitiet where pro_id = $pro_id and cart_id = $cart_id";
        pdo_execute($sql);

    }
?>