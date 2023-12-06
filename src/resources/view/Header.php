<div class="container-fluid header bg-light position-fixed top-0 z-3 ">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php?act=home">Nedd Cn.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?act=home">Home</a>
                    </li>
                    <?php if (isset($_SESSION['acount']) && $_SESSION['acount']) {
                        $kh_id = $_SESSION['acount']['kh_id'];
                        $roles = loadone_taikhoan($kh_id);
                        
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active me-1" href="index.php?act=productstrending">Products Trending <i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-info active me-2" href="index.php?act=myAccount">My
                                Account</a>
                        </li>
                        <?php if ($roles['vaitro_id'] == 1) { ?>
                            <li class="nav-item">
                                <a class="btn btn-info active" href="./Admin/indexadmin.php?act=home">Admin</a>
                            </li>
                        <?php } ?>

                    <?php
                    } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=register">Sign Up</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="btn btn-secondary disabled" href="index.php?act=myAccount">My Account</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="d-flex">
                    <form class="d-flex me-4" method="POST">
                        <div class="form-group me-2">
                            <input type="text" class="form-control" name="searchProduct" placeholder="Search product" required>
                        </div>
                        <button type="submit" class="btn btn-outline-dark" name="searchSubmit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>

                    <?php
                    if (isset($_SESSION['acount']) && $_SESSION['acount']) {
                    ?>
                        <a href="index.php?act=mycart&kh_id=<?php echo $_SESSION['acount']['kh_id'] ?>">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="bi bi-bag"></i>
                            </button>
                        </a>
                        <a href="index.php?act=logout">
                            <button type="button" name="logout" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout" class="btn btn-outline-danger ms-4">
                                <i class="bi bi-box-arrow-left me-2"></i>
                                Logout
                            </button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</div>