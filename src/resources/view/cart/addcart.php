<?php
$size = $_POST['size'];
                        
$color = $_POST['color'];
$soluong = $_POST['cart_qty'];
  if ($size == 'null' || $color == null || $soluong == null && isset($_GET['pro_id'])) {
    ?>
       
    <?php
    $tb= '&thongbao=';
    $space= '  ';
    $thongbao ="Xin$space"."mời$space"."nhập$space"."đầy$space"."đủ$space"."trường$space"."dữ$space"."liệu";
    header("location:index.php?act=productinformation&pro_id=".$_GET['pro_id'].$tb.$thongbao);
    
      } else {
if (isset($_GET['kh_id']) && $_GET['pro_id']) {

    $pro_cart = queryonepro($_GET['pro_id']);
    $cart_kh = querycart_kh($_GET['kh_id']);
    $check_cart = check_cart($size, $_GET['pro_id'], $color, $cart_kh['cart_id']);

    if (is_array($check_cart)) {
      update_soluong_cart($soluong, $pro_cart['pro_price'], $check_cart['cart_chitiet_id'], $check_cart['soluong']);
    } else {
      add_cartchitiet($cart_kh['cart_id'], $pro_cart['pro_id'], $color, $size, $pro_cart['pro_price'], $soluong);
    }


    header("Location:index.php?act=mycart&kh_id=" . $_GET['kh_id']);
  }
}
?>