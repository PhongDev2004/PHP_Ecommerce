<?php



function queryallpro($key,$idcate){
    $sql = "select * from products where trangthai = 0";
    if($key != ''){
        $sql.= " and pro_name like '%$key%'";
    }
    if($idcate >0){
        $sql.= " and cate_id = $idcate";
    }
    
    $sql.= " order by pro_id desc";
     $result = pdo_queryall($sql);
     return $result;
}


function addpro($ten,$img,$price,$ct,$cate,$stock,$brand){
    $sql = "insert into products(pro_name,pro_img,pro_price,pro_desc,pro_brand,pro_stock,cate_id) values('$ten','$img',$price,'$ct','$brand','$stock',$cate)";
    pdo_execute($sql);
}
function queryonepro($id){
    $sql= "select * from products where pro_id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function updatepro($ten,$gia,$brand,$img,$ct,$cate,$id){
    $sql = "update products set pro_name='$ten',pro_price=$gia,pro_img='$img',pro_desc='$ct',pro_brand='$brand',cate_id=$cate where pro_id = $id";
    pdo_execute($sql);
}
function deletepro($id){
    $sql = "delete from products where pro_id = $id";
    pdo_execute($sql);
}
function showpro_home(){
    $sql = "select * from products order by pro_id desc limit 9";
    $result = pdo_queryall($sql);
     return $result;
}
function query_procate($cate_id,$pro_id){
    $sql = "select * from products where cate_id = $cate_id and pro_id != $pro_id";
    $result=pdo_queryall($sql);
    return $result;
}
function deleteprocate($id){
    $sql = "delete from products where cate_id = $id";
    pdo_execute($sql);
}
function chitietadmin($id){
    $sql = "select * from pro_chitiet where pro_id = $id";
    $result=pdo_queryall($sql);
    return $result;
}
function addpro_chitiet($pro_id,$size,$color,$soluong){
    $sql = "insert into pro_chitiet values (null,$pro_id, $color, $size, $soluong)";
    pdo_execute($sql);
}
function del_prochitiet($id){
    $sql = "delete from pro_chitiet where ctiet_pro_id = $id";
    pdo_execute($sql);
}

function query_prochitiet($id){
    $sql = "select * from pro_chitiet where pro_id = $id";
    $result = pdo_queryall($sql);
    return $result;
}
function queryone_prochitiet($id){
    $sql = "select * from pro_chitiet where ctiet_pro_id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function updateprochitiet($id,$soluong){
    $sql = "update pro_chitiet set soluong = $soluong where ctiet_pro_id = $id";
    pdo_execute($sql);
}
function query_pro_soluong($id,$color,$size){
    $sql = "select * from pro_chitiet where pro_id = $id and size_id = $size and color_id = $color";
    $result = pdo_query_one($sql);
    return $result;
}
// câu truy vấn xoá mềm
function soft_deletepro($id){
    $sql = "UPDATE `products` set trangthai = 1 WHERE `products`.`pro_id` = $id";
    pdo_execute($sql);
}
function queryallpros(){
    $sql = "select * from `products` where `products`.`trangthai` = 1";
    $sql.= " order by pro_id desc";
     $result = pdo_queryall($sql);
     return $result;
}
function khoiphuc_product($id){
    $sql = "UPDATE `products` set trangthai = 0 WHERE `products`.`pro_id` = $id";
    pdo_execute($sql);
}

function countProId() {
    $sql = "SELECT COUNT(*) as countpro FROM products";
    $result = pdo_query_one($sql);
     return $result;
}
function loadall_sanpham_top5(){
    $sql="select pro_name,pro_stock from products where 1 order by pro_stock desc limit 0,5";
    $listsanpham=pdo_queryall($sql);
    return $listsanpham;
}
function loadAll_products($searchProduct = "", $id = 0)
{
    $sql = "SELECT * FROM products WHERE 1";
    if ($searchProduct != "") {
        $sql .= " AND pro_name LIKE '%" . $searchProduct . "%'";
    }
    if ($id > 0) {
        $sql .= " AND cate_id = '" . $id . "'";
    }
    $sql .= " ORDER BY pro_id DESC";
    $listsp = pdo_queryall($sql);

    return $listsp;
}

function updateProductViews($pro_id)
{
    try {
        $sql = "UPDATE products SET pro_viewer = pro_viewer + 1 WHERE pro_id = '$pro_id'";
        pdo_execute($sql);
    } catch (PDOException $e) {
        echo "Error updating product views: " . $e->getMessage();
    }
}

function trending_products()
{
    $sql = "SELECT * FROM products ORDER BY pro_viewer DESC LIMIT 20";
    $favouriteProducts = pdo_queryall($sql);
    return $favouriteProducts;
}






// function addProductToFavourite($kh_id, $pro_id)
// {
//     // Check if
//     if (!isset($_SESSION['submitted_favourite'][$pro_id])) {
//         $sql = "INSERT INTO products_favourite(kh_id, pro_id) VALUES ('$kh_id', '$pro_id')";
//         pdo_execute($sql);

//         // Set the session
//         $_SESSION['submitted_favourite'][$pro_id] = true;

//         // Disable the button
//         echo '<button style="width: 41%;" class="btn bg-info bg-opacity-20 border border-info border-start-0 mt-4 btn-md text-dark fw-bold text-center disabled" type="button" disabled>Added to Favorites <i class="fa fa-heart text-danger" aria-hidden="true"></i></button>';
//     } else {
//         // Display the disabled button
//         echo '<button style="width: 41%;" class="btn bg-info bg-opacity-20 border border-info border-start-0 mt-4 btn-md text-dark fw-bold text-center" type="submit" name="favourite">
//            Add to Favorites <i class="fa fa-heart text-danger" aria-hidden="true"></i>
//         </button>';
//     }
// }
function queryAll_productFavourite($khachHangID)
{
    $sql = "SELECT
            products.pro_id,
            products.pro_name,
            products.pro_img,
            products.pro_price,
            products.pro_desc,
            products.pro_brand,
            products.pro_stock,
            products.pro_viewer,
            products.cate_id
        FROM
            products
        INNER JOIN
            products_favourite
        ON
            products.pro_id = products_favourite.pro_id
        WHERE
            products_favourite.kh_id = $khachHangID";

    $favouriteProducts = pdo_queryall($sql);
    $favouriteProducts = array_unique($favouriteProducts, SORT_REGULAR);
    return $favouriteProducts;
}


function addProductToFavourite($kh_id, $pro_id)
{
    $sql = "INSERT INTO products_favourite(kh_id, pro_id) VALUES ('$kh_id', '$pro_id')";
    pdo_execute($sql);
}

function proFrAdded($kh_id, $pro_id)
{
    $sql = "SELECT * FROM products_favourite WHERE kh_id = $kh_id AND pro_id = $pro_id";
    $proFrAdded = pdo_query_one($sql);
    return $proFrAdded;
}
// function query_one_probienthe($id){
//     $sql = "select * from pro_chitiet "
// }






// xỬ lí chi itest sp

function  getAllChitietSp($id)  {
    $sql  = "SELECT * FROM `pro_chitiet` WHERE pro_id = $id";
    $result = pdo_queryall($sql);
    return $result;
}
?>

    
    

