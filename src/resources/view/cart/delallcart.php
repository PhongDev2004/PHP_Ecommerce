<?php
    if(isset($_POST['dell_all']) && $_GET['kh_id']){
        $all_id = $_POST['checkbox'];
        foreach($all_ids as $id){
        del_cart($id);

        }
        // header("Location:index.php?act=mycart&kh_id=".$_GET['kh_id']);

    }
?>