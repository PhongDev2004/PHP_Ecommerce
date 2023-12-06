<div class="row justify-content-center g-3">
    <div class="col-12 col-md-12">
        <h2 class="text-center text-capitalize fw-bold mb-5">Products Trending <i class="fa fa-heart text-danger"
                aria-hidden="true"></i></h2>
        <div class="row gx-3 gy-5 justify-content-between">
            <?php
            $trendingProducts = trending_products();
            foreach ($trendingProducts as  $trendingProduct) {
                extract($trendingProduct);
            ?>
            <div class="col-6 col-lg-3 col-md-4 user-select-none animate__animated animate__zoomIn">
                <div class="product-image">
                    <a href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>" class="product-link">
                        <img style="width:300px;height:400px" class="card-img-top rounded-4 "
                            src="./Admin/sanpham/img/<?php echo $pro_img ?>" alt="Card image cap">
                    </a>
                </div>
                <div class="card-body">
                    <a class="card-title two-line-clamp my-3 fs-6 text-dark text-decoration-none "
                        href="index.php?act=productinformation&pro_id=<?= $pro_id ?>"
                        class="product-link"><?php echo $product['pro_name']; ?></a>
                    <div class="d-flex align-items-center justify-content-between px-2">
                        <p class="card-text fw-bold fs-2 mb-0">$<?php echo $pro_price ?></p>
                        <p class="text-secondary ps-2 mt-3">by <?php echo $pro_brand ?></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>