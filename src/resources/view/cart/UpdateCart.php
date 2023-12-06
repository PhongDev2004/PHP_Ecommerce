<?php
if(isset($_POST['updatecart']) && $_GET['pro_id'] && $_GET['kh_id']){
    $soluong = $_POST['cart_qty'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $id = $_POST['id'];
    $pro_cart = queryonepro($_GET['pro_id']);
    update_cart($id,$pro_cart['pro_price'],$soluong,$size,$color);
  header("Location:index.php?act=mycart&kh_id=".$_GET['kh_id']);

}
