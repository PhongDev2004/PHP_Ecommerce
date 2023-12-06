


      <!-- main -->
        <div class="container">
          <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Danh sách sản phẩm đã bị xoá</h2>
          <div class="table-responsive mt-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <Th class="text-bg-secondary"></Th>
                  <th class="text-bg-secondary">Ảnh sản phẩm</th>
                  <th class="text-bg-secondary">Mã sản phẩm</th>
                  <th class="text-bg-secondary">Tên sản phẩm</th>
                  <Th class="text-bg-secondary">Danh mục</Th>
                  <Th class="text-bg-secondary">Giá</Th>
                  <Th class="text-bg-secondary">Brand</Th>
                  <Th class="text-bg-secondary">Lượt Xem</Th>
                  <Th class="text-bg-secondary">Thao tác</Th>
                </tr>
              </thead>
              <?php
              
                foreach($result_pro as $product){
                  extract($product);
                $result_cateone = query_onecate($cate_id);
              ?>
              <tbody>
                <tr>
                  <td><input type="checkbox" name="checkbox" id=""></td>
                  <td><img src="./sanpham/img/<?php echo $pro_img?>" class="w-50 mg-thumbnail h-50" alt=""></td>
                  <td><?php echo $pro_id?></td>
                  <td><?php echo $pro_name?></td>
                  <td><?php echo $result_cateone['cate_name']?></td>
                  <td><?php echo $pro_price?></td>
                  <td><?php echo $pro_brand?></td>
                  <td><?php echo $pro_stock?></td>
                  
                 
                  <td>
                    <a href="indexadmin.php?act=delpro&pro_idxoa=<?php echo $pro_id?>"><input type="button" name="" class="mb-2 text-bg-secondary rounded" value="Xoá cứng" onclick="return confirm('Bạn có chắc muốn xoá ?')" id=""></a>
                    <a href="indexadmin.php?act=khoiphuc_product&pro_idxoa=<?php echo $pro_id?>"><input type="button" name="" class="mb-2 text-bg-success rounded" value="Khôi phục" onclick="return confirm('Bạn có chắc muốn khôi phục ?')" id=""></a>
                  </td>
                </tr>
                
              </tbody>
              <?php
                }
                
                
              ?>
            </table>
          </div>
          <div class="">
            <button type="button" class="btn btn-secondary btn-sm ">Chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm">Xoá các mục đã chọn</button>
          </div>
        </div>
   