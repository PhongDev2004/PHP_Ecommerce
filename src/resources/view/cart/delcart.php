<?php
if(isset( $_GET['cart_id_del']) && $_GET['kh_id']){
    
        $cart_id = $_GET['cart_id_del'];
        del_cart($cart_id);
        header("Location:index.php?act=mycart&kh_id=".$_GET['kh_id']);

    }
?>