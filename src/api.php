<?php 
//     function getOrderProUser($idOrder) {
//     // hàm sql gọi btn
//     $result = "trung".$idOrder;
//     echo json_encode($result);
// }
//     if(isset($_GET['order'])) {
//         $idOrder = $_GET['order'];
//         getOrderProUser($idOrder);
//     }

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    $result = ["trung1","trung2","trung3","trung4","trung5"];
    echo json_encode($result);
    
?>