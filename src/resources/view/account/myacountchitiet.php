<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" > -->
    <?php
        if(isset($_GET['order_id']) && $_GET['kh_id'] ){
            $order = $_GET['order_id'];
            $kh_id = $_GET['kh_id'];
           $dh_chitiet =  load_order_chitiet($order);
            $dh = loadall_one_donhang($order);
          $kh =   loadone_taikhoan($kh_id);
        
        
    ?>
    
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="container-fluid my-5  d-flex  justify-content-center">
                    <div class="card card-1">
                        <div class="card-header bg-white">
                            <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                                <div class="col my-auto">
                                    <h4 class="mb-0 text-center">Thanks for your Order,
                                        <span class="change-color"><?=$kh['kh_name']?></span> !
                                    </h4>
                                </div>
                                <div class="col-auto text-center  my-auto pl-0 pt-sm-4">
                                    <img class="img-fluid my-auto align-items-center mb-0 pt-3" src="https://images.prismic.io/rushordertees-web/462cc8da-ea83-45bc-881e-2883101b8bcf_T-Shirts.jpg?auto=compress,format&rect=0,0,1600,1800&w=800&h=900" width="115" height="115">
                                    <p class="mb-4 pt-0 Glasses">Clothes For Everyone
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <div class="col-auto">
                                    <h6 class="color-1 mb-0 change-color">Receipt</h6>
                                </div>
                                <!-- <div class="col-auto  "> <small>Receipt Voucher :
                                        1KAU9-84UIL</small> </div> -->
                            </div>
                           
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="card card-2">
                                        <?php
                                            foreach($dh_chitiet as $value){
                                               $one_chitiet =  load_one_chitietdonhang($value['order_chitiet_id']);
                                               $pro = queryonepro($one_chitiet['pro_id']);
                                             $sz =   query_onesize($one_chitiet['size_id']);
                                             $color =  query_onecolor($one_chitiet['color_id']);
                                        ?>
                                    
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="./Admin/sanpham/img/<?php echo $pro['pro_img'] ?>" width="135" height="135" />
                                                </div>
                                                <div class="media-body my-auto text-right">
                                                    <div class="row  my-auto flex-column flex-md-row">
                                                        <div class="col-auto my-auto ">
                                                            <h6 class="mb-0"> <?= $pro['pro_name']?></h6>
                                                        </div>
                                                        
                                                        <div class="col my-auto  ">
                                                            <small>Size : <?=$sz['size_name']?></small>
                                                        </div>
                                                        <div class="col my-auto  ">
                                                            <small>Qty : <?=$one_chitiet['soluong']?></small>
                                                        </div>
                                                        <div class="col my-auto ">
                                                            <h6 class="mb-0">Total: <?=$one_chitiet['total_price']?>$
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-3 ">
                                           
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                                <div class="col mt-auto">
                                                    <div class="progress my-auto">
                                                        <div class="progress-bar progress-bar rounded" 
                                                        <?php
                                                            if($dh['order_trangthai'] == 'Đang giao hàng'){
                                                                ?>
                                                                    style="width: 62%"
                                                                <?php
                                                            }
                                                            if($dh['order_trangthai'] == 'Đã nhận hàng'){
                                                                ?>
                                                                style="width: 100%"
                                                                <?php
                                                            }
                                                        ?>
                                                         role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-3">
                                                        <div class="col-md-3 mb-3">
                                                            <small> Track Order
                                                                <span> <i class=" ml-2 fa fa-refresh" aria-hidden="true"></i></span></small>
                                                        </div>
                                                        <div class="flex-col"> <span>
                                                                <small class="text-right mr-sm-2">Out
                                                                    for
                                                                    delivary</small> <i class="fa fa-circle active"></i></span>
                                                        </div>
                                                        <div class="col-auto flex-col-auto">
                                                            <small class="text-right mr-sm-2">Delivered</small><span>
                                                                <i class="fa fa-circle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <p class="mb-1 text-dark"><b>Order
                                                    Details</b></p>
                                        </div>
                                        <div class="flex-sm-col text-right col">
                                            <p class="mb-1"><b>Total</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><?= $dh['order_totalprice']?></p>
                                        </div>
                                    </div>
                                   
                                  
                                  
                                </div>
                            </div>
                            <div class="row invoice ">
                                <div class="col">
                                    <p class="mb-1"> ID Order: <?=$order?> </p>
                                    <p class="mb-1">Invoice Date: <?=$dh['order_date']?></p>
                                    <!-- <p class="mb-1">Recepits Voucher: 18KU-62IIK</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="jumbotron-fluid">
                                <div class="d-flex justify-content-center ">
                                    <div class="col-sm-auto col-auto my-auto"><img class="img-fluid my-auto align-self-center " src="https://w7.pngwing.com/pngs/900/878/png-transparent-smiley-face-excited-people-s-face-smiley-emoticon.png" width="115" height="115">
                                    </div>
                                    <div class="col-auto my-auto ">
                                        <h4 class="mb-0 font-weight-bold">TOTAL PAID:
                                            <?= $dh['order_totalprice']?>$</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <?php
        }
    ?>
<!-- </div> -->