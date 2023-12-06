
    <!-- main -->
    <div class="container">
                    <h2 class="border border-4 mb-4 text-black-50 p-3 text-center rounded">Thống kê sản phẩm theo danh mục</h2>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <Th class="text-bg-secondary">Mã danh mục</Th>
                                    <th class="text-bg-secondary">Tên danh mục</th>
                                    <th class="text-bg-secondary">Số lượng</th>
                                    <th class="text-bg-secondary">Giá cao nhất</th>
                                    <Th class="text-bg-secondary">Giá thấp nhất</Th>
                                    <Th class="text-bg-secondary">Giá trung bình</Th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listthongke as $thongke) { 
                              extract($thongke);
                              ?>
                                <tr>
                                  <td><?= $iddm ?></td>
                                  <td><?= $tendm ?></td>
                                  <td><?= $soluong ?></td>
                                  <td><?= $maxprice ?></td>
                                  <td><?= $minprice ?></td>
                                  <td><?= $avgprice ?></td>
                                </tr>
                               <?php  } ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="">
                            <a href="indexadmin.php?act=bieudo">
                                <button type="button" class="btn btn-outline-secondary">Biểu đồ</button>
                            </a>
                        </div>

                        <h2 class=" mt-5 border border-4 mb-4 text-black-50 p-3 text-center rounded">Thống kê bình luận theo sản phẩm</h2>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <Th class="text-bg-secondary">Mã sản phẩm</Th>
                                    <th class="text-bg-secondary">Tên sản phẩm</th>
                                    <th class="text-bg-secondary">Số lượng bình luận</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listtkbl as $bl) { 
                              extract($bl);
                              ?>
                                <tr>
                                  <td><?= $pro_id  ?></td>
                                  <td><?= $pro_name ?></td>
                                  <td><?= $sobinhluan  ?></td>
                                </tr>
                               <?php  } ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="">
                            <a href="indexadmin.php?act=bieudobl">
                                <button type="button" class="btn btn-outline-secondary">Biểu đồ</button>
                            </a>
                        </div>
                </div>