
            
    <!-- main -->
                <div class="container">
                    <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Danh sách bình luận</h2>
                        <div class="table-responsive">
                          <table class="table table-bordered ">
                              <thead>
                                <tr>
                                  <Th class="text-bg-secondary"></Th>
                                  <th class="text-bg-secondary">Id</th>
                                  <th class="text-bg-secondary">Nội dung</th>
                                  <th class="text-bg-secondary">Id_use</th>
                                  <Th class="text-bg-secondary">Id_sp</Th>
                                  <Th class="text-bg-secondary">Ngày bình luận</Th>
                                  <Th class="text-bg-secondary">Thao tác</Th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($listbl as $bl) { 
                                  extract($bl);
                                ?>
                                <tr>
                                  <td><input type="checkbox" name="checkbox" id=""></td>
                                  <td><?= $cmt_id   ?></td>
                                  <td><?= $cmt_content  ?></td>
                                  <td><?= $pro_id    ?></td>
                                  <td><?= $kh_id    ?></td>
                                  <td><?= $cmt_date  ?></td>
                                  <td>
                                      <a href="indexadmin.php?act=xoabl&cmt_id=<?php echo $cmt_id ?>"><input type="button" class="btn btn-secondary btn-sm" name="" value="Xoá" id=""></a>
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
                        </div>
                </div>
    
