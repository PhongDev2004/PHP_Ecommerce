<?php
function loadall_thongke(){
    $sql = "select category.cate_id as iddm , category.cate_name as tendm, count(products.pro_id ) as soluong, min(products.pro_price) as minprice, max(products.pro_price) as maxprice, avg(products.pro_price) as avgprice";
    $sql .= " from products left join category on category.cate_id = products.cate_id";
    $sql .= " group by category.cate_id";
    $sql .= " order by category.cate_id desc";
    $result = pdo_queryall($sql);
    return $result;
}
function load_thongkebl(){
    $sql="select products.pro_id ,products.pro_name, count(coment.cmt_id) as sobinhluan from  products 
    LEFT JOIN coment ON coment.pro_id  = products.pro_id group by products.pro_id,products.pro_name order by sobinhluan desc  ";
    $listtkbl=pdo_queryall($sql);
    return $listtkbl;
}


?>