
            
    <!-- main -->
                <div class="container">
                    <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Danh sách tài khoản khách hàng</h2>
                    <!-- <form action="" class="mb-4">
                            <div class="row">
                            <div class="col-sm-4">
                                <input class="w-100 p-1" type="text" placeholder="Tìm kiếm theo tên">
                            </div>
                            <div class="col-sm-4">
                                <select class="form-select">
                                    <option>Quản trị</option>
                                    <option>Khách hàng</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-secondary w-50">Tìm kiếm</button>
                            </div>
                        </div>
                        </form> -->
                        <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <Th class="text-bg-secondary"></Th>
                                  <th class="text-bg-secondary">Id</th>
                                  <th class="text-bg-secondary">Tên đăng nhập</th>
                                  <th class="text-bg-secondary">Mật khẩu</th>
                                  <Th class="text-bg-secondary">Email</Th>
                                  <Th class="text-bg-secondary">Địa chỉ</Th>
                                  <Th class="text-bg-secondary">Số điện thoại</Th>
                                  <Th class="text-bg-secondary">Vai trò</Th>
                                  <Th class="text-bg-secondary">Thao tác</Th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listtk as $tk) { 
                              extract($tk);
                              ?>
                                <tr>
                                  <td><input type="checkbox" name="checkbox" id=""></td>
                                  <td><?= $kh_id  ?></td>
                                  <td><?= $kh_name ?></td>
                                  <td><?= $kh_pass ?></td>
                                  <td><?= $kh_mail ?></td>
                                  <td><?= $kh_address ?></td>
                                  <td><?= $kh_tel ?></td>
                                  <td><?= $vaitro_id ?></td>
                                  <td>
                                      <a href="indexadmin.php?act=suatk&kh_id=<?php echo $kh_id ?>" class="mb-2"><input class="mb-2 text-bg-secondary rounded" type="button" name="" value="Sửa" id=""></a>
                                      <a href="indexadmin.php?act=xoatk&kh_id=<?php echo $kh_id ?>"><input type="button"  class="mb-2 text-bg-danger rounded" onclick="return confirm('Bạn có chắc muốn xoá ?')" name="" value="Xoá cứng" id=""></a>
                                      <a href="indexadmin.php?act=soft_xoatk&kh_id=<?php echo $kh_id ?>"><input type="button" class="mb-2 text-bg-success rounded" onclick="return confirm('Bạn có chắc muốn xoá ?')" name="" value="Xoá mềm" id=""></a>
                                  </td>
                                </tr>
                              <?php  } ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="">
                          <button type="button" class="btn btn-secondary btn-sm ">Chọn tất cả</button>
                          <button type="button" class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
                          <button type="button" class="btn btn-secondary btn-sm">Xoá các mục đã chọn</button>
                          <a href="indexadmin.php?act=thungrac_kh">
                            <button type="button" class="btn btn-secondary btn-sm">Thùng rác</button>
                            </a>
                        </div>
                </div>
           
    
