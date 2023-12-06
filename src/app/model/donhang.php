    <?php 
        function loadall_donhang($kyw = "") {
            $sql = "
                SELECT 
                    `order`.`order_id`,
                    `order`.`order_totalprice`,
                    `order`.`order_trangthai`,
                    `order`.`order_adress`,
                    `order`.`order_date`,
                    `khachhang`.`kh_name`,
                    `khachhang`.`kh_tel`,
                    `khachhang`.`kh_mail`,
                    `order_chitiet`.`order_id` as `sl`
                FROM 
                    `order`
                LEFT JOIN 
                    `khachhang` ON `order`.`kh_id` = `khachhang`.`kh_id`
                LEFT JOIN 
                    `order_chitiet` ON `order`.`order_id` = `order_chitiet`.`order_id`
                WHERE 
                    1
            ";
        
            if ($kyw !== '') {
                $sql .= " AND `order`.`order_id` LIKE '%$kyw%'";
            }
            $sql .= " GROUP BY order.order_id";
            $sql .= " ORDER BY `order`.`order_id` DESC";
            $result = pdo_queryall($sql);
            return $result;
        }
        function load_cart_count($order_id){
            $sql = "select * from order_chitiet where order_id = '$order_id'";
            $bill=pdo_queryall($sql);
            return sizeof($bill);
        }
        function delete_donhang($order_id) {
            // Kiểm tra xem order_id có tồn tại hay không
            $check_sql = "SELECT * FROM `order` WHERE order_id = '$order_id'";
            $existing_order = pdo_query_one($check_sql);
        
            if (!$existing_order) {
                // Nếu order_id không tồn tại, có thể hiển thị thông báo hoặc thực hiện các xử lý khác tùy thuộc vào yêu cầu của bạn.
                return false;
            }
        
            // Nếu order_id tồn tại, thực hiện câu lệnh DELETE
            $delete_sql = "DELETE FROM `order` WHERE order_id = '$order_id'";
            pdo_execute($delete_sql);
        
            // Thực hiện xoá dữ liệu từ bảng order_chitiet (nếu cần)
            $delete_detail_sql = "DELETE FROM order_chitiet WHERE order_id = '$order_id'";
            pdo_execute($delete_detail_sql);
        
            return true; // Trả về true để thể hiện rằng việc xoá thành công
        }
        function loadall_one_donhang($order_id){
            $sql = "
                SELECT order.order_id  , order.order_totalprice, order.order_trangthai, order.order_adress, order.order_date , khachhang.kh_name, khachhang.kh_tel , khachhang.kh_mail, order_chitiet.order_id as sl FROM `order` 
                LEFT JOIN khachhang ON order.kh_id  = khachhang.kh_id 
                LEFT JOIN order_chitiet ON order.order_id  = order_chitiet.order_id 
                WHERE order.order_id = $order_id
            ";
            $result =  pdo_query_one($sql);
            return $result;
        }
        function updatedh($order_trangthai,$order_id){
            $sql = "UPDATE `order` set order_trangthai = '$order_trangthai' WHERE `order`.`order_id` = $order_id";
            pdo_execute($sql);
        }
        function loadall_chitietdh($order_id){
            $sql = " select order_chitiet.order_chitiet_id ,order_chitiet.order_id  ,order_chitiet.color_id  ,order_chitiet.size_id  ,order_chitiet.pro_price ,order_chitiet.soluong ,order_chitiet.total_price ,products.pro_img,color.color_name,size.size_name from order_chitiet
            LEFT JOIN products ON order_chitiet.pro_id = products.pro_id 
            LEFT JOIN color ON order_chitiet.color_id = color.color_id  
            LEFT JOIN size ON order_chitiet.size_id = size.size_id  
            where order_chitiet.order_id = $order_id";
            $result =  pdo_queryall($sql);
            return $result;
        }
        function add_chitietdonhang($order_id,$pro_id,$color,$size,$price,$soluong){
            $tongtien = $price * $soluong;
            $sql = "insert into order_chitiet values(null,$order_id,$pro_id,$color,$size,$price,$soluong,$tongtien)";
            pdo_execute($sql);
        }
        function load_donhang_user($id){
            $sql = "select * from `order` WHERE kh_id = $id order by order_id desc";
            $result = pdo_queryall($sql);
            return $result;
        }

        function load_order_chitiet($order_id){
            $sql = "select * from order_chitiet where order_id = $order_id ";
            $result = pdo_queryall($sql);
            return $result;
        }
        function countOrderIds() {
            $sql = "SELECT COUNT(*) as countdh FROM `order`";
            $result = pdo_query_one($sql);
            return $result;
        }
        function thongke_donhang() {
            $sql = "
                SELECT 
                    `order`.`order_trangthai`,`order`.`order_totalprice`,
                    COUNT(`order`.`order_id`) as `so_luong_donhang`
                FROM 
                    `order`
                WHERE 
                    1
                GROUP BY 
                    `order`.`order_trangthai`
                ORDER BY 
                    `order`.`order_trangthai` ASC
            ";
            
            $result = pdo_queryall($sql);
            return $result;
        }
        function thongke_donhang_theo_ngay_va_trangthai() {
            $sql = "
                SELECT 
                    `order`.`order_date`,
                    `order`.`order_trangthai`,
                    COUNT(`order`.`order_id`) as `so_luong_donhang`
                FROM 
                    `order`
                LEFT JOIN 
                    `khachhang` ON `order`.`kh_id` = `khachhang`.`kh_id`
                LEFT JOIN 
                    `order_chitiet` ON `order`.`order_id` = `order_chitiet`.`order_id`
                WHERE 
                    1
                GROUP BY 
                    `order`.`order_date`, `order`.`order_trangthai`
                ORDER BY 
                    `order`.`order_date` DESC, `order`.`order_trangthai`
            ";
            
            $result = pdo_queryall($sql);
            return $result;
        }
        function thongke_donhang_theo_trangthai_va_tongtien() {
            $sql = "
                SELECT 
                    `order`.`order_trangthai`,
                    COUNT(`order`.`order_id`) as `so_luong_donhang`,
                    SUM(`order`.`order_totalprice`) as `tong_tien_donhang`
                FROM 
                    `order`
                LEFT JOIN 
                    `khachhang` ON `order`.`kh_id` = `khachhang`.`kh_id`
                LEFT JOIN 
                    `order_chitiet` ON `order`.`order_id` = `order_chitiet`.`order_id`
                WHERE 
                    1
                GROUP BY 
                    `order`.`order_trangthai`
                ORDER BY 
                    `order`.`order_trangthai`
            ";
            
            $result = pdo_queryall($sql);
            return $result;
        }
        function load_one_chitietdonhang($id){
            $sql = "select * from order_chitiet where order_chitiet_id  = $id";
            $result = pdo_query_one($sql);
            return $result;
        }

        
    ?> 