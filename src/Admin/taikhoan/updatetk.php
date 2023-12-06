<?php
if(is_array($tk)){
  extract($tk);
}
?>
            
    <!-- main -->
                <div class="container">
                    <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Cập nhật tài khoản</h2>
                <div class="container text-bg-light rounded">

                    <form action="indexadmin.php?act=updatetk" method="post">
                         <div class="mb-3 mt-3">
                            <label for="kh_id " class="form-label text-danger">Id khách hàng:</label>
                            <input type="text" class="form-control" id="kh_id " placeholder="Tên đăng nhập" value="<?= $kh_id ?>" name="kh_id" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kh_name" class="form-label text-danger">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="kh_name" placeholder="Tên đăng nhập" value="<?= $kh_name ?>" name="kh_name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kh_pass" class="form-label text-danger">Mật khẩu:</label>
                            <input type="text" class="form-control" id="kh_pass" placeholder="Mật khẩu" value="<?= $kh_pass ?>" name="kh_pass">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kh_mail" class="form-label text-danger">Email:</label>
                            <input type="email" class="form-control" id="kh_mail" placeholder="Email" value="<?= $kh_mail ?>" name="kh_mail">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kh_address" class="form-label text-danger">Địa chỉ:</label>
                            <input type="text" class="form-control" id="kh_address" placeholder="Địa chỉ" value="<?= $kh_address ?>" name="kh_address">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kh_tel" class="form-label text-danger">Số điện thoại:</label>
                            <input type="tel" class="form-control" id="kh_tel" placeholder="Số điện thoại" value="<?= $kh_tel ?>" name="kh_tel">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="vaitro" class="form-label text-danger">Vai trò:</label>
                            <select class="form-select" id="vaitro" name="vaitro_id">
                                <option <?php if($vaitro_id == 0) echo "selected" ?> value="0">Khách hàng</option>
                                <option <?php if($vaitro_id == 1) echo "selected" ?> value="1">Quản trị</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-secondary btn-sm" name="update">Cập nhật</button>
                            <button type="reset" class="btn btn-secondary btn-sm">Nhập lại</button>
                            <a href="indexadmin.php?act=listtk">
                                <button type="button" class="btn btn-secondary btn-sm">Danh sách khách hàng</button>
                            </a>
                        </div>
                    </form>
                </div>
                </div>
          