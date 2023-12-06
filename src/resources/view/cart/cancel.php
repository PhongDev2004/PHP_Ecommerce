<?php
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $sql = "update `order` set order_trangthai = 'Đã hủy' where order_id = $order_id";
        pdo_execute($sql);
        header("Location:index.php?act=myAccount");
    }
?>