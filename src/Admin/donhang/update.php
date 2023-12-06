<?php 
if (isset($dh) && is_array($dh)) {
?>
<!-- main -->
    <div class="container">
        <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Cập nhật trạng thái đơn hàng</h2>
        <form action="indexadmin.php?act=updatedonhang" method="post">
                <div class="mb-3 mt-3">
                    <label for="tendm" class="form-label text-danger">Trạng thái đơn hàng:</label>
                    
                    <select name="order_trangthai" id="">
                            <option value="Đang chờ xác nhận">Đang chờ xác nhận</option>
                            <option value="Đang giao hàng">Đang giao hàng</option>
                            <option value="Đã hủy">Đã hủy</option>
                    </select>
                </div>
                <input type="hidden" name="order_id" value="<?php echo $dh['order_id']?>">
                <div class="">
                    <button type="submit" name="themdh" class="btn btn-secondary btn-sm">Cập nhật đơn hàng</button>
                    <a href="indexadmin.php?act=donhang">
                        <button type="button" class="btn btn-secondary btn-sm">Danh sách đơn hàng</button>
                    </a>
                </div>
            </form>
            <?php } ?>
            
        </div>