<?php 
    function load_binhluan($pro_id = 0){
        $sql = "select * from coment where 1";
    
        if($pro_id > 0){
            $sql .= " and pro_id = $pro_id";
        }
    
        $sql .= " order by cmt_id desc";
        $result = pdo_queryall($sql);
        return $result;
    }
    function delete_binhluan($cmt_id){
        $sql = "delete from coment where cmt_id = '$cmt_id'";
        pdo_execute($sql);
    }
    function loadall_binhluan($pro_id){
        $sql = "
            SELECT coment.cmt_id , coment.cmt_content, khachhang.kh_name, coment.cmt_date FROM `coment` 
            LEFT JOIN khachhang ON coment.kh_id  = khachhang.kh_id 
            LEFT JOIN products ON coment.pro_id  = products.pro_id 
            WHERE products.pro_id = $pro_id;
        ";
        $result =  pdo_queryall($sql);
        return $result;
    }
    function insert_binhluan($pro_id,$kh_id, $cmt_content){
    $sql = "
        INSERT INTO `coment`(`cmt_content`, `kh_id`, `pro_id`) 
        VALUES ('$cmt_content','$kh_id','$pro_id');
    ";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
function countbl() {
    $sql = "SELECT COUNT(*) as countbl FROM coment";
    $result = pdo_query_one($sql);
     return $result;
}
?>