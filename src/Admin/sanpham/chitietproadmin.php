
        <div class="container">
          <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Chi Tiết Sản Phẩm</h2>
          <!-- <form action="indexadmin.php?act=search" method="post">
            <div class="row">
              <div class="col-sm-4">
                <input class="w-100 p-1" type="text" placeholder="Tìm kiếm theo tên" name="search_name">
              </div>
              <div class="col-sm-4">
                <select class="form-select" name="search_cate">
                  <option value="0">Tất Cả</option>
                  <?php
                    // $allcate = query_allcate();
                    // foreach($allcate as $cate){
                      ?>
                        <option value="<?php ?></option>
                      <?php
                    // }
                  ?>
                  
                  
                </select>
              </div>
              <div class="col-sm-4">
                <button type="submit" name='searchprocate' class="btn btn-secondary w-50">Tìm kiếm</button>
              </div>
            </div>
          </form> -->
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <Th class="text-bg-secondary"></Th>
                  <th class="text-bg-secondary">Ảnh sản phẩm</th>
                  <th class="text-bg-secondary">Mã sản phẩm</th>
                  <th class="text-bg-secondary">Màu</th>
                  <Th class="text-bg-secondary">Size</Th>
                  <Th class="text-bg-secondary">Số LƯợng</Th>
                  <Th class="text-bg-secondary">Thao tác</Th>
                </tr>
              </thead>

              <?php
                if(isset($_GET['pro_id'])){
                    $pro_id = $_GET['pro_id'];
                     $pro_chitiet = chitietadmin($pro_id);
                     foreach ($pro_chitiet as $pro){
                        extract($pro);
                        $products =  queryonepro($pro_id);
                        
                        $color = query_onecolor($color_id);
                        $size = query_onesize($size_id);

                        
                 
              ?>
             
              <tbody>
                <tr>
                  <td><input type="checkbox" name="checkbox" id=""></td>
                  <td><img src="./sanpham/img/<?php echo $products['pro_img']?>" class="w-50 mg-thumbnail h-50" alt=""></td>
                  <td><?php echo $pro_id?></td>
                  <td>                                        <input type="button" style="background-color: <?= $color['color_ma']?>;"  class="">
                                  </td>
                                  <td>
                                    <div class="">
                                        <input type="button" class=""   value="<?php echo $size['size_name']?>"></td>
                  
                  <td><?php echo $soluong?></td>
                  
                  
                 
                  <td>
                    <a href="indexadmin.php?act=suaprochitiet&prochitiet_idsua=<?php echo $ctiet_pro_id?>&pro_id=<?=$pro_id?>" class="mb-2"><input class="mb-2  text-bg-secondary rounded" type="button" name="" value="Sửa" id=""></a>
                    <a href="indexadmin.php?act=delprochitiet&prochitiet_idxoa=<?php echo $ctiet_pro_id?>&pro_id=<?=$pro_id?>"><input type="button" name="" class="mb-2 text-bg-success rounded" value="Xoá" id=""></a>
                  </td>
                </tr>
                
              </tbody>
              <?php
              
                     }
                    }
              ?>
              
            </table>
          </div>
          <div class="">
            <button type="button" class="btn btn-secondary btn-sm ">Chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm">Xoá các mục đã chọn</button>
            <a href="indexadmin.php?act=thempro_chitiet&prochitietid=<?=$pro_id?>">
              <button type="button" class="btn btn-secondary btn-sm">Thêm chi tiết sản phẩm</button>
            </a>
          </div>
        </div>