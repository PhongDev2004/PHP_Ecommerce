<?php if (isset($_SESSION['acount'])) {
    $kh_id = $_SESSION['acount']['kh_id'];
    $infoAccount = loadone_taikhoan($kh_id);
    $role = vaitro();
    if (is_null($infoAccount) && is_array($infoAccount)) {
        extract($infoAccount);
    }
    if (isset($_POST['favourite'])) {
        $kh_id = $_SESSION['acount']['kh_id'];
        $pro_id = $_GET['pro_id'];
        addProductToFavourite($kh_id, $pro_id);
    }
} ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <img class="mb-3 rounded-pill shadow-sm mt-1" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2">Username: <?php echo $infoAccount['kh_name'] ?></h6>
                                <?php
                                // foreach ($role as $value) : 
                                ?>
                                <?php
                                if ($infoAccount['vaitro_id'] == 1) {
                                ?>
                                    <p class="mb-1">Role: Admin</p>
                                <?php
                                } else { ?>
                                    <p class="mb-1">Role: Khách hàng</p>
                                <?php
                                }
                                ?>
                                <?php
                                // endforeach;
                                ?>
                                <p class="mb-1">Address: <?php echo $infoAccount['kh_address'] ?></p>
                                <p class="mb-1">Tel: <?php echo $infoAccount['kh_tel'] ?></p>
                                <p>Email: <?php echo $infoAccount['kh_mail'] ?></p>
                                <a class="text-primary me-4" data-bs-toggle="modal" data-bs-target="#edit-information" href="#!">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <a class="text-primary" data-bs-toggle="modal" data-bs-target="#forgot-password" href="#!">
                                    <i class="fa fa-window-restore" aria-hidden="true"></i> Forget
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                    <li class="nav-item shadow-sm">
                        <a class="nav-link text-dark" id="cartDetail-tab" data-toggle="tab" href="#cartDetail" role="tab" aria-controls="favourites" aria-selected="false">Product Orders <i class="fa fa-cart-arrow-down text-dark" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item shadow-sm">
                        <a class="nav-link text-dark" id="favourites-tab" data-toggle="tab" href="#favourites" role="tab" aria-controls="favourites" aria-selected="false">Favorites Products <i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item shadow-sm">
                        <a class="nav-link text-dark" id="" data-toggle="" href="#" role="tab" aria-controls="favourites" aria-selected="false">Purchased Product <i class="fa fa-compass" aria-hidden="true"></i></i></a>
                    </li>
                    <li class="nav-item shadow-sm">
                        <a class="nav-link text-dark" id="" data-toggle="" href="#" role="tab" aria-controls="favourites" aria-selected="false">
                            Most purchased products <i class="fa fa-cubes" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item shadow-sm">
                        <a class="nav-link text-dark" id="" data-toggle="" href="#" role="tab" aria-controls="favourites" aria-selected="false">
                            Product with the most comments <i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white px-4 pb-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show pb-1" id="cartDetail" role="tabpanel" aria-labelledby="cartDetail-tab">
                        <h4 class="font-weight-bold mt-0 mb-4 text-decoration-underline text-primary text-center">
                            Product Orders
                        </h4>
                        <table class="table table-striped mb-4">
                            <thead class="border-radius: .5rem;">
                                <tr class="table-secondary">
                                    <th scope="col">Order #</th>

                                    <th scope="col">status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Created</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $dh = load_donhang_user($infoAccount['kh_id']);
                                foreach ($dh as $donhang) {
                                    extract($donhang);

                                ?>
                                    <tr class="table-info">
                                        <td><?= $order_id ?></td>

                                        <td>
                                            <?php
                                            if ($order_trangthai == 'Đang chờ xác nhận') {
                                            ?>
                                                <span class="badge text-bg-success">Confirming</span>
                                            <?php

                                            }
                                            if ($order_trangthai == 'Đang giao hàng') {
                                            ?>
                                                <span class="badge text-bg-primary">Shipping</span>
                                            <?php
                                            }
                                            if ($order_trangthai == 'Đã nhận hàng') {
                                            ?>
                                                <span class="badge text-bg-success">Received</span>
                                            <?php
                                            }
                                            if ($order_trangthai == 'Đã hủy') {
                                            ?>
                                                <span class="badge text-bg-danger">Cancelled</span>

                                            <?php
                                            }
                                            ?>

                                        </td>
                                        <td><?=
                                            $order_totalprice ?></td>
                                        <td><?= $order_date ?></td>
                                        <td>
                                            <a href="index.php?act=myAccountchitiet&order_id=<?=$order_id?>&kh_id=<?=$kh_id?>" id="chitiet">
                                            <button  type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Detail
                                            </button>
                                            </a>
                                           
                                        </td>
                                        <td>
                                            <?php
                                            if ($order_trangthai == 'Đang chờ xác nhận') {
                                                ?>
                                            <a href="index.php?act=cancel_order&order_id=<?= $order_id ?>">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-xmark" aria-hidden="true"></i> Cancel order
                                                </button>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>



                                
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade  active show" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">
                        <div class="container mt-4">
                            <div class="tab-pane fade active show" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">
                                <h4 class="font-weight-bold mt-0 mb-4 mt-4 text-decoration-underline text-danger text-center pb-2">
                                    Favorites Products
                                </h4>
                                <div class="row">
                                    <?php
                                    $khachHangID = isset($_SESSION['acount']['kh_id']) ? $_SESSION['acount']['kh_id'] : null;
                                    if ($khachHangID) {
                                        $favouriteProducts = queryAll_productFavourite($khachHangID);

                                        foreach ($favouriteProducts as $favouriteProduct) {
                                            extract($favouriteProduct);
                                    ?>
                                            <div class="col-md-4 col-sm-6 mb-4 pb-2">
                                                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                                    <a href="DeleteFavourite.php?pro_id=<?php echo $pro_favourite_id ?>">
                                                        <div class="star position-absolute">
                                                            <span class="badge text-bg-danger"><i class="icofont-star"></i> 3.1
                                                                Cancel</span>
                                                        </div>
                                                    </a>
                                                    <a href="DeleteFavourite.php?pro_id=<?php echo $pro_favourite_id ?>">
                                                        <div class="member-plan position-absolute">
                                                            <span class="badge text-bg-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                                        </div>
                                                    </a>
                                                    <div class="list-card-image">
                                                        <?php
                                                        $products = queryallpro("", 0);
                                                        extract($products);
                                                        ?>
                                                        <a href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>" class="product-link">
                                                            <img src="./Admin/sanpham/img/<?php echo $favouriteProduct['pro_img'] ?>" class="img-fluid item-img">
                                                        </a>
                                                    </div>
                                                    <div class="p-3 position-relative">
                                                        <div class="list-card-body">
                                                            <h6 class="mb-2">
                                                            <a href="index.php?act=productinformation&pro_id=<?php echo $pro_id ?>" class="nav-link text-black"><?php echo $favouriteProduct['pro_name'] ?>
                                                                </a>
                                                            </h6>

                                                            <p class="text-gray mb-2">Instock:
                                                                <strong><?php echo $favouriteProduct['pro_stock'] ?>
                                                                    products</strong>
                                                            </p>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="text-gray mb-2 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i>Price: <strong>
                                                                            <?php echo $favouriteProduct['pro_price'] ?>$</strong>
                                                                    </span>
                                                                </p>
                                                                <p class="text-gray time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i>Viewer: <strong>
                                                                            <?php echo $favouriteProduct['pro_viewer'] ?>
                                                                            viewer</strong>
                                                                    </span>
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <div class="list-card-badge">
                                                            <span class="badge text-bg-primary"><?php echo $favouriteProduct['pro_brand'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center load-more">
                                        <button class="btn btn-primary" type="button" disabled="">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal edit-information -->
                    <div id="toast"></div>
                    <div class="modal fade" id="edit-information" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-wrapper d-flex align-items-center justify-content-center flex-column">
                                        <h2 class="fw-bold">Update Account</h2>
                                        <?php
                                        if (isset($_SESSION['acount']) && $_SESSION['acount']) {
                                            extract($_SESSION['acount']);
                                        ?>
                                            <form id="updateAccountForm" class="form" action="index.php?act=updateAccount" method="POST" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $kh_name ?>">
                                                    <p id="username-error" class="text-danger form-message mt-1"></p>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email address</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $kh_mail ?>">
                                                    <p id="email-error" class="text-danger form-message mt-1"></p>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" value="<?= $kh_pass ?>">
                                                    <p id="pass-error" class="text-danger form-message mt-1"></p>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $kh_tel ?>">
                                                    <p id="phone-error" class="text-danger form-message mt-1"></p>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Home Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="<?= $kh_address ?>">
                                                    <p id="address-error" class="text-danger form-message mt-1"></p>
                                                </div>
                                                <input type="hidden" name="kh_id" value="<?= $kh_id ?>">
                                                <a href="#!" class="update-account-user" id="updateButton"><button type="submit" class="btn btn-dark w-100 text-uppercase" name="editAccount" onclick="showErrorToast()">Update</button></a>
                                            </form>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal forgot-password -->
                    <div class="modal fade" id="forgot-password" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Forgot password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div
                                        class="form-wrapper d-flex align-items-center justify-content-center flex-column">
                                        <h2 class="fw-bold- mb-3">Forgot password</h2>
                                        <form class="form" method="post" action="index.php?act=forgetPassword"
                                            id="forgot-password-form">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                                                <input type="hidden" name="kh_id" id="kh_id"
                                                    value="<?= $_SESSION['acount']['kh_id'] ?>">
                                                <input type="hidden" name="kh_mail" id="kh_mail"
                                                    value="<?= $_SESSION['acount']['kh_mail'] ?>">
                                                <p class="text-danger form-message mt-3 fs-6 fw-semibold"></p>
                                            </div>
                                            <button type="submit" class="btn btn-dark w-100 text-uppercase"
                                                name="forget-password">Restore</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.form').parent('a').addClass('has-child');
            showSuccessToast();

             
        });
        $('#chitiet').click(function() {
            $('#dhchitiet').show();
        });

    
    </script>