<!-- main -->
    <div class="container">
        <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Thêm mới danh mục</h2>
        <div class="container text-bg-light rounded">

            <form action="indexadmin.php?act=updatecate" method="post">
                
                <div class="mb-3 mt-3">
                    <label for="tendm" class="form-label text-danger">Tên danh mục:</label>
                    <input type="text" class="form-control" id="tendm" placeholder="Tên danh mục" name="cate_name" value="<?php echo $cate_one['cate_name']?>">
                    <input type="text" class="form-control" id="tendm" placeholder="Tên danh mục" name="cate_id" hidden value="<?php echo $cate_one['cate_id']?>">
                </div>
                <div class="">
                    
                    <button type="submit" name="suadm" class="btn btn-secondary btn-sm">Sửa Danh Mục</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Nhập lại</button>
                    <a href="indexadmin.php?act=cate">
                        <button type="button" class="btn btn-secondary btn-sm">Danh sách danh mục</button>
                    </a>
                </div>
            </form>

        </div>
    </div>
