<?php
    if(isset($_GET['prochitiet_idsua'])){
        $prochitiet_id = $_GET['prochitiet_idsua'];
        $prochitiet = queryone_prochitiet($prochitiet_id);
    
?>

<div class="col-sm-9">
    <div class="container">
        <h2 class="border border-4 mb-4 text-black-50 p-3 text-center rounded">Cập Nhật Chi Tiết Sản Phẩm</h2>
        <div class="container text-bg-light rounded">

            <form action="indexadmin.php?act=upchitietpro" method="post" enctype="multipart/form-data">
                <?php
                
                ?>
            
        <input type="text" value="<?=$prochitiet['ctiet_pro_id']?>" hidden name="id">
        <input type="text" value="<?=$prochitiet['pro_id']?>" hidden name="id_pro">
               
                <div class="mb-3 mt-3">
                    <label for="giasp" class="form-label text-danger">Số Lượng</label>
                    <input type="text" class="form-control" id="giasp" placeholder="Số Lượng" name="soluong">
                </div>





                <div class="">
                    <button type="submit" class="btn btn-primary btn-sm" name="update_chitietpro">Cập Nhật</button>
                    <button type="button" class="btn btn-primary btn-sm">Nhập lại</button>
                    <a href="list.html">
                        <button type="button" class="btn btn-primary btn-sm">Danh sách sản phẩm</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    }
?>