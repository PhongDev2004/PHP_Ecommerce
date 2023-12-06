<div class="row justify-content-center g-3">
    <div class="col-3 d-none d-md-block ">
        <div class="list-group">
            <a href="index.php?act=home" class="list-group-item text-capitalize active bg-black">
                categories
            </a>
            <?php
            $categories = query_allcate();
            if (count($categories)) {
                foreach ($categories as  $category) {
            ?>
                    <a href="index.php?act=home&category=<?php echo $category['cate_id'] ?>" class="list-group-item text-capitalize text-dark"><?php echo $category['cate_name']; ?></a>
            <?php
                }
            }
            ?>
        </div>

        <div class="form-group mt-4 mb-4">
            <label for="select-filter">Filter by</label>
            <select class="form-control select-filter" id="select-filter">
                <option value="0">-- Filter by --</option>
                <option value="?kytu=asc">Characters A-Z</option>
                <option value="?kytu=desc">Characters Z-A</option>
                <option value="?gia=asc">Prices gradually increase</option>
                <option value="?gia=desc">Prices gradually decrease</option>
            </select>
        </div>

        <div class="form-group mt-4 mb-4">
            <form action="index.php?act=filterByPrices" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Start Price</label>
                        <input type="text" name="start_price" value="<?php if (isset($_GET['start_price'])) {
                                                                            echo $_GET['start_price'];
                                                                        } else {
                                                                            echo "100";
                                                                        } ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">End Price</label>
                        <input type="text" name="end_price" value="<?php if (isset($_GET['end_price'])) {
                                                                        echo $_GET['end_price'];
                                                                    } else {
                                                                        echo "500";
                                                                    } ?>" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Click Me</label> <br />
                        <button type="submit" name="filter" class="btn btn-primary px-4">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 col-md-9">
        <div class="row gx-3 gy-5 ">
            <?php
            if (isset($_GET['category'])) {
                $cate_id = $_GET['category'];
                $products = queryallpro("", $cate_id);

                foreach ($products as $product) {
                    extract($product)
            ?>
                    <div class="col-12 col-lg-4 col-md-6 user-select-none animate__animated animate__zoomIn">
                        <div class="product-image">
                            <a href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>">
                                <img class="card-img-top rounded-4 " src="./Admin/sanpham/img/<?php echo $pro_img ?>" alt="Card image cap">
                            </a>

                        </div>
                        <div class="card-body">
                            <a class="card-title two-line-clamp my-3 fs-6 text-dark text-decoration-none " href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>"><?php echo $pro_name ?></a>
                            <div class="d-flex align-items-center justify-content-between px-2">
                                <p class="card-text fw-bold fs-2 mb-0">$<?php echo $pro_price ?></p>
                                <p class="text-secondary ps-2 mt-3">by <?php echo $pro_brand ?></p>
                            </div>
                        </div>
                    </div>

                <?php
                }
            } elseif (isset($_GET['filter'])) { ?>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
                            $startprice = $_GET['start_price'];
                            $endprice = $_GET['end_price'];

                            $sql = "SELECT * FROM products WHERE pro_price BETWEEN $startprice AND $endprice ORDER BY pro_price ASC";
                        } else {
                            $sql = "SELECT * FROM products ORDER BY pro_price ASC";
                        }

                        $query_run = pdo_queryall($sql);

                        if (count($query_run) > 0) {
                            foreach ($query_run as $items) {
                                // 
                        ?>
                                <div class="col-12 col-lg-4 col-md-6 user-select-none animate__animated animate__zoomIn">
                                    <div class="product-image">
                                        <a href="index.php?act=productinformation&pro_id=<?php echo $items['pro_id'] ?>">
                                            <img class="card-img-top rounded-4 " src="./Admin/sanpham/img/<?php echo $items['pro_img'] ?> ?>" alt="Card image cap">
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <a class="card-title two-line-clamp my-3 fs-6 text-dark text-decoration-none " href="index.php?act=productinformation&pro_id=<?php echo $items['pro_id'] ?>"><?php echo $items['pro_name'] ?></a>
                                        <div class="d-flex align-items-center justify-content-between px-2">
                                            <p class="card-text fw-bold fs-2 mb-0">$<?php echo $items['pro_price'] ?></p>
                                            <p class="text-secondary ps-2 mt-3">by <?php echo $items['pro_brand'] ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </div>
                </div>
                <?php
            } elseif (isset($_POST['searchSubmit'])) {
                if (isset($_POST["searchSubmit"])) {
                    $searchProduct = $_POST["searchProduct"];
                    $searchProducts = loadAll_products($searchProduct, $id = 0);
                    // var_dump($searchProducts);
                    if (isset($searchProducts) && !is_null($searchProducts)) {
                        foreach ($searchProducts as $searchPro) : ?>
                            <?php
                            if (isset($_POST['searchProduct']) && ($_POST['searchProduct'] != "")) { ?>
                                <div class="col-12 col-lg-4 col-md-6 user-select-none animate__animated animate__zoomIn">
                                    <div class="product-image">
                                        <a href="index.php?act=productinformation&pro_id=<?php echo $searchPro['pro_id'] ?>">
                                            <img class="card-img-top rounded-4 " src="./Admin/sanpham/img/<?php echo $searchPro['pro_img'] ?> ?>" alt="Card image cap">
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <a class="card-title two-line-clamp my-3 fs-6 text-dark text-decoration-none " href="index.php?act=productinformation&pro_id=<?php echo $searchPro['pro_id'] ?>"><?php echo $searchPro['pro_name'] ?></a>
                                        <div class="d-flex align-items-center justify-content-between px-2">
                                            <p class="card-text fw-bold fs-2 mb-0">$<?php echo $searchPro['pro_price'] ?></p>
                                            <p class="text-secondary ps-2 mt-3">by <?php echo $searchPro['pro_brand'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <p class="card-text fw-bold fs-2 mb-0">Product does not exist</p>
                            <?php
                            }
                            ?>
                    <?php endforeach;
                    } ?>
                <?php
                } else {
                    echo 'Product does not exist';
                }
            } else {
                $products = queryallpro("", 0);

                foreach ($products as  $product) {
                    extract($product);
                ?>
                    <div class="col-12 col-lg-4 col-md-6 user-select-none animate__animated animate__zoomIn">
                        <div class="product-image">
                            <a href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>">
                                <img style="width:300px;height:400px" class="card-img-top rounded-4 " src="./Admin/sanpham/img/<?php echo $pro_img ?>" alt="Card image cap">
                            </a>

                        </div>
                        <div class="card-body">
                            <a class="card-title two-line-clamp my-3 fs-6 text-dark text-decoration-none " href="index.php?act=productinformation&pro_id=<?= $pro_id ?>"><?php echo $product['pro_name']; ?></a>
                            <div class="d-flex align-items-center justify-content-between px-2">
                                <p class="card-text fw-bold fs-2 mb-0">$<?php echo $pro_price ?></p>
                                <p class="text-secondary ps-2 mt-3">by <?php echo $pro_brand ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>