<?php
session_start();
include './app/model/connectdb.php';
include './app/model/product.php';
include './app/model/cate.php';
include './app/model/khachhang.php';
include './app/model/cart.php';
include './app/model/binhluan.php';
include './app/model/color.php';
include './app/model/size.php';
include './app/model/donhang.php' ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./resources/css/global.css">
    <link rel="stylesheet" href="../../resources/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="app">
        <?php include('./resources/view/Header.php') ?>
        <div class="content">
            <div class="container">
                <?php
                if (isset($_GET['act'])) {
                    $pageLayout = $_GET['act'];
                    switch ($pageLayout) {
                        case 'home':
                            include('./resources/view/Home.php');
                            break;
                        case 'productinformation';
                            include './resources/view/products/ProductInformation.php';
                            break;
                            case 'productstrending';
                            include './resources/view/products/ProductsTrending.php';
                            break;
                        case 'login';
                            include './resources/view/account/login.php';
                            break;
                        case 'register';
                            include './resources/view/account/register.php';
                            break;
                        case 'logout';
                            include './resources/view/account/logout.php';
                            header("Location:index.php");
                            break;
                        case 'myAccount':
                            include './resources/view/account/myAccount.php';
                            break;
                        case 'updateAccount':
                            include './resources/view/account/update.php';
                            break;

                        case 'forgetPassword':
                            include './resources/view/account/forgetPass.php';
                            break;
                        case 'mycart':
                            include './resources/view/cart/viewcart.php';

                        break;
                        case 'addcart':
                            if(isset($_POST['addtocart'])){
                                
                                include './resources/view/cart/addcart.php';
                            }
                            if(isset($_POST['buy'])){
                                
                                include './resources/view/cart/checkoutone.php';
                            }
                            
                            break;
                        case 'del_procart':

                           include './resources/view/cart/delcart.php';

                            break;
                        case 'updatecart';
                            include './resources/view/cart/viewupdatecart.php';
                        break;
                        case 'update_cart':
                                include './resources/view/cart/UpdateCart.php';
                            break;

                        case 'checkout':
                            include './resources/view/cart/Checkout.php';
                        break;
                        case 'order':
                            include './resources/view/cart/order.php';

                        break;
                        case 'orderone':
                            include './resources/view/cart/orderone.php';

                        break;
                        case 'myAccount':
                         include './resources/view/account/myAccount.php';
                         break;
                        case 'cancel_order':
                         include './resources/view/cart/cancel.php';
                         break;
                         case 'myAccountchitiet':
                            include './resources/view/account/myacountchitiet.php';
                        break;
                            case 'addlike':
                                
                    if(isset($_POST['like'])){
                        $proid = $_POST['pro_id'];
                        $khid = $_POST['kh_id'];
                        addProductToFavourite($khid, $proid);
                        header("Location:index.php?act=productinformation&pro_id=".$proid);
                    }
                    break;
                    

                    
                
                            
                    }
                } else {
                    include('./resources/view/Home.php');
                }
                ?>
            </div>
        </div>
        <?php include('./resources/view/Footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./resources/js/ValidateFormUpdate.js"></script>
    <script src="./resources/js/ValidateFormForget.js"></script>

    <script src="./resources/js/notifi.js"></script>
    
    
</body>

</html>