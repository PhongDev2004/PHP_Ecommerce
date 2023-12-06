
<?php
    
    function addcate($tenloai){
        $sql = "INSERT INTO category (cate_name) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    function query_onecate($id){
        $sql = "Select * from category where cate_id = $id";
        $result = pdo_query_one($sql);
        return $result;
    }
    function query_allcate(){
        $sql = "select * from category where trangthai = 0 order by cate_id desc";
        $result = pdo_queryall($sql);
        return $result;
    }

    function updatecate($tenloai,$id){
        $sql = "update category set cate_name='$tenloai' where cate_id = $id";
        pdo_execute($sql);
    }
    function deletecate($id){
        $sql ="delete from category where cate_id = $id";
        pdo_execute($sql);
    }
    // câu truy vấn xoá mềm
    function soft_deletecate($id){
        $sql = "UPDATE `category` set trangthai = 1 WHERE `category`.`cate_id` = $id";
        pdo_execute($sql);
    }
    
    // 
    function query_allcates(){
        $sql = "select * from category where trangthai = 1 order by cate_id desc";
        $result = pdo_queryall($sql);
        return $result;
    }
    function khoiphuc_cate($id){
        $sql = "UPDATE `category` set trangthai = 0 WHERE `category`.`cate_id` = $id";
        pdo_execute($sql);
    }

?>
