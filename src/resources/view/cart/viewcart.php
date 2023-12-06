<?php
if (isset($_GET['kh_id'])) {
    $kh_id = $_GET['kh_id'];
    $cart_kh = querycart_kh($kh_id);
    $my_cart = querycart_chitiet($cart_kh['cart_id']);
}
?>
<div>
    <div class="row gx-5">
        <div class="col-12 col-md-6 mb-4">
            <!-- <form action="index.php?act=" method="post"> -->
            <h3 class="mb-5 fs-5 fw-light text-uppercase border-bottom">Your Shopping Cart</h3>
            <?php
            $totalPrice = 0;
            $shipingPrice = 10;
            foreach ($my_cart as $cartItem) {
                $pro = queryonepro($cartItem['pro_id']);
                $cartprice_item = (int)$pro['pro_price'] * (int)$cartItem['soluong'];
                $totalPrice += $cartprice_item;
                $size = query_allsize();
                $color = query_allcolor();
            ?>
                <div>
                    <div class="mt-3 cart-item d-flex gap-3 border-bottom align-items-center w-100">
                        <form action="index.php?act=update_cart&pro_id=<?= $cartItem['pro_id'] ?>&kh_id=<?= $_SESSION['acount']['kh_id'] ?>" method="post">
                            <input type="text" value="<?= $cartItem['cart_chitiet_id'] ?>" hidden name="id">
                            <img width="120 flex-shrink-0" class="rounded-4" src="<?php echo "./Admin/sanpham/img/" . $pro['pro_img'] ?>">
                            <div class="d-flex flex-column flex-grow-1">
                                <h4 class="fs-6 fw-normal one-line-clamp w-100">Products name:
                                    <?php echo $pro['pro_name']; ?></h4>
                                <p class="fw-bold ">Price: $<?php echo $pro['pro_price']; ?></p>
                                <div class="d-flex flex-row flex-grow-1">
                                    <div class="d-flex align-items-end me-5">
                                        <span class="me-3">Quantity: </span>
                                        <input class="ps-2 form-control" type="number" name="cart_qty" min="1" max="99" value="<?php echo $cartItem['soluong']; ?>">
                                    </div>
                                    <div class="d-flex align-items-end me-5">
                                        <span class="me-3">Size </span>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="size" id="">
                                            <?php
                                            foreach ($size as $sz) {
                                            ?>
                                                <option value="<?= $sz['size_id'] ?> " <?php
                                                                                        if ($sz['size_id'] == $cartItem['size_id']) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>><?= $sz['size_name'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <span class="me-3">Color</span>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="color" id="">
                                            <?php
                                            foreach ($color as $procolor) {
                                            ?>
                                                <option value="<?= $procolor['color_id'] ?> " <?php
                                                                                                if ($procolor['color_id'] == $cartItem['color_id']) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                                ?>>
                                                    <?= $procolor['color_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark mt-4 w-100" id="" name="updatecart">Update</button>
                        </form>
                        <a href="index.php?act=del_procart&cart_id_del=<?php echo $cartItem['cart_chitiet_id']; ?>&kh_id=<?= $kh_id ?>">
                            <button type="submit" class="btn btn-danger mt-4" id="" onclick="return confirm('Confirm delete product')">Delete</button>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>



            <!-- </form> -->
        </div>

        <div class="col-12 col-md-6">
            <h3 class="mb-5 fs-5 fw-light text-uppercase border-bottom">Billing Information</h3>
            <div class="border-bottom-nopad">
                <div class="d-flex justify-content-between ">
                    <p class="text-light text-dark ">Subtotal</p>
                    <span class="fw-bold">$<?php echo $totalPrice; ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <p class="text-light text-dark ">Shipping</p>
                    <span class="fw-bold">$<?php echo $shipingPrice; ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <p class="text-light text-dark ">Discount</p>
                    <span class="fw-bold">0%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-2">
                <p class="text-light text-dark ">Total</p>
                <span class="fw-bold">$<?php echo $totalPrice + $shipingPrice; ?></span>
            </div>
            <a href="index.php?act=checkout&kh_id=<?= $kh_id ?>">
                <button class="btn btn-dark w-100 ">Checkout</button>
            </a>
        </div>
    </div>
</div>
<script>
    var check_all = document.querySelector('#all');
    var un_all = document.querySelector('#unall');
    var del_all = document.querySelector('#del_all');
    var buy_all = document.querySelector('#buy_all');
    var checkbox = document.querySelector('#checkbox');
    check_all.click = function chekbox() {
        if (check_all.checked == true) {
            checkbox.checked = true;
            check_all.style.display = 'none';
            un_all.style.display = 'block';
        }
        if (un_all.checked == true) {
            checkbox.checked = false;
            check_all.style.display = 'block';
            un_all.style.display = 'none';
        }

    }
    checkbox();
</script>