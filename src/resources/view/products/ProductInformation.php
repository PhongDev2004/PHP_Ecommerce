<?php
// Set (60 seconds)
$view_interval = 60;

if (isset($_POST['guibl'])) {
    $kh_id = $_SESSION['acount']['kh_id'];
    $pro_id = $_POST['pro_id'];
    $cmt_content = $_POST['cmt_content'];
    insert_binhluan($pro_id, $kh_id, $cmt_content);
}

$size = array();
$color = array();
if (isset($_GET['pro_id'])) {
    setlocale(LC_MONETARY, 'en_US');


    // var_dump(getAllChitietSp($_GET['pro_id']));

    $pro_id = (int)$_GET['pro_id'];
    $results = queryonepro($pro_id);
    extract($results);
    $size = query_allsize();
    $color = query_allcolor();
    $dsbl = loadall_binhluan($pro_id);
    $pro_chitiet = query_prochitiet($pro_id);

    if (!isset($_SESSION['last_view'][$pro_id]) || (time() - $_SESSION['last_view'][$pro_id]) > $view_interval) {
        updateProductViews($pro_id);
        $_SESSION['last_view'][$pro_id] = time();
    }
?>

    <?php
    if (isset($_SESSION['acount'])) {
    ?>
        <form method="post" action="index.php?act=addcart&pro_id=<?= $pro_id ?>&kh_id=<?= $_SESSION['acount']['kh_id'] ?>">
        <?php
    } else {
        ?>
            <form action="" method="post">
            <?php
        }
            ?>
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12 mb-4">
                    <img class="w-100 rounded-4 " src="<?php echo "./Admin/sanpham/img/" . $pro_img ?>" alt="<?php echo $pro_name; ?>" />
                </div>
                
                <div class="col-lg-7 col-md-6 col-12">
                    <h4 class="fs-4 fw-normal"><?php echo $pro_name; ?></h4>
                    <p class="fs-6 text-dark text-decoration-underline">By <?php echo $pro_brand; ?></p>
                    <h2 class="fw-bold fs-2">$<?php echo number_format($pro_price, 2, '.'); ?></h2>
                    <div class="d-flex mt-4">
                        <span class="me-4">
                            <i class="bi bi-check"></i>
                            Instock: <span class="fw-bold"> <?php echo $pro_stock; ?></span> items
                        </span>
                        <span class="ms-4">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Amount of people: <span class="fw-bold">
                                <?php echo $pro_viewer; ?></span>
                            viewer
                        </span>


                    </div>
                    <div class="mt-4">
                        <label id="text-des" class="me-3" for="cart_qty">Quantity: </label>
                        <input class="form-control w-25" type="number" id="cart_qty" name="cart_qty" max="10" min="1" size="3" value="1">
                    </div>

                    <H6 class="me-3 mt-3">
                        Size:
                    </H6>
                    <select name="size">
                    <option value="null">Please select size</option>
                    <?php foreach ($pro_chitiet as $proSize) { 
                        $size = query_onesize($proSize['size_id']);
                        // var_dump($size);
                        ?>
                        <option value="<?= $size['size_id'] ?>">
                            <?= $size['size_name'] ?></option>
                    <?php } ?>
                </select>

                    <div class="mt-4 d-flex">
                        <H6 class="me-3 mt-1">
                            Color:
                        </H6>
                        <?php foreach ($pro_chitiet as $proColor) { 
                                
                                $color =     query_onecolor($proColor['color_id']);
                                // var_dump($color);
                    ?>
                    <div class="d-flex">
                        <div class="form-check abc-checkbox mt-1">
                            <input class="form-check-input" id="checkbox1" name="color" type="radio" value="<?= $color['color_id'] ?>" required>
                        </div>
                        <button type="button" class="btn text-dark me-2 border-primary mb-3" style="background-color: <?= $color['color_ma'] ?>"><?= $color['color_name'] ?></button>
                    </div>

                <?php }
                
                ?>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <button class="btn btn-dark mt-4 btn-md w-25 me-4  <?php echo !isset($_SESSION['acount']) ? 'disabled ' : '' ?>" type="submit" name="buy">
                                By Product
                            </button>
                            <button class="btn btn-dark mt-4 btn-md w-25 me-4  <?php echo !isset($_SESSION['acount']) ? 'disabled ' : '' ?>" type="submit" name="addtocart">
                                Add to Cart
                            </button>
                        </div>

                        <span class="text-danger fs-6 mt-2">
                            <?php echo !isset($_SESSION['acount']) ? 'You must be logged in to add products to your cart ' : '' ?></span>
                        <span class="text-danger fs-6 mt-2"><?php
                                                            if (isset($_GET['thongbao'])) {
                                                                echo $_GET['thongbao'];
                                                            }
                                                            ?></span>
                    </div>
                </div>
            </div>
            </form>

            <?php
            if (isset($_SESSION['acount'])) {
            ?>
                <form action="index.php?act=addlike" method="POST">
                    <?php
                    $kh_id = isset($_SESSION['acount']['kh_id']) ? $_SESSION['acount']['kh_id'] : '';
                    $pro_id = (int)$_GET['pro_id'];
                    ?>
                    <input type="hidden" value="<?= $kh_id ?>" name="kh_id">
                    <input type="hidden" value="<?= $pro_id ?>" name="pro_id">
                    
                    <?php
                        $sql = "select * from products_favourite where pro_id = $pro_id and kh_id = $kh_id";
                        $like = pdo_query_one($sql);
                        // var_dump($like) ;
                        if(is_array($like) == false){
                            echo '<button style="width: 41%;" class="btn bg-info bg-opacity-20 border border-info border-start-0 mt-4 btn-md text-dark fw-bold text-center" type="submit" name="like">Add to Favorites <i class="fa fa-heart text-danger" aria-hidden="true"></i></button>';
                  
                        }
                        else{
                            echo '<button style="width: 41%;" class="btn bg-info bg-opacity-20 border border-info border-start-0 mt-4 btn-md text-dark fw-bold text-center disabled" type="button">Added to Favorites <i class="fa fa-heart text-danger" aria-hidden="true"></i></button>';
                        }
                ?>

                </form>

                
            <?php
            }
            ?>
            <div class="mt-5">
                <h4 class="fs-5 mb-4">Products Details</h4>
                <p><?php
                    $proDesc = $pro_name . $pro_desc;
                    $proDesc = nl2br(htmlspecialchars($proDesc));
                    echo $proDesc;
                    ?></p>
            </div>
        <?php
    }
        ?>
        <div class="container">
            <div class="card card-header bg-info bg-opacity-20">
                <h5>Comments</h5>
            </div>
            <div class="card card-body w-100 mb-5" style="height: 300px; overflow: scroll;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <?php

                        foreach ($dsbl as $bl) {
                            extract($bl);
                        ?>
                            <tr>
                                <td><?= $cmt_content ?></td>
                                <td><?= $kh_name ?></td>
                                <td><?= date("d/m/Y", strtotime($cmt_date)) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <?php
            if (isset($_SESSION['acount'])) {
                echo '
          
    <form action="index.php?act=productinformation&pro_id=' . $pro_id . '" method="post" >
    <div class="mb-3 mt-3">
      <input type="hidden" name="pro_id" value="' . $pro_id . '">
      <label for="comment">Comments:</label>
      <textarea class="form-control" rows="5" id="comment" name="cmt_content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="guibl" >Submit</button>
  </form>
  ';
            } else {
                echo '<div class="card card-body text-bg-secondary">You need to be logged in to be able to comment</div>';
            }
            ?>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var colorButtons = document.querySelectorAll('.color-button');
                colorButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var colorId = this.getAttribute('data-color-id');
                        var checkboxes = document.querySelectorAll('.color-checkbox');
                        checkboxes.forEach(function(checkbox) {
                            checkbox.checked = (checkbox.value == colorId);
                        });
                    });
                });
            });
        </script>